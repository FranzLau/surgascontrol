-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2018 at 03:16 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surgasventas`
--

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(100) NOT NULL,
  `nom_cargo` varchar(50) NOT NULL,
  `desc_cargo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nom_cargo`, `desc_cargo`) VALUES
(1, 'Gerente', 'Jefe directo de la empresa'),
(2, 'Chofer', 'Repartidor de Gas');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(100) NOT NULL,
  `nom_categoria` varchar(50) NOT NULL,
  `desc_categoria` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nom_categoria`, `desc_categoria`) VALUES
(1, 'Gas', 'Gas natural de cocina'),
(2, 'Software', 'programas para PC'),
(3, 'Hadware', 'aparatos electornicos de informatica');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(100) NOT NULL,
  `nom_cliente` varchar(20) NOT NULL,
  `ape_cliente` varchar(40) DEFAULT NULL,
  `sexo_cliente` varchar(1) DEFAULT NULL,
  `fechnac_cliente` date NOT NULL,
  `tipodoc_cliente` varchar(20) NOT NULL,
  `numdoc_cliente` varchar(11) NOT NULL,
  `dir_cliente` varchar(100) DEFAULT NULL,
  `telf_cliente` varchar(10) DEFAULT NULL,
  `email_cliente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nom_cliente`, `ape_cliente`, `sexo_cliente`, `fechnac_cliente`, `tipodoc_cliente`, `numdoc_cliente`, `dir_cliente`, `telf_cliente`, `email_cliente`) VALUES
(2, 'Chifa Chaang', 'Lee Fu', 'N', '0000-00-00', 'RUC', '21315433', 'av bolognesi 88 - B', '124578', 'chifax@gmail.com'),
(3, 'Plaza Vea', '', 'N', '0000-00-00', 'RUC', '12345678', 'Av cuzco Gregorio albarracin', '132564', 'vea12@gmail.com'),
(5, 'Polleria Chave', '', 'N', '0000-00-00', 'RUC', '31546456', 'av leguia 160 - B', '052962451', '');

-- --------------------------------------------------------

--
-- Table structure for table `detalleingreso`
--

