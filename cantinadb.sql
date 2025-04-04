-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/04/2025 às 22:34
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cantinadb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `adm`
--

CREATE TABLE `adm` (
  `id_adm` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `admStatus` enum('ativo','inativo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `adm`
--

INSERT INTO `adm` (`id_adm`, `user`, `email`, `senha`, `admStatus`) VALUES
(7, 'teste1', 'teste@gmail.com', '$2y$10$hqnR7AKsPY09kXqgoVQ1vOdnxxRhE3xlipUr/sIU36B06sKKg4GwW', 'ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `sobrenome` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `matricula` char(15) NOT NULL,
  `telefone` char(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `nome`, `sobrenome`, `email`, `senha`, `matricula`, `telefone`) VALUES
(4, 'Rafael', 'Rodrigues dos Santos', 'rafa.rodriques12@gmail.com', '$2y$10$Y0dptEJQBDgpCjotAOSacexl/HaO2OF4KOUSK1200kiMfP4/6QYt.', '11111111', '67991924837');

-- --------------------------------------------------------

--
-- Estrutura para tabela `item_pedido`
--

CREATE TABLE `item_pedido` (
  `id_item_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `quatidade` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Acionadores `item_pedido`
--
DELIMITER $$
CREATE TRIGGER `baixa_estoque` AFTER INSERT ON `item_pedido` FOR EACH ROW BEGIN
 
    UPDATE produto
   SET quatidade = quantidade - 1
     WHERE id_produto = NEW.id_produto;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id_pagamento` int(11) NOT NULL,
  `StatusPagamento` char(2) NOT NULL,
  `tipoPagamento` enum('Pix','Debito','Credito','Local') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_item_pedido` int(11) NOT NULL,
  `horario` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido_pagamento`
--

CREATE TABLE `pedido_pagamento` (
  `id_pedido_pagamento` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_pagamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `categoria` enum('doce','lanche','bebida') DEFAULT NULL,
  `quatidade` int(11) DEFAULT NULL,
  `descricao` longtext NOT NULL,
  `valor_nutricional` longtext NOT NULL,
  `preco` float(10,2) NOT NULL,
  `produtcStatus` enum('ativo','inativo') DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `categoria`, `quatidade`, `descricao`, `valor_nutricional`, `preco`, `produtcStatus`, `foto`) VALUES
(1, 'Produto 134', 'lanche', 3, '                                \r\n                            ddddddddddddddd                            ', '                                    \r\n                                dddddddddddddddddd                                ', 105.00, 'ativo', '../../Public/img/upload/67f013474c051.png'),
(2, 'Produto 2', 'lanche', 2, 'dddddddddddddd\r\n                            ', '\r\n                             dddddddddddddddddddd   ', 10.50, 'ativo', '../../Public/img/upload/67eff48476d50.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `relatorio_venda`
--

CREATE TABLE `relatorio_venda` (
  `id_relatorio_venda` int(11) NOT NULL,
  `dia_relatorio` date NOT NULL,
  `horario_relatorio` time NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id_adm`);

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Índices de tabela `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD PRIMARY KEY (`id_item_pedido`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_aluno` (`id_aluno`);

--
-- Índices de tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_pagamento`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_item_pedido` (`id_item_pedido`);

--
-- Índices de tabela `pedido_pagamento`
--
ALTER TABLE `pedido_pagamento`
  ADD PRIMARY KEY (`id_pedido_pagamento`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_pagamento` (`id_pagamento`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `relatorio_venda`
--
ALTER TABLE `relatorio_venda`
  ADD PRIMARY KEY (`id_relatorio_venda`),
  ADD KEY `id_produto` (`id_produto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido_pagamento`
--
ALTER TABLE `pedido_pagamento`
  MODIFY `id_pedido_pagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `relatorio_venda`
--
ALTER TABLE `relatorio_venda`
  MODIFY `id_relatorio_venda` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD CONSTRAINT `item_pedido_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`),
  ADD CONSTRAINT `item_pedido_ibfk_2` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id_aluno`);

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_item_pedido`) REFERENCES `item_pedido` (`id_item_pedido`);

--
-- Restrições para tabelas `pedido_pagamento`
--
ALTER TABLE `pedido_pagamento`
  ADD CONSTRAINT `pedido_pagamento_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `pedido_pagamento_ibfk_2` FOREIGN KEY (`id_pagamento`) REFERENCES `pagamento` (`id_pagamento`);

--
-- Restrições para tabelas `relatorio_venda`
--
ALTER TABLE `relatorio_venda`
  ADD CONSTRAINT `relatorio_venda_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
