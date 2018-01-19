-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Jan-2018 às 15:29
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corrida_comp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_corrida`
--

CREATE TABLE `tb_corrida` (
  `id` int(11) NOT NULL,
  `valor_corr` double DEFAULT NULL,
  `id_motorista` int(11) DEFAULT NULL,
  `id_passageiro` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_motorista`
--

CREATE TABLE `tb_motorista` (
  `id_motorista` int(11) NOT NULL,
  `nm_motorista` varchar(50) DEFAULT NULL,
  `nasc_motorista` date DEFAULT NULL,
  `sx_motorista` enum('Masculino','Feminino') DEFAULT NULL,
  `cpf` decimal(12,0) DEFAULT NULL,
  `md_carro` varchar(255) DEFAULT NULL,
  `st_motorista` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_passsageiro`
--

CREATE TABLE `tb_passsageiro` (
  `id_passageiro` int(11) NOT NULL,
  `nm_passageiro` varchar(50) DEFAULT NULL,
  `nasc_passageiro` date DEFAULT NULL,
  `sx_passageiro` enum('Masculino','Feminino') DEFAULT NULL,
  `cpf` decimal(12,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_corrida`
--
ALTER TABLE `tb_corrida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_motorista` (`id_motorista`),
  ADD KEY `id_passageiro` (`id_passageiro`);

--
-- Indexes for table `tb_motorista`
--
ALTER TABLE `tb_motorista`
  ADD PRIMARY KEY (`id_motorista`);

--
-- Indexes for table `tb_passsageiro`
--
ALTER TABLE `tb_passsageiro`
  ADD PRIMARY KEY (`id_passageiro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_corrida`
--
ALTER TABLE `tb_corrida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_motorista`
--
ALTER TABLE `tb_motorista`
  MODIFY `id_motorista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tb_passsageiro`
--
ALTER TABLE `tb_passsageiro`
  MODIFY `id_passageiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
