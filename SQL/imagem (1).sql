-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: laradock_mysql_1
-- Tempo de geração: 27-Out-2020 às 12:11
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
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `id_imagem` bigint UNSIGNED NOT NULL,
  `id_produto` bigint UNSIGNED NOT NULL,
  `caminho_imagem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ds_imagem_produto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`id_imagem`, `id_produto`, `caminho_imagem`, `ds_imagem_produto`, `created_at`, `updated_at`) VALUES
(1, 39, 'fettuccine-perdigao.webp', 'frente', '2020-10-27 04:02:50', '2020-10-27 04:02:50'),
(2, 37, 'canneloni-4queijos.webp', 'frente', '2020-10-27 04:03:25', '2020-10-27 04:03:25'),
(3, 36, 'extrato-elefante-130g.webp', 'frente', '2020-10-27 04:04:05', '2020-10-27 04:04:05'),
(4, 35, 'extrato-salsaretti-330g.webp', 'frente', '2020-10-27 04:04:32', '2020-10-27 04:04:32'),
(5, 34, 'espaguete-integral-urbano.jpg', 'frente', '2020-10-27 04:05:18', '2020-10-27 04:05:18'),
(6, 33, 'crepioca.jpg', 'frente', '2020-10-27 04:05:51', '2020-10-27 04:05:51'),
(7, 32, 'capeletti-frango.webp', 'frente', '2020-10-27 04:06:25', '2020-10-27 04:06:25'),
(8, 52, 'macarrao-parafuso-adria.jpg', 'frente', '2020-10-27 04:06:41', '2020-10-27 04:06:41'),
(9, 51, 'lasanha-barille.jpg', 'frente', '2020-10-27 04:07:55', '2020-10-27 04:07:55'),
(10, 60, 'cafe-astro.jpg', 'frente', '2020-10-27 04:08:27', '2020-10-27 04:08:27'),
(11, 50, 'lasanha-bolonhesa-perdigao.jpg', 'frente', '2020-10-27 04:08:43', '2020-10-27 04:08:43'),
(12, 43, 'higienico-neve-12un.jpg', 'frente', '2020-10-27 04:09:18', '2020-10-27 04:09:18'),
(13, 20, 'sal-lebre.jpeg', 'frente', '2020-10-27 04:09:34', '2020-10-27 04:09:34'),
(14, 19, 'acucar-refinado-uniao-1kg.jpg', 'frente', '2020-10-27 04:10:00', '2020-10-27 04:10:00'),
(15, 18, 'feijao-camil-1kg.webp', 'frente', '2020-10-27 04:10:19', '2020-10-27 04:10:19'),
(16, 17, 'arroz-tiojoao-2kg.jpg', 'frente', '2020-10-27 04:13:45', '2020-10-27 04:13:45'),
(17, 16, 'zerocal-200ml.jpg', 'frente', '2020-10-27 04:14:01', '2020-10-27 04:14:01'),
(18, 15, 'sal-cisne.webp', 'frente', '2020-10-27 04:14:16', '2020-10-27 04:14:16'),
(19, 14, 'oleo-soya.webp', 'frente', '2020-10-27 04:15:16', '2020-10-27 04:15:16'),
(20, 13, 'feijao-kicaldo-1kg.jpg', 'frente', '2020-10-27 04:15:30', '2020-10-27 04:15:30'),
(21, 12, 'arroz-blueville-1kg.jpg', 'frente', '2020-10-27 04:16:33', '2020-10-27 04:16:33'),
(22, 11, 'acucar-dabarra.jpg', 'frente', '2020-10-27 04:16:53', '2020-10-27 04:16:53'),
(23, 144, 'protex-balance-saudavel-90g.jpg', 'frente', '2020-10-27 04:17:22', '2020-10-27 04:17:22'),
(24, 175, 'salmao-damm-100g.jpg', 'frente', '2020-10-27 04:17:40', '2020-10-27 04:17:40'),
(25, 174, 'panetone-village-light-400g.jpg', 'frente', '2020-10-27 04:18:05', '2020-10-27 04:18:05'),
(26, 173, 'kinder-ovo-menina-40g-2un.jpeg', 'frente', '2020-10-27 04:18:36', '2020-10-27 04:18:36'),
(27, 172, 'bombom-rafaello-150g-15un.webp', 'frente', '2020-10-27 04:18:55', '2020-10-27 04:18:55'),
(28, 171, 'vinho-branco-salton-750ml.jpg', 'frente', '2020-10-27 04:19:22', '2020-10-27 04:19:22'),
(29, 170, 'geleia-amora-queensberry-320g.webp', 'frente', '2020-10-27 04:19:41', '2020-10-27 04:19:41'),
(30, 169, 'arroz-raris-integral-500g.jpg', 'frente', '2020-10-27 04:20:21', '2020-10-27 04:20:21'),
(31, 168, 'pao-de-queijo-forno-de-minas-1kg.jpg', 'frente', '2020-10-27 04:20:52', '2020-10-27 04:20:52'),
(32, 167, 'yopro-zero-lactose-morango.webp', 'frente', '2020-10-27 04:21:10', '2020-10-27 04:21:10'),
(33, 166, 'tender-bolinha-sadia-defumado.webp', 'frente', '2020-10-27 04:21:32', '2020-10-27 04:21:32'),
(34, 165, 'chocottone-bauducco-trufa.jpg', 'frente', '2020-10-27 04:22:00', '2020-10-27 04:22:00'),
(35, 164, 'chocotone-bauducco-maxxi-caramel.jpg', 'frente', '2020-10-27 04:22:27', '2020-10-27 04:22:27'),
(36, 1, 'cocacola-original-1,5L.webp', 'frente', '2020-10-27 04:22:43', '2020-10-27 04:22:43'),
(37, 3, 'antarctica-soda-2L.jpg', 'frente', '2020-10-27 04:23:01', '2020-10-27 04:23:01'),
(38, 2, 'antarctica-guarana-1,5L.jpg', 'frente', '2020-10-27 04:23:17', '2020-10-27 04:23:17');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id_imagem`,`id_produto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id_imagem` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
