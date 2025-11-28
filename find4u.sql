-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Nov-2025 às 16:44
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dados: `find4u`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

DROP TABLE IF EXISTS `anuncio`;
CREATE TABLE IF NOT EXISTS `anuncio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `preco` decimal(10,0) NOT NULL,
  `tipologia` varchar(45) NOT NULL,
  `area` int NOT NULL,
  `caracteristicasadicionais` varchar(100) NOT NULL,
  `datapublicacao` datetime NOT NULL,
  `dataexpiracao` datetime NOT NULL,
  `userprofileid` int NOT NULL,
  `categoriaid` int NOT NULL,
  `localizacaoid` int NOT NULL,
  `estadoanuncioid` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_userprofile` (`userprofileid`),
  KEY `idx_categoria` (`categoriaid`),
  KEY `idx_localizacao` (`localizacaoid`),
  KEY `idx_estadoanuncio` (`estadoanuncioid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `anuncio`
--

INSERT INTO `anuncio` (`id`, `titulo`, `descricao`, `preco`, `tipologia`, `area`, `caracteristicasadicionais`, `datapublicacao`, `dataexpiracao`, `userprofileid`, `categoriaid`, `localizacaoid`, `estadoanuncioid`) VALUES
(2, 'HOUSE', 'big house', 20000, 'T4', 500, 'bonito', '2025-11-24 21:31:08', '2026-02-24 21:31:08', 5, 1, 1, 2),
(3, 'school', 'done', 20000, 'T3', 500, 'asda', '2025-11-25 14:03:24', '2026-02-25 14:03:24', 5, 2, 1, 1),
(4, 'House', 'GOOD ', 222, 'T1', 22, 'asdasd', '2025-11-26 16:28:48', '2026-02-26 16:28:48', 5, 1, 21, 1),
(5, 'tou farto', 'disto ', 22, 'T2', 44, 'sdasdad', '2025-11-26 16:29:55', '2026-02-26 16:29:55', 5, 1, 22, 1),
(6, 'new', 'ookay', 33, 'T4', 456, 'aDAS', '2025-11-26 16:38:25', '2026-02-26 16:38:25', 5, 2, 23, 1),
(7, 'IPL', 'Escola cansada', 250000, 'T50', 5000, 'Escola muito cansada ', '2025-11-26 23:19:12', '2026-02-26 23:19:12', 5, 2, 24, 1),
(8, 'House1234', 'GOOD ', 222, 'T7', 444, 'asdasd', '2025-11-27 11:07:03', '2026-02-27 11:07:03', 5, 2, 25, 1),
(9, 'Teste FOto', 'NEw Photos', 1234, 'T1', 45, 'I think it worked ', '2025-11-28 11:33:13', '2026-02-28 11:33:13', 6, 1, 26, 1),
(10, 'shit', 'dome', 200, 'T4', 44, 'sdsa', '2025-11-28 16:38:07', '2026-02-28 16:38:07', 5, 1, 27, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` int DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '31', 1762713319),
('anunciante', '30', 1762627912),
('anunciante', '32', 1764339843),
('anunciante', '33', 1764242357),
('comprador', '29', 1762627031);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `rule_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('acessoDashboard', 2, 'Acesso a dashboard da pagina para anunciante', NULL, NULL, 1762448600, 1762448600),
('acessoDashboardBackEnd', 2, 'Acesso a dashboard do Backend', NULL, NULL, 1762448600, 1762448600),
('adicionarFavoritos', 2, 'Adicionar Favoritos', NULL, NULL, 1762448600, 1762448600),
('admin', 1, NULL, NULL, NULL, 1762448600, 1762448600),
('agendarVisita', 2, 'Agendar visitas para o anuncio publicado', NULL, NULL, 1762448600, 1762448600),
('anunciante', 1, NULL, NULL, NULL, 1762448600, 1762448600),
('aprovarDenuncia', 2, 'Acesso a aprovação/reprovação de denúncia', NULL, NULL, 1762448600, 1762448600),
('comprador', 1, NULL, NULL, NULL, 1762448600, 1762448600),
('criarAnuncio', 2, 'Criar anúncio', NULL, NULL, 1762448600, 1762448600),
('criarLeilao', 2, 'Criar Leilao do anunciante', NULL, NULL, 1762448600, 1762448600),
('criarlocalizacao', 2, 'Criar uma localização', NULL, NULL, 1762448600, 1762448600),
('criarUtilizador', 2, 'Criar Utilizador', NULL, NULL, 1762448600, 1762448600),
('editarAnuncio', 2, 'Editar Anúncio', NULL, NULL, 1762448600, 1762448600),
('editarlocalizacao', 2, 'Editar uma localização', NULL, NULL, 1762448600, 1762448600),
('editarUtilizador', 2, 'Editar Utilizador', NULL, NULL, 1762448600, 1762448600),
('eliminarAnuncio', 2, 'Eliminar Anúncio', NULL, NULL, 1762448600, 1762448600),
('eliminarAnuncioBack', 2, 'Eliminar Anuncio', NULL, NULL, 1762448600, 1762448600),
('eliminarcomentario', 2, 'Eliminar uma comentário', NULL, NULL, 1762448600, 1762448600),
('eliminarFavoritos', 2, 'Eliminar Favoritos', NULL, NULL, 1762448600, 1762448600),
('eliminarlocalizacao', 2, 'Eliminar uma localização', NULL, NULL, 1762448600, 1762448600),
('eliminarUtilizador', 2, 'Eliminar Utilizador', NULL, NULL, 1762448600, 1762448600),
('fazerComentarios', 2, 'Fazer Comentarios', NULL, NULL, 1762448600, 1762448600),
('fazerDenuncia', 2, 'Fazer Denuncia', NULL, NULL, 1762448600, 1762448600),
('fazerReview', 2, 'Fazer Review', NULL, NULL, 1762448600, 1762448600),
('gestor', 1, NULL, NULL, NULL, 1762448600, 1762448600),
('marcarVisita', 2, 'Marcar Visita', NULL, NULL, 1762448600, 1762448600),
('participarLeilao', 2, 'Participar em Leilão', NULL, NULL, 1762448600, 1762448600),
('verCatalogo', 2, 'Ver Catálogo', NULL, NULL, 1762448600, 1762448600),
('verDetalhesAnuncio', 2, 'Ver Detalhes Anuncio', NULL, NULL, 1762448600, 1762448600),
('verDetalhesLeilao', 2, 'Ver detalhes do leilao criado', NULL, NULL, 1762448600, 1762448600),
('verPerfil', 2, 'Ver Perfil', NULL, NULL, 1762448600, 1762448600),
('visualizarComentariosAnuncio', 2, 'VIsualizar comentarios de cada anuncio do respetivo user', NULL, NULL, 1762448600, 1762448600),
('visualizarFavoritos', 2, 'Visualizar Favoritos', NULL, NULL, 1762448600, 1762448600),
('visualizarImoveisPublicados', 2, 'Visualizar Imoveis Publicados do respetivo user', NULL, NULL, 1762448600, 1762448600),
('visualizarLeads', 2, 'Visualizar Leads do anunciante', NULL, NULL, 1762448600, 1762448600),
('visualizarReviewAnuncio', 2, 'VIsualizar review de cada anuncio do respetivo user', NULL, NULL, 1762448600, 1762448600);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('anunciante', 'acessoDashboard'),
('gestor', 'acessoDashboardBackEnd'),
('comprador', 'adicionarFavoritos'),
('anunciante', 'agendarVisita'),
('gestor', 'aprovarDenuncia'),
('anunciante', 'comprador'),
('anunciante', 'criarAnuncio'),
('anunciante', 'criarLeilao'),
('gestor', 'criarlocalizacao'),
('admin', 'criarUtilizador'),
('anunciante', 'editarAnuncio'),
('gestor', 'editarlocalizacao'),
('admin', 'editarUtilizador'),
('admin', 'eliminarAnuncio'),
('anunciante', 'eliminarAnuncio'),
('gestor', 'eliminarcomentario'),
('comprador', 'eliminarFavoritos'),
('gestor', 'eliminarlocalizacao'),
('admin', 'eliminarUtilizador'),
('comprador', 'fazerComentarios'),
('comprador', 'fazerDenuncia'),
('comprador', 'fazerReview'),
('admin', 'gestor'),
('comprador', 'marcarVisita'),
('comprador', 'participarLeilao'),
('comprador', 'verCatalogo'),
('comprador', 'verDetalhesAnuncio'),
('anunciante', 'verDetalhesLeilao'),
('comprador', 'verPerfil'),
('anunciante', 'visualizarComentariosAnuncio'),
('comprador', 'visualizarFavoritos'),
('anunciante', 'visualizarImoveisPublicados'),
('anunciante', 'visualizarLeads'),
('anunciante', 'visualizarReviewAnuncio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `descricao`) VALUES
(1, 'Apartamento', 'idk '),
(2, 'moradia', 'idek');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comentario` varchar(45) NOT NULL,
  `data` varchar(45) NOT NULL,
  `userprofileid` int NOT NULL,
  `anuncioid` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_comentario_userprofile` (`userprofileid`),
  KEY `idx_comentario_anuncio` (`anuncioid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncia`
--

DROP TABLE IF EXISTS `denuncia`;
CREATE TABLE IF NOT EXISTS `denuncia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `motivo` varchar(45) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `datadenuncia` datetime NOT NULL,
  `userprofileid` int NOT NULL,
  `anuncioid` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_denuncia_userprofile` (`userprofileid`),
  KEY `idx_denuncia_anuncio` (`anuncioid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estadoanuncio`
--

DROP TABLE IF EXISTS `estadoanuncio`;
CREATE TABLE IF NOT EXISTS `estadoanuncio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `estadoanuncio`
--

