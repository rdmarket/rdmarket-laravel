-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: laradock_mysql_1
-- Tempo de geração: 28-Out-2020 às 00:28
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rdmarket`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `preco`
--

CREATE TABLE `preco` (
  `id_preco` bigint UNSIGNED NOT NULL,
  `id_produto` bigint UNSIGNED NOT NULL,
  `valor_aquisicao` double(5,2) NOT NULL,
  `valor_venda` double(5,2) NOT NULL,
  `p_desconto` int DEFAULT NULL,
  `status_desconto` enum('ativo','desativado') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt_inicio_desconto` date DEFAULT NULL,
  `dt_final_desconto` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `preco`
--

INSERT INTO `preco` (`id_preco`, `id_produto`, `valor_aquisicao`, `valor_venda`, `p_desconto`, `status_desconto`, `dt_inicio_desconto`, `dt_final_desconto`, `created_at`, `updated_at`) VALUES
(1, 1, 3.28, 4.90, 33, 'ativo', '2020-10-26', '2020-10-31', NULL, NULL),
(2, 2, 3.00, 4.49, NULL, 'desativado', NULL, NULL, NULL, NULL),
(3, 3, 3.00, 4.49, NULL, 'desativado', NULL, NULL, NULL, NULL),
(4, 4, 3.25, 4.79, NULL, 'desativado', NULL, NULL, NULL, NULL),
(5, 5, 3.25, 4.79, NULL, 'desativado', NULL, NULL, NULL, NULL),
(6, 6, 2.99, 4.29, NULL, 'desativado', NULL, NULL, NULL, NULL),
(7, 7, 5.19, 8.39, 35, 'ativo', '2020-10-23', '2020-10-31', NULL, NULL),
(8, 8, 1.79, 3.29, NULL, 'desativado', NULL, NULL, NULL, NULL),
(9, 9, 1.29, 2.74, NULL, 'desativado', NULL, NULL, NULL, NULL),
(10, 10, 1.59, 2.99, NULL, 'desativado', NULL, NULL, NULL, NULL),
(11, 11, 1.30, 2.50, NULL, 'desativado', NULL, NULL, NULL, NULL),
(12, 12, 3.20, 5.00, NULL, 'desativado', NULL, NULL, NULL, NULL),
(13, 13, 1.80, 3.00, NULL, 'desativado', NULL, NULL, NULL, NULL),
(14, 14, 4.50, 7.00, NULL, 'desativado', NULL, NULL, NULL, NULL),
(15, 15, 6.00, 10.00, 8, 'ativo', '2020-10-22', '2020-10-31', NULL, NULL),
(16, 16, 1.60, 3.50, NULL, 'desativado', NULL, NULL, NULL, NULL),
(17, 17, 2.30, 3.50, NULL, 'desativado', NULL, NULL, NULL, NULL),
(18, 18, 3.20, 7.20, NULL, 'desativado', NULL, NULL, NULL, NULL),
(19, 19, 4.25, 7.65, NULL, 'desativado', NULL, NULL, NULL, NULL),
(20, 20, 1.40, 3.00, NULL, 'desativado', NULL, NULL, NULL, NULL),
(21, 21, 1.56, 2.93, NULL, 'desativado', NULL, NULL, NULL, NULL),
(22, 22, 15.98, 30.78, 30, 'ativo', '2020-10-15', '2020-10-31', NULL, NULL),
(23, 23, 4.39, 7.19, NULL, 'desativado', NULL, NULL, NULL, NULL),
(24, 24, 4.89, 8.57, NULL, 'desativado', NULL, NULL, NULL, NULL),
(25, 25, 0.98, 2.85, NULL, 'desativado', NULL, NULL, NULL, NULL),
(26, 26, 7.56, 11.76, NULL, 'desativado', NULL, NULL, NULL, NULL),
(27, 27, 14.38, 27.97, 35, 'ativo', '2020-10-24', '2020-10-31', NULL, NULL),
(28, 28, 5.64, 9.12, NULL, 'desativado', NULL, NULL, NULL, NULL),
(29, 29, 1.80, 3.29, NULL, 'desativado', NULL, NULL, NULL, NULL),
(30, 30, 0.79, 1.97, NULL, 'desativado', NULL, NULL, NULL, NULL),
(31, 31, 3.45, 6.58, NULL, 'desativado', NULL, NULL, NULL, NULL),
(32, 32, 6.30, 10.07, NULL, 'desativado', NULL, NULL, NULL, NULL),
(33, 33, 2.48, 5.89, NULL, 'desativado', NULL, NULL, NULL, NULL),
(34, 34, 3.28, 6.59, NULL, 'desativado', NULL, NULL, NULL, NULL),
(35, 35, 2.89, 6.47, NULL, 'desativado', NULL, NULL, NULL, NULL),
(36, 36, 1.02, 2.63, NULL, 'desativado', NULL, NULL, NULL, NULL),
(37, 37, 10.48, 22.11, 10, 'ativo', '2020-10-25', '2020-10-31', NULL, NULL),
(38, 38, 10.48, 22.11, NULL, 'desativado', NULL, NULL, NULL, NULL),
(39, 39, 3.98, 6.92, NULL, 'desativado', NULL, NULL, NULL, NULL),
(40, 40, 6.30, 10.07, NULL, 'desativado', NULL, NULL, NULL, NULL),
(41, 41, 6.30, 9.98, 36, 'ativo', '2020-10-21', '2020-10-31', NULL, NULL),
(42, 42, 2.48, 5.89, NULL, 'desativado', NULL, NULL, NULL, NULL),
(43, 43, 7.03, 12.09, NULL, 'desativado', NULL, NULL, NULL, NULL),
(44, 44, 3.28, 6.59, NULL, 'desativado', NULL, NULL, NULL, NULL),
(45, 45, 1.05, 3.18, NULL, 'desativado', NULL, NULL, NULL, NULL),
(46, 46, 2.89, 6.47, NULL, 'desativado', NULL, NULL, NULL, NULL),
(47, 47, 4.36, 7.14, NULL, 'desativado', NULL, NULL, NULL, NULL),
(48, 48, 11.58, 16.49, NULL, 'desativado', NULL, NULL, NULL, NULL),
(49, 49, 4.85, 7.58, NULL, 'desativado', NULL, NULL, NULL, NULL),
(50, 50, 17.45, 26.63, 31, 'ativo', '2020-10-28', '2020-10-31', NULL, NULL),
(51, 51, 2.81, 5.69, NULL, 'desativado', NULL, NULL, NULL, NULL),
(52, 52, 6.34, 10.48, NULL, 'desativado', NULL, NULL, NULL, NULL),
(53, 53, 2.48, 5.16, NULL, 'desativado', NULL, NULL, NULL, NULL),
(54, 54, 2.17, 4.62, NULL, 'desativado', NULL, NULL, NULL, NULL),
(55, 55, 3.96, 7.09, NULL, 'desativado', NULL, NULL, NULL, NULL),
(56, 56, 0.98, 1.84, NULL, 'desativado', NULL, NULL, NULL, NULL),
(57, 57, 4.75, 6.61, 32, 'ativo', '2020-10-20', '2020-10-31', NULL, NULL),
(58, 58, 1.19, 2.87, NULL, 'desativado', NULL, NULL, NULL, NULL),
(59, 59, 2.10, 3.67, NULL, 'desativado', NULL, NULL, NULL, NULL),
(60, 60, 10.76, 16.98, NULL, 'desativado', NULL, NULL, NULL, NULL),
(61, 61, 6.23, 10.35, NULL, 'desativado', NULL, NULL, NULL, NULL),
(62, 62, 9.98, 15.99, NULL, 'desativado', NULL, NULL, NULL, NULL),
(63, 63, 7.43, 13.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(64, 64, 7.18, 10.45, NULL, 'desativado', NULL, NULL, NULL, NULL),
(65, 65, 11.76, 19.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(66, 66, 6.32, 9.98, NULL, 'desativado', NULL, NULL, NULL, NULL),
(67, 67, 3.45, 7.03, 38, 'ativo', '2020-10-13', '2020-10-31', NULL, NULL),
(68, 68, 2.89, 6.82, NULL, 'desativado', NULL, NULL, NULL, NULL),
(69, 69, 4.65, 8.98, NULL, 'desativado', NULL, NULL, NULL, NULL),
(70, 70, 4.28, 9.89, NULL, 'desativado', NULL, NULL, NULL, NULL),
(71, 71, 3.38, 6.99, NULL, 'desativado', NULL, NULL, NULL, NULL),
(72, 72, 5.15, 9.78, NULL, 'desativado', NULL, NULL, NULL, NULL),
(73, 73, 7.56, 12.78, NULL, 'desativado', NULL, NULL, NULL, NULL),
(74, 74, 10.58, 20.89, 37, 'ativo', '2020-10-26', '2020-10-31', NULL, NULL),
(75, 75, 9.85, 19.79, NULL, 'desativado', NULL, NULL, NULL, NULL),
(76, 76, 7.29, 14.29, NULL, 'desativado', NULL, NULL, NULL, NULL),
(77, 77, 3.85, 7.36, NULL, 'desativado', NULL, NULL, NULL, NULL),
(78, 78, 4.31, 7.89, NULL, 'desativado', NULL, NULL, NULL, NULL),
(79, 79, 2.98, 5.13, NULL, 'desativado', NULL, NULL, NULL, NULL),
(80, 80, 3.09, 7.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(81, 81, 4.59, 9.49, NULL, 'desativado', NULL, NULL, NULL, NULL),
(82, 82, 8.23, 13.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(83, 83, 12.37, 19.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(84, 84, 5.78, 9.59, NULL, 'desativado', NULL, NULL, NULL, NULL),
(85, 85, 8.54, 14.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(86, 86, 2.35, 5.19, NULL, 'desativado', NULL, NULL, NULL, NULL),
(87, 87, 13.76, 22.80, 10, 'ativo', '2020-10-25', '2020-10-31', NULL, NULL),
(88, 88, 3.28, 6.88, NULL, 'desativado', NULL, NULL, NULL, NULL),
(89, 89, 1.05, 3.51, NULL, 'desativado', NULL, NULL, NULL, NULL),
(90, 90, 3.45, 7.98, NULL, 'desativado', NULL, NULL, NULL, NULL),
(91, 91, 3.05, 6.15, NULL, 'desativado', NULL, NULL, NULL, NULL),
(92, 92, 4.89, 9.56, NULL, 'desativado', NULL, NULL, NULL, NULL),
(93, 93, 13.90, 31.01, NULL, 'desativado', NULL, NULL, NULL, NULL),
(94, 94, 13.57, 27.67, 10, 'ativo', '2020-10-23', '2020-10-31', NULL, NULL),
(95, 95, 12.85, 21.99, NULL, 'desativado', NULL, NULL, NULL, NULL),
(96, 96, 1.32, 2.99, NULL, 'desativado', NULL, NULL, NULL, NULL),
(97, 97, 4.67, 8.46, NULL, 'desativado', NULL, NULL, NULL, NULL),
(98, 98, 3.17, 6.37, NULL, 'desativado', NULL, NULL, NULL, NULL),
(99, 99, 2.76, 5.71, NULL, 'desativado', NULL, NULL, NULL, NULL),
(100, 100, 2.15, 5.60, 5, 'ativo', '2020-10-22', '2020-10-31', NULL, NULL),
(101, 101, 10.16, 23.09, NULL, 'desativado', NULL, NULL, NULL, NULL),
(102, 102, 2.10, 5.71, NULL, 'desativado', NULL, NULL, NULL, NULL),
(103, 103, 0.83, 2.74, NULL, 'desativado', NULL, NULL, NULL, NULL),
(104, 104, 2.16, 4.47, NULL, 'desativado', NULL, NULL, NULL, NULL),
(105, 105, 4.87, 8.65, NULL, 'desativado', NULL, NULL, NULL, NULL),
(106, 106, 3.26, 7.14, NULL, 'desativado', NULL, NULL, NULL, NULL),
(107, 107, 0.87, 2.41, NULL, 'desativado', NULL, NULL, NULL, NULL),
(108, 108, 21.87, 32.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(109, 109, 14.10, 23.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(110, 110, 9.87, 15.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(111, 111, 10.45, 16.49, NULL, 'desativado', NULL, NULL, NULL, NULL),
(112, 112, 12.30, 21.98, NULL, 'desativado', NULL, NULL, NULL, NULL),
(113, 113, 10.98, 17.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(114, 114, 22.15, 33.58, NULL, 'desativado', NULL, NULL, NULL, NULL),
(115, 115, 33.70, 52.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(116, 116, 4.65, 7.89, NULL, 'desativado', NULL, NULL, NULL, NULL),
(117, 117, 11.20, 19.70, NULL, 'desativado', NULL, NULL, NULL, NULL),
(118, 118, 5.56, 11.76, NULL, 'desativado', NULL, NULL, NULL, NULL),
(119, 119, 12.13, 25.28, NULL, 'desativado', NULL, NULL, NULL, NULL),
(120, 120, 5.67, 11.43, NULL, 'desativado', NULL, NULL, NULL, NULL),
(121, 121, 6.03, 15.78, NULL, 'desativado', NULL, NULL, NULL, NULL),
(122, 122, 4.57, 8.64, NULL, 'desativado', NULL, NULL, NULL, NULL),
(123, 123, 6.75, 12.98, NULL, 'desativado', NULL, NULL, NULL, NULL),
(124, 124, 2.09, 5.82, NULL, 'desativado', NULL, NULL, NULL, NULL),
(125, 125, 105.00, 3.26, NULL, 'desativado', NULL, NULL, NULL, NULL),
(126, 126, 1.05, 2.81, NULL, 'desativado', NULL, NULL, NULL, NULL),
(127, 127, 1.75, 4.29, NULL, 'desativado', NULL, NULL, NULL, NULL),
(128, 128, 9.32, 15.90, 34, 'ativo', '2020-10-27', '2020-10-31', NULL, NULL),
(129, 129, 9.32, 15.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(130, 130, 8.32, 12.65, NULL, 'desativado', NULL, NULL, NULL, NULL),
(131, 131, 5.44, 9.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(132, 132, 4.63, 8.79, NULL, 'desativado', NULL, NULL, NULL, NULL),
(133, 133, 8.23, 13.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(134, 134, 9.33, 15.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(135, 135, 10.20, 18.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(136, 136, 6.43, 10.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(137, 137, 4.78, 8.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(138, 138, 2.05, 5.71, NULL, 'desativado', NULL, NULL, NULL, NULL),
(139, 139, 2.33, 5.38, NULL, 'desativado', NULL, NULL, NULL, NULL),
(140, 140, 3.07, 7.58, NULL, 'desativado', NULL, NULL, NULL, NULL),
(141, 141, 10.31, 20.34, NULL, 'desativado', NULL, NULL, NULL, NULL),
(142, 142, 1.53, 3.62, NULL, 'desativado', NULL, NULL, NULL, NULL),
(143, 143, 0.87, 2.19, NULL, 'desativado', NULL, NULL, NULL, NULL),
(144, 144, 3.14, 6.81, NULL, 'desativado', NULL, NULL, NULL, NULL),
(145, 145, 2.05, 4.17, NULL, 'desativado', NULL, NULL, NULL, NULL),
(146, 146, 1.15, 2.30, NULL, 'desativado', NULL, NULL, NULL, NULL),
(147, 147, 3.13, 6.26, NULL, 'desativado', NULL, NULL, NULL, NULL),
(148, 148, 1.10, 1.99, 39, 'ativo', '2020-10-27', '2020-10-31', NULL, NULL),
(149, 149, 1.39, 2.79, NULL, 'desativado', NULL, NULL, NULL, NULL),
(150, 150, 1.25, 2.59, NULL, 'desativado', NULL, NULL, NULL, NULL),
(151, 151, 0.76, 1.39, NULL, 'desativado', NULL, NULL, NULL, NULL),
(152, 152, 5.23, 9.40, NULL, 'desativado', NULL, NULL, NULL, NULL),
(153, 153, 11.89, 18.99, NULL, 'desativado', NULL, NULL, NULL, NULL),
(154, 154, 4.89, 9.87, NULL, 'desativado', NULL, NULL, NULL, NULL),
(155, 155, 7.43, 14.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(156, 156, 3.19, 6.48, NULL, 'desativado', NULL, NULL, NULL, NULL),
(157, 157, 6.87, 9.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(158, 158, 4.13, 8.57, NULL, 'desativado', NULL, NULL, NULL, NULL),
(159, 159, 2.13, 5.93, NULL, 'desativado', NULL, NULL, NULL, NULL),
(160, 160, 6.13, 11.54, NULL, 'desativado', NULL, NULL, NULL, NULL),
(161, 161, 7.25, 15.83, NULL, 'desativado', NULL, NULL, NULL, NULL),
(162, 162, 2.10, 5.82, NULL, 'desativado', NULL, NULL, NULL, NULL),
(163, 163, 1.05, 3.89, NULL, 'desativado', NULL, NULL, NULL, NULL),
(164, 164, 2.15, 5.27, NULL, 'desativado', NULL, NULL, NULL, NULL),
(165, 165, 2.15, 5.27, NULL, 'desativado', NULL, NULL, NULL, NULL),
(166, 166, 9.18, 20.01, NULL, 'desativado', NULL, NULL, NULL, NULL),
(167, 167, 4.50, 8.46, NULL, 'desativado', NULL, NULL, NULL, NULL),
(168, 168, 12.40, 21.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(169, 169, 12.40, 21.90, NULL, 'desativado', NULL, NULL, NULL, NULL),
(170, 170, 32.87, 64.75, NULL, 'desativado', NULL, NULL, NULL, NULL),
(171, 171, 3.10, 6.58, NULL, 'desativado', NULL, NULL, NULL, NULL),
(172, 172, 10.43, 19.89, NULL, 'desativado', NULL, NULL, NULL, NULL),
(173, 173, 4.35, 8.19, NULL, 'desativado', NULL, NULL, NULL, NULL),
(174, 174, 4.98, 10.99, NULL, 'desativado', NULL, NULL, NULL, NULL),
(175, 175, 34.76, 72.45, NULL, 'desativado', NULL, NULL, NULL, NULL),
(180, 176, 5.63, 11.90, 15, 'ativo', '2020-10-27', '2020-10-31', '2020-10-27 20:29:01', '2020-10-27 20:29:01'),
(181, 177, 4.28, 7.99, NULL, 'desativado', NULL, NULL, '2020-10-27 20:44:44', '2020-10-27 20:44:44');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `preco`
--
ALTER TABLE `preco`
  ADD PRIMARY KEY (`id_preco`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `preco`
--
ALTER TABLE `preco`
  MODIFY `id_preco` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
