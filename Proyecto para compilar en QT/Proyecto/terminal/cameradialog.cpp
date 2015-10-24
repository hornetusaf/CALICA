#include "cameradialog.h"
#include "mainwindow.h"
#include "ui_cameradialog.h"
#include <QCamera>
#include <QFileDialog>

cameradialog::cameradialog(QWidget *parent) :
    QDialog(parent),
    ui(new Ui::cameradialog)
{
    ui->setupUi(this);
}

cameradialog::~cameradialog()
{
    delete ui;
}

QByteArray cameradialog::getCamaraEntrada()
{
    return ui->entradaComboBox->currentText().toLocal8Bit();
}

QByteArray cameradialog::getCamaraSalida()
{
    return ui->salidaComboBox->currentText().toLocal8Bit();
}

QString cameradialog::getDirectorio()
{
    return directorio;
}

void cameradialog::setData(QVector<QByteArray> vecCam, QString dir, QString camE, QString camS)
{
    vecC=vecCam;
    directorio=dir;
    QCamera camara;

    ui->entradaComboBox->addItem("Seleccione Camara");
    ui->salidaComboBox->addItem("Seleccione Camara");

    for(int i=0;i<vecC.size();i++)
    {
        ui->entradaComboBox->addItem(vecC[i]);
        ui->salidaComboBox->addItem(vecC[i]);
    }

    if(camE=="")
        ui->entradaComboBox->setCurrentIndex(ui->entradaComboBox->findText("Seleccione Camara"));
    else
        ui->entradaComboBox->setCurrentIndex(ui->entradaComboBox->findText(camE));
    if(camS=="")
        ui->salidaComboBox->setCurrentIndex(ui->salidaComboBox->findText("Seleccione Camara"));
    else
        ui->salidaComboBox->setCurrentIndex(ui->salidaComboBox->findText(camS));
}

void cameradialog::on_dirButton_clicked()
{
    QFileDialog::Options options = QFlag(true);
    directorio = QFileDialog::getExistingDirectory(this,"Seleccione la carpeta donde se guardarán la imágenes",
                                                          directorio,options);
    qDebug()<<directorio;
}
