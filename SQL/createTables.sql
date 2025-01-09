DROP TABLE IF EXISTS `urbankicks`.`userarticle`;
DROP TABLE IF EXISTS `urbankicks`.`orderarticle`;
DROP TABLE IF EXISTS `urbankicks`.`logins`;
DROP TABLE IF EXISTS `urbankicks`.`orders`;
DROP TABLE IF EXISTS `urbankicks`.`articles`;
DROP TABLE IF EXISTS `urbankicks`.`users`;

-- Crear base de datos si no existe
CREATE DATABASE IF NOT EXISTS `urbankicks`;

-- Usar la base de datos
USE `urbankicks`;

-- Crear tabla `users`
CREATE TABLE IF NOT EXISTS `users` (
    `IDuser` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(40) NOT NULL,
    `firstName` VARCHAR(20) NOT NULL,
    `lastName` VARCHAR(20) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `first_login` TINYINT(1) DEFAULT 1,          
    `last_login` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `twoFactorAuth` VARCHAR(255) NOT NULL,
    `active` BOOLEAN NOT NULL,
    PRIMARY KEY (`IDuser`)
) ENGINE = InnoDB;

-- Crear tabla `logins`
CREATE TABLE IF NOT EXISTS `logins` (
    `IDlogin` INT NOT NULL AUTO_INCREMENT,
    `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `screenResolution` VARCHAR(50) NOT NULL, 
    `operatingSystem` VARCHAR(50) NOT NULL, 
    `IDuser` INT NOT NULL,
    PRIMARY KEY (`IDlogin`),  
    FOREIGN KEY (`IDuser`) REFERENCES `users`(`IDuser`) ON DELETE CASCADE
) ENGINE = InnoDB;

-- Crear tabla `articles`
CREATE TABLE IF NOT EXISTS `articles` (
    `idarticle` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL, 
    `price` FLOAT NOT NULL,
    `stock` INT NOT NULL,
    `description` TEXT NOT NULL,
    `type` INT NOT NULL,
    PRIMARY KEY (`idarticle`)
) ENGINE = InnoDB;

-- Crear tabla `orders`
CREATE TABLE IF NOT EXISTS `orders` (
    `idorder` INT NOT NULL AUTO_INCREMENT,
    `dateorder` TIMESTAMP NOT NULL,
    `IDuser` INT NOT NULL,
    `shipment` INT NOT NULL, 
    PRIMARY KEY (`idorder`), 
    FOREIGN KEY (`IDuser`) REFERENCES `users`(`IDuser`) ON DELETE CASCADE
) ENGINE = InnoDB;

-- Crear tabla `orderarticle`
CREATE TABLE IF NOT EXISTS `orderarticle` (
    `quantity` INT NOT NULL,
    `idorder` INT NOT NULL,
    `idarticle` INT NOT NULL,
    FOREIGN KEY (`idorder`) REFERENCES `orders`(`idorder`) ON DELETE CASCADE,
    FOREIGN KEY (`idarticle`) REFERENCES `articles`(`idarticle`) ON DELETE CASCADE
) ENGINE = InnoDB;

-- Crear tabla `userarticle`
CREATE TABLE IF NOT EXISTS `userarticle` (
    `quantity` INT NOT NULL,
    `IDuser` INT NOT NULL,
    `idarticle` INT NOT NULL,
    FOREIGN KEY (`IDuser`) REFERENCES `users`(`IDuser`) ON DELETE CASCADE,
    FOREIGN KEY (`idarticle`) REFERENCES `articles`(`idarticle`) ON DELETE CASCADE
) ENGINE = InnoDB;
