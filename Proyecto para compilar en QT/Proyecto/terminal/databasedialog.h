#ifndef DATABASEDIALOG_H
#define DATABASEDIALOG_H

#include <QDialog>

namespace Ui {
class databasedialog;
}

class databasedialog : public QDialog
{
    Q_OBJECT

public:
    explicit databasedialog(QWidget *parent = 0);
    ~databasedialog();

public:
    QString getconex();
    QString getdatabase();
    QString getuser();
    QString getpass();
    void setData(QString co, QString ba, QString us, QString pa);
    QString conex;
    QString base;
    QString user;
    QString pass;

private:
    Ui::databasedialog *ui;
};

#endif // DATABASEDIALOG_H
