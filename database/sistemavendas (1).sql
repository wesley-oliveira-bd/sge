-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/08/2025 às 18:57
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
-- Banco de dados: `sistemavendas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `nome` varchar(100) NOT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `cnpj` text NOT NULL,
  `insc` text NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `obs` text DEFAULT NULL,
  `limite` decimal(10,2) DEFAULT 0.00,
  `bloqueado` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `tipo`, `nome`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `rg`, `cpf`, `cnpj`, `insc`, `celular`, `instagram`, `obs`, `limite`, `bloqueado`) VALUES
(1, 'fisica', 'WESLEY DE OLIVEIRA', 'rua santo pio x', '701', 'casa', 'sÃ£o josÃ©', '', 'mg', '35633-250', 'mg10397993', '04218505667', '', '', '37988260767', '@wesley', '', 500.00, 'nao'),
(3, 'fisica', 'maria da silva', 'rua brasilia', '500', 'casa', 'jardim america', '', 'mg', '35633075', 'mg14587563', '01458698256', '', '', '37945697852', '@mariadasilva', '', 700.00, 'nao'),
(4, 'juridica', 'AUTO PEÇAS BOM DESPACHO LTDA.', 'av. bandeirantes', '80', 'loja', 'dom joaquim', 'bom despacho', 'mg', '35633250', '', '', '16742041000193', '074074000185', '37988260761', '@autopecasbomdespacho', '', 1000.00, 'nao'),
(5, 'juridica', 'jaçanã', 'rua domingos', '50', 'casa', 'martins miranda', 'araçatuba', 'sp', '75423852', '', '', '123456791', '123654987654', '1175864253', '@jacana', '', 350.00, 'nao'),
(6, 'fisica', 'diele franciane bolina', 'rua santo pio x', '701', 'casa', 'calais', 'bom despacho', 'mg', '35633058', 'mb1047568', '04756874158', '', '', '37999444047', '@diele', '', 1000.00, 'nao'),
(7, 'fisica', 'joaquim de souza', 'rua sao pedro', '1450', 'casa', 'centro', 'moema', 'mg', '35625000', 'mg47698519', '25814765425', '', '', '37975864253', '@joaquimsouza', '', 1000.00, 'nao');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contasreceber`
--

