/****************************************************************************
**
** Copyright (C) 2012 Denis Shienkov <denis.shienkov@gmail.com>
** Copyright (C) 2012 Laszlo Papp <lpapp@kde.org>
** Contact: http://www.qt-project.org/legal
**
** This file is part of the QtSerialPort module of the Qt Toolkit.
**
** $QT_BEGIN_LICENSE:LGPL$
** Commercial License Usage
** Licensees holding valid commercial Qt licenses may use this file in
** accordance with the commercial license agreement provided with the
** Software or, alternatively, in accordance with the terms contained in
** a written agreement between you and Digia.  For licensing terms and
** conditions see http://qt.digia.com/licensing.  For further information
** use the contact form at http://qt.digia.com/contact-us.
**
** GNU Lesser General Public License Usage
** Alternatively, this file may be used under the terms of the GNU Lesser
** General Public License version 2.1 as published by the Free Software
** Foundation and appearing in the file LICENSE.LGPL included in the
** packaging of this file.  Please review the following information to
** ensure the GNU Lesser General Public License version 2.1 requirements
** will be met: http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html.
**
** In addition, as a special exception, Digia gives you certain additional
** rights.  These rights are described in the Digia Qt LGPL Exception
** version 1.1, included in the file LGPL_EXCEPTION.txt in this package.
**
** GNU General Public License Usage
** Alternatively, this file may be used under the terms of the GNU
** General Public License version 3.0 as published by the Free Software
** Foundation and appearing in the file LICENSE.GPL included in the
** packaging of this file.  Please review the following information to
** ensure the GNU General Public License version 3.0 requirements will be
** met: http://www.gnu.org/copyleft/gpl.html.
**
**
** $QT_END_LICENSE$
**
****************************************************************************/

#include "mainwindow.h"
#include "ui_mainwindow.h"
#include "console.h"
#include "settingsdialog.h"
#include "databasedialog.h"
#include "cameradialog.h"
#include <QDebug>
#include <QMessageBox>
#include <QInputDialog>
#include <QFormLayout>
#include <QDialogButtonBox>
#include <QSql>
#include <QCamera>

MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);

    console = new Console;
    console->setEnabled(false);
    //setCentralWidget(console); //habilita la consola para pruebas puerto serial

    serial = new QSerialPort(this);
    settings = new SettingsDialog;

    ui->actionConnect->setEnabled(true);
    ui->actionDisconnect->setEnabled(false);
    ui->actionQuit->setEnabled(true);
    ui->actionConfigure->setEnabled(true);

    initActionsConnections();

    connect(serial, SIGNAL(error(QSerialPort::SerialPortError)), this,
            SLOT(handleError(QSerialPort::SerialPortError)));

    connect(serial, SIGNAL(readyRead()), this, SLOT(readData()));

    connect(console, SIGNAL(getData(QByteArray)), this, SLOT(writeData(QByteArray)));    

    //inicio de las camaras

    foreach(const QByteArray &deviceName, QCamera::availableDevices()) {
        vecCamaras.append(deviceName);
    }

    for(int i=0;i<vecCamaras.size();i++)
    {
        qDebug()<<"Camara disponible: "+camera->deviceDescription(vecCamaras[i]);
    }    

    statusCamaraEnt=false;
    statusCamaraSal=false;


    m_sSettingsFile = "configuracion.ini";
    loadSettings();

    if(!camaraEntrada.isEmpty())
        setCamaraEntrada();
    if(!camaraSalida.isEmpty())
        setCamaraSalida();

    openSerialPort();   

    timer = new QTimer(this);
    QObject::connect(timer, SIGNAL(timeout()), this, SLOT(borrar()));
    timer->start(43200000); //tiempo en ms 43200000 12 horas (ejecucion de la funcion borrar())
}

MainWindow::~MainWindow()
{
    delete settings;
    delete ui;
}

