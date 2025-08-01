-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 01-Ago-2025 às 19:15
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemavendas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
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
  `obs` text,
  `limite` decimal(10,2) DEFAULT '0.00',
  `bloqueado` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `tipo`, `nome`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `rg`, `cpf`, `cnpj`, `insc`, `celular`, `instagram`, `obs`, `limite`, `bloqueado`) VALUES
(1, 'fisica', 'WESLEY DE OLIVEIRA', 'rua santo pio x', '701', 'casa', 'sÃ£o josÃ©', '', 'mg', '35633-250', 'mg10397993', '04218505667', '', '', '37988260767', '@wesley', '', '500.00', 'nao'),
(3, 'fisica', 'maria da silva', 'rua brasilia', '500', 'casa', 'jardim america', '', 'mg', '35633075', 'mg14587563', '01458698256', '', '', '37945697852', '@mariadasilva', '', '700.00', 'nao'),
(4, 'juridica', 'auto peÃ§as bom despacho ltda.', 'av. bandeirantes', '80', 'loja', 'dom joaquim', 'bom despacho', 'mg', '35633250', '', '', '16742041000193', '074074000185', '37988260761', '@autopecasbomdespacho', '', '1000.00', 'nao'),
(5, 'juridica', 'jaçanã', 'rua domingos', '50', 'casa', 'martins miranda', 'araçatuba', 'sp', '75423852', '', '', '123456791', '123654987654', '1175864253', '@jacana', '', '350.00', 'nao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
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
  `obs` text,
  `limite` decimal(10,2) DEFAULT '0.00',
  `bloqueado` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `tipo`, `nome`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `rg`, `cpf`, `cnpj`, `insc`, `celular`, `instagram`, `obs`, `limite`, `bloqueado`) VALUES
(1, 'juridica', 'AUTO PEÇAS BOM DESPACHO LTDA', 'Avenida Bandeirantes', '180', 'loja', 'Dom Joaquim', 'Bom Despacho', 'mg', '35633250', '', '', '16742041000193', '0741124520098', '37999851496', '@autopecasbomdespacho', '', '500.00', 'sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `descricao` text,
  `unid` varchar(10) NOT NULL,
  `custo` decimal(10,2) NOT NULL,
  `margem` decimal(5,2) NOT NULL,
  `venda` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL DEFAULT '0',
  `obs` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `referencia`, `descricao`, `unid`, `custo`, `margem`, `venda`, `estoque`, `obs`, `imagem`, `criado_em`) VALUES
(1, 'UB314', 'BOMBA DAGUA', 'pc', '150.00', '90.00', '285.00', 2, 'URBA', NULL, '2025-07-22 14:33:10'),
(2, '00516B', 'RET. RODA TRAZ.', 'pc', '15.00', '86.67', '28.00', 5, 'SABO', NULL, '2025-07-22 18:18:55'),
(3, '1932060', 'HELICE', 'pc', '60.00', '83.33', '110.00', 3, 'MODEFER', NULL, '2025-07-22 18:19:21'),
(5, 'ur1313rl', 'reparo bomba dagua', 'jg', '90.00', '66.67', '150.00', 2, 'urba', NULL, '2025-07-23 11:34:02'),
(6, 'n533', 'terminal direcao', 'pc', '115.00', '72.17', '198.00', 4, 'nakata', NULL, '2025-07-23 11:35:02'),
(7, 'r04677', 'anel sincronizado', 'pc', '198.00', '46.46', '290.00', 2, 'motopeÃ§as', 'imagens/1caf36a16556b8738f2c0d7e26a5370e.jpg', '2025-07-23 18:38:49'),
(8, 'r04696', 'bucha flangeada', 'pc', '135.00', '46.67', '198.00', 2, 'motopeÃ§as', 'imagens/sem_imagem.jpg', '2025-07-23 19:05:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendaprodutos`
--

CREATE TABLE `vendaprodutos` (
  `id` int(11) NOT NULL,
  `venda_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `quant_venda` int(11) NOT NULL,
  `valor_unit` decimal(10,2) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendaprodutos`
--

INSERT INTO `vendaprodutos` (`id`, `venda_id`, `cliente_id`, `produto_id`, `quant_venda`, `valor_unit`, `valor_total`) VALUES
(1, 17, 1, 1, 3, '285.00', '855.00'),
(2, 17, 1, 5, 3, '150.00', '450.00'),
(3, 17, 1, 7, 3, '290.00', '870.00'),
(4, 17, 1, 8, 3, '198.00', '594.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `data_emissao` date DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `total_venda` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `data_emissao`, `cliente_id`, `total_venda`) VALUES
(10, '2025-07-31', 1, '285.00'),
(11, '2025-07-31', 3, '575.00'),
(12, '2025-08-01', 0, '0.00'),
(13, '2025-08-01', 1, '440.00'),
(14, '2025-08-01', 3, '483.00'),
(15, '2025-08-01', 0, '0.00'),
(16, '2025-08-01', 0, '0.00'),
(17, '2025-08-01', 1, '2769.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendaprodutos`
--
ALTER TABLE `vendaprodutos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venda_id` (`venda_id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `vendaprodutos`
--
ALTER TABLE `vendaprodutos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `vendaprodutos`
--
ALTER TABLE `vendaprodutos`
  ADD CONSTRAINT `vendaprodutos_ibfk_1` FOREIGN KEY (`venda_id`) REFERENCES `vendas` (`id`),
  ADD CONSTRAINT `vendaprodutos_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `vendaprodutos_ibfk_3` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