CREATE TABLE `contasreceber` (
  `id` int(11) NOT NULL,
  `venda_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `data_emissao` date NOT NULL,
  `numero_parcela` int(11) NOT NULL,
  `total_parcelas` int(11) NOT NULL,
  `valor_parcela` decimal(10,2) NOT NULL,
  `vencimento` date NOT NULL,
  `valor_pago` decimal(10,2) DEFAULT NULL,
  `data_pgto` date DEFAULT NULL,
  `resto_pgto` decimal(10,2) NOT NULL,
  `forma_pgto` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contasreceber`
--

INSERT INTO `contasreceber` (`id`, `venda_id`, `cliente_id`, `data_emissao`, `numero_parcela`, `total_parcelas`, `valor_parcela`, `vencimento`, `valor_pago`, `data_pgto`, `resto_pgto`, `forma_pgto`, `status`) VALUES
(6, 37, 6, '0000-00-00', 1, 5, 0.00, '0000-00-00', NULL, NULL, 0.00, 'prazo', ''),
(7, 37, 6, '0000-00-00', 2, 5, 0.00, '0000-00-00', NULL, NULL, 0.00, 'prazo', ''),
(8, 37, 6, '0000-00-00', 3, 5, 0.00, '0000-00-00', NULL, NULL, 0.00, 'prazo', ''),
(9, 37, 6, '0000-00-00', 4, 5, 0.00, '0000-00-00', NULL, NULL, 0.00, 'prazo', ''),
(10, 37, 6, '0000-00-00', 5, 5, 0.00, '0000-00-00', NULL, NULL, 0.00, 'prazo', ''),
(11, 38, 6, '0000-00-00', 1, 2, 0.00, '0000-00-00', NULL, NULL, 0.00, 'prazo', ''),
(12, 38, 6, '0000-00-00', 1, 2, 0.00, '0000-00-00', NULL, NULL, 0.00, 'prazo', ''),
(13, 38, 6, '0000-00-00', 2, 2, 0.00, '0000-00-00', NULL, NULL, 0.00, 'prazo', ''),
(14, 38, 6, '0000-00-00', 2, 2, 0.00, '0000-00-00', NULL, NULL, 0.00, 'prazo', ''),
(15, 39, 1, '0000-00-00', 1, 2, 285.00, '0000-00-00', NULL, NULL, 0.00, 'prazo', ''),
(16, 39, 1, '0000-00-00', 2, 2, 285.00, '0000-00-00', NULL, NULL, 0.00, 'prazo', ''),
(17, 40, 6, '0000-00-00', 1, 4, 21.00, '2025-09-03', NULL, NULL, 0.00, 'prazo', ''),
(18, 40, 6, '0000-00-00', 2, 4, 21.00, '2025-10-03', NULL, NULL, 0.00, 'prazo', ''),
(19, 40, 6, '0000-00-00', 3, 4, 21.00, '2025-11-02', NULL, NULL, 0.00, 'prazo', ''),
(20, 40, 6, '0000-00-00', 4, 4, 21.00, '2025-12-02', NULL, NULL, 0.00, 'prazo', ''),
(21, 41, 3, '2025-08-04', 1, 3, 193.33, '2025-09-03', NULL, NULL, 0.00, 'prazo', ''),
(22, 41, 3, '2025-08-04', 2, 3, 193.33, '2025-10-03', NULL, NULL, 0.00, 'prazo', ''),
(23, 41, 3, '2025-08-04', 3, 3, 193.33, '2025-11-02', NULL, NULL, 0.00, 'prazo', ''),
(24, 45, 1, '2025-08-05', 1, 2, 142.50, '2025-09-04', NULL, NULL, 0.00, 'prazo', ''),
(25, 45, 1, '2025-08-05', 2, 2, 142.50, '2025-10-04', NULL, NULL, 0.00, 'prazo', ''),
(26, 46, 6, '2025-08-05', 1, 2, 145.00, '2025-09-04', NULL, NULL, 0.00, 'prazo', ''),
(27, 46, 6, '2025-08-05', 2, 2, 145.00, '2025-10-04', NULL, NULL, 0.00, 'prazo', ''),
(28, 50, 6, '2025-08-05', 1, 2, 28.00, '2025-09-04', NULL, NULL, 0.00, 'prazo', 'aberto'),
(29, 50, 6, '2025-08-05', 2, 2, 28.00, '2025-10-04', NULL, NULL, 0.00, 'prazo', 'aberto'),
(30, 55, 3, '2025-08-05', 1, 4, 180.55, '2025-09-04', NULL, NULL, 0.00, 'prazo', 'aberto'),
(31, 55, 3, '2025-08-05', 2, 4, 180.55, '2025-10-04', NULL, NULL, 0.00, 'prazo', 'aberto'),
(32, 55, 3, '2025-08-05', 3, 4, 180.55, '2025-11-03', NULL, NULL, 0.00, 'prazo', 'aberto'),
(33, 55, 3, '2025-08-05', 4, 4, 180.55, '2025-12-03', NULL, NULL, 0.00, 'prazo', 'aberto'),
(34, 56, 7, '2025-08-05', 1, 2, 114.75, '2025-09-04', NULL, NULL, 0.00, 'prazo', 'aberto'),
(35, 56, 7, '2025-08-05', 2, 2, 114.75, '2025-10-04', NULL, NULL, 0.00, 'prazo', 'aberto'),
(36, 59, 7, '2025-08-05', 1, 1, 51.52, '2025-09-04', NULL, NULL, 0.00, 'prazo', 'aberto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `tipo` varchar(8) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `insc` varchar(14) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `obs` text DEFAULT NULL,
  `limite` decimal(10,2) DEFAULT 0.00,
  `bloqueado` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `tipo`, `nome`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `rg`, `cpf`, `cnpj`, `insc`, `celular`, `instagram`, `obs`, `limite`, `bloqueado`) VALUES
(1, 'juridica', 'AUTO PEÇAS BOM DESPACHO LTDA', 'Avenida Bandeirantes', '180', 'loja', 'Dom Joaquim', 'Bom Despacho', 'mg', '35633250', '', '', '16742041000193', '0741124520098', '37999851496', '@autopecasbomdespacho', '', 500.00, 'sim');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `descricao` text DEFAULT NULL,
  `unid` varchar(10) NOT NULL,
  `custo` decimal(10,2) NOT NULL,
  `margem` decimal(5,2) NOT NULL,
  `venda` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL DEFAULT 0,
  `obs` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `referencia`, `descricao`, `unid`, `custo`, `margem`, `venda`, `estoque`, `obs`, `imagem`, `criado_em`) VALUES