void MainWindow::setCamaraEntrada()//habilitar la camara de entrada
{   
    camaraEnt = new QCamera(camaraEntrada);
    imageCaptureEntrada = new QCameraImageCapture(camaraEnt);
    camaraEnt->setViewfinder(ui->viewfinder);
    camaraEnt->start();
    statusCamaraEnt=true;
}

void MainWindow::setCamaraSalida()//habilitar la camara de salida
{
    camaraSal = new QCamera(camaraSalida);
    imageCaptureSalida= new QCameraImageCapture(camaraSal);
    camaraSal->setViewfinder(ui->viewfinder_2);
    camaraSal->start();
    statusCamaraSal=true;
}

void MainWindow::openSerialPort()//apertura del puerto serial y conexion de la base de datos
{
    SettingsDialog::Settings p = settings->settings();
    serial->setPortName(p.name);
    if (serial->open(QIODevice::ReadWrite)) {
        if (serial->setBaudRate(p.baudRate)
                && serial->setDataBits(p.dataBits)
                && serial->setParity(p.parity)
                && serial->setStopBits(p.stopBits)
                && serial->setFlowControl(p.flowControl)) {

            console->setEnabled(true);
            console->setLocalEchoEnabled(p.localEchoEnabled);
            ui->actionConnect->setEnabled(false);
            ui->actionDisconnect->setEnabled(true);
            ui->actionConfigure->setEnabled(false);
            ui->statusBar->showMessage(tr("Conectado a %1 : %2, %3, %4, %5, %6")
                                       .arg(p.name).arg(p.stringBaudRate).arg(p.stringDataBits)
                                       .arg(p.stringParity).arg(p.stringStopBits).arg(p.stringFlowControl)+" Base de datos Conectada");

            //Conexion a la base de datos
            //para linux instalar synaptic luego libqt5sql-mysql driver y copiar el archivo libsqlmysql.so en la carpeta plugins de qt para poder compilar.
            db = QSqlDatabase::addDatabase("QMYSQL");
            db.setHostName(conex);
            db.setDatabaseName(base);
            db.setUserName(user);
            db.setPassword(pass);
            bool ok = db.open();

            if(!ok)
            {
                QMessageBox::critical(this, tr("Error"), "No se pudo conectar a la base de datos");
                ui->statusBar->showMessage(tr("Conectado a %1 : %2, %3, %4, %5, %6")
                                           .arg(p.name).arg(p.stringBaudRate).arg(p.stringDataBits)
                                           .arg(p.stringParity).arg(p.stringStopBits).arg(p.stringFlowControl)+" Base de datos Desconectada");
            }

        } else {
            serial->close();
            QMessageBox::critical(this, tr("Error"), serial->errorString());

            ui->statusBar->showMessage(tr("Error de apertura"));
        }
    } else {
        QMessageBox::critical(this, tr("Error"), serial->errorString());

        ui->statusBar->showMessage(tr("Error de configuración"));
    }
}

void MainWindow::closeSerialPort()//cierre de la conexion serial
{
    serial->close();
    console->setEnabled(false);
    ui->actionConnect->setEnabled(true);
    ui->actionDisconnect->setEnabled(false);
    ui->actionConfigure->setEnabled(true);
    ui->statusBar->showMessage(tr("Desconectado"));
}

void MainWindow::about()//ventana acerca de
{
    QMessageBox::about(this, tr("Acerca de"),
                       tr("Software de conexión del sistema de control de acceso al Laboratorio de Instrumentación, Control y Automatización de la Universidad Nacional Experimental del Táchira"));
}

void MainWindow::writeData(const QByteArray &data)//escritura de datos por puerto serial
{
    serial->write(data);
}

void MainWindow::readData()//lectura de datos por puerto serial
{
    QByteArray data = serial->readAll();
    console->putData(data);
    consulta(data);
}

void MainWindow::handleError(QSerialPort::SerialPortError error)//manejo de errores puerto serial
{
    if (error == QSerialPort::ResourceError) {
        QMessageBox::critical(this, tr("Error critico"), serial->errorString());
        closeSerialPort();
    }
}

