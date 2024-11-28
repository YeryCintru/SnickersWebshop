DROP TABLE `urbankicks`.`users`
DROP TABLE `urbankicks`.`logins`
DROP TABLE `urbankicks`.`articles`
DROP TABLE `urbankicks`.`orders`
DROP TABLE `urbankicks`.`orderarticle`
DROP TABLE `urbankicks`.`userarticle`


CREATE DATABASE IF NOT EXISTS urbankicks;


/*users*/
CREATE TABLE IF NOT EXISTS `Urbankicks`.`users` (
    `IDuser` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(20) NOT NULL,
    `firstName` VARCHAR(20) NOT NULL,
    `lastName` VARCHAR(20) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `IDshoppingBasket` INT NOT NULL AUTO_INCREMENT,
    `2fa` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`IDuser`)
) ENGINE = InnoDB;



/*login*/
CREATE TABLE IF NOT EXISTS `urbankicks`.`logins` (
    `IDlogin` INT NOT NULL AUTO_INCREMENT,
    `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `screenResolution` VARCHAR(10) NOT NULL,
    `operatingSystem` VARCHAR(10) NOT NULL,
    `active` BOOLEAN NOT NULL,
    `IDuser` INT NOT NULL,
    PRIMARY KEY (`IDlogin`),  
    FOREIGN KEY (`IDuser`) REFERENCES `users`(`IDuser`) ON DELETE CASCADE
) ENGINE = InnoDB;



/*article*/

CREATE TABLE IF NOT EXISTS `Urbankicks`.`articles` (

 `idarticle` INT NOT NULL AUTO_INCREMENT,
 `name` VARCHAR(20) NOT NULL,
 `price` FLOAT NOT NULL,
 `stock` INT NOT NULL,
 `description` TEXT NOT NULL,
  PRIMARY KEY (`idarticle`)
)

/*ordres*/

CREATE TABLE IF NOT EXISTS `Urbankicks`.`orders` (

`idorder` INT NOT NULL AUTO_INCREMENT,

`dateorder` TIMESTAMP NOT NULL,

PRIMARY KEY (`idorder`), 
FOREIGN KEY (`IDuser`) REFERENCES `users`(`IDuser`) ON DELETE CASCADE

) ENGINE = InnoDB;



/*orderarticle*/

CREATE TABLE IF NOT EXISTS `Urbankicks`.`orderarticle` (

   `quantity` INT NOT NULL,

FOREIGN KEY (`idorder`) REFERENCES `orders`(`idorder`) ON DELETE CASCADE,

FOREIGN KEY (`idarticle`) REFERENCES `articles`(`idarticle`) ON DELETE CASCADE

) ENGINE = InnoDB;


/*userarticle*/


CREATE TABLE IF NOT EXISTS `Urbankicks`.`userarticle` (

`quantity` INT NOT NULL,

FOREIGN KEY (`idorder`) REFERENCES `orders`(`idorder`) ON DELETE CASCADE,

FOREIGN KEY (`idarticle`) REFERENCES `articles`(`idarticle`) ON DELETE CASCADE

) ENGINE = InnoDB;


/*
SIN COMILLAS, (me daba error el my sql)

----------------------------------------

DROP TABLE urbankicks.users;
DROP TABLE urbankicks.logins;
DROP TABLE urbankicks.articles;
DROP TABLE urbankicks.orders;
DROP TABLE urbankicks.orderarticle;
DROP TABLE urbankicks.userarticle;

CREATE DATABASE IF NOT EXISTS urbankicks;


/* users */
CREATE TABLE IF NOT EXISTS urbankicks.users (
    IDuser INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL,
    firstName VARCHAR(20) NOT NULL,
    lastName VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    IDshoppingBasket INT NOT NULL AUTO_INCREMENT,
    2fa VARCHAR(255) NOT NULL,
    PRIMARY KEY (IDuser)
) ENGINE = InnoDB;


/* login */
CREATE TABLE IF NOT EXISTS urbankicks.logins (
    IDlogin INT NOT NULL AUTO_INCREMENT,
    date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    screenResolution VARCHAR(10) NOT NULL,
    operatingSystem VARCHAR(10) NOT NULL,
    active BOOLEAN NOT NULL,
    IDuser INT NOT NULL,
    PRIMARY KEY (IDlogin),
    FOREIGN KEY (IDuser) REFERENCES users(IDuser) ON DELETE CASCADE
) ENGINE = InnoDB;


/* article */
CREATE TABLE IF NOT EXISTS urbankicks.articles (
    idarticle INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    price FLOAT NOT NULL,
    stock INT NOT NULL,
    description TEXT NOT NULL,
    PRIMARY KEY (idarticle)
) ENGINE = InnoDB;


/* orders */
CREATE TABLE IF NOT EXISTS urbankicks.orders (
    idorder INT NOT NULL AUTO_INCREMENT,
    dateorder TIMESTAMP NOT NULL,
    PRIMARY KEY (idorder),
    FOREIGN KEY (IDuser) REFERENCES users(IDuser) ON DELETE CASCADE
) ENGINE = InnoDB;


/* orderarticle */
CREATE TABLE IF NOT EXISTS urbankicks.orderarticle (
    quantity INT NOT NULL,
    FOREIGN KEY (idorder) REFERENCES orders(idorder) ON DELETE CASCADE,
    FOREIGN KEY (idarticle) REFERENCES articles(idarticle) ON DELETE CASCADE
) ENGINE = InnoDB;


/* userarticle */
CREATE TABLE IF NOT EXISTS urbankicks.userarticle (
    quantity INT NOT NULL,
    FOREIGN KEY (idorder) REFERENCES orders(idorder) ON DELETE CASCADE,
    FOREIGN KEY (idarticle) REFERENCES articles(idarticle) ON DELETE CASCADE
) ENGINE = InnoDB;

---------------------------------------

*/