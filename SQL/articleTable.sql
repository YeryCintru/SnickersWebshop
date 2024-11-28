DROP TABLE `urbankicks`.`articles`

CREATE DATABASE IF NOT EXISTS urbankicks;

CREATE TABLE IF NOT EXISTS `Urbankicks`.`articles` (
    `idarticle` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(20) NOT NULL,
    `price` FLOAT NOT NULL,
    `stock` INT NOT NULL,
    `description` TEXT NOT NULL,
    PRIMARY KEY (`idarticle`)

) ENGINE = InnoDB;
