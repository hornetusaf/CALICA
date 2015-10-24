/********************************************************************************
** Form generated from reading UI file 'cameradialog.ui'
**
** Created by: Qt User Interface Compiler version 5.3.2
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_CAMERADIALOG_H
#define UI_CAMERADIALOG_H

#include <QtCore/QVariant>
#include <QtWidgets/QAction>
#include <QtWidgets/QApplication>
#include <QtWidgets/QButtonGroup>
#include <QtWidgets/QComboBox>
#include <QtWidgets/QDialog>
#include <QtWidgets/QDialogButtonBox>
#include <QtWidgets/QGridLayout>
#include <QtWidgets/QHeaderView>
#include <QtWidgets/QLabel>
#include <QtWidgets/QPushButton>
#include <QtWidgets/QWidget>

QT_BEGIN_NAMESPACE

class Ui_cameradialog
{
public:
    QLabel *label_5;
    QWidget *layoutWidget;
    QGridLayout *gridLayout;
    QLabel *label;
    QComboBox *entradaComboBox;
    QLabel *label_2;
    QComboBox *salidaComboBox;
    QDialogButtonBox *buttonBox;
    QPushButton *dirButton;

    void setupUi(QDialog *cameradialog)
    {
        if (cameradialog->objectName().isEmpty())
            cameradialog->setObjectName(QStringLiteral("cameradialog"));
        cameradialog->resize(400, 175);
        cameradialog->setMinimumSize(QSize(400, 175));
        cameradialog->setMaximumSize(QSize(400, 175));
        label_5 = new QLabel(cameradialog);
        label_5->setObjectName(QStringLiteral("label_5"));
        label_5->setGeometry(QRect(10, 10, 381, 23));
        layoutWidget = new QWidget(cameradialog);
        layoutWidget->setObjectName(QStringLiteral("layoutWidget"));
        layoutWidget->setGeometry(QRect(10, 40, 381, 121));
        gridLayout = new QGridLayout(layoutWidget);
        gridLayout->setObjectName(QStringLiteral("gridLayout"));
        gridLayout->setContentsMargins(0, 0, 0, 0);
        label = new QLabel(layoutWidget);
        label->setObjectName(QStringLiteral("label"));

        gridLayout->addWidget(label, 0, 0, 1, 1);

        entradaComboBox = new QComboBox(layoutWidget);
        entradaComboBox->setObjectName(QStringLiteral("entradaComboBox"));

        gridLayout->addWidget(entradaComboBox, 0, 1, 1, 1);

        label_2 = new QLabel(layoutWidget);
        label_2->setObjectName(QStringLiteral("label_2"));

        gridLayout->addWidget(label_2, 1, 0, 1, 1);

        salidaComboBox = new QComboBox(layoutWidget);
        salidaComboBox->setObjectName(QStringLiteral("salidaComboBox"));

        gridLayout->addWidget(salidaComboBox, 1, 1, 1, 1);

        buttonBox = new QDialogButtonBox(layoutWidget);
        buttonBox->setObjectName(QStringLiteral("buttonBox"));
        buttonBox->setOrientation(Qt::Horizontal);
        buttonBox->setStandardButtons(QDialogButtonBox::Cancel|QDialogButtonBox::Ok);

        gridLayout->addWidget(buttonBox, 2, 1, 1, 1);

        dirButton = new QPushButton(layoutWidget);
        dirButton->setObjectName(QStringLiteral("dirButton"));

        gridLayout->addWidget(dirButton, 2, 0, 1, 1);


        retranslateUi(cameradialog);
        QObject::connect(buttonBox, SIGNAL(accepted()), cameradialog, SLOT(accept()));
        QObject::connect(buttonBox, SIGNAL(rejected()), cameradialog, SLOT(reject()));

        QMetaObject::connectSlotsByName(cameradialog);
    } // setupUi

    void retranslateUi(QDialog *cameradialog)
    {
        cameradialog->setWindowTitle(QApplication::translate("cameradialog", "Dialog", 0));
        label_5->setText(QApplication::translate("cameradialog", "Configuraci\303\263n de las C\303\241maras", 0));
        label->setText(QApplication::translate("cameradialog", "C\303\241mara de Entrada:", 0));
        label_2->setText(QApplication::translate("cameradialog", "C\303\241mara de Salida:", 0));
        dirButton->setText(QApplication::translate("cameradialog", "Carpeta de im\303\241genes", 0));
    } // retranslateUi

};

namespace Ui {
    class cameradialog: public Ui_cameradialog {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_CAMERADIALOG_H
