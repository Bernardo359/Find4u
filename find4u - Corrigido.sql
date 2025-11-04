-- MySQL Script - Corrigido
-- Schema find4u

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `find4u` DEFAULT CHARACTER SET utf8 ;
USE `find4u` ;

-- -----------------------------------------------------
-- Table `find4u`.`userprofile`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `find4u`.`userprofile` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(55) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `contacto` INT NOT NULL,
  `fotoperfil` VARCHAR(45) NOT NULL,
  `contabloqueda` TINYINT NOT NULL,
  `dataregisto` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `find4u`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `find4u`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `find4u`.`localizacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `find4u`.`localizacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `distrito` VARCHAR(45) NOT NULL,
  `concelho` VARCHAR(45) NOT NULL,
  `freguesia` VARCHAR(45) NOT NULL,
  `moradacompleta` VARCHAR(45) NOT NULL,
  `porta` INT NOT NULL,
  `escolas` TINYINT NOT NULL,
  `transportes` TINYINT NOT NULL,
  `supermercados` TINYINT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `find4u`.`estadoanuncio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `find4u`.`estadoanuncio` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `find4u`.`anuncio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `find4u`.`anuncio` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  `preco` DECIMAL NOT NULL,
  `tipologia` VARCHAR(45) NOT NULL,
  `area` INT NOT NULL,
  `caracteristicasadicionais` VARCHAR(100) NOT NULL,
  `datapublicacao` DATETIME NOT NULL,
  `dataexpiracao` DATETIME NOT NULL,
  `userprofileid` INT NOT NULL,
  `categoriaid` INT NOT NULL,
  `localizacaoid` INT NOT NULL,
  `estadoanuncioid` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_userprofile` (`userprofileid`),
  INDEX `idx_categoria` (`categoriaid`),
  INDEX `idx_localizacao` (`localizacaoid`),
  INDEX `idx_estadoanuncio` (`estadoanuncioid`),
  CONSTRAINT `fk_anuncio_userprofile`
    FOREIGN KEY (`userprofileid`)
    REFERENCES `find4u`.`userprofile` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_anuncio_categoria`
    FOREIGN KEY (`categoriaid`)
    REFERENCES `find4u`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_anuncio_localizacao`
    FOREIGN KEY (`localizacaoid`)
    REFERENCES `find4u`.`localizacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_anuncio_estadoanuncio`
    FOREIGN KEY (`estadoanuncioid`)
    REFERENCES `find4u`.`estadoanuncio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `find4u`.`stats`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `find4u`.`stats` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userprofileid` INT NOT NULL,
  `anuncioid` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_stats_userprofile` (`userprofileid`),
  INDEX `idx_stats_anuncio` (`anuncioid`),
  CONSTRAINT `fk_stats_userprofile`
    FOREIGN KEY (`userprofileid`)
    REFERENCES `find4u`.`userprofile` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_stats_anuncio`
    FOREIGN KEY (`anuncioid`)
    REFERENCES `find4u`.`anuncio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `find4u`.`favorito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `find4u`.`favorito` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userprofileid` INT NOT NULL,
  `anuncioid` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_fav_userprofile` (`userprofileid`),
  INDEX `idx_fav_anuncio` (`anuncioid`),
  CONSTRAINT `fk_favorito_userprofile`
    FOREIGN KEY (`userprofileid`)
    REFERENCES `find4u`.`userprofile` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_favorito_anuncio`
    FOREIGN KEY (`anuncioid`)
    REFERENCES `find4u`.`anuncio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `find4u`.`foto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `find4u`.`foto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nomefoto` VARCHAR(45) NOT NULL,
  `ordem` INT NULL,
  `anuncioid` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_foto_anuncio` (`anuncioid`),
  CONSTRAINT `fk_foto_anuncio`
    FOREIGN KEY (`anuncioid`)
    REFERENCES `find4u`.`anuncio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `find4u`.`review`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `find4u`.`review` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `classificacao` INT NOT NULL,
  `userprofileid` INT NOT NULL,
  `anuncioid` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_review_userprofile` (`userprofileid`),
  INDEX `idx_review_anuncio` (`anuncioid`),
  CONSTRAINT `fk_review_userprofile`
    FOREIGN KEY (`userprofileid`)
    REFERENCES `find4u`.`userprofile` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_review_anuncio`
    FOREIGN KEY (`anuncioid`)
    REFERENCES `find4u`.`anuncio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `find4u`.`visita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `find4u`.`visita` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datahoraagenda` DATETIME NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `notas` VARCHAR(45) NOT NULL,
  `datacriacao` DATETIME NOT NULL,
  `userprofileid` INT NOT NULL,
  `anuncioid` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_visita_userprofile` (`userprofileid`),
  INDEX `idx_visita_anuncio` (`anuncioid`),
  CONSTRAINT `fk_visita_userprofile`
    FOREIGN KEY (`userprofileid`)
    REFERENCES `find4u`.`userprofile` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_visita_anuncio`
    FOREIGN KEY (`anuncioid`)
    REFERENCES `find4u`.`anuncio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `find4u`.`denuncia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `find4u`.`denuncia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `motivo` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(100) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `datadenuncia` DATETIME NOT NULL,
  `userprofileid` INT NOT NULL,
  `anuncioid` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_denuncia_userprofile` (`userprofileid`),
  INDEX `idx_denuncia_anuncio` (`anuncioid`),
  CONSTRAINT `fk_denuncia_userprofile`
    FOREIGN KEY (`userprofileid`)
    REFERENCES `find4u`.`userprofile` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_denuncia_anuncio`
    FOREIGN KEY (`anuncioid`)
    REFERENCES `find4u`.`anuncio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `find4u`.`comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `find4u`.`comentario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comentario` VARCHAR(45) NOT NULL,
  `data` VARCHAR(45) NOT NULL,
  `userprofileid` INT NOT NULL,
  `anuncioid` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_comentario_userprofile` (`userprofileid`),
  INDEX `idx_comentario_anuncio` (`anuncioid`),
  CONSTRAINT `fk_comentario_userprofile`
    FOREIGN KEY (`userprofileid`)
    REFERENCES `find4u`.`userprofile` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentario_anuncio`
    FOREIGN KEY (`anuncioid`)
    REFERENCES `find4u`.`anuncio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;