-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Mar-2022 às 09:46
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdform`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `userdata`
--

CREATE TABLE `userdata` (
  `nome` text NOT NULL,
  `celular` text NOT NULL,
  `email` text NOT NULL,
  `cep` int(8) NOT NULL,
  `rua` text NOT NULL,
  `numero` int(6) NOT NULL,
  `bairro` text NOT NULL,
  `cidade` text NOT NULL,
  `uf` varchar(2) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `userdata`
--

INSERT INTO `userdata` (`nome`, `celular`, `email`, `cep`, `rua`, `numero`, `bairro`, `cidade`, `uf`, `id`) VALUES
('teste', 'teste', 'teste', 12, 'teste', 12, 'teste', 'teste', 'te', 1),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 3),
('testando', '(12) 9978-4949', 'teste@teste', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 123, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
