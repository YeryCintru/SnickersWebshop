DROP TABLE `urbankicks`.`orderarticle`

CREATE DATABASE IF NOT EXISTS urbankicks;

CREATE TABLE IF NOT EXISTS `Urbankicks`.`orderarticle` (
    `quantity` INT NOT NULL,
    FOREIGN KEY (`idorder`) REFERENCES `orders`(`idorder`) ON DELETE CASCADE,
    FOREIGN KEY (`idarticle`) REFERENCES `articles`(`idarticle`) ON DELETE CASCADE
) ENGINE = InnoDB;
