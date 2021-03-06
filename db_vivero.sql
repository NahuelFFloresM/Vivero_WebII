-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 11:56 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vivero`
--
CREATE DATABASE IF NOT EXISTS `db_vivero` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_vivero`;

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_categoria` varchar(600) NOT NULL,
  `nombre_categoria` varchar(200) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descripcion_categoria`, `nombre_categoria`) VALUES
(2, 'Son plantas de hojas carnosas agrupadas como si fueran los petalos de una rosa, la gama de colores va del marrón rojizo, pasando por los verde, violetas, rosados rojizos y grises\r\n\r\nEn su hábitat natural, crecen a gran altitud en afloramientos rocosos, el agua drena rápidamente, nunca permaneciendo estancada en las raíces.\r\n\r\nCuidados esenciales: \r\n* Usar un suelo bien poroso que permita un buen drenaje. \r\n* Abundante luz brillante para que no se estire y mejore el color, en exposiciones soleada', 'Echeverias'),
(3, 'Son plantas que tienen hermosas formas geométricas, arquitectónicas, verdaderas esculturas vegetales.\r\n\r\nSon fáciles de cultivar, necesitan poco mantenimiento, el suelo se debe dejar secar entre riegos, y al regar debe drenar rápidamente.\r\n\r\nEl sol intensifica sus colores.\r\n\r\nHay gran variedad de formas, patrones, texturas, colores.\r\n\r\nSon ideales para decorar oficinas, ventanas, patios, balcones, dormitorios, cocinas, etc\r\n\r\nMuy fáciles de cuidar', 'Suculentas'),
(4, 'Son plantas que tienen gran cantidad de Flores acampanadas de tamaño mediano, muy rustica, florece continuamente en primavera, verano y otoño, resiste  heladas, y va bien a pleno sol.\r\n\r\nSiempre está en flor, resiste heladas y se recupera rápidamente después de lluvias fuerte.', 'Petunia Péndula Perenne '),
(5, 'Las mejores macetas y accesorios para que tus plantas se luzcan, crezcan y vivan felices. \r\nY como si fuera poco que se destaquen en la deco de tu hogar', 'Macetas y Accesorios'),
(6, 'Contamos con los sustratos ideales y especiales para cada tipo de planta. \r\nCada uno posee los requerimientos, nutrientes e ingredientes para que tus plantas crezcan sanas. ', 'Sustratos'),
(7, 'Todas las herramientas y accesorios para jardineriar las encontrás aca!', 'Herramientas'),
(8, 'Contamos con los mejores productos orgánicos para combatir insectos y plagas en tus plantas. \r\nLos beneficios de estos productos son que son inocuo para seres humanos y para tus mascota, ademas si te excedes en su uso no le haces mal a tu planta.', 'Órganicos');

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(450) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_producto` (`id_producto`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `comentario`, `puntuacion`, `id_producto`, `id_usuario`) VALUES
(1, 'asdasd', 1, 3, 2),
(2, 'Nuevo comment', 4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(150) NOT NULL,
  `precio_producto` float NOT NULL,
  `stock_producto` int(10) NOT NULL,
  `description_producto` varchar(600) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `destacado_producto` tinyint(1) NOT NULL,
  `imagen_url` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `precio_producto`, `stock_producto`, `description_producto`, `id_categoria`, `destacado_producto`, `imagen_url`) VALUES
(3, 'Echeveria Shaviana', 455, 250, 'Es una planta de roseta grande con hojas terminadas en punta, las hojas son delicadamente rizadas. La roseta tiene un color gris mas claro en su centro y los bordes de las hojas mas viejas tienen un borde purpura.', 2, 1, NULL),
(4, 'Echeveria Black Prince ', 450, 200, 'Es una planta con llamativa roseta, compacta, brillante color chocolate oscuro casi llegando a negro, y con bellos racimos de flores salmón rojizos en otoño.\r\nSu llamativo follaje agrega contraste al jardín de suculentas y rocallas.\r\nEs más intenso el color en condiciones frescas y secas, por en en ', 2, 1, NULL),
(5, 'Echeveria Lilacina', 400, 250, 'Es una planta de roseta mediana, con hojas con delicados y tintes marmolados, rosado violáceos y un inmaculado fondo gris.', 2, 0, NULL),
(6, 'Crassula Perforata ', 400, 150, 'Es una bellísima planta de estructura geométrica, hojas color verde plateado con ribeteado rojo, las hojas crecen en forma alterna de dos en dos, parecen perforadas por el tallo.', 3, 1, NULL),
(7, 'Sedum Burrito', 200, 250, 'Es una planta colgante, con tallos largos densamente cubiertos de hojas gruesas, redondeadas y carnosas de color verde-azulado.', 3, 1, NULL),
(8, 'Maceta TERRA Panal', 700, 50, 'Esta maceta es una de las mejores opciones para cualquiera de tus plantas. Un clásico intervenido con diseños en blanco o negro que resisten el paso del tiempo, el regado y el clima, podes usarlas en interior o exterior. \r\n* Diseño Panal', 5, 1, NULL),
(9, 'Maceta TERRA Origami', 700, 75, 'Esta maceta es una de las mejores opciones para cualquiera de tus plantas. Un clásico intervenido con diseños en blanco o negro que resisten el paso del tiempo, el regado y el clima, podes usarlas en interior o exterior. \r\n* Diseño Origami', 5, 1, NULL),
(10, 'Maceta TERRA Zig Zag', 700, 30, 'Esta maceta es una de las mejores opciones para cualquiera de tus plantas. Un clásico intervenido con diseños en blanco o negro que resisten el paso del tiempo, el regado y el clima, podes usarlas en interior o exterior. \r\n* Diseño Zig Zag', 5, 1, NULL),
(11, 'Maceta Esfera', 950, 50, 'Es una maceta de cerámica de autoras para tus plantas. Sus tamaños hacen que sean usualmente elegidas para tener sobre el escritorio con plantas pequeñas.', 5, 1, NULL),
(12, 'Macetero de Colores', 3000, 180, 'Estos maceteros son ideales para decorar rincones y jugar con las distintas alturas. Combinalos con otras macetas de distintos diámetros y tamaños. Elegí el color que mas vaya con vos, o tu espacio.Están hechos a mano, son de hierro, y tanto el pie como la maceta están pintados a horno con pintura epoxi micro texturada mate. La maceta posee drenaje.', 5, 1, NULL),
(13, 'Sustrato para Cactus y Suculentas', 350, 60, 'Sus componenentes y estructura brindan especiales condiciones a las plantas sensibles a la humedad. La arcilla aporta oligoelementos, acumulando agua y nutrientes. La arena de cuarzo pura, optimiza la evacuación del excedente de riego.\r\n* Presentación 5 lts.', 6, 0, NULL),
(14, 'Sustrato para Plantas de interiores', 380, 120, 'Este sustrato aumenta la retención de nutrientes.Evita cambios en el pH. Favorece la aireación y respiración de las raíces. Evita la compactación favoreciendo el desarrollo de raíces. Evita cambios bruscos de temperatura.* Presentación 10 lts.', 6, 0, NULL),
(15, 'Kit Palita - Rastrillo - Saca yuyo', 480, 200, 'La pala de punta te va a ayudar a hacer el pozo necesario para tu nueva planta, el rastrillo a remover la tierra de tu cantero, el ala ancha a agrandar el hueco. Son indestructible, e ideal para jardinear sin parar. Lo bueno de su mango de madera es que si te olvidas alguno de ellos al sol cuando te colgaste tomando mate, no te vas a quemar a la hora de volver a usarlo.', 7, 0, NULL),
(16, 'Rociador', 550, 25, 'La mayoría de las plantas que viven en interiores, son plantas selváticas, que necesitan tener humedad foliar.\r\nPara ayudarte con esta tarea este rociador no puede faltar en la casa de cualquier amante de las plantas.\r\n\r\nBuscamos reducir el uso del plástico al máximo, por eso el contenedor es de vidrio.\r\n\r\nCapacidad 1 Litro', 7, 0, NULL),
(17, 'Tierra diatomeas', 700, 100, 'Si tu planta vive de plaga en plaga y tiene las defensas bajas: la solución es TIERRA DIATOMEA.\r\n\r\nSe utiliza como fertilizante y como insecticida, ninguna plaga puede con ella. Lo más importante es inocua para animales domésticos y para las personas.\r\n\r\nInsecticida Ecológico / Fertilizante\r\n\r\nPresentación: 500/gr ', 8, 1, NULL),
(20, 'Maceta ovalada', 450, 200, 'Esta maceta es una de las mejores opciones para cualquiera de tus plantas. Un clásico intervenido con diseños en blanco o negro que resisten el paso del tiempo, el regado y el clima, podes usarlas en interior o exterior. ', 5, 0, NULL),
(21, 'a', 1, 1, 'de algo', 3, 0, 'images/5fc69b9ec2e8f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(150) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `contrasenia_usuario` varchar(150) NOT NULL,
  `permisos` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `email_usuario`, `contrasenia_usuario`, `permisos`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$12$PrWS5xwbuGyG6n7IUl5tQevfaw5K1FmhF.XrhKKyWlrlH9CEe42IS', 1),
(2, 'user', 'user@user.com', '$2y$12$Iib59f8eVm1B9D/4WDtYnutnACIoBB51l/cnjNM5yX6H..wM3g6IS', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
