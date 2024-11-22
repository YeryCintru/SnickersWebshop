DROP TABLE `Urbankicks`.`users`
DROP TABLE `Urbankicks`.`logins`

CREATE DATABASE IF NOT EXISTS Urbankicks;

CREATE TABLE IF NOT EXISTS `Urbankicks`.`users` (
    `IDuser` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(20) NOT NULL,
    `firstName` VARCHAR(20) NOT NULL,
    `lastName` VARCHAR(20) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `IDshoppingBasket` INT NOT NULL,
    PRIMARY KEY (`IDuser`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `Urbankicks`.`logins` (
    `IDlogin` INT NOT NULL AUTO_INCREMENT,
    `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `screenResolution` VARCHAR(10) NOT NULL,
    `operatingSystem` VARCHAR(10) NOT NULL,
    `active` BOOLEAN NOT NULL,
    `IDuser` INT NOT NULL,
    PRIMARY KEY (`IDlogin`),  
    FOREIGN KEY (`IDuser`) REFERENCES `users`(`IDuser`) ON DELETE CASCADE
) ENGINE = InnoDB;