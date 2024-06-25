-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/06/2024 às 22:36
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `desenvolvedora` varchar(50) DEFAULT NULL,
  `genero` varchar(20) DEFAULT NULL,
  `finalizado` varchar(20) DEFAULT NULL,
  `plataforma` varchar(50) DEFAULT NULL,
  `data_lancamento` date DEFAULT NULL,
  `tempo` int(11) DEFAULT NULL,
  `descricao` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `jogos`
--

INSERT INTO `jogos` (`id`, `nome`, `desenvolvedora`, `genero`, `finalizado`, `plataforma`, `data_lancamento`, `tempo`, `descricao`) VALUES
(3, 'Cuphead', 'Studio MDHR', 'acao-e-aventura', 'Sim', 'Playstation, Xbox, PC, Nintendo', '2017-09-29', 30, 'Jogo de plataforma com temática retro, muito divertido e desafiador.'),
(7, 'Elden Ring', 'From Software', 'acao-e-aventura', 'Sim', 'Playstation, Xbox, PC', '2022-02-25', 100, 'Jogo muito bom!'),
(8, 'Forza Horizon 5', 'Playground Games', 'corrida', 'Não', 'Xbox, PC', '2021-11-01', 60, 'Jogabilidade muito boa, variedade de carros grande, gráfico muito bonito.');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
