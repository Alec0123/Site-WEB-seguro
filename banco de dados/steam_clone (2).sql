-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Maio-2023 às 01:47
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `steam_clone`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `biblioteca`
--

CREATE TABLE `biblioteca` (
  `id_bliblioteca` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_carrinho` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `preco` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocao`
--

CREATE TABLE `promocao` (
  `id_promo` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `promo` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `promocao`
--

INSERT INTO `promocao` (`id_promo`, `preco`, `promo`, `nome`, `descricao`) VALUES
(1, 299, 199, 'Elden Ring', 'RPG, Aventura'),
(2, 299, 199, 'Hogwarts Legacy', 'RPG, Aventura'),
(3, 299, 99, 'Cyberpunk 2077', 'RPG, Aventura'),
(4, 110, 70, 'Darkest Dungeon', 'Rogue Like, RPG em turnos'),
(5, 249, 179, 'Resident Evil 4', 'Ação, Terror'),
(6, 88, 48, 'Outlast 2', 'Terror'),
(7, 252, 0, 'Total War Warhammer II', 'Estratégia'),
(8, 109, 0, 'Boderlands 3', 'Ação'),
(9, 50, 0, 'Fallout 4', 'RPG, Aventura'),
(10, 119, 0, 'Assassins Creed Black Flag', 'Ação'),
(11, 260, 0, 'Total War Three Kingdoms', 'Estratégia'),
(12, 200, 0, 'Sekiro', 'Soulslike, Ação'),
(13, 160, 0, 'Grand Theft Auto V', 'Ação'),
(14, 80, 0, 'Dead By Daylight', 'Terror, Multiplayer'),
(15, 260, 0, 'Assassins Creed Odyssey', 'RPG, Ação'),
(16, 299, 0, 'Total War Warhammer III', 'Estratégia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(1000) NOT NULL,
  `id_biblioteca` int(11) DEFAULT NULL,
  `id_carrinho` int(11) DEFAULT NULL,
  `Codigo_email` varchar(500) NOT NULL,
  `Confirmacao_email` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `cpf`, `email`, `senha`, `id_biblioteca`, `id_carrinho`, `Codigo_email`, `Confirmacao_email`) VALUES
(40, 'Enzo Engel Ceron', '104.269.349-89', 'enzo.ceron@outlook.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', NULL, NULL, 'd1cd3702b531f6e0e72786325830b025', 1),
(42, 'ale', '132.866.809-66', 'aletkogut@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', NULL, NULL, 'b790c6f940b4446e16f52fa86df82c78', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD PRIMARY KEY (`id_bliblioteca`);

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_carrinho`);

--
-- Índices para tabela `promocao`
--
ALTER TABLE `promocao`
  ADD PRIMARY KEY (`id_promo`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `biblioteca`
--
ALTER TABLE `biblioteca`
  MODIFY `id_bliblioteca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `promocao`
--
ALTER TABLE `promocao`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
