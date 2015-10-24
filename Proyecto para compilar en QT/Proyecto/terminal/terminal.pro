greaterThan(QT_MAJOR_VERSION, 4) {
    QT       += widgets serialport sql multimedia multimediawidgets
} else {
    include($$QTSERIALPORT_PROJECT_ROOT/src/serialport/qt4support/serialport.prf)
}

TARGET = CALICA
TEMPLATE = app

SOURCES += \
    main.cpp \
    mainwindow.cpp \
    settingsdialog.cpp \
    console.cpp \
    databasedialog.cpp \
    cameradialog.cpp

HEADERS += \
    mainwindow.h \
    settingsdialog.h \
    console.h \
    databasedialog.h \
    cameradialog.h

FORMS += \
    mainwindow.ui \
    settingsdialog.ui \
    databasedialog.ui \
    cameradialog.ui

RESOURCES += \
    terminal.qrc
