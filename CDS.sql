SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `cds` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `cds` ;

-- -----------------------------------------------------
-- Table `cds`.`artista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cds`.`artista` (
  `idArtista` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(250) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`idArtista`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `cds`.`gravadora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cds`.`gravadora` (
  `idGravadora` INT(11) NOT NULL AUTO_INCREMENT,
  `identificacao` VARCHAR(250) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`idGravadora`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `cds`.`estilo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cds`.`estilo` (
  `idEstilo` INT(11) NOT NULL AUTO_INCREMENT,
  `identificacao` VARCHAR(250) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`idEstilo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `cds`.`cd`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cds`.`cd` (
  `idCD` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `ano` INT NOT NULL,
  `artista_idArtista` INT(11) NOT NULL,
  `gravadora_idGravadora` INT(11) NOT NULL,
  `estilo_idEstilo` INT(11) NOT NULL,
  PRIMARY KEY (`idCD`),
  INDEX `titulo` (`titulo` ASC),
  INDEX `fk_cd_artista_idx` (`artista_idArtista` ASC),
  INDEX `fk_cd_gravadora1_idx` (`gravadora_idGravadora` ASC),
  INDEX `fk_cd_estilo1_idx` (`estilo_idEstilo` ASC),
  CONSTRAINT `fk_cd_artista`
    FOREIGN KEY (`artista_idArtista`)
    REFERENCES `cds`.`artista` (`idArtista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cd_gravadora1`
    FOREIGN KEY (`gravadora_idGravadora`)
    REFERENCES `cds`.`gravadora` (`idGravadora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cd_estilo1`
    FOREIGN KEY (`estilo_idEstilo`)
    REFERENCES `cds`.`estilo` (`idEstilo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