(1, 'UB314', 'BOMBA DAGUA', 'pc', 150.00, 90.00, 285.00, 2, 'URBA', NULL, '2025-07-22 14:33:10'),
(2, '00516B', 'RET. RODA TRAZ.', 'pc', 15.00, 86.67, 28.00, 5, 'SABO', NULL, '2025-07-22 18:18:55'),
(3, '1932060', 'HELICE', 'pc', 60.00, 83.33, 110.00, 3, 'MODEFER', NULL, '2025-07-22 18:19:21'),
(5, 'ur1313rl', 'reparo bomba dagua', 'jg', 90.00, 66.67, 150.00, 2, 'urba', NULL, '2025-07-23 11:34:02'),
(6, 'n533', 'terminal direcao', 'pc', 115.00, 72.17, 198.00, 4, 'nakata', NULL, '2025-07-23 11:35:02'),
(7, 'r04677', 'anel sincronizado', 'pc', 198.00, 46.46, 290.00, 2, 'motopeÃ§as', 'imagens/1caf36a16556b8738f2c0d7e26a5370e.jpg', '2025-07-23 18:38:49'),
(8, 'r04696', 'bucha flangeada', 'pc', 135.00, 46.67, 198.00, 2, 'motopeÃ§as', 'imagens/sem_imagem.jpg', '2025-07-23 19:05:16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendaprodutos`
--

CREATE TABLE `vendaprodutos` (
  `id` int(11) NOT NULL,
  `venda_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `quant_venda` int(11) NOT NULL,
  `valor_unit` decimal(10,2) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `vendaprodutos`
--

INSERT INTO `vendaprodutos` (`id`, `venda_id`, `cliente_id`, `produto_id`, `quant_venda`, `valor_unit`, `valor_total`) VALUES
(1, 17, 1, 1, 3, 285.00, 855.00),
(2, 17, 1, 5, 3, 150.00, 450.00),
(3, 17, 1, 7, 3, 290.00, 870.00),
(4, 17, 1, 8, 3, 198.00, 594.00),
(5, 25, 5, 6, 2, 198.00, 396.00),
(6, 25, 5, 6, 2, 198.00, 396.00),
(7, 26, 4, 2, 2, 28.00, 56.00),
(8, 26, 4, 2, 2, 28.00, 56.00),
(9, 27, 3, 1, 1, 285.00, 285.00),
(10, 27, 3, 1, 1, 285.00, 285.00),
(11, 28, 3, 8, 2, 198.00, 396.00),
(12, 29, 6, 5, 1, 150.00, 150.00),
(13, 34, 4, 5, 10, 150.00, 1500.00),
(14, 34, 4, 5, 10, 150.00, 1500.00),
(15, 35, 6, 7, 4, 290.00, 1160.00),
(16, 36, 6, 7, 6, 290.00, 1740.00),
(17, 37, 6, 2, 10, 28.00, 280.00),
(18, 37, 6, 2, 10, 28.00, 280.00),
(19, 38, 6, 1, 2, 285.00, 570.00),
(20, 38, 6, 1, 2, 285.00, 570.00),
(21, 39, 1, 1, 2, 285.00, 570.00),
(22, 40, 6, 2, 3, 28.00, 84.00),
(23, 41, 3, 7, 2, 290.00, 580.00),
(24, 45, 1, 1, 1, 285.00, 285.00),
(25, 46, 6, 7, 1, 290.00, 290.00),
(26, 50, 6, 2, 2, 28.00, 56.00),
(27, 55, 3, 5, 1, 150.00, 150.00),
(28, 55, 3, 7, 2, 290.00, 580.00),
(29, 55, 3, 2, 1, 28.00, 28.00),
(30, 56, 7, 1, 1, 285.00, 285.00),
(31, 59, 7, 2, 2, 28.00, 56.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `data_emissao` date DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `desconto_venda` decimal(10,2) NOT NULL,
  `acrescimo_venda` decimal(10,2) NOT NULL,
  `total_venda` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `data_emissao`, `cliente_id`, `desconto_venda`, `acrescimo_venda`, `total_venda`) VALUES
(10, '2025-07-31', 1, 0.00, 0.00, 285.00),
(11, '2025-07-31', 3, 0.00, 0.00, 575.00),
(12, '2025-08-01', 0, 0.00, 0.00, 0.00),
(13, '2025-08-01', 1, 0.00, 0.00, 440.00),
(14, '2025-08-01', 3, 0.00, 0.00, 483.00),
(15, '2025-08-01', 0, 0.00, 0.00, 0.00),
(16, '2025-08-01', 0, 0.00, 0.00, 0.00),
(17, '2025-08-01', 1, 0.00, 0.00, 2769.00),
(18, '2025-08-03', 0, 0.00, 0.00, 0.00),
(19, '2025-08-03', 0, 0.00, 0.00, 0.00),
(20, '2025-08-03', 4, 0.00, 0.00, 206.00),
(21, '2025-08-03', 4, 0.00, 0.00, 452.00),
(22, '2025-08-03', 0, 0.00, 0.00, 0.00),
(23, '2025-08-03', 4, 0.00, 0.00, 285.00),
(24, '2025-08-03', 5, 0.00, 0.00, 198.00),
(25, '2025-08-03', 5, 0.00, 0.00, 396.00),
(26, '2025-08-03', 4, 0.00, 0.00, 56.00),
(27, '2025-08-03', 3, 0.00, 0.00, 285.00),
(28, '2025-08-03', 3, 0.00, 0.00, 396.00),
(29, '2025-08-03', 6, 0.00, 0.00, 150.00),
(30, '2025-08-04', 0, 0.00, 0.00, 0.00),
(31, '2025-08-04', 0, 0.00, 0.00, 0.00),
(32, '2025-08-04', 0, 0.00, 0.00, 0.00),
(33, '2025-08-04', 0, 0.00, 0.00, 0.00),
(34, '2025-08-04', 4, 0.00, 0.00, 1500.00),
(35, '2025-08-04', 6, 0.00, 0.00, 1160.00),
(36, '2025-08-04', 6, 0.00, 0.00, 1740.00),
(37, '2025-08-04', 6, 0.00, 0.00, 280.00),
(38, '2025-08-04', 6, 0.00, 0.00, 570.00),
(39, '2025-08-04', 1, 0.00, 0.00, 570.00),
(40, '2025-08-04', 6, 0.00, 0.00, 84.00),
(41, '2025-08-04', 3, 0.00, 0.00, 580.00),
(42, '2025-08-05', 0, 0.00, 0.00, 0.00),
(43, '2025-08-05', 0, 0.00, 0.00, 0.00),
(44, '2025-08-05', 0, 0.00, 0.00, 0.00),
(45, '2025-08-05', 1, 0.00, 0.00, 285.00),
(46, '2025-08-05', 6, 0.00, 0.00, 290.00),
(47, '2025-08-05', 0, 0.00, 0.00, 0.00),
(48, '2025-08-05', 0, 0.00, 0.00, 0.00),
(49, '2025-08-05', 0, 0.00, 0.00, 0.00),
(50, '2025-08-05', 6, 0.00, 0.00, 56.00),
(51, '2025-08-05', 0, 0.00, 0.00, 0.00),
(52, '2025-08-05', 0, 0.00, 0.00, 0.00),
(53, '2025-08-05', 0, 0.00, 0.00, 0.00),
(54, '2025-08-05', 0, 0.00, 0.00, 0.00),
(55, '2025-08-05', 3, 75.00, 40.00, 723.00),
(56, '2025-08-05', 7, 75.00, 20.00, 230.00),
(57, '2025-08-05', 0, 0.00, 0.00, 0.00),
(58, '2025-08-05', 0, 0.00, 0.00, 0.00),
(59, '2025-08-05', 7, 5.60, 1.12, 51.52);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contasreceber`
--
ALTER TABLE `contasreceber`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venda_id` (`venda_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendaprodutos`
--
ALTER TABLE `vendaprodutos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venda_id` (`venda_id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `contasreceber`
--
ALTER TABLE `contasreceber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `vendaprodutos`
--
ALTER TABLE `vendaprodutos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `contasreceber`
--
ALTER TABLE `contasreceber`
  ADD CONSTRAINT `contasreceber_ibfk_1` FOREIGN KEY (`venda_id`) REFERENCES `vendas` (`id`),
  ADD CONSTRAINT `contasreceber_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Restrições para tabelas `vendaprodutos`
--
ALTER TABLE `vendaprodutos`
  ADD CONSTRAINT `vendaprodutos_ibfk_1` FOREIGN KEY (`venda_id`) REFERENCES `vendas` (`id`),
  ADD CONSTRAINT `vendaprodutos_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `vendaprodutos_ibfk_3` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
