DROP TABLE `urbankicks`.`orders`

CREATE DATABASE IF NOT EXISTS urbankicks;

CREATE TABLE IF NOT EXISTS `Urbankicks`.`orders` (
    `idorder` INT NOT NULL AUTO_INCREMENT,
    `dateorder` TIMESTAMP NOT NULL,
    PRIMARY KEY (`idorder`),
    FOREIGN KEY (`IDuser`) REFERENCES `users`(`IDuser`) ON DELETE CASCADE

) ENGINE = InnoDB;
