/********************************************************************************
** Form generated from reading UI file 'mainwindow.ui'
**
** Created by: Qt User Interface Compiler version 5.3.2
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_MAINWINDOW_H
#define UI_MAINWINDOW_H

#include <QtCore/QVariant>
#include <QtWidgets/QAction>
#include <QtWidgets/QApplication>
#include <QtWidgets/QButtonGroup>
#include <QtWidgets/QHeaderView>
#include <QtWidgets/QMainWindow>
#include <QtWidgets/QMenu>
#include <QtWidgets/QMenuBar>
#include <QtWidgets/QStatusBar>
#include <QtWidgets/QToolBar>
#include <QtWidgets/QWidget>
#include "qcameraviewfinder.h"

QT_BEGIN_NAMESPACE

class Ui_MainWindow
{
public:
    QAction *actionAbout;
    QAction *actionAboutQt;
    QAction *actionConnect;
    QAction *actionDisconnect;
    QAction *actionConfigure;
    QAction *actionClear;
    QAction *actionQuit;
    QAction *actionBase_de_datos;
    QAction *actionCamaras;
    QWidget *centralWidget;
    QCameraViewfinder *viewfinder;
    QCameraViewfinder *viewfinder_2;
    QMenuBar *menuBar;
    QMenu *menuCalls;
    QMenu *menuTools;
    QMenu *menuHelp;
    QToolBar *mainToolBar;
    QStatusBar *statusBar;

    void setupUi(QMainWindow *MainWindow)
    {
        if (MainWindow->objectName().isEmpty())
            MainWindow->setObjectName(QStringLiteral("MainWindow"));
        MainWindow->resize(542, 400);
        MainWindow->setMinimumSize(QSize(542, 400));
        MainWindow->setMaximumSize(QSize(542, 400));
        actionAbout = new QAction(MainWindow);
        actionAbout->setObjectName(QStringLiteral("actionAbout"));
        actionAboutQt = new QAction(MainWindow);
        actionAboutQt->setObjectName(QStringLiteral("actionAboutQt"));
        actionConnect = new QAction(MainWindow);
        actionConnect->setObjectName(QStringLiteral("actionConnect"));
        QIcon icon;
        icon.addFile(QStringLiteral(":/images/connect.png"), QSize(), QIcon::Normal, QIcon::Off);
        actionConnect->setIcon(icon);
        actionDisconnect = new QAction(MainWindow);
        actionDisconnect->setObjectName(QStringLiteral("actionDisconnect"));
        QIcon icon1;
        icon1.addFile(QStringLiteral(":/images/disconnect.png"), QSize(), QIcon::Normal, QIcon::Off);
        actionDisconnect->setIcon(icon1);
        actionConfigure = new QAction(MainWindow);
        actionConfigure->setObjectName(QStringLiteral("actionConfigure"));
        QIcon icon2;
        icon2.addFile(QStringLiteral(":/images/settings.png"), QSize(), QIcon::Normal, QIcon::Off);
        actionConfigure->setIcon(icon2);
        actionClear = new QAction(MainWindow);
        actionClear->setObjectName(QStringLiteral("actionClear"));
        QIcon icon3;
        icon3.addFile(QStringLiteral(":/images/clear.png"), QSize(), QIcon::Normal, QIcon::Off);
        actionClear->setIcon(icon3);
        actionQuit = new QAction(MainWindow);
        actionQuit->setObjectName(QStringLiteral("actionQuit"));
        QIcon icon4;
        icon4.addFile(QStringLiteral(":/images/application-exit.png"), QSize(), QIcon::Normal, QIcon::Off);
        actionQuit->setIcon(icon4);
        actionBase_de_datos = new QAction(MainWindow);
        actionBase_de_datos->setObjectName(QStringLiteral("actionBase_de_datos"));
        actionBase_de_datos->setIcon(icon2);
        actionCamaras = new QAction(MainWindow);
        actionCamaras->setObjectName(QStringLiteral("actionCamaras"));
        actionCamaras->setIcon(icon2);
        centralWidget = new QWidget(MainWindow);
        centralWidget->setObjectName(QStringLiteral("centralWidget"));
        viewfinder = new QCameraViewfinder(centralWidget);
        viewfinder->setObjectName(QStringLiteral("viewfinder"));
        viewfinder->setGeometry(QRect(10, 50, 251, 211));
        viewfinder_2 = new QCameraViewfinder(centralWidget);
        viewfinder_2->setObjectName(QStringLiteral("viewfinder_2"));
        viewfinder_2->setGeometry(QRect(280, 50, 251, 211));
        MainWindow->setCentralWidget(centralWidget);
        menuBar = new QMenuBar(MainWindow);
        menuBar->setObjectName(QStringLiteral("menuBar"));
        menuBar->setGeometry(QRect(0, 0, 542, 20));
        menuCalls = new QMenu(menuBar);
        menuCalls->setObjectName(QStringLiteral("menuCalls"));
        menuTools = new QMenu(menuBar);
        menuTools->setObjectName(QStringLiteral("menuTools"));
        menuHelp = new QMenu(menuBar);
        menuHelp->setObjectName(QStringLiteral("menuHelp"));
        MainWindow->setMenuBar(menuBar);
        mainToolBar = new QToolBar(MainWindow);
        mainToolBar->setObjectName(QStringLiteral("mainToolBar"));
        MainWindow->addToolBar(Qt::TopToolBarArea, mainToolBar);
        statusBar = new QStatusBar(MainWindow);
        statusBar->setObjectName(QStringLiteral("statusBar"));
        MainWindow->setStatusBar(statusBar);

        menuBar->addAction(menuCalls->menuAction());
        menuBar->addAction(menuTools->menuAction());
        menuBar->addAction(menuHelp->menuAction());
        menuCalls->addAction(actionConnect);
        menuCalls->addAction(actionDisconnect);
        menuCalls->addSeparator();
        menuCalls->addAction(actionQuit);
        menuTools->addAction(actionConfigure);
        menuTools->addAction(actionBase_de_datos);
        menuTools->addAction(actionCamaras);
        menuHelp->addAction(actionAbout);
        mainToolBar->addAction(actionConnect);
        mainToolBar->addAction(actionDisconnect);

        retranslateUi(MainWindow);

        QMetaObject::connectSlotsByName(MainWindow);
    } // setupUi

    void retranslateUi(QMainWindow *MainWindow)
    {
        MainWindow->setWindowTitle(QApplication::translate("MainWindow", "CALICA", 0));
        actionAbout->setText(QApplication::translate("MainWindow", "&Acerca de", 0));
#ifndef QT_NO_TOOLTIP
        actionAbout->setToolTip(QApplication::translate("MainWindow", "Acerca del programa", 0));
#endif // QT_NO_TOOLTIP
        actionAbout->setShortcut(QApplication::translate("MainWindow", "Alt+A", 0));
        actionAboutQt->setText(QApplication::translate("MainWindow", "About Qt", 0));
        actionConnect->setText(QApplication::translate("MainWindow", "C&onectar", 0));
#ifndef QT_NO_TOOLTIP
        actionConnect->setToolTip(QApplication::translate("MainWindow", "Connectar a puerto serial", 0));
#endif // QT_NO_TOOLTIP
        actionConnect->setShortcut(QApplication::translate("MainWindow", "Ctrl+O", 0));
        actionDisconnect->setText(QApplication::translate("MainWindow", "&Desconectar", 0));
#ifndef QT_NO_TOOLTIP
        actionDisconnect->setToolTip(QApplication::translate("MainWindow", "Desconectar del puerto serial", 0));
#endif // QT_NO_TOOLTIP
        actionDisconnect->setShortcut(QApplication::translate("MainWindow", "Ctrl+D", 0));
        actionConfigure->setText(QApplication::translate("MainWindow", "&Puertos", 0));
#ifndef QT_NO_TOOLTIP
        actionConfigure->setToolTip(QApplication::translate("MainWindow", "Configurar puerto serial", 0));
#endif // QT_NO_TOOLTIP
        actionConfigure->setShortcut(QApplication::translate("MainWindow", "Alt+C", 0));
        actionClear->setText(QApplication::translate("MainWindow", "&Limpiar", 0));
#ifndef QT_NO_TOOLTIP
        actionClear->setToolTip(QApplication::translate("MainWindow", "Limpiar datos", 0));
#endif // QT_NO_TOOLTIP
        actionClear->setShortcut(QApplication::translate("MainWindow", "Alt+L", 0));
        actionQuit->setText(QApplication::translate("MainWindow", "&Salir", 0));
        actionQuit->setShortcut(QApplication::translate("MainWindow", "Ctrl+Q", 0));
        actionBase_de_datos->setText(QApplication::translate("MainWindow", "&Base de datos", 0));
        actionBase_de_datos->setShortcut(QApplication::translate("MainWindow", "Ctrl+B", 0));
        actionCamaras->setText(QApplication::translate("MainWindow", "&Camaras", 0));
        menuCalls->setTitle(QApplication::translate("MainWindow", "Conexion", 0));
        menuTools->setTitle(QApplication::translate("MainWindow", "Herramientas", 0));
        menuHelp->setTitle(QApplication::translate("MainWindow", "Ayuda", 0));
    } // retranslateUi

};

namespace Ui {
    class MainWindow: public Ui_MainWindow {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_MAINWINDOW_H