CREATE TABLE `detalleingreso` (
  `id_detalleingreso` int(100) NOT NULL,
  `precio_compra` decimal(60,2) NOT NULL,
  `precio_venta` decimal(60,2) NOT NULL,
  `stock_llenoinicial` int(100) NOT NULL,
  `stock_vacioinicial` int(100) DEFAULT NULL,
  `fecha_in` date NOT NULL,
  `id_producto` int(100) NOT NULL,
  `id_emp` int(100) NOT NULL,
  `id_proveedor` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalleingreso`
--

INSERT INTO `detalleingreso` (`id_detalleingreso`, `precio_compra`, `precio_venta`, `stock_llenoinicial`, `stock_vacioinicial`, `fecha_in`, `id_producto`, `id_emp`, `id_proveedor`) VALUES
(1, '34.00', '37.50', 10, NULL, '2018-08-04', 1, 1, 4),
(2, '34.00', '37.50', 10, NULL, '2018-08-04', 1, 1, 2),
(3, '34.00', '37.50', 10, NULL, '2018-08-04', 1, 1, 4),
(4, '34.00', '37.50', 10, NULL, '2018-08-04', 1, 1, 2),
(5, '30.00', '30.00', 2, NULL, '2018-08-06', 4, 1, 2),
(6, '30.00', '30.00', 3, NULL, '2018-08-07', 4, 1, 2),
(7, '30.00', '30.00', 1, NULL, '2018-08-07', 4, 1, 2),
(8, '34.00', '100.00', 1, NULL, '2018-08-07', 5, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detallerepartidor`
--

CREATE TABLE `detallerepartidor` (
  `id_detallerepartidor` int(100) NOT NULL,
  `llega_lleno` int(100) NOT NULL,
  `llega_vacio` int(100) NOT NULL,
  `fierro_prestado` int(100) NOT NULL,
  `fierro_vendido` int(100) NOT NULL,
  `id_repartidor` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detallerepartidor`
--

INSERT INTO `detallerepartidor` (`id_detallerepartidor`, `llega_lleno`, `llega_vacio`, `fierro_prestado`, `fierro_vendido`, `id_repartidor`) VALUES
(1, 12, 8, 0, 0, 1),
(2, 10, 10, 0, 0, 2),
(3, 2, 18, 0, 0, 2),
(4, 5, 14, 0, 1, 2),
(5, 8, 12, 0, 0, 3),
(6, 10, 10, 0, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `detalleventa`
--

CREATE TABLE `detalleventa` (
  `id_detalleventa` int(100) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `precio_venta` decimal(60,2) NOT NULL,
  `fecha_venta` date NOT NULL,
  `tipo_venta` varchar(100) NOT NULL,
  `id_emp` int(100) NOT NULL,
  `id_cliente` int(100) NOT NULL,
  `id_producto` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalleventa`
--

INSERT INTO `detalleventa` (`id_detalleventa`, `cantidad`, `precio_venta`, `fecha_venta`, `tipo_venta`, `id_emp`, `id_cliente`, `id_producto`) VALUES
(1, 1, '34.00', '2018-08-10', 'G', 1, 5, 1),
(1, 1, '30.00', '2018-08-10', 'G', 1, 5, 4),
(1, 1, '250.00', '2018-08-10', 'E', 1, 5, 5),
(2, 2, '30.00', '2018-08-10', 'G', 1, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

CREATE TABLE `empleado` (
  `id_emp` int(100) NOT NULL,
  `nom_emp` varchar(20) NOT NULL,
  `ape_emp` varchar(40) NOT NULL,
  `sexo_emp` varchar(1) NOT NULL,
  `fechnac_emp` date NOT NULL,
  `numdoc_emp` varchar(8) NOT NULL,
  `dir_emp` varchar(100) DEFAULT NULL,
  `telf_emp` varchar(10) DEFAULT NULL,
  `email_emp` varchar(50) DEFAULT NULL,
  `acceso_emp` varchar(20) NOT NULL,
  `password_emp` varchar(20) NOT NULL,
  `id_cargo` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empleado`
--

INSERT INTO `empleado` (`id_emp`, `nom_emp`, `ape_emp`, `sexo_emp`, `fechnac_emp`, `numdoc_emp`, `dir_emp`, `telf_emp`, `email_emp`, `acceso_emp`, `password_emp`, `id_cargo`) VALUES
(1, 'Franz Lau', 'Cruz Ucharico', 'M', '1992-12-09', '70209626', 'Jose Olaya 377 - A', '962248668', 'cruz_a11@hotmail.com', 'Administrador', 'admin', 1),
(2, 'William Rufino', 'Ramos Mendoza', 'M', '1992-02-02', '70506323', 'mercado santa rosa', '956784512', 'willy@gmail.com', 'Ninguno', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gasto`
--

CREATE TABLE `gasto` (
  `id_gasto` int(100) NOT NULL,
  `precio_gasto` decimal(60,2) NOT NULL,
  `desc_gasto` varchar(256) NOT NULL,
  `fecha_gasto` date NOT NULL,
  `id_emp` int(100) NOT NULL,
  `id_tipogasto` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `liquidar`
--

CREATE TABLE `liquidar` (
  `id_liquidar` int(100) NOT NULL,
  `fecha_li` date NOT NULL,
  `cantidad_li` int(100) NOT NULL,
  `tipo_balon` varchar(100) NOT NULL,
  `precio_li` decimal(60,2) NOT NULL,
  `descuento_li` decimal(60,2) NOT NULL,
  `gasto_li` decimal(60,2) NOT NULL,
  `id_emp` int(100) NOT NULL,
  `id_repartidor` int(100) NOT NULL,
  `id_producto` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `liquidar`
--

INSERT INTO `liquidar` (`id_liquidar`, `fecha_li`, `cantidad_li`, `tipo_balon`, `precio_li`, `descuento_li`, `gasto_li`, `id_emp`, `id_repartidor`, `id_producto`) VALUES
(1, '2018-08-11', 1, 'G', '100.00', '0.00', '0.00', 1, 3, 5),
(1, '2018-08-11', 1, 'G', '30.00', '0.00', '0.00', 1, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `presentacion`
--

CREATE TABLE `presentacion` (
  `id_presentacion` int(100) NOT NULL,
  `nom_presentacion` varchar(50) NOT NULL,
  `desc_presentacion` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `presentacion`
--

INSERT INTO `presentacion` (`id_presentacion`, `nom_presentacion`, `desc_presentacion`) VALUES
(1, 'Kg.', 'Kilogramos'),
(2, 'Lt.', 'Litros');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(100) NOT NULL,
  `nom_producto` varchar(50) NOT NULL,
  `desc_producto` varchar(1024) DEFAULT NULL,
  `stock_llenos` int(100) NOT NULL,
  `stock_vacios` int(100) NOT NULL,
  `precio_zonal` decimal(60,2) NOT NULL,
  `precio_domicilio` decimal(60,2) NOT NULL,
  `precio_fierro` decimal(60,2) NOT NULL,
  `tipo_producto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id_producto`, `nom_producto`, `desc_producto`, `stock_llenos`, `stock_vacios`, `precio_zonal`, `precio_domicilio`, `precio_fierro`, `tipo_producto`) VALUES
(1, 'Balon x 5 kg.', 'Gas natural', 19, 1, '34.00', '37.50', '50.00', 'Balon'),
(2, 'Balon x 10 kg', 'Envase de 10 kg', 0, 1, '34.00', '37.50', '75.00', 'Balon'),
(3, 'Balon x 15 kg', 'Envase de 15 kg', 0, 0, '43.00', '47.50', '85.00', 'Balon'),
(4, 'Regulador Premiun', 'Valvula para balon de gas premiun', 48, 1, '30.00', '30.00', '0.00', 'No Balon'),
(5, 'Balon x 45 kg.', 'envase de 45 kilogramos', 101, 38, '39.00', '100.00', '250.00', 'Balon');

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(100) NOT NULL,
  `razon_social` varchar(150) NOT NULL,
  `sector_comercial` varchar(50) NOT NULL,
  `tipodoc_proveedor` varchar(20) NOT NULL,
  `numdoc_proveedor` varchar(11) NOT NULL,
  `dir_proveedor` varchar(100) DEFAULT NULL,
  `telf_proveedor` varchar(50) DEFAULT NULL,
  `email_proveedor` varchar(50) DEFAULT NULL,
  `url_proveedor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `razon_social`, `sector_comercial`, `tipodoc_proveedor`, `numdoc_proveedor`, `dir_proveedor`, `telf_proveedor`, `email_proveedor`, `url_proveedor`) VALUES
(2, 'Planta Tacna', 'Grifo', 'RUC', '3216545', 'Av leguia basadre', '32154', '', ''),
(4, 'Grifo Halkon', 'Grifo', 'RUC', '32156464', 'Av jorge basadre 6589', '952784521', 'abc@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `repartidor`
--

CREATE TABLE `repartidor` (
  `id_repartidor` int(100) NOT NULL,
  `placa_re` varchar(50) NOT NULL,
  `zona_re` varchar(50) NOT NULL,
  `fecha_re` date NOT NULL,
  `cantidad_re` int(100) NOT NULL,
  `id_emp` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repartidor`
--

INSERT INTO `repartidor` (`id_repartidor`, `placa_re`, `zona_re`, `fecha_re`, `cantidad_re`, `id_emp`) VALUES
(1, 'xxx', 'Ciudad Nueva', '2018-08-07', 20, 1),
(2, 'ABC', 'Bolognesi', '2018-08-10', 20, 1),
(3, 'AV-15', 'Cono sur', '2018-08-11', 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tipogasto`
--

CREATE TABLE `tipogasto` (
  `id_tipogasto` int(100) NOT NULL,
  `nom_tipogasto` varchar(50) NOT NULL,
  `desc_tipogasto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipogasto`
--

INSERT INTO `tipogasto` (`id_tipogasto`, `nom_tipogasto`, `desc_tipogasto`) VALUES
(1, 'Alimentos', 'Productos para el consumo'),
(2, 'Oficina', 'Articulos de Escritorio'),
(3, 'Movilidad', 'Taxis , Buses Pasajes'),
(4, 'Combustible', 'Recarga de combustible para repartidor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `detalleingreso`
--
ALTER TABLE `detalleingreso`
  ADD PRIMARY KEY (`id_detalleingreso`);

--
-- Indexes for table `detallerepartidor`
--
ALTER TABLE `detallerepartidor`
  ADD PRIMARY KEY (`id_detallerepartidor`);

--
-- Indexes for table `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_emp`);

--
-- Indexes for table `gasto`
--
ALTER TABLE `gasto`
  ADD PRIMARY KEY (`id_gasto`);

--
-- Indexes for table `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`id_presentacion`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indexes for table `repartidor`
--
ALTER TABLE `repartidor`
  ADD PRIMARY KEY (`id_repartidor`);

--
-- Indexes for table `tipogasto`
--
ALTER TABLE `tipogasto`
  ADD PRIMARY KEY (`id_tipogasto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `detalleingreso`
--
ALTER TABLE `detalleingreso`
  MODIFY `id_detalleingreso` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `detallerepartidor`
--
ALTER TABLE `detallerepartidor`
  MODIFY `id_detallerepartidor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_emp` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gasto`
--
ALTER TABLE `gasto`
  MODIFY `id_gasto` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `id_presentacion` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `repartidor`
--
ALTER TABLE `repartidor`
  MODIFY `id_repartidor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipogasto`
--
ALTER TABLE `tipogasto`
  MODIFY `id_tipogasto` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