void MainWindow::initActionsConnections()//
{
    connect(ui->actionConnect, SIGNAL(triggered()), this, SLOT(openSerialPort()));
    connect(ui->actionDisconnect, SIGNAL(triggered()), this, SLOT(closeSerialPort()));
    connect(ui->actionQuit, SIGNAL(triggered()), this, SLOT(close()));
    connect(ui->actionConfigure, SIGNAL(triggered()), settings, SLOT(show()));
    connect(ui->actionClear, SIGNAL(triggered()), console, SLOT(clear()));
    connect(ui->actionAbout, SIGNAL(triggered()), this, SLOT(about()));
}

void MainWindow::on_actionBase_de_datos_triggered()//ventana de parametros de la base de datos
{
    QString co=conex,ba=base,us=user,pa=pass;
    QDialog dialog(this);    

    QFormLayout form(&dialog);

    QLineEdit *lineEdit1 = new QLineEdit(&dialog);
    lineEdit1->setText(conex);
    QString label1 = "Conexion:";
    form.addRow(label1, lineEdit1);

    QLineEdit *lineEdit2 = new QLineEdit(&dialog);
    lineEdit2->setText(base);
    QString label2 = "Base de datos";
    form.addRow(label2, lineEdit2);

    QLineEdit *lineEdit3 = new QLineEdit(&dialog);
    lineEdit3->setText(user);
    QString label3 = "Usuario";
    form.addRow(label3, lineEdit3);

    QLineEdit *lineEdit4 = new QLineEdit(&dialog);
    lineEdit4->setEchoMode(QLineEdit::Password);
    lineEdit4->setText(pass);
    QString label4 = "Contraseña";
    form.addRow(label4, lineEdit4);

    QDialogButtonBox buttonBox(QDialogButtonBox::Ok | QDialogButtonBox::Cancel,
                               Qt::Horizontal, &dialog);
    form.addRow(&buttonBox);
    QObject::connect(&buttonBox, SIGNAL(accepted()), &dialog, SLOT(accept()));
    QObject::connect(&buttonBox, SIGNAL(rejected()), &dialog, SLOT(reject()));

    if (dialog.exec() == QDialog::Accepted)
    {
        conex=lineEdit1->text();
        base=lineEdit2->text();
        user=lineEdit3->text();
        pass=lineEdit4->text();

        saveSettings();

        if(co!=conex || ba!=base || us!=user || pa!=pass)
        {
            closeSerialPort();
            QThread::msleep(500);
            openSerialPort();
        }
    }
}

void MainWindow::on_actionCamaras_triggered()//ventana de seleccion de camaras y la carpeta de imagenes/fotos
{    
    cameradialog cameraDlg;
    cameraDlg.setData(vecCamaras,directorio,camaraEntrada,camaraSalida);

    QByteArray ce=camaraEntrada,cs=camaraSalida;

    if (cameraDlg.exec() == QDialog::Accepted)
    {
        int posEnt=-1, posSal=-1;
        for(int i=0;i<vecCamaras.size();i++)
        {
            if(vecCamaras[i]==cameraDlg.getCamaraEntrada())
                posEnt=i;

            if(vecCamaras[i]==cameraDlg.getCamaraSalida())
                posSal=i;
        }

        if(posEnt>=0)
            camaraEntrada=vecCamaras[posEnt];
        else
            camaraEntrada=NULL;

        if(posSal>=0)
            camaraSalida=vecCamaras[posSal];
        else
            camaraSalida=NULL;

        if(camaraEntrada==camaraSalida && camaraEntrada!=(QByteArray)NULL)
        {
            camaraEntrada=ce;
            camaraSalida=cs;

            QMessageBox msgBox;
            msgBox.setText("Por favor seleccione dos camaras diferentes.");
            msgBox.exec();
        }

        directorio=cameraDlg.getDirectorio();

        saveSettings();

        if(ce!=camaraEntrada || cs!=camaraSalida)
        {
            if(statusCamaraEnt)
            {
                camaraEnt->stop();
                delete camaraEnt;
            }
            if(statusCamaraSal)
            {
                camaraSal->stop();
                delete camaraSal;
            }

            closeSerialPort();
            QProcess::startDetached(QApplication::applicationFilePath());
            exit(0);
        }
    }
}