INSERT INTO `estadoanuncio` (`id`, `estado`, `descricao`) VALUES
(1, 'Ativo ', 'Anuncio criado e ativo '),
(2, 'Desativado', 'Pausar ou desativar anuncio'),
(3, 'Expirado', 'Anuncio expirou os 3 meses');

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorito`
--

DROP TABLE IF EXISTS `favorito`;
CREATE TABLE IF NOT EXISTS `favorito` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userprofileid` int NOT NULL,
  `anuncioid` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_fav_userprofile` (`userprofileid`),
  KEY `idx_fav_anuncio` (`anuncioid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto`
--

DROP TABLE IF EXISTS `foto`;
CREATE TABLE IF NOT EXISTS `foto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomefoto` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ordem` int DEFAULT NULL,
  `anuncioid` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_foto_anuncio` (`anuncioid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `foto`
--

INSERT INTO `foto` (`id`, `nomefoto`, `ordem`, `anuncioid`) VALUES
(1, 'jCAASPfC9yXwMmjVeGqQkO2p37K-M0Dj.png', 1, 4),
(2, 'xrHIt64HKv3qi-BKalziZe55axEtZlzk.png', 1, 5),
(3, 'nDIbQfLreGiCwroMf8-96ncIbUdL4AW9.png', 1, 6),
(4, 'rnrNhVHLtxTyPYoNi451j6DoBHYScb6t.png', 1, 2),
(5, 'X29Jh0LQdUihepmmpBbCaTGZ_BTd2zbb.png', 1, 7),
(6, '7NDQerV2zIH2dhdI2NbW_vnQNk-fXmEP.png', 1, 8),
(7, '4yK6gPfmlZarK_rBbobwTLJz9hxqxna2.png', 1, 9),
(8, '98sPx3p1NJQiXlOqSMJJEmXYyeBMGRkm.png', 1, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
--

DROP TABLE IF EXISTS `localizacao`;
CREATE TABLE IF NOT EXISTS `localizacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `distrito` varchar(45) NOT NULL,
  `concelho` varchar(45) NOT NULL,
  `freguesia` varchar(45) NOT NULL,
  `moradacompleta` varchar(45) NOT NULL,
  `porta` int NOT NULL,
  `escolas` tinyint NOT NULL,
  `transportes` tinyint NOT NULL,
  `supermercados` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `localizacao`
--

INSERT INTO `localizacao` (`id`, `distrito`, `concelho`, `freguesia`, `moradacompleta`, `porta`, `escolas`, `transportes`, `supermercados`) VALUES
(1, 'Leiria', 'Leiria', 'Monte Real', 'Rua 123 do abc', 12, 1, 2, 3),
(2, 'Leiria', 'Leiria', 'Leiria', 'RUA DE LEIRIA', 1221, 2, 1, 3),
(19, 'Leiria', 'Leiria', 'Leiria', 'RUA DE LEIRIA', 2, 2, 2, 2),
(20, 'Leiria', 'Leiria', 'Leiria', 'RUA DE LEIRIA', 2, 2, 1, 3),
(21, 'Leiria', 'Leiria', 'Leiria', 'RUA DE LEIRIA', 2, 2, 1, 3),
(22, 'Leiria', 'Leiria', 'monte ', 'RUA Do monte', 2, 2, 3, 3),
(23, 'Aveiro', 'Avei', 'AV', 'Rua de aveiro', 44, 2, 1, 0),
(24, 'Leiria', 'Leiria', 'Leiria ', 'Rua dos estudantes ', 22, 1, 5, 1),
(25, 'Leiria', 'Leiria', 'Monte Real', 'Rua 12344', 121, 2, 2, 1),
(26, 'Lisbon', 'sintra', 'Sintra', 'Rua da serra', 45, 3, 0, 2),
(27, 'Leiria', 'Avei', 'Sintra', 'RUA Do monte', 121, 10, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1762448521),
('m130524_201442_init', 1762448523),
('m190124_110200_add_verification_token_column_to_user_table', 1762448523),
('m140506_102106_rbac_init', 1762448584),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1762448584),
('m180523_151638_rbac_updates_indexes_without_prefix', 1762448584),
('m200409_110543_rbac_update_mssql_trigger', 1762448584);

-- --------------------------------------------------------

--
-- Estrutura da tabela `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id` int NOT NULL AUTO_INCREMENT,
  `classificacao` int NOT NULL,
  `userprofileid` int NOT NULL,
  `anuncioid` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_review_userprofile` (`userprofileid`),
  KEY `idx_review_anuncio` (`anuncioid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `stats`
--

DROP TABLE IF EXISTS `stats`;
CREATE TABLE IF NOT EXISTS `stats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userprofileid` int NOT NULL,
  `anuncioid` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_stats_userprofile` (`userprofileid`),
  KEY `idx_stats_anuncio` (`anuncioid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'test_auth_key_1234567890abcdef', '$2y$13$e0NRjU9sGcRjCYDhUTaHaex3Ck1ZfPOpHYYrWq4Q4eB6HXYAi/9XO', NULL, 'admin@example.com', 10, 1762462667, 1762462667, NULL),
(29, 'teste1', 'holgi2LMvQKZVCVbVKNBAJVawgBePOP9', '$2y$13$ZhaRAHZHSUAHZvaT/DmWOupkbTbMfxYVdm2zzz/esexkzrn11wViO', NULL, 'teste1@teste1.com', 10, 1762627031, 1762627031, 'QCXt8pc4YHN3rW84rnkApaINutZ4mz2v_1762627031'),
(30, 'mateus', 'OaPtng6cIeQl-9TtxUsaV_pwq_gMDe0h', '$2y$13$jsrjk7LDF1a09gGR.166cewsVUnDbDzt6TKudjrKBzNw.fxortqju', NULL, 'mateusdrodrigues05@gmail.com', 10, 1762627912, 1762627912, '1r2c12xu18x_KUM3OQTmraKnHJcc_DfN_1762627912'),
(31, 'admin2', 'EU72OQ-Ml3Ent-A54qVdGw7QbYhY4Cp_', '$2y$13$5xkYZwjC3omIMi0RA1JE9uluU1QRB5jpj2IhgK6HZTtVo7rM.LY1q', NULL, 'admin2@admin2.com', 10, 1762713318, 1762713318, 'uflv6KrtA_U1zzkUOHnFZSHHZIlHXH04_1762713318'),
(32, 'duarte1234', 'A4RU3ebK4k_1b7rJozC_IZRXOiVQAnZn', '$2y$13$VYy6bmyX.HuOYmRoZGFPfuzVPg.N6jiVBwk86vX3TGjMaafLISN/W', NULL, 'duarte12345@gmail.com', 10, 1762869235, 1764339843, 'LogWzSCsaBBH5X40UY0nZvllCJgZDlbr_1762869235'),
(33, 'durtas', 'jor_gwFsD1k2F0Llocn1_fRb0AEMxeTJ', '$2y$13$rWOQScvrrKhPldp4LjFozO2zYKaXrRN3uuRJrRMunVuB5BezTqngm', NULL, 'durtas@mail.pt', 10, 1764242338, 1764242357, 'tH1-vrnAjvFVO7KH2OJsbsRZnhGh5uOu_1764242338');

-- --------------------------------------------------------

--
-- Estrutura da tabela `userprofile`
--

DROP TABLE IF EXISTS `userprofile`;
CREATE TABLE IF NOT EXISTS `userprofile` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `contacto` int NOT NULL,
  `fotoperfil` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `contabloqueda` tinyint(1) NOT NULL,
  `dataregisto` datetime NOT NULL,
  `user_id` int NOT NULL,
  `localizacao` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userprofile_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `userprofile`
--

INSERT INTO `userprofile` (`id`, `nome`, `contacto`, `fotoperfil`, `contabloqueda`, `dataregisto`, `user_id`, `localizacao`) VALUES
(1, 'admin', 123456789, NULL, 0, '0000-00-00 00:00:00', 1, NULL),
(2, 'teste1', 123456789, NULL, 0, '2025-11-08 18:37:11', 29, NULL),
(3, 'mateus', 123456789, NULL, 0, '2025-11-08 18:51:52', 30, NULL),
(4, 'admin2', 123456789, NULL, 0, '2025-11-09 18:35:19', 31, NULL),
(5, 'duarte', 925060152, NULL, 0, '2025-11-11 13:53:55', 32, NULL),
(6, 'Duarte', 123456789, NULL, 0, '2025-11-27 11:18:58', 33, 'Monte Real');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

DROP TABLE IF EXISTS `utilizador`;
CREATE TABLE IF NOT EXISTS `utilizador` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(45) NOT NULL,
  `contacto` int NOT NULL,
  `fotoperfil` varchar(45) NOT NULL,
  `contabloqueda` tinyint NOT NULL,
  `dataregisto` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `visita`
--

DROP TABLE IF EXISTS `visita`;
CREATE TABLE IF NOT EXISTS `visita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datahoraagenda` datetime NOT NULL,
  `estado` varchar(45) NOT NULL,
  `notas` varchar(45) NOT NULL,
  `datacriacao` datetime NOT NULL,
  `userprofileid` int NOT NULL,
  `anuncioid` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_visita_userprofile` (`userprofileid`),
  KEY `idx_visita_anuncio` (`anuncioid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `anuncio`
--
ALTER TABLE `anuncio`
  ADD CONSTRAINT `fk_anuncio_categoria` FOREIGN KEY (`categoriaid`) REFERENCES `categoria` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_anuncio_estadoanuncio` FOREIGN KEY (`estadoanuncioid`) REFERENCES `estadoanuncio` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_anuncio_localizacao` FOREIGN KEY (`localizacaoid`) REFERENCES `localizacao` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_anuncio_userprofile` FOREIGN KEY (`userprofileid`) REFERENCES `userprofile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_anuncio` FOREIGN KEY (`anuncioid`) REFERENCES `anuncio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comentario_userprofile` FOREIGN KEY (`userprofileid`) REFERENCES `userprofile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `denuncia`
--
ALTER TABLE `denuncia`
  ADD CONSTRAINT `fk_denuncia_anuncio` FOREIGN KEY (`anuncioid`) REFERENCES `anuncio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_denuncia_userprofile` FOREIGN KEY (`userprofileid`) REFERENCES `userprofile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `fk_favorito_anuncio` FOREIGN KEY (`anuncioid`) REFERENCES `anuncio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_favorito_userprofile` FOREIGN KEY (`userprofileid`) REFERENCES `userprofile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `fk_foto_anuncio` FOREIGN KEY (`anuncioid`) REFERENCES `anuncio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_review_anuncio` FOREIGN KEY (`anuncioid`) REFERENCES `anuncio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_review_userprofile` FOREIGN KEY (`userprofileid`) REFERENCES `userprofile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `stats`
--
ALTER TABLE `stats`
  ADD CONSTRAINT `fk_stats_anuncio` FOREIGN KEY (`anuncioid`) REFERENCES `anuncio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_stats_userprofile` FOREIGN KEY (`userprofileid`) REFERENCES `userprofile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `fk_userprofile_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `fk_visita_anuncio` FOREIGN KEY (`anuncioid`) REFERENCES `anuncio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_visita_userprofile` FOREIGN KEY (`userprofileid`) REFERENCES `userprofile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
