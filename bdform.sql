-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Mar-2022 às 10:34
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
-- Estrutura da tabela `useradmin`
--

CREATE TABLE `useradmin` (
  `nome` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `useradmin`
--

INSERT INTO `useradmin` (`nome`, `email`, `senha`, `id`) VALUES
('t', 'leorogelio1202@gmail.com', '202cb962ac59075b964b07152d234b70', 1);

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
('testando', '(12) 9978-4949', 'teste@teste', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 123, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 4),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 5),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 6),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 7),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 8),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 9),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 10),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 11),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 12),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 13),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 14),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 15),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 16),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 17),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 18),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 19),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 20),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 21),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 22),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 23),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 24),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 25),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 26),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 27),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 28),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 29),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 30),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 31),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 32),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 33),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 34),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 35),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 36),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 37),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 38),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 39),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 40),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 41),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 42),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 43),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 44),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 45),
('Leonardo Rogelio da Silva', '(12) 9978-4949', 'leorogelio1202@gmail.com', 13484, 'Avenida Dona AntÃ´nia Valverde Cruanes', 169, 'Jardim Nova ItÃ¡lia', 'Limeira', 'SP', 46);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
