-- MySQL Script generated by MySQL Workbench
-- Mon Jan 20 00:52:37 2025
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema burguer
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema burguer
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `burguer` DEFAULT CHARACTER SET utf8mb4 ;
USE `burguer` ;

-- -----------------------------------------------------
-- Table `burguer`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `burguer`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) CHARACTER SET 'utf8mb3' NULL DEFAULT NULL,
  `apellido` VARCHAR(60) CHARACTER SET 'utf8mb3' NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `telefono` VARCHAR(11) NULL DEFAULT NULL,
  `admin` INT NULL DEFAULT NULL,
  `confirmado` INT NULL DEFAULT NULL,
  `token` VARCHAR(15) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `burguer`.`pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `burguer`.`pedidos` (
  `idpedidos` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NULL DEFAULT NULL,
  `hora` TIME NULL DEFAULT NULL,
  `usuarioid` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idpedidos`),
  INDEX `id_idx` (`usuarioid` ASC) VISIBLE,
  CONSTRAINT `id`
    FOREIGN KEY (`usuarioid`)
    REFERENCES `burguer`.`usuarios` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `burguer`.`servicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `burguer`.`servicios` (
  `idservicios` INT NOT NULL,
  `nombre` VARCHAR(60) NULL DEFAULT NULL,
  `precio` DECIMAL(5,2) NULL DEFAULT NULL,
  PRIMARY KEY (`idservicios`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `burguer`.`pedidosservicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `burguer`.`pedidosservicios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pedidosid` INT NULL DEFAULT NULL,
  `serviciosid` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `idpedidos_idx` (`pedidosid` ASC) VISIBLE,
  INDEX `idservicios_idx` (`serviciosid` ASC) VISIBLE,
  CONSTRAINT `idpedidos`
    FOREIGN KEY (`pedidosid`)
    REFERENCES `burguer`.`pedidos` (`idpedidos`),
  CONSTRAINT `idservicios`
    FOREIGN KEY (`serviciosid`)
    REFERENCES `burguer`.`servicios` (`idservicios`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COMMENT = '			';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
