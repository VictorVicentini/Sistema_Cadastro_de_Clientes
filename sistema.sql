-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Set-2021 às 17:42
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rg` varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `facebook` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `rg`, `cpf`, `data_nascimento`, `facebook`, `twitter`, `instagram`, `linkedin`) VALUES
(1, 'Victor Marcelo Vicentini Cavalcante', '35.164.869-0', '361.062.078-10', '1986-10-04', 'https://www.facebook.com/victor.vicentini.56', '', '', ''),
(2, 'Pedro Augusto', '12.548.759-6', '458.962.151-20', '0000-00-00', '', '', '', ''),
(3, 'Fabiana Antunes', '21.321.546-5', '878.745.455-12', '1985-04-16', '', '', '', ''),
(4, 'Carlos Antonio de Abreu', '87.878.454-5', '546.798.321-1', '2019-09-11', '', '', '', ''),
(5, 'Maria Cardoso Gomes', '21.254.554-6', '987.564.113-21', '1978-11-15', '', '', '', ''),
(6, 'Fabricio dos Santos', '54.654.546-6', '857.974.564-65', '1985-06-29', '', '', '', ''),
(7, 'Joana Godoi', '54.213.223-2', '321.545.465-48', '2021-09-14', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(4) NOT NULL,
  `id_cliente` int(4) NOT NULL,
  `tipo_endereco` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logradouro` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complemento` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `id_cliente`, `tipo_endereco`, `logradouro`, `cep`, `numero`, `bairro`, `estado`, `complemento`, `cidade`) VALUES
(1, 1, 'Casa', 'Rua José de Oliveira Zico Preto', '15372-030', '2237', 'Jardim Paraíso 1', 'SP', '', 'Pereira Barreto'),
(2, 1, 'Trabalho', 'Avenida Coronel Jonas Alves de Mello', '15371-250', '2600', 'Vila Municipal', 'SP', 'de 1500 a 2100 - lado par', 'Pereira Barreto'),
(3, 2, 'Casa', 'Rua João Gonçalves Foz', '19060-050', '1800', 'Jardim Marupiara', 'SP', 'de 601/602 ao fim', 'Presidente Prudente'),
(5, 3, 'casa', 'Avenida Coronel Jonas Alves de Mello', '15371-240', '2255', 'Jardim Independência', 'SP', 'de 2414 a 2470 - lado par', 'Pereira Barreto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `id` int(4) NOT NULL,
  `numero` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_contato` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_cliente` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`id`, `numero`, `tipo_contato`, `id_cliente`) VALUES
(1, '(18) 9911-25079', 'Celular', 1),
(2, '(18) 3704-4446', 'Fixo', 1),
(3, '(18) 3695-2255', 'Fixo', 2),
(5, '(12) 1245-4545', 'Fixo', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices para tabela `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `telefone`
--
ALTER TABLE `telefone`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `endereco_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `telefone_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
