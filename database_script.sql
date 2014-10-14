SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema sistemamonetario
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sistemamonetario` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `sistemamonetario` ;

-- -----------------------------------------------------
-- Table `sistemamonetario`.`tblusuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistemamonetario`.`tblusuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(50) NOT NULL,
  `pass` VARCHAR(255) NOT NULL,
  `activo` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `user_UNIQUE` (`user` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistemamonetario`.`tblcartera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistemamonetario`.`tblcartera` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `activo` INT NOT NULL DEFAULT 1,
  `idUsuario` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tblcartera_tblusuario1_idx` (`idUsuario` ASC),
  CONSTRAINT `fk_tblcartera_tblusuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `sistemamonetario`.`tblusuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistemamonetario`.`tbltipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistemamonetario`.`tbltipo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistemamonetario`.`tblcategoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistemamonetario`.`tblcategoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `activo` INT NOT NULL DEFAULT 1,
  `idTipo` INT NOT NULL,
  `idUsuario` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tblcategoria_tbltipo1_idx` (`idTipo` ASC),
  INDEX `fk_tblcategoria_tblusuario1_idx` (`idUsuario` ASC),
  CONSTRAINT `fk_tblcategoria_tbltipo1`
    FOREIGN KEY (`idTipo`)
    REFERENCES `sistemamonetario`.`tbltipo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblcategoria_tblusuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `sistemamonetario`.`tblusuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistemamonetario`.`tblproducto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistemamonetario`.`tblproducto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `activo` INT NOT NULL DEFAULT 1,
  `idCategoria` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tblproducto_tblconcepto1_idx` (`idCategoria` ASC),
  CONSTRAINT `fk_tblproducto_tblconcepto1`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `sistemamonetario`.`tblcategoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistemamonetario`.`tblingreso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistemamonetario`.`tblingreso` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cantidad` FLOAT NOT NULL,
  `comentario` TEXT NOT NULL,
  `fecha` DATE NOT NULL,
  `unix` INT NOT NULL,
  `activo` INT NOT NULL DEFAULT 1,
  `idCategoria` INT NOT NULL,
  `idCartera` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tblingreso_tblcategoria1_idx` (`idCategoria` ASC),
  INDEX `fk_tblingreso_tblcartera1_idx` (`idCartera` ASC),
  CONSTRAINT `fk_tblingreso_tblcategoria1`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `sistemamonetario`.`tblcategoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblingreso_tblcartera1`
    FOREIGN KEY (`idCartera`)
    REFERENCES `sistemamonetario`.`tblcartera` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistemamonetario`.`tblegreso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistemamonetario`.`tblegreso` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `cantidad` FLOAT NOT NULL,
  `fecha` DATE NOT NULL,
  `unix` INT NOT NULL,
  `activo` INT NOT NULL DEFAULT '1',
  `idProducto` INT NOT NULL,
  `idCartera` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tblegreso_tblproducto1_idx` (`idProducto` ASC),
  INDEX `fk_tblegreso_tblcartera1_idx` (`idCartera` ASC),
  CONSTRAINT `fk_tblegreso_tblproducto1`
    FOREIGN KEY (`idProducto`)
    REFERENCES `sistemamonetario`.`tblproducto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblegreso_tblcartera1`
    FOREIGN KEY (`idCartera`)
    REFERENCES `sistemamonetario`.`tblcartera` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