void MainWindow::loadSettings()//carga de parametros del archivo de configuracion
{
    QString camaraE,camaraS;
    QSettings config(m_sSettingsFile, QSettings::IniFormat);
    conex = config.value("conex", "").toString();
    base = config.value("base", "").toString();
    user = config.value("user", "").toString();
    pass = config.value("pass", "").toString();
    camaraE = config.value("camaraEntrada", "").toString();
    camaraS = config.value("camaraSalida", "").toString();
    directorio = config.value("directorio", "").toString();    

    QStringList pieces = directorio.split( "/" );
    rutaImagen = pieces.value( pieces.length()-1);

    for(int i=0;i<vecCamaras.size();i++)
    {
        if(vecCamaras[i]==camaraE)
            camaraEntrada=vecCamaras[i];

        if(vecCamaras[i]==camaraS)
            camaraSalida=vecCamaras[i];
    }
}

void MainWindow::saveSettings()//guardado de parametros en el archivo de configuracion
{
    QSettings config(m_sSettingsFile, QSettings::IniFormat);
    config.setValue("conex", conex);
    config.setValue("base", base);
    config.setValue("user", user);
    config.setValue("pass", pass);
    config.setValue("camaraEntrada", camaraEntrada);
    config.setValue("camaraSalida", camaraSalida);
    config.setValue("directorio", directorio);

    QStringList pieces = directorio.split( "/" );
    rutaImagen = pieces.value( pieces.length()-1);
}

QString MainWindow::tomarFotoEntrada()//toma la foto de entrada
{
    QString nombre = "E-"+QDateTime::currentDateTime().toString("dd-MM-yyyy-HH-mm-ss");
    imageCaptureEntrada->capture(directorio+"/"+nombre);

    return nombre;
}

QString MainWindow::tomarFotoSalida()//toma la foto de salida
{
    QString nombre = "S-"+QDateTime::currentDateTime().toString("dd-MM-yyyy-HH-mm-ss");
    imageCaptureSalida->capture(directorio+"/"+nombre);

    return nombre;
}

void MainWindow::borrar()//elimina horarios viejos y fotos con mas de 180 dias de haberse tomado
{
    QString fechaFin="",fecha="", foto="";
    int id=0;
    QSqlQuery query(db);
    QSqlQuery query1(db);

    //borrar horarios viejos

    query.prepare("SELECT * FROM `horario`");
    query.exec();

    while(query.next())
    {
        id = query.value("id").toInt();
        fechaFin = query.value("fecha_fin").toString();

        if(fechaFin!="")
        {
            QDateTime dateHoy = QDateTime::currentDateTime();
            dateHoy=dateHoy.addDays(-1);
            QDateTime dateTimeFin = QDateTime::fromString(fechaFin+"-"+dateHoy.toString("hh:mm:ss"), "dd-MM-yyyy-hh:mm:ss");

            if(dateTimeFin<dateHoy)
            {
                query1.prepare("DELETE FROM `horario` WHERE `id` = :id");
                query1.bindValue(":id", id);
                query1.exec();
            }
        }
    }

    //borrar fotos de entradas

    query.prepare("SELECT * FROM `registro_entrada`");
    query.exec();

    while(query.next())
    {
        id = query.value("id").toInt();
        fecha = query.value("fecha").toString();
        foto = query.value("foto").toString();

        QDateTime dateHoy = QDateTime::currentDateTime();
        dateHoy=dateHoy.addDays(-180);
        QDateTime dateTimeFoto = QDateTime::fromString(fecha+"-"+dateHoy.toString("hh:mm:ss"), "dd-MM-yyyy-hh:mm:ss");

        if(dateTimeFoto<dateHoy)
        {
            QStringList pieces = foto.split( "/" );
            foto = pieces.value(pieces.length()-1);
            QFile file(directorio+"/"+foto);
            qDebug()<<file.fileName();
            if(foto!="nodisponible")
                file.remove();

            query1.prepare("DELETE FROM `registro_entrada` WHERE `id` = :id");
            query1.bindValue(":id", id);
            query1.exec();
        }
    }

    //borrar fotos de salidas

    query.prepare("SELECT * FROM `registro_salida`");
    query.exec();

    while(query.next())
    {
        id = query.value("id").toInt();
        fecha = query.value("fecha").toString();
        foto = query.value("foto").toString();

        QDateTime dateHoy = QDateTime::currentDateTime();
        dateHoy=dateHoy.addDays(-180);
        QDateTime dateTimeFoto = QDateTime::fromString(fecha+"-"+dateHoy.toString("hh:mm:ss"), "dd-MM-yyyy-hh:mm:ss");

        if(dateTimeFoto<dateHoy)
        {
            QStringList pieces = foto.split( "/" );
            foto = pieces.value(pieces.length()-1);
            QFile file(directorio+"/"+foto);
            qDebug()<<file.fileName();
            if(foto!="nodisponible")
                file.remove();

            query1.prepare("DELETE FROM `registro_salida` WHERE `id` = :id");
            query1.bindValue(":id", id);
            query1.exec();
        }
    }

    qDebug()<<"borrado";
}

