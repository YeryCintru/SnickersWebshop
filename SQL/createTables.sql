CREATE DATABASE IF NOT EXISTS Urbankicks;

CREATE TABLE IF NOT EXISTS `Urbankicks`.`users` (
    `IDuser` INT NOT NULL,
    `username` VARCHAR(20) NOT NULL,
    `password` VARCHAR NOT NULL,
    `email` VARCHAR(20) NOT NULL,
    `IDshoppingBasket` INT(20) NOT NULL,
    PRIMARY KEY (`IDuser`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `Urbankicks`.`logins` (
    `lDlogin` INT NOT NULL,
    `date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `screenResolution` VARCHAR(10) NOT NULL,
    `operatingSystem` VARCHAR(10) NOT NULL,
    `active` BOOLEAN NOT NULL,
    `IDuser` INT NOT NULL,
    PRIMARY KEY (`lDlogin`)
) ENGINE = InnoDB;

