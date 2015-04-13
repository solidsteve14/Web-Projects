-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema _445team6
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema _445team6
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `_445team6` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `_445team6` ;

-- -----------------------------------------------------
-- Table `_445team6`.`CAR`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `_445team6`.`CAR` ;

CREATE TABLE IF NOT EXISTS `_445team6`.`CAR` (
  `carID` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(15) NOT NULL,
  `make` VARCHAR(15) NOT NULL,
  `model` VARCHAR(15) NOT NULL,
  `year` INT(4) NOT NULL,
  PRIMARY KEY (`carID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `_445team6`.`PACKAGE`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `_445team6`.`PACKAGE` ;

CREATE TABLE IF NOT EXISTS `_445team6`.`PACKAGE` (
  `packageID` INT NOT NULL AUTO_INCREMENT,
  `packageName` VARCHAR(10) NOT NULL,
  `mpg` INT NOT NULL,
  `horsepower` INT NOT NULL,
  `basePrice` DECIMAL(10,2) NOT NULL,
  `engineSize` DECIMAL(2,1) NOT NULL,
  `transmission` CHAR(2) NOT NULL,
  `CAR_carID` INT NOT NULL,
  PRIMARY KEY (`packageID`),
  INDEX `fk_PACKAGE_CAR1_idx` (`CAR_carID` ASC),
  CONSTRAINT `fk_PACKAGE_CAR1`
    FOREIGN KEY (`CAR_carID`)
    REFERENCES `_445team6`.`CAR` (`carID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `_445team6`.`CAR_PHOTO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `_445team6`.`CAR_PHOTO` ;

CREATE TABLE IF NOT EXISTS `_445team6`.`CAR_PHOTO` (
  `photoPath` VARCHAR(100) NOT NULL,
  `CAR_carID` INT NOT NULL,
  PRIMARY KEY (`photoPath`, `CAR_carID`),
  INDEX `fk_CarPhoto_CAR_idx` (`CAR_carID` ASC),
  CONSTRAINT `fk_CarPhoto_CAR`
    FOREIGN KEY (`CAR_carID`)
    REFERENCES `_445team6`.`CAR` (`carID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `_445team6`.`USER`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `_445team6`.`USER` ;

CREATE TABLE IF NOT EXISTS `_445team6`.`USER` (
  `email` VARCHAR(30) NOT NULL,
  `password` VARCHAR(20) NOT NULL,
  `zipcode` CHAR(5) NOT NULL,
  `type` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `_445team6`.`REVIEW`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `_445team6`.`REVIEW` ;

CREATE TABLE IF NOT EXISTS `_445team6`.`REVIEW` (
  `rating` INT NOT NULL,
  `description` VARCHAR(200) NULL,
  `USER_email` VARCHAR(30) NOT NULL,
  `PACKAGE_packageID` INT NOT NULL,
  PRIMARY KEY (`USER_email`, `PACKAGE_packageID`),
  INDEX `fk_REVIEW_USER1_idx` (`USER_email` ASC),
  INDEX `fk_REVIEW_PACKAGE1_idx` (`PACKAGE_packageID` ASC),
  CONSTRAINT `fk_REVIEW_USER1`
    FOREIGN KEY (`USER_email`)
    REFERENCES `_445team6`.`USER` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_REVIEW_PACKAGE1`
    FOREIGN KEY (`PACKAGE_packageID`)
    REFERENCES `_445team6`.`PACKAGE` (`packageID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `_445team6`.`DEALERSHIP`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `_445team6`.`DEALERSHIP` ;

CREATE TABLE IF NOT EXISTS `_445team6`.`DEALERSHIP` (
  `dealerID` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `address` VARCHAR(25) NOT NULL,
  `city` VARCHAR(25) NOT NULL,
  `zipcode` CHAR(5) NOT NULL,
  PRIMARY KEY (`dealerID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `_445team6`.`DEALER_INVENTORY`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `_445team6`.`DEALER_INVENTORY` ;

CREATE TABLE IF NOT EXISTS `_445team6`.`DEALER_INVENTORY` (
  `color` VARCHAR(10) NULL,
  `condition` INT NOT NULL,
  `mileage` INT NOT NULL,
  `dealerPrice` DECIMAL(10,2) NOT NULL,
  `DEALERSHIP_dealerID` INT NOT NULL,
  `VIN` CHAR(17) NOT NULL,
  `PACKAGE_packageID` INT NOT NULL,
  INDEX `fk_DEALER_INVENTORY_DEALERSHIP1_idx` (`DEALERSHIP_dealerID` ASC),
  PRIMARY KEY (`VIN`),
  INDEX `fk_DEALER_INVENTORY_PACKAGE1_idx` (`PACKAGE_packageID` ASC),
  CONSTRAINT `fk_DEALER_INVENTORY_DEALERSHIP1`
    FOREIGN KEY (`DEALERSHIP_dealerID`)
    REFERENCES `_445team6`.`DEALERSHIP` (`dealerID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DEALER_INVENTORY_PACKAGE1`
    FOREIGN KEY (`PACKAGE_packageID`)
    REFERENCES `_445team6`.`PACKAGE` (`packageID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `_445team6`.`INVENTORY_PHOTO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `_445team6`.`INVENTORY_PHOTO` ;

CREATE TABLE IF NOT EXISTS `_445team6`.`INVENTORY_PHOTO` (
  `path` VARCHAR(100) NOT NULL,
  `DEALER_INVENTORY_VIN` CHAR(17) NOT NULL,
  PRIMARY KEY (`path`, `DEALER_INVENTORY_VIN`),
  INDEX `fk_INVENTORY_PHOTO_DEALER_INVENTORY1_idx` (`DEALER_INVENTORY_VIN` ASC),
  CONSTRAINT `fk_INVENTORY_PHOTO_DEALER_INVENTORY1`
    FOREIGN KEY (`DEALER_INVENTORY_VIN`)
    REFERENCES `_445team6`.`DEALER_INVENTORY` (`VIN`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

#Inserting cars
INSERT INTO CAR VALUES (NULL,'Sedan','Toyota','Corolla',2000);
INSERT INTO CAR VALUES (NULL,'Sedan','Toyota','Corolla',2008);
INSERT INTO CAR VALUES (NULL,'Sedan','Toyota','Camry',2001);
INSERT INTO CAR VALUES (NULL,'Sedan','Toyota','Camry',2009);
INSERT INTO CAR VALUES (NULL,'SUV','Toyota','Rav4',2002);
INSERT INTO CAR VALUES (NULL,'SUV','Toyota','Rav4',2004);
INSERT INTO CAR VALUES (NULL,'Sedan','Honda','Civic',2000);
INSERT INTO CAR VALUES (NULL,'Sedan','Honda','Civic',2008);
INSERT INTO CAR VALUES (NULL,'Sedan','Honda','Accord',2001);
INSERT INTO CAR VALUES (NULL,'Sedan','Honda','Accord',2009);
INSERT INTO CAR VALUES (NULL,'SUV','Honda','CRV',2001);
INSERT INTO CAR VALUES (NULL,'SUV','Honda','CRV',2009);


#inserting packages
INSERT INTO PACKAGE VALUES (NULL,'S',30,135,16000.00,1.5,'MT',1);
INSERT INTO PACKAGE VALUES (NULL,'LE',30,120,18000.00,1.4,'AT',1);
INSERT INTO PACKAGE VALUES (NULL,'S',30,140,16000.00,1.6,'MT',2);
INSERT INTO PACKAGE VALUES (NULL,'LE',30,130,18000.00,1.5,'AT',2);
INSERT INTO PACKAGE VALUES (NULL,'LE',29,140,21000.00,2.0,'AT',3);
INSERT INTO PACKAGE VALUES (NULL,'XLE',28,150,24000.00,2.0,'MT',3);
INSERT INTO PACKAGE VALUES (NULL,'LE',38,120,15000.00,1.6,'AT',4);
INSERT INTO PACKAGE VALUES (NULL,'XLE',35,135,17500.00,1.8,'MT',4);
INSERT INTO PACKAGE VALUES (NULL,'LE',20,170,19500.00,2.4,'AT',5);
INSERT INTO PACKAGE VALUES (NULL,'XLE',20,170,21000.00,2.4,'MT',5);
INSERT INTO PACKAGE VALUES (NULL,'LE',24,165,20000.00,2.4,'AT',6);
INSERT INTO PACKAGE VALUES (NULL,'XLE',20,180,23000.00,2.4,'AT',6);
INSERT INTO PACKAGE VALUES (NULL,'EX',33,130,15000.00,1.8,'AT',7);
INSERT INTO PACKAGE VALUES (NULL,'DX',30,140,17000.00,1.8,'AT',7);
INSERT INTO PACKAGE VALUES (NULL,'EX',41,155,18000.00,1.8,'AT',8);
INSERT INTO PACKAGE VALUES (NULL,'DX',41,155,20200.00,1.8,'AT',8);
INSERT INTO PACKAGE VALUES (NULL,'EX',35,160,20500.00,2.0,'AT',9);
INSERT INTO PACKAGE VALUES (NULL,'LX',35,160,22500.00,2.0,'AT',9);
INSERT INTO PACKAGE VALUES (NULL,'EX',45,170,20500.00,2.0,'AT',10);
INSERT INTO PACKAGE VALUES (NULL,'LX',45,170,22500.00,2.0,'AT',10);
INSERT INTO PACKAGE VALUES (NULL,'EX',28,180,20000.00,2.4,'AT',11);
INSERT INTO PACKAGE VALUES (NULL,'LX',28,180,22000.00,2.4,'AT',11);

#Insterting user
INSERT INTO USER VALUES('admin@carquote.com','password','98105','admin');
INSERT INTO USER VALUES('anton@carquote.com','123123','98146','consumer');

#Inserting Car photos
INSERT INTO CAR_PHOTO VALUES ('car_photos/2000-honda-civic-rearside_hocivhb002.jpg',7);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2000-toyota-corolla-frontside_tocor001.jpg',1);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2001-honda-accord-frontside_hoacclxsed015.jpg',9);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2001-honda-accord-rearside_hoacclxsed016.jpg',9);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2001-honda-cr-v-frontside_htcrvlx011.jpg',11);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2001-toyota-camry-frontside_tocamle015.jpg',3);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2001-toyota-camry-frontside_tocamle018.jpg',3);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2001-toyota-camry-rearside_tocamle017.jpg ',3);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2002-toyota-rav4-frontside_ttrav021.jpg',5);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2002-toyota-rav4-side_ttrav022.jpg',5);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2002-toyota-rav4_ttravint025.jpg',5);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2004-toyota-rav4-frontside_ttrav041.jpg',6);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2004-toyota-rav4-rearside_ttrav044.jpg',6);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2004-toyota-rav4_ttravint046.jpg',6);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2008-honda-civic-frontside_hocivcpe081.jpg',8);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2008-toyota-corolla-frontside_tocor081.jpg',2);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2008-toyota-corolla-frontside_tocorint081.jpg',2);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2009-honda-accord-frontside_hoaccsed091.jpg',10);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2009-honda-accord_hoaccint091.jpg',10);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2009-honda-cr-v-frontside_htcrv091.jpg',12);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2009-honda-cr-v_htcrvint091.jpg',12);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2009-toyota-camry-frontside_tocamse091.jpg',4);
INSERT INTO CAR_PHOTO VALUES ('car_photos/2009-toyota-camry_tocamint091.jpg',4);

#Inserting Dealerships
INSERT INTO DEALERSHIP VALUES(NULL,'Seattle Auto','124 3rd Ave','Seattle','98105');
INSERT INTO DEALERSHIP VALUES(NULL,'Imports of Seattle','432 Michigan St.','Seattle','98104');
INSERT INTO DEALERSHIP VALUES(NULL,'Burien Cars','567 Main St.','Burien','98146');

#Inserting Dealer Inventories
INSERT INTO DEALER_INVENTORY VALUES('Red',8,135301,9500.00,1,'AK3LDK78756JGFYOQ',3);
INSERT INTO DEALER_INVENTORY VALUES('Black',7,86089,14799.00,1,'AODFI343DAF9DOMV0',8);
INSERT INTO DEALER_INVENTORY VALUES('Blue',9,104789,15699.00,1,'8LAETMA839ADF31U9',14);
INSERT INTO DEALER_INVENTORY VALUES('White',8,67123,17059.00,2,'PE89ADFM9ACZ3FAO1',15);
INSERT INTO DEALER_INVENTORY VALUES('Green',9,76439,18909.00,2,'3IAU83D9ADU32MVNX',19);
INSERT INTO DEALER_INVENTORY VALUES('Blue',8,115093,16999.00,2,'DG732DAFBX98A123L',21);
INSERT INTO DEALER_INVENTORY VALUES('Yellow',7,123456,9999.99,3,'AIDU38AD3VMX9TIVE',6);
INSERT INTO DEALER_INVENTORY VALUES('Red',8,130783,10119.19,3,'AD34H78ADF27GFYOQ',12);
INSERT INTO DEALER_INVENTORY VALUES('Black',9,56089,12967.00,3,'7AKIDU5DWD324YB6M',17);

#Inserting a review of car 1
INSERT INTO REVIEW VALUES (5,'This car is fantastic. I highly recommend it!','admin@carquote.com',1);
