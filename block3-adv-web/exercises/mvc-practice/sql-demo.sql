DROP TABLE `shima_flower`;
CREATE TABLE `shima94_mvc_example`.`shima-flower` (`ID` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(256) NOT NULL , `color` VARCHAR(256) NOT NULL , `age` INT NOT NULL , `price` INT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;

INSERT INTO `shima_flower` (`ID`, `name`, `color`, `age`, `price`) VALUES (NULL, 'Rose', 'Red', '5', '5');