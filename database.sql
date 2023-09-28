-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema gr
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gr
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gr` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema meunome
-- -----------------------------------------------------
USE `gr` ;

-- -----------------------------------------------------
-- Table `gr`.`colaboradores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gr`.`colaboradores` (
  `id` INT NOT NULL,
  `nome` VARCHAR(255) NULL,
  `telefone` INT NULL,
  `email` VARCHAR(255) NULL,
  `cargo` VARCHAR(255) NULL,
  `salario` FLOAT NULL,
  `cidade` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
