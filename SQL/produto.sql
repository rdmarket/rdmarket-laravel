-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: laradock_mysql_1
-- Tempo de geração: 28-Out-2020 às 04:00
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
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` bigint UNSIGNED NOT NULL,
  `id_categoria` int UNSIGNED NOT NULL,
  `ds_produto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_aquisicao` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `id_categoria`, `ds_produto`, `data_aquisicao`, `created_at`, `updated_at`) VALUES
(1, 15, 'Refrigerante Coca-Cola sabor original PET 1,5L', '2020-07-12', NULL, NULL),
(2, 15, 'Refrigerante Antárctica Guaraná PET 1,5 L', '2020-07-13', NULL, NULL),
(3, 15, 'Refrigerante Antárctica Soda PET 2 L', '2020-06-26', NULL, NULL),
(4, 15, 'Refrigerante Fanta Laranja PET 1,5 L', '2020-05-15', NULL, NULL),
(5, 15, 'Refrigerante Fanta Uva PET 1,5 L', '2020-05-15', NULL, NULL),
(6, 15, 'Refrigerante Itubaína Guaraná PET 2 L', '2020-06-18', NULL, NULL),
(7, 15, 'Kit refrigerante Coca-Cola + Fanta Laranja 2L cada', '2020-09-20', NULL, NULL),
(8, 15, 'Refrigerante Antárctica Citrus lata 350ml', '2020-08-21', NULL, NULL),
(9, 15, 'Refrigentante Antárctica Guaraná lata 350ml', '2020-06-23', NULL, NULL),
(10, 15, 'Refrigerante Coca-Cola sabor original  lata 350 ml', '2020-05-12', NULL, NULL),
(11, 1, 'Açúcar refinado DaBarra 1KG', '2020-10-20', NULL, NULL),
(12, 1, 'Arroz Blue Ville branco tipo 1 1KG', '2020-08-10', NULL, '2020-10-27 04:16:14'),
(13, 1, 'Feijão carioca Kicaldo 1KG', '2020-07-03', NULL, NULL),
(14, 1, 'Óleo de soja soya PET 900 ML', '2020-04-01', NULL, NULL),
(15, 1, 'Sal cisne refinado extra 1KG ', '2020-07-09', NULL, NULL),
(16, 1, 'Zero-cal sacarina adoçante liquido 200ML', '2020-03-28', NULL, NULL),
(17, 1, 'Arroz Tio João tipo 1 2KG', '2020-04-30', NULL, '2020-10-27 04:13:19'),
(18, 1, 'Feijão carioca Camil 1KG', '2020-05-03', NULL, NULL),
(19, 1, 'Açúcar união refinado 1KG', '2020-06-20', NULL, NULL),
(20, 1, 'Sal refinado Lebre 1KG', '2020-07-04', NULL, NULL),
(21, 1, 'Arroz Blue Ville branco tipo 1 1KG', '2020-08-10', NULL, NULL),
(22, 16, 'Abacate unidade', '2020-04-15', NULL, NULL),
(23, 16, 'Abacaxi pérola unidade', '2020-04-15', NULL, NULL),
(24, 16, 'Abobrinha italiana bandeja com 4 unidades', '2020-04-15', NULL, NULL),
(25, 16, 'Abóbora japonesa unidade', '2020-04-15', NULL, NULL),
(26, 16, 'Melancia unidade', '2020-04-15', NULL, NULL),
(27, 16, 'Milho verde bandeja com 3 unidades', '2020-04-15', NULL, NULL),
(28, 16, 'Couve Manteiga Caisp orgânica 100g', '2020-04-27', NULL, NULL),
(29, 16, 'Pimentão verde bandeja com 3 unidades', '2020-04-15', NULL, NULL),
(30, 16, 'Lichia bandeja 450g', '2020-04-21', NULL, NULL),
(31, 16, 'Quiabo bandeja 500g', '2020-04-15', NULL, NULL),
(32, 2, 'Capeletti de frango Mezzani 400G', '2020-10-09', NULL, NULL),
(33, 2, 'Crepioca sem glúten natural life 250G', '2020-05-03', NULL, NULL),
(34, 2, 'Espaguete de arroz integral sem glúten urbano 500G', '2020-09-12', NULL, NULL),
(35, 2, 'Extrato de tomate concentrado salsaretti lata 330G', '2020-04-01', NULL, NULL),
(36, 2, 'Extrato de tomate Elefante ervas finas lata 130G', '2020-03-08', NULL, NULL),
(37, 2, 'Caneloni buona 4 queijos 500G', '2020-05-01', NULL, NULL),
(38, 2, 'Caneloni buona misto 500G', '2020-05-02', NULL, NULL),
(39, 2, 'Fettuccine ao molho bolonhesa perdigão 350G', '2020-04-30', NULL, NULL),
(40, 17, 'Papel Higiênico ELite Dualette premium folha triplha 20 m c/ 4', '2020-03-26', NULL, NULL),
(41, 17, 'Papel Higiênico Deluxe Cotton folha dupla neutro L12P11 30 m', '2020-05-10', NULL, NULL),
(42, 17, 'Papel Higiênico Personal folha simples neutro 30 m c/ 8', '2020-04-20', NULL, NULL),
(43, 17, 'Papel Higiênico Neve folha dupla L12P11 30 m', '2020-03-11', NULL, NULL),
(44, 17, 'Papel Toalha Kitchen folha dupla com 2 rolos de 60 folhas cada', '2020-04-13', NULL, NULL),
(45, 17, 'Papel Toalha Big Pack Mili com 2 rolos de 100 folhas cada', '2020-04-13', NULL, NULL),
(46, 17, 'Papel Toalha Mascot folha dupla com 2 rolos de 60 folhas cada', '2020-04-13', NULL, NULL),
(47, 17, 'Guardanapo de papel Elite folha dupla 50 un 23,5x24cm', '2020-05-08', NULL, NULL),
(48, 17, 'Guardanapo de papel Mili Bistrô folha dupla 50 un 30,0x29,5cm', '2020-05-07', NULL, NULL),
(49, 17, 'Guardanapo de papel Kitchen folha simples 50 un 22,7x22,8', '2020-05-08', NULL, NULL),
(50, 2, 'Lasanha à bolonhesa perdigão 600G', '2020-01-08', NULL, NULL),
(51, 2, 'Massa grano duro barilla 250G', '2020-04-30', NULL, NULL),
(52, 2, 'Macarrão Adria com ovos parafuso 500G', '2020-04-03', NULL, NULL),
(53, 3, 'Achocolatado Nescau 2.0 400G', '2020-03-04', NULL, NULL),
(54, 3, 'Achocolatado em pó Toddy 400G', '2020-07-30', NULL, NULL),
(55, 3, 'Café 3 coraçõe a vácuo  extra forte 500G', '2020-03-04', NULL, NULL),
(56, 3, 'Café 3 corações soluvel 100G', '2020-03-10', NULL, NULL),
(57, 3, 'Chá leão matte 250G', '2020-06-03', NULL, NULL),
(58, 3, 'Chá leão funcional reequilibra 18G', '2020-03-08', NULL, NULL),
(59, 3, 'Cacau em pó decoração Dr. Oetker 150G', '2020-04-20', NULL, NULL),
(60, 3, 'Café astro Bourbon grão 250G', '2020-07-09', NULL, NULL),
(61, 3, 'Café Baggio gourmet expresso torrado e moído 250G', '2020-04-05', NULL, NULL),
(62, 3, 'Café brasileiro torrado e moído superior pouch 500G', '2020-03-04', NULL, NULL),
(63, 3, 'Achocolatado chocolatto 3 corações 400G', '2020-04-05', NULL, NULL),
(64, 18, 'Creme Dental Colgate Luminous White Carvão Ativado 70g', '2020-05-06', NULL, NULL),
(65, 18, 'Creme Dental Close Up Proteção Bioativa Bloqueio Anticáries 70g', '2020-05-17', NULL, NULL),
(66, 18, 'Creme Dental Oral-B Extra Fresh 70g', '2020-05-01', NULL, NULL),
(67, 18, 'Creme Dental Sensodyne Original 90 g', '2020-05-06', NULL, NULL),
(68, 18, 'Anti-séptico Bucal Cepacol Flúor 250ml', '2020-05-04', NULL, NULL),
(69, 18, 'Anti-séptico Bucal Listerine Menta Suave Zero Álcool Leve 500 Pague 350ml', '2020-08-29', NULL, NULL),
(70, 18, 'Enxaguante Bucal Colgate Plax Fresh Mint 250ml', '2020-05-15', NULL, NULL),
(71, 18, 'Escova Dental Oral-B Protector Antibacterial L3P2', '2020-05-11', NULL, NULL),
(72, 18, 'Escova Demtal Colgate Slim Soft Black 2un', '2020-06-25', NULL, NULL),
(73, 18, 'Fio Dental Colgate Menta 50m', '2020-05-14', NULL, NULL),
(74, 19, 'Absorvente Externo Intimus Tripla Proteção Cobertura Seca c/Abas Leve 16 Pague 14', '2020-04-26', NULL, NULL),
(75, 19, 'Absorvente Intimus Gel Noturno Cobertura Suave c/Abas 8 un', '2020-04-17', NULL, NULL),
(76, 19, 'Absorvente Intimus Interno mini 8 un', '2020-05-22', NULL, NULL),
(77, 19, 'Absorvente OB Interno ProComfort Super 8 un', '2020-05-16', NULL, NULL),
(78, 19, 'Absorvente Sempre Livre Adapt Plus Cobertura Suave c/ Abas Leve Mais Pague Menos 32 un', '2020-05-01', NULL, NULL),
(79, 19, 'Pack Sabonete Líquido Lucretin Íntimo Fresh c/ 2 400ml cada ', '2020-06-12', NULL, NULL),
(80, 19, 'Protetor Diário Always respirável Leve Mais Pague Menos 40 un', '2020-05-13', NULL, NULL),
(81, 19, 'Protetor Diário Carefree Todo Dia Flexi sem perfume Leve 80 Pague 60', '2020-05-17', NULL, NULL),
(82, 19, 'Sabonete íntimo Protex delicate care em barra 85g', '2020-05-28', NULL, NULL),
(83, 19, 'Sabonete Íntimo Dermacyd Pro-Bio Hidrate 200ml', '2020-05-19', NULL, NULL),
(84, 4, '7 grãos orgânico cozido a vapor Vapza 250G', '2020-09-08', NULL, NULL),
(85, 4, 'Aveia nestle flocos 170G', '2020-07-28', NULL, NULL),
(86, 4, 'Barra de cereal Ejoy Ameixa e Coco zero açúcares 50G', '2020-03-04', NULL, NULL),
(87, 4, 'Barra de cereal Nutri sabor castanha do pará', '2020-03-06', NULL, NULL),
(88, 4, 'Cereal matinal Netlé nescau 60% menos açúcar 200G', '2020-05-06', NULL, NULL),
(89, 4, 'Cereal matinal power pops Sucrilhos Kellogg\'s 660G', '2020-01-05', NULL, NULL),
(90, 4, 'Chia Jarmine grãos integral 150G', '2020-03-04', NULL, NULL),
(91, 4, 'Cous Cous Barilla 500G', '2020-04-08', NULL, NULL),
(92, 4, 'Farinha de mandioca Hikari torrada 500G', '2020-06-04', NULL, NULL),
(93, 4, 'Farinha de Arroz urbano sem glúten 1KG', '2020-05-20', NULL, NULL),
(94, 5, 'Açafrão da terra Kitano 50G', '2020-02-18', NULL, NULL),
(95, 5, 'Alho agro picado sem sal 200G', '2020-09-03', NULL, NULL),
(96, 5, 'Alho Kitano granulado 60G', '2020-05-01', NULL, NULL),
(97, 5, 'Azeite andorinha de oliva puro vidro 500ML', '2020-02-09', NULL, NULL),
(98, 5, 'Azeite de dendê Cepêra 100ML', '2020-01-03', NULL, NULL),
(99, 5, 'Caldo carne Maggi 114G', '2020-09-07', NULL, NULL),
(100, 5, 'Canela da China em casca Kitano', '2020-03-19', NULL, NULL),
(101, 5, 'Catchup arisco picante 390G', '2020-04-17', NULL, NULL),
(102, 5, 'Cúrcuma Bombay pó 40G', '2020-09-08', NULL, NULL),
(103, 5, 'Curry Kisabor 20G', '2020-03-15', NULL, NULL),
(104, 20, 'Coloração Casting creme gloss 700 Loiro Natural', '2020-06-22', NULL, NULL),
(105, 20, 'Kit Pantene Micelar Shampoo 400ml + Condicionador 175ml', '2020-06-12', NULL, NULL),
(106, 20, 'Creme para pentear Pantene Crespo 240g', '2020-07-16', NULL, NULL),
(107, 20, 'Shampoo Elseve Hydra Detox Anticaspa Reequilibrante 400ml', '2020-05-12', NULL, NULL),
(108, 20, 'Shampoo Dove Men Care Proteção Anticaspa 200ml', '2020-04-29', NULL, NULL),
(109, 20, 'Condicionador Pantene 3 Minutos Milagrosos Liso Extremo 170ml', '2020-06-17', NULL, NULL),
(110, 20, 'Kit Head&Shoulders Detox Shampoo 200ml + condicionador 170ml', '2020-05-02', NULL, NULL),
(111, 20, 'Creme de Tratamento Aussie 3 minutos Miracle Curls 236ml', '2020-06-01', NULL, NULL),
(112, 20, 'Gel NY. Looks fixação forte brilho molhado 240g', '2020-05-13', NULL, NULL),
(113, 20, 'Cera capilar modeladora Bozzano efeito seco 230g', '2020-06-03', NULL, NULL),
(114, 6, 'Alcaparra cepera ao vinagre em conserva 65G', '2020-09-04', NULL, NULL),
(115, 6, 'Aspargo raiola 200G', '2020-09-01', NULL, NULL),
(116, 6, 'Atum claro em azeite de oliva Gomes da Costa 170G', '2020-09-10', NULL, NULL),
(117, 6, 'Azeitona la pastina preta fatiada 160G', '2020-09-12', NULL, NULL),
(118, 6, 'Azeitona verde em conserva recheada saborosa 150G', '2020-08-30', NULL, NULL),
(119, 6, 'Cebolinha raiola conserva 200G', '2020-08-17', NULL, NULL),
(120, 6, 'Champignons fatiados aica 100G', '2020-04-28', NULL, NULL),
(121, 6, 'Dueto milho e ervilha em conserva predilecta lata 179G', '2020-03-20', NULL, NULL),
(122, 6, 'Ervilha em conserva predilecta lata 170G', '2020-09-02', NULL, NULL),
(123, 6, 'Grão de bico em conserva knor 170G', '2020-01-22', NULL, NULL),
(124, 21, 'Antitranspirante Aerosol Rexona Clinical Classic 150ml', '2020-06-15', NULL, NULL),
(125, 21, 'Antitranspirante Aerosol Rexona Men Clinical Clean 150ml', '2020-06-15', NULL, NULL),
(126, 21, 'Antitranspirante Aerosol Old Spice Matador 93g', '2020-07-14', NULL, NULL),
(127, 21, 'Antitranspirante Roll On Dove Sensitive sem perfume 50ml', '2020-05-04', NULL, NULL),
(128, 21, 'Antitranspirante Roll On Rexona Antibacterial Invisible 50 ml', '2020-05-30', NULL, NULL),
(129, 21, 'Antitranspirante Aerosol Adidas Feminino Climacool 150ml', '2020-05-03', NULL, NULL),
(130, 21, 'Antitranspirante Aerosol Nivea Men Deep Amadeirado 150ml', '2020-05-06', NULL, NULL),
(131, 21, 'Antitranspirante Aerosol Nivea Deomilk Sensitive 150ml', '2020-06-13', NULL, NULL),
(132, 21, 'Antitranspirante Aerosol Suave Hidraloe 150ml', '2020-06-16', NULL, NULL),
(133, 21, 'Antitranspirante Aerosol Monange Detox Fresh 90g', '2020-05-24', NULL, NULL),
(134, 7, 'Amendiom com mel yoki 150G', '2020-01-03', NULL, NULL),
(135, 7, 'Batata frita lisa peito de peru elma chips pacote 45G', '2020-04-10', NULL, NULL),
(136, 7, 'Batata lay\'s classica 96G', '2020-05-10', NULL, NULL),
(137, 7, 'Batata original ruffles 300G', '2020-09-01', NULL, NULL),
(138, 7, 'Biscoito adria palito chocolate crocante 70G', '2020-09-04', NULL, NULL),
(139, 7, 'Biscoito adria tortinha sabor chocolate suiço 160G', '2020-02-28', NULL, NULL),
(140, 7, 'Biscoito amanteigado  chocolate marilan 330G', '2020-03-10', NULL, NULL),
(141, 7, 'Biscoito bauducco cookies original 100G', '2020-05-01', NULL, NULL),
(142, 7, 'Biscoito bauducco recheadinho goiaba 112G', '2020-06-07', NULL, NULL),
(143, 7, 'Biscoito calypso cobertura de chocolate 130G', '2020-08-08', NULL, NULL),
(144, 22, 'Sabonete em barra Protex Balance Saudável 85g', '2020-05-02', NULL, NULL),
(145, 22, 'Sabonete em barra Dove anti-stress Micelar 90g', '2020-07-31', NULL, NULL),
(146, 22, 'Sabonete em barra Lux Botanicals Lirio Azul 125g', '2020-06-01', NULL, NULL),
(147, 22, 'Sabonete em barra Johnsons Rosas e Sândalo 80g', '2020-05-26', NULL, NULL),
(148, 22, 'Sabonete líquido Dove Manteiga de Karité e Baunilha 200ml', '2020-06-07', NULL, NULL),
(149, 22, 'Sabonete líquido Nivea Natural Oil 200ml', '2020-07-15', NULL, NULL),
(150, 22, 'Sabonete líquido Protex for Men Sports Antibacteriano 250ml', '2020-06-23', NULL, NULL),
(151, 22, 'Sabonete líquido Fiorucci Algas Marinhas 500ml', '2020-08-30', NULL, NULL),
(152, 22, 'Esponja de Banho Ponjita Leve 3 Pague 2', '2020-05-18', NULL, NULL),
(153, 22, 'Esponja de Banho Ponjita delicada', '2020-08-05', NULL, NULL),
(154, 8, 'Aroma de baunilha oetker 30 ml', '2020-03-20', NULL, NULL),
(155, 8, 'Bala fini regaliz tubes tuttifrut 80G', '2020-05-20', NULL, NULL),
(156, 8, 'Cacau em pó mãe terra zero adição de açúcares 100G', '2020-07-20', NULL, NULL),
(157, 8, 'Chocolate em pó nestlé 200G', '2020-05-15', NULL, NULL),
(158, 8, 'Coco em flocos úmido e adoçado ducoco 100G', '2020-06-08', NULL, NULL),
(159, 8, 'Confeito granulado colorido dori 150G', '2020-09-08', NULL, NULL),
(160, 8, 'Confeito m&m\'s chocolate ao leite 80G', '2020-03-30', NULL, NULL),
(161, 8, 'Confeito m&m\'s ovinho de amendoim 80G', '2020-03-09', NULL, NULL),
(162, 8, 'Doce de amendoim paçoquita santa helena 350G', '2020-04-05', NULL, NULL),
(163, 8, 'Doce de leite moça 390G', '2020-09-05', NULL, NULL),
(164, 8, 'Chocottone Bauducco Maxi Caramel 500g', '2020-10-20', NULL, NULL),
(165, 8, 'Chocottone Bauducco Trufa 500g', '2020-10-15', NULL, NULL),
(166, 11, 'Tender bolinha Sadia defumado aprox 1,2kg', '2020-10-03', NULL, NULL),
(167, 10, 'Iogurte YoPro Protein Zero Lactose Morango 250g', '2020-10-01', NULL, NULL),
(168, 10, 'Pão de queijo Forno de Minas 1kg', '2020-10-05', NULL, NULL),
(169, 1, 'Arroz Integral Ráris 500g', '2020-10-14', NULL, NULL),
(170, 8, 'Geleia de amora Queensberry 320g', '2020-10-18', NULL, NULL),
(171, 13, 'Vinho espumante branco nacional Salton Evidence 750ml', '2020-10-19', NULL, NULL),
(172, 9, 'Bombom Raffaello 150g 15un', '2020-10-08', NULL, NULL),
(173, 9, 'Chocolate Kinder Ovo menina 40g 2un', '2020-10-07', NULL, NULL),
(174, 8, 'Panettone Village Light 400g', '2020-10-03', NULL, NULL),
(175, 11, 'Salmão marinado Damm Gravlaks 100g', '2020-10-21', NULL, NULL),
(176, 9, 'Caixa de bombons Lacta 250,6g', '2020-10-08', '2020-10-27 20:25:24', '2020-10-27 20:25:24'),
(177, 10, 'Mac & Chesse Cheddar e Bacon Seara 300g', '2020-10-23', '2020-10-27 20:44:02', '2020-10-27 20:44:02');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `FK_produto_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `FK_produto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_produto` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
