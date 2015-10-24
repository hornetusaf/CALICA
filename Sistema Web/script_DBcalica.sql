-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2015 at 03:51 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+04:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS calica /*!40100 DEFAULT CHARACTER SET utf8 */;
CREATE USER calica@localhost IDENTIFIED BY 'Dbcalica2013'; 
GRANT ALL PRIVILEGES ON calica.* To calica@localhost IDENTIFIED BY 'Dbcalica2013'; 
FLUSH PRIVILEGES;

--
-- Database: `calica`
--

USE calica;

-- --------------------------------------------------------

--
-- Table structure for table `carrera_departamento`
--

CREATE TABLE IF NOT EXISTS `carrera_departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nombre` varchar(255) NOT NULL COMMENT 'Carrera/Departamento',
  `descripcion` text COMMENT 'Descripcion',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `carrera_departamento`
--

INSERT INTO `carrera_departamento` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Arquitectura', ''),
(2, 'Ingenieri≠a Agroindustrial', ''),
(3, 'Ingenieria Agronomica', ''),
(4, 'Ingenieri≠a Ambiental', ''),
(5, 'Ingenieri≠a Civil', ''),
(6, 'Ingenieri≠a en Electronica', ''),
(7, 'Ingenieri≠a Industrial', ''),
(8, 'Ingenieri≠a en Informatica', ''),
(9, 'Ingenieri≠a Mecanica', ''),
(10, 'Ingenieri≠a en Produccion Animal', ''),
(11, 'Licenciatura en Musica', '');

-- --------------------------------------------------------

--
-- Table structure for table `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `fecha_inicio` char(10) DEFAULT NULL COMMENT 'Fecha de inicio',
  `fecha_fin` char(10) DEFAULT NULL COMMENT 'Fecha de culminaci√≥n',
  `hora_inicio` char(2) DEFAULT NULL COMMENT 'Hora de inicio',
  `hora_fin` char(2) DEFAULT NULL COMMENT 'Hora de culminaci√≥n',
  `lunes` tinyint(1) DEFAULT NULL COMMENT 'Lunes',
  `martes` tinyint(1) DEFAULT NULL COMMENT 'Martes',
  `miercoles` tinyint(1) DEFAULT NULL COMMENT 'Miercoles',
  `jueves` tinyint(1) DEFAULT NULL COMMENT 'Jueves',
  `viernes` tinyint(1) DEFAULT NULL COMMENT 'Viernes',
  `sabado` tinyint(1) DEFAULT NULL COMMENT 'Sabado',
  `domingo` tinyint(1) DEFAULT NULL COMMENT 'Domingo',
  `usuario_cedula` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_horario_usuario1_idx` (`usuario_cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `horario`
--

-- --------------------------------------------------------

--
-- Table structure for table `parametros`
--

CREATE TABLE IF NOT EXISTS `parametros` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nombre` varchar(255) NOT NULL COMMENT 'Nombre del parametro',
  `texto` text COMMENT 'Valor de texto',
  `texto_largo` longtext COMMENT 'Valor de texto largo',
  `bool` tinyint(1) DEFAULT NULL COMMENT 'Valor booleano',
  `fecha` date DEFAULT NULL COMMENT 'Valor de fecha',
  `hora` time DEFAULT NULL COMMENT 'Valor de hora',
  `entero` int(11) DEFAULT NULL COMMENT 'Valor numerico entero',
  `decimal` decimal(10,0) DEFAULT NULL COMMENT 'Valor numerico decimal',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `registro_entrada`
--

CREATE TABLE IF NOT EXISTS `registro_entrada` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `fecha` char(10) NOT NULL COMMENT 'Fecha',
  `hora` char(8) NOT NULL COMMENT 'Hora',
  `foto` varchar(255) DEFAULT NULL COMMENT 'Foto',
  `usuario_cedula` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_registro_entrada_usuario1_idx` (`usuario_cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `registro_entrada`
--

-- --------------------------------------------------------

--
-- Table structure for table `registro_salida`
--

CREATE TABLE IF NOT EXISTS `registro_salida` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `fecha` char(10) NOT NULL COMMENT 'Fecha',
  `hora` char(8) NOT NULL COMMENT 'Hora',
  `foto` varchar(255) DEFAULT NULL COMMENT 'Foto',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `registro_salida`
--

-- --------------------------------------------------------

--
-- Table structure for table `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nombre` varchar(255) NOT NULL COMMENT 'Tipo de usuario',
  `descripcion` text NOT NULL COMMENT 'Descripcion',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Admin', 'Administrador del control de acceso.'),
(2, 'Profesor', 'Profesor del laboratorio con acceso sin restricciones.'),
(3, 'Irrestricto', 'El usuario no posee restricciones de horario para acceder al laboratorio.'),
(4, 'Estudiante', 'Estudiante de la UNET');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cedula` int(11) NOT NULL COMMENT 'Cedula de identidad',
  `pin` char(6) NOT NULL COMMENT 'Pin de acceso',
  `nombres` varchar(255) NOT NULL COMMENT 'Nombres',
  `apellidos` varchar(255) NOT NULL COMMENT 'Apellidos',
  `email` varchar(255) NOT NULL COMMENT 'Correo electr√≥nico',
  `telefono` varchar(45) NOT NULL COMMENT 'Numero telefonico',
  `usuario` varchar(255) DEFAULT NULL COMMENT 'Usuario de administrador',
  `clave` varchar(255) DEFAULT NULL COMMENT 'Contrase√±a de administrador',
  `rfid` char(15) DEFAULT NULL COMMENT '# Tarjeta RFID',
  `tipo_usuario_id` int(11) NOT NULL COMMENT 'Tipo de usuario',
  `carrera_departamento_id` int(11) NOT NULL,
  PRIMARY KEY (`cedula`),
  UNIQUE KEY `pin_UNIQUE` (`pin`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  KEY `fk_usuario_tipo_usuario1_idx` (`tipo_usuario_id`),
  KEY `fk_usuario_carrera_departamento1_idx` (`carrera_departamento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`cedula`, `pin`, `nombres`, `apellidos`, `email`, `telefono`, `usuario`, `clave`, `rfid`, `tipo_usuario_id`, `carrera_departamento_id`) VALUES
(1, '1DB149', 'Admin', 'Admin', 'administrador', '00000000', 'admin', 'sa1aY64JOY94w', '', 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`usuario_cedula`) REFERENCES `usuario` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registro_entrada`
--
ALTER TABLE `registro_entrada`
  ADD CONSTRAINT `registro_entrada_ibfk_1` FOREIGN KEY (`usuario_cedula`) REFERENCES `usuario` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`carrera_departamento_id`) REFERENCES `carrera_departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
