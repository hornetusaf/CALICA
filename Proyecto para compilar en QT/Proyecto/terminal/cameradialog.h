#ifndef CAMERADIALOG_H
#define CAMERADIALOG_H

#include <QDialog>

namespace Ui {
class cameradialog;
}

class cameradialog : public QDialog
{
    Q_OBJECT

public:
    explicit cameradialog(QWidget *parent = 0);
    ~cameradialog();

public:
    void setData(QVector<QByteArray> vecCam,QString dir, QString camE, QString camS);
    QString getDirectorio();
    QByteArray getCamaraEntrada();
    QByteArray getCamaraSalida();
    QVector<QByteArray> vecC;
    QString directorio;

private slots:
    void on_dirButton_clicked();

private:
    Ui::cameradialog *ui;
};

#endif // CAMERADIALOG_H
