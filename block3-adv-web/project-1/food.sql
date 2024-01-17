CREATE TABLE `shima94_food`.`sppliers` (`supplierID` INT NOT NULL AUTO_INCREMENT , `supplierName` VARCHAR(255) NOT NULL , `address` VARCHAR(255) NOT NULL , `contactNumber` VARCHAR(255) NOT NULL , PRIMARY KEY (`supplierID`)) ENGINE = InnoDB;

CREATE TABLE `shima94_food`.`ingredients` (`ingredientID` INT NOT NULL AUTO_INCREMENT , `ingredientName` VARCHAR(255) NOT NULL , `type` VARCHAR(255) NOT NULL , `price` VARCHAR(255) NOT NULL , PRIMARY KEY (`ingredientID`)) ENGINE = InnoDB;

CREATE TABLE `shima94_food`.`dishes` (`dishID` INT NOT NULL AUTO_INCREMENT , `dishName` VARCHAR(255) NOT NULL , `price` VARCHAR(255) NOT NULL , PRIMARY KEY (`dishID`)) ENGINE = InnoDB;

CREATE TABLE `shima94_food`.`foodVendor` (`foodVendorID` INT NOT NULL AUTO_INCREMENT , `vendorName` VARCHAR(255) NOT NULL , `dishID` INT NOT NULL , `supplierID` INT NOT NULL , `ingredientID` INT NOT NULL , PRIMARY KEY (`foodVendorID`)) ENGINE = InnoDB;



--  foreign key
ALTER TABLE `foodVendor` ADD CONSTRAINT `supplierID` FOREIGN KEY (`supplierID`) REFERENCES `sppliers`(`supplierID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `foodVendor` ADD CONSTRAINT `dishID` FOREIGN KEY (`dishID`) REFERENCES `dishes`(`dishID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `foodVendor` ADD CONSTRAINT `ingredientID` FOREIGN KEY (`ingredientID`) REFERENCES `ingredients`(`ingredientID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--end

ALTER TABLE `foodVendor` ADD CONSTRAINT `dishID` FOREIGN KEY (`dishID`) REFERENCES `dishes`(`disheID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `foodVendor` DROP FOREIGN KEY `dishID`; ALTER TABLE `foodVendor` ADD CONSTRAINT `supplierID` FOREIGN KEY (`dishID`) REFERENCES `dishes`(`disheID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `foodVendor` ADD FOREIGN KEY (`supplierID`) REFERENCES `suppliers`(`supplierID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `ingredients` ADD CONSTRAINT `supplierID` FOREIGN KEY (`supplierID`) REFERENCES `suppliers`(`supplierID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `foodVendor` ADD CONSTRAINT `ingredientID` FOREIGN KEY (`ingredientID`) REFERENCES `Ingredients`(`ingredientID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO `dishes` (`disheID`, `dishName`, `Price`) VALUES (NULL, 'Pizza', '10.00'), (NULL, 'Salad', '8.50');

INSERT INTO `ingredients` (`ingredientID`, `ingredientName`, `price`) VALUES (NULL, 'Flour', '1.99'), (NULL, '1.99', '2.49');

INSERT INTO `suppliers` (`supplierID`, `supplierName`, `address`, `contactNumber`) VALUES (NULL, 'Supplier 1', '123 Main Street', '555-1234'), (NULL, 'Supplier 2', '456 Oak Avenue', '555-5678');

INSERT INTO `foodVendor` (`foodVendorID`, `vendorName`, `dishID`, `supplierID`, `ingredientID`) VALUES (NULL, 'Vendor1', '1', '2', '2'), (NULL, 'Vendor2', '2', '1', '1');

SELECT * FROM foodVendor NATURAL JOIN dishes NATURAL JOIN suppliers NATURAL JOIN ingredients; 

SELECT * FROM foodVendor NATURAL JOIN Ingredients;

SELECT * FROM foodVendor NATURAL JOIN dishes;

SELECT * FROM foodVendor NATURAL JOIN dishes ORDER BY vendorName;

SELECT * FROM foodVendor NATURAL JOIN dishes ORDER BY vendorName DESC, dishName ASC;

