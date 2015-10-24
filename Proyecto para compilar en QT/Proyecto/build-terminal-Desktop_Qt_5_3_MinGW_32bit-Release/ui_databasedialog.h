/********************************************************************************
** Form generated from reading UI file 'databasedialog.ui'
**
** Created by: Qt User Interface Compiler version 5.3.2
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_DATABASEDIALOG_H
#define UI_DATABASEDIALOG_H

#include <QtCore/QVariant>
#include <QtWidgets/QAction>
#include <QtWidgets/QApplication>
#include <QtWidgets/QButtonGroup>
#include <QtWidgets/QDialog>
#include <QtWidgets/QDialogButtonBox>
#include <QtWidgets/QFormLayout>
#include <QtWidgets/QHeaderView>
#include <QtWidgets/QLabel>
#include <QtWidgets/QLineEdit>
#include <QtWidgets/QWidget>

QT_BEGIN_NAMESPACE

class Ui_databasedialog
{
public:
    QDialogButtonBox *buttonBox;
    QLabel *label_5;
    QWidget *layoutWidget;
    QFormLayout *formLayout;
    QLabel *label;
    QLineEdit *conexLineEdit;
    QLabel *label_2;
    QLineEdit *dblineEdit;
    QLabel *label_3;
    QLineEdit *usuarioLineEdit;
    QLabel *label_4;
    QLineEdit *contraLineEdit;

    void setupUi(QDialog *databasedialog)
    {
        if (databasedialog->objectName().isEmpty())
            databasedialog->setObjectName(QStringLiteral("databasedialog"));
        databasedialog->resize(310, 193);
        databasedialog->setMinimumSize(QSize(310, 193));
        databasedialog->setMaximumSize(QSize(310, 193));
        buttonBox = new QDialogButtonBox(databasedialog);
        buttonBox->setObjectName(QStringLiteral("buttonBox"));
        buttonBox->setGeometry(QRect(80, 160, 221, 32));
        buttonBox->setOrientation(Qt::Horizontal);
        buttonBox->setStandardButtons(QDialogButtonBox::Cancel|QDialogButtonBox::Ok);
        buttonBox->setCenterButtons(false);
        label_5 = new QLabel(databasedialog);
        label_5->setObjectName(QStringLiteral("label_5"));
        label_5->setGeometry(QRect(10, 10, 381, 23));
        layoutWidget = new QWidget(databasedialog);
        layoutWidget->setObjectName(QStringLiteral("layoutWidget"));
        layoutWidget->setGeometry(QRect(10, 40, 291, 112));
        formLayout = new QFormLayout(layoutWidget);
        formLayout->setObjectName(QStringLiteral("formLayout"));
        formLayout->setContentsMargins(0, 0, 0, 0);
        label = new QLabel(layoutWidget);
        label->setObjectName(QStringLiteral("label"));

        formLayout->setWidget(0, QFormLayout::LabelRole, label);

        conexLineEdit = new QLineEdit(layoutWidget);
        conexLineEdit->setObjectName(QStringLiteral("conexLineEdit"));

        formLayout->setWidget(0, QFormLayout::FieldRole, conexLineEdit);

        label_2 = new QLabel(layoutWidget);
        label_2->setObjectName(QStringLiteral("label_2"));

        formLayout->setWidget(1, QFormLayout::LabelRole, label_2);

        dblineEdit = new QLineEdit(layoutWidget);
        dblineEdit->setObjectName(QStringLiteral("dblineEdit"));

        formLayout->setWidget(1, QFormLayout::FieldRole, dblineEdit);

        label_3 = new QLabel(layoutWidget);
        label_3->setObjectName(QStringLiteral("label_3"));

        formLayout->setWidget(2, QFormLayout::LabelRole, label_3);

        usuarioLineEdit = new QLineEdit(layoutWidget);
        usuarioLineEdit->setObjectName(QStringLiteral("usuarioLineEdit"));

        formLayout->setWidget(2, QFormLayout::FieldRole, usuarioLineEdit);

        label_4 = new QLabel(layoutWidget);
        label_4->setObjectName(QStringLiteral("label_4"));

        formLayout->setWidget(3, QFormLayout::LabelRole, label_4);

        contraLineEdit = new QLineEdit(layoutWidget);
        contraLineEdit->setObjectName(QStringLiteral("contraLineEdit"));
        contraLineEdit->setEchoMode(QLineEdit::Password);

        formLayout->setWidget(3, QFormLayout::FieldRole, contraLineEdit);


        retranslateUi(databasedialog);
        QObject::connect(buttonBox, SIGNAL(accepted()), databasedialog, SLOT(accept()));
        QObject::connect(buttonBox, SIGNAL(rejected()), databasedialog, SLOT(reject()));

        QMetaObject::connectSlotsByName(databasedialog);
    } // setupUi

    void retranslateUi(QDialog *databasedialog)
    {
        databasedialog->setWindowTitle(QApplication::translate("databasedialog", "Dialog", 0));
        label_5->setText(QApplication::translate("databasedialog", "Configuraci\303\263n de la Base de Datos.", 0));
        label->setText(QApplication::translate("databasedialog", "Conexi\303\263n:", 0));
        label_2->setText(QApplication::translate("databasedialog", "Base de Datos:", 0));
        label_3->setText(QApplication::translate("databasedialog", "Usuario:", 0));
        label_4->setText(QApplication::translate("databasedialog", "Contrase\303\261a:", 0));
    } // retranslateUi

};

namespace Ui {
    class databasedialog: public Ui_databasedialog {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_DATABASEDIALOG_H