void MainWindow::consulta(QByteArray datos)//consulta en la base de datos entradas con pin o rfid, salidas y registro de tarjeta rfid
{
    QString cadena = datos;
    QString comando="", pin="", cedula="", tipo="", fechaInicio="", fechaFin="", horaInicio="", horaFin="", rfid="";
    QString lunes, martes, miercoles, jueves, viernes, sabado, domingo;
    const char abrir[]="X", horario[]="Y", registro[]="Z"; //respuestas X Y Z
    bool acceso=false;

    comando=cadena.mid(1,2);

    if(comando == "03" || comando == "05")//entrada al laboratorio
    {
        QSqlQuery query(db);

        if(comando == "03")//entrada con pin #03
        {
            pin=cadena.mid(3,6);
            query.prepare("SELECT `cedula`, `tipo_usuario_id` FROM `usuario` WHERE pin = :pin");
            query.bindValue(":pin", pin);
        }
        else//entrada con rfid #05
        {
            rfid=cadena.mid(3,10);
            query.prepare("SELECT `cedula`, `tipo_usuario_id` FROM `usuario` WHERE rfid = :rfid");
            query.bindValue(":rfid", rfid);
        }

        query.exec();

        while(query.next())
        {
            cedula = query.value("cedula").toString();
            tipo = query.value("tipo_usuario_id").toString();            
        }

        if(cedula!="")
        {
            QDateTime dateHoy;
            QDateTime dateTimeInicio;
            QDateTime dateTimeFin;
            QString dia;

            if(tipo=="1" || tipo=="2" || tipo=="3")
            {
                acceso=true;
            }
            else
            {
                //chequear horario
                query.prepare("SELECT `fecha_inicio`, `fecha_fin`, `hora_inicio`, `hora_fin`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo` FROM `horario` WHERE usuario_cedula = :cedula");
                query.bindValue(":cedula", cedula);
                query.exec();

                while(query.next())
                {
                    fechaInicio = query.value("fecha_inicio").toString();
                    fechaFin = query.value("fecha_fin").toString();
                    horaInicio = query.value("hora_inicio").toString();
                    horaFin = query.value("hora_fin").toString();
                    lunes=query.value("lunes").toString();
                    martes=query.value("martes").toString();
                    miercoles=query.value("miercoles").toString();
                    jueves=query.value("jueves").toString();
                    viernes=query.value("viernes").toString();
                    sabado=query.value("sabado").toString();
                    domingo=query.value("domingo").toString();

                    qDebug() << fechaInicio<<fechaFin<<horaInicio<<horaFin;

                    dateHoy = QDateTime::currentDateTime();
                    dateTimeInicio = QDateTime::fromString(fechaInicio+"-"+dateHoy.toString("hh:mm:ss"), "dd-MM-yyyy-hh:mm:ss");
                    dateTimeFin = QDateTime::fromString(fechaFin+"-"+dateHoy.toString("hh:mm:ss"), "dd-MM-yyyy-hh:mm:ss");

                    dia = dateHoy.toString("dddd");
                    qDebug()<<dateHoy.toString("dddd");
                    qDebug()<<miercoles;

                    qDebug() <<dateHoy<<dateTimeInicio<<dateTimeFin<<horaInicio<<horaFin;

                    if((dia=="lunes" && lunes=="1") || (dia=="martes" && martes=="1") || (dia=="miércoles" && miercoles=="1") || (dia=="jueves" && jueves=="1") || (dia=="viernes" && viernes=="1") || (dia=="sábado" && sabado=="1") || (dia=="domingo" && domingo=="1"))
                    {
                        if(horaInicio==horaFin && QDateTime::currentDateTime().toString("h")==horaInicio)
                        {
                            acceso=true;
                            break;
                        }
                        else
                        if(QDateTime::currentDateTime().toString("h")>=horaInicio && QDateTime::currentDateTime().toString("h")<horaFin)
                        {
                            acceso=true;
                            break;
                        }
                    }

                    if((dateTimeInicio<dateHoy && dateHoy<dateTimeFin) || (dateTimeInicio.secsTo(dateHoy)==0) || (dateTimeFin.secsTo(dateHoy)==0))
                    {
                        if(horaInicio==horaFin && QDateTime::currentDateTime().toString("h")==horaInicio)
                        {
                            acceso=true;
                            break;
                        }
                        else
                        if(QDateTime::currentDateTime().toString("h")>=horaInicio && QDateTime::currentDateTime().toString("h")<horaFin)
                        {
                            acceso=true;
                            break;
                        }
                    }
                }
            }

            if(acceso)//acceso
            {
                writeData(abrir); //envia X

                QString foto;

                if(statusCamaraEnt)
                    foto=tomarFotoEntrada();
                else
                    foto="nodisponible";

                query.prepare("INSERT INTO `registro_entrada`(`fecha`, `hora`, `foto`, `usuario_cedula`) VALUES (:fecha,:hora,:foto,:cedula)");
                query.bindValue(":fecha", QDateTime::currentDateTime().toString("dd-MM-yyyy"));
                query.bindValue(":hora", QDateTime::currentDateTime().toString("hh:mm:ss"));
                query.bindValue(":foto", "/"+rutaImagen+"/"+foto);
                query.bindValue(":cedula", cedula);
                query.exec();
                qDebug() << "abrir";
            }
            else
            {
                writeData(horario);//envia Y
                qDebug() << "horario";
            }
        }
        else
        {
            writeData(registro);//envia Z
            qDebug() << "no registrado";
        }
    }

    if(comando == "04")//Salida del laboratorio #04
    {
        QString foto;

        if(statusCamaraSal)
            foto=tomarFotoSalida();
        else
            foto="nodisponible";

        QSqlQuery query(db);
        query.prepare("INSERT INTO `registro_salida`(`fecha`, `hora`, `foto`) VALUES (:fecha,:hora,:foto)");
        query.bindValue(":fecha", QDateTime::currentDateTime().toString("dd-MM-yyyy"));
        query.bindValue(":hora", QDateTime::currentDateTime().toString("hh:mm:ss"));
        query.bindValue(":foto", "/"+rutaImagen+"/"+foto);
        query.exec();
    }

    if(comando == "06")//Registro de tarjeta RFID #06
    {
        pin=cadena.mid(3,6);
        rfid=cadena.mid(9,10);
        QSqlQuery query(db);
        query.prepare("INSERT INTO `usuario`(`rfid`) VALUES (:rfid) WHERE pin = :pin");
        query.bindValue(":rfid", rfid);
        query.bindValue(":pin", pin);
        query.exec();
    }
}
