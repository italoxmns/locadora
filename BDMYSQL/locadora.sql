SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `locadora` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `locadora` ;

-- -----------------------------------------------------
-- Table `locadora`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`cliente` (
  `idclient` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(15) NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `telefone` VARCHAR(11) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `date` DATETIME NOT NULL DEFAULT now(),
  PRIMARY KEY (`idclient`, `cpf`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC))
ENGINE = InnoDB
PACK_KEYS = DEFAULT;


-- -----------------------------------------------------
-- Table `locadora`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadora`.`fabricante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`fabricante` (
  `idfabricante` INT NOT NULL AUTO_INCREMENT,
  `fabricante` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idfabricante`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadora`.`modelo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`modelo` (
  `idmodelo` INT NOT NULL AUTO_INCREMENT,
  `modelo` VARCHAR(45) NOT NULL,
  `categoria_idcategoria` INT NOT NULL,
  `fabricante_idfabricante` INT NOT NULL,
  PRIMARY KEY (`idmodelo`),
  INDEX `fk_modelo_categoria1_idx` (`categoria_idcategoria` ASC),
  INDEX `fk_modelo_fabricante1_idx` (`fabricante_idfabricante` ASC),
  CONSTRAINT `fk_modelo_categoria1`
    FOREIGN KEY (`categoria_idcategoria`)
    REFERENCES `locadora`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_modelo_fabricante1`
    FOREIGN KEY (`fabricante_idfabricante`)
    REFERENCES `locadora`.`fabricante` (`idfabricante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadora`.`veiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`veiculo` (
  `idveiculo` INT NOT NULL AUTO_INCREMENT,
  `modelo_idmodelo` INT NOT NULL,
  `placa` VARCHAR(8) NOT NULL,
  `ano` INT NOT NULL,
  `lugares` VARCHAR(45) NOT NULL,
  `potencia` VARCHAR(5) NOT NULL,
  `status` TINYINT(1) NULL,
  PRIMARY KEY (`idveiculo`, `placa`),
  INDEX `fk_veiculo_modelo1_idx` (`modelo_idmodelo` ASC),
  UNIQUE INDEX `placa_UNIQUE` (`placa` ASC),
  CONSTRAINT `fk_veiculo_modelo1`
    FOREIGN KEY (`modelo_idmodelo`)
    REFERENCES `locadora`.`modelo` (`idmodelo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadora`.`user_pwd`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`user_pwd` (
  `iduser_pwd` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `pass` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`iduser_pwd`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadora`.`aluga`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora`.`aluga` (
  `cliente_idclient` INT NOT NULL,
  `veiculo_idveiculo` INT NOT NULL,
  `valor` DECIMAL(6,2) NOT NULL,
  `dateInicial` DATETIME NOT NULL DEFAULT now(),
  `dateFinal` DATETIME NULL,
  PRIMARY KEY (`cliente_idclient`, `veiculo_idveiculo`),
  INDEX `fk_cliente_has_veiculo_veiculo1_idx` (`veiculo_idveiculo` ASC),
  INDEX `fk_cliente_has_veiculo_cliente1_idx` (`cliente_idclient` ASC),
  CONSTRAINT `fk_cliente_has_veiculo_cliente1`
    FOREIGN KEY (`cliente_idclient`)
    REFERENCES `locadora`.`cliente` (`idclient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_has_veiculo_veiculo1`
    FOREIGN KEY (`veiculo_idveiculo`)
    REFERENCES `locadora`.`veiculo` (`idveiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE USER 'user1';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
