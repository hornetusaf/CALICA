#include "databasedialog.h"
#include "ui_databasedialog.h"

databasedialog::databasedialog(QWidget *parent) :
    QDialog(parent),
    ui(new Ui::databasedialog)
{    
    ui->setupUi(this);

    ui->conexLineEdit->setText(conex);
    ui->dblineEdit->setText(base);
    ui->usuarioLineEdit->setText(user);
    ui->contraLineEdit->setText(pass);
}

databasedialog::~databasedialog()
{
    delete ui;
}

QString databasedialog::getconex()
{
    return ui->conexLineEdit->text();
}

QString databasedialog::getdatabase()
{
    return ui->dblineEdit->text();
}

QString databasedialog::getuser()
{
    return ui->usuarioLineEdit->text();
}

QString databasedialog::getpass()
{
    return ui->contraLineEdit->text();
}

void databasedialog::setData(QString co,QString ba,QString us,QString pa)
{
    conex=co;
    base=ba;
    user=us;
    pass=pa;
}
