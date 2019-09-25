-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Jun-2019 às 17:46
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdconfeitaria`
--
CREATE DATABASE IF NOT EXISTS `bdconfeitaria` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bdconfeitaria`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `calendario`
--

CREATE TABLE `calendario` (
  `codcalendario` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cor` varchar(10) DEFAULT NULL,
  `datainicio` datetime DEFAULT NULL,
  `datafim` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `calendario`
--

INSERT INTO `calendario` (`codcalendario`, `nome`, `cor`, `datainicio`, `datafim`) VALUES
(1, 'Bolo', '#00FFFF', '2019-04-23 00:00:00', '2019-04-25 00:00:00'),
(2, 'Bolo', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho_cupom`
--

CREATE TABLE `carrinho_cupom` (
  `cupom_id` int(11) NOT NULL,
  `cupom_titulo` varchar(255) NOT NULL,
  `cupom_desconto` int(11) NOT NULL,
  `cupom_inicio` datetime NOT NULL,
  `cupom_final` datetime NOT NULL,
  `cupom_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carrinho_cupom`
--

INSERT INTO `carrinho_cupom` (`cupom_id`, `cupom_titulo`, `cupom_desconto`, `cupom_inicio`, `cupom_final`, `cupom_status`) VALUES
(1, 'DESCONTO10', 10, '2017-01-20 00:00:00', '2017-01-31 00:00:00', 2),
(2, 'VALE50', 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho_pedidos`
--

CREATE TABLE `carrinho_pedidos` (
  `pedido_id` int(11) NOT NULL,
  `pedido_produto` int(11) NOT NULL,
  `pedido_quantidade` int(11) NOT NULL,
  `pedido_preco` decimal(10,2) NOT NULL,
  `pedido_valor_total` decimal(10,2) NOT NULL,
  `pedido_cliente` varchar(255) NOT NULL,
  `pedido_data` datetime NOT NULL,
  `pedido_sessao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carrinho_pedidos`
--

INSERT INTO `carrinho_pedidos` (`pedido_id`, `pedido_produto`, `pedido_quantidade`, `pedido_preco`, `pedido_valor_total`, `pedido_cliente`, `pedido_data`, `pedido_sessao`) VALUES
(31, 1, 1, '120.00', '120.00', '', '2019-06-02 23:06:28', 42553),
(32, 1, 1, '120.00', '108.00', '', '2019-06-02 23:07:28', 42553),
(33, 3, 2, '6.00', '6.00', '', '2019-06-08 05:12:45', 69536),
(34, 3, 2, '6.00', '6.00', '', '2019-06-08 05:13:22', 69536),
(35, 3, 2, '6.00', '6.00', '', '2019-06-08 05:19:29', 69536);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho_produtos`
--

CREATE TABLE `carrinho_produtos` (
  `produto_id` int(11) NOT NULL,
  `produto_nome` varchar(255) NOT NULL,
  `produto_preco` decimal(10,2) NOT NULL,
  `produto_quantidade` int(11) NOT NULL,
  `produto_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carrinho_produtos`
--

INSERT INTO `carrinho_produtos` (`produto_id`, `produto_nome`, `produto_preco`, `produto_quantidade`, `produto_img`) VALUES
(1, 'Bolo de Chocolate', '35.00', 15, 'bolobrigadeiro.jpg'),
(2, 'Docinho de Leite Ninho', '3.00', 50, 'doce05.jpg'),
(3, 'Docinho de Churros', '3.00', 100, 'docinhochurros.jpg'),
(4, 'Mousse de Morango', '7.00', 20, 'moussemorango.jpg'),
(5, 'Mousse de MaracujÃ¡', '7.00', 100, 'moussemaracuja.jpg'),
(6, 'Torta de Morango', '30.00', 15, 'morango.jpg'),
(7, 'Torta Holandesa', '25.00', 30, 'tortaholandesa.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho_temporario`
--

CREATE TABLE `carrinho_temporario` (
  `temporario_id` int(11) NOT NULL,
  `temporario_produto` int(11) NOT NULL,
  `temporario_quantidade` int(11) NOT NULL,
  `temporario_preco` decimal(10,2) NOT NULL,
  `temporario_data` datetime NOT NULL,
  `temporario_sessao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carrinho_temporario`
--

INSERT INTO `carrinho_temporario` (`temporario_id`, `temporario_produto`, `temporario_quantidade`, `temporario_preco`, `temporario_data`, `temporario_sessao`) VALUES
(14, 1, 2, '240.00', '2017-01-21 12:00:13', 41291),
(16, 5, 4, '480.00', '2017-01-21 12:14:24', 41291),
(17, 4, 2, '240.00', '2017-01-21 13:41:16', 41291),
(18, 3, 1, '120.00', '2017-01-21 14:12:17', 41291),
(20, 3, 1, '120.00', '2019-06-03 15:11:49', 25726),
(21, 5, 1, '100.00', '2019-06-03 18:08:36', 87414),
(22, 1, 1, '120.00', '2019-06-06 18:20:03', 61588),
(23, 6, 1, '30.00', '2019-06-06 21:57:58', 92500),
(24, 6, 1, '30.00', '2019-06-07 22:36:46', 12476),
(28, 3, 2, '6.00', '2019-06-08 04:45:58', 69536);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `codcategoria` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`codcategoria`, `descricao`) VALUES
(1, 'BOLOS'),
(2, 'TORTAS'),
(4, 'MOUSSES'),
(5, 'DOCINHOS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compraproduto`
--

CREATE TABLE `compraproduto` (
  `codcompraprod` int(11) NOT NULL,
  `codproduto` int(11) NOT NULL,
  `quant_compra` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compraproduto`
--

INSERT INTO `compraproduto` (`codcompraprod`, `codproduto`, `quant_compra`) VALUES
(22, 1, 4),
(24, 3, 3),
(26, 4, 3),
(28, 2, 3),
(33, 5, 3),
(51, 7, 4),
(46, 6, 3),
(126, 8, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `codcontato` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mensagem` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`codcontato`, `nome`, `email`, `mensagem`) VALUES
(3, 'Ana', 'ana@gmail.com', 'oioioi');

-- --------------------------------------------------------

--
-- Estrutura da tabela `descricao`
--

CREATE TABLE `descricao` (
  `coddescricao` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `data` date NOT NULL,
  `codcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `descricao`
--

INSERT INTO `descricao` (`coddescricao`, `titulo`, `descricao`, `data`, `codcategoria`) VALUES
(9, 'Bolos', 'DescriÃ§Ã£o sobre os bolos', '2019-05-09', 1),
(10, 'Tortas', 'DescriÃ§Ã£o sobre as tortas', '2019-05-09', 2),
(11, 'Mousses', 'DescriÃ§Ã£o sobre os mousses', '2019-05-09', 4),
(12, 'Docinhos', 'DescriÃ§Ã£o sobre os docinhos', '2019-05-09', 5),
(13, 'Sabores', 'Brigadeiro e Morango', '2019-05-09', 1),
(14, 'Sabores', 'Brigadeiro e Morango', '2019-05-09', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `data` datetime NOT NULL,
  `evento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `data`, `evento`) VALUES
(3, 'Bolo', '2019-06-08 00:00:00', 'Ana'),
(4, 'Mousse', '2019-06-10 00:00:00', 'Ana');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `codimagem` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `codcategoria` int(11) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `imagem` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`codimagem`, `nome`, `data`, `codcategoria`, `descricao`, `imagem`) VALUES
(9, 'Bolo', '2019-04-30', 1, '', 'bolo04.jpg'),
(11, 'Bolos', '2019-05-07', 1, '', 'bolo03.jpg'),
(15, 'Bolos', '2019-05-07', 1, '', 'bolo02.jpg'),
(16, 'Bolo', '2019-05-09', 1, '', 'bolo01.jpg'),
(17, 'Tortas', '2019-05-09', 2, '', 'alema.jpg'),
(18, 'Tortas', '2019-05-09', 2, '', 'chocolate01.jpg'),
(19, 'Tortas', '2019-05-09', 2, '', 'holandesa.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `cod_pedido` int(11) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `telefone_cliente` int(9) NOT NULL,
  `nome_pedido` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `codproduto` int(11) NOT NULL,
  `nomeproduto` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`codproduto`, `nomeproduto`) VALUES
(1, 'Farinha de Trigo'),
(2, 'Ovo'),
(3, 'Leite'),
(4, 'AÃ§Ãºcar'),
(5, 'Fermento'),
(6, 'Leite Condensado'),
(7, 'Margarina'),
(8, 'Achocolatado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

CREATE TABLE `receita` (
  `cod_receita` int(11) NOT NULL,
  `nome_receita` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `quant_utilizada` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usoproduto`
--

CREATE TABLE `usoproduto` (
  `codusoproduto` int(11) NOT NULL,
  `codproduto` int(11) NOT NULL,
  `quant_uso` float NOT NULL,
  `data` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usoproduto`
--

INSERT INTO `usoproduto` (`codusoproduto`, `codproduto`, `quant_uso`, `data`) VALUES
(36, 3, 3, '2019-06-01'),
(35, 6, 1, '2019-05-31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `codusuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `nomeusuario` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `imgperfil` varchar(100) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codusuario`, `nome`, `email`, `telefone`, `celular`, `endereco`, `nomeusuario`, `senha`, `imgperfil`, `tipo`) VALUES
(2, 'admin', 'admin@gmail.com', '78546421', '85472365', 'Rua admin, 645', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 'Administrador'),
(3, 'ana', 'ana@gmail.com', '123434342', '123424234', 'Rua ana,123', 'ana', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'about-me.jpg', 'UsuÃ¡rio'),
(9, 'Maria', 'maria@gmail.com', '12347722', '9832498', 'Rua Maria, 123', 'maria', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Sun.jpg', 'UsuÃ¡rio'),
(10, 'teste', 'teste@teste.com', '51234715', '9877645', 'teste', 'teste', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'download.png', 'UsuÃ¡rio'),
(11, 'Teste2', 'teste2@gmail.com', '87463567', '786539878', 'Rua teste2, 343', 'teste2', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'download.png', 'UsuÃ¡rio');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`codcalendario`);

--
-- Indexes for table `carrinho_cupom`
--
ALTER TABLE `carrinho_cupom`
  ADD PRIMARY KEY (`cupom_id`);

--
-- Indexes for table `carrinho_pedidos`
--
ALTER TABLE `carrinho_pedidos`
  ADD PRIMARY KEY (`pedido_id`);

--
-- Indexes for table `carrinho_produtos`
--
ALTER TABLE `carrinho_produtos`
  ADD PRIMARY KEY (`produto_id`);

--
-- Indexes for table `carrinho_temporario`
--
ALTER TABLE `carrinho_temporario`
  ADD PRIMARY KEY (`temporario_id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codcategoria`);

--
-- Indexes for table `compraproduto`
--
ALTER TABLE `compraproduto`
  ADD PRIMARY KEY (`codcompraprod`),
  ADD KEY `codproduto` (`codproduto`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`codcontato`);

--
-- Indexes for table `descricao`
--
ALTER TABLE `descricao`
  ADD PRIMARY KEY (`coddescricao`),
  ADD KEY `codcategoria` (`codcategoria`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`codimagem`),
  ADD KEY `codcategoria` (`codcategoria`),
  ADD KEY `descricao` (`descricao`);

--
-- Indexes for table `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`cod_pedido`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`codproduto`);

--
-- Indexes for table `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`cod_receita`);

--
-- Indexes for table `usoproduto`
--
ALTER TABLE `usoproduto`
  ADD PRIMARY KEY (`codusoproduto`),
  ADD KEY `nomeproduto` (`codproduto`),
  ADD KEY `codproduto` (`codproduto`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendario`
--
ALTER TABLE `calendario`
  MODIFY `codcalendario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carrinho_cupom`
--
ALTER TABLE `carrinho_cupom`
  MODIFY `cupom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carrinho_pedidos`
--
ALTER TABLE `carrinho_pedidos`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `carrinho_produtos`
--
ALTER TABLE `carrinho_produtos`
  MODIFY `produto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carrinho_temporario`
--
ALTER TABLE `carrinho_temporario`
  MODIFY `temporario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `codcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `compraproduto`
--
ALTER TABLE `compraproduto`
  MODIFY `codcompraprod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `codcontato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `descricao`
--
ALTER TABLE `descricao`
  MODIFY `coddescricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `imagens`
--
ALTER TABLE `imagens`
  MODIFY `codimagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `cod_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `codproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receita`
--
ALTER TABLE `receita`
  MODIFY `cod_receita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usoproduto`
--
ALTER TABLE `usoproduto`
  MODIFY `codusoproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
