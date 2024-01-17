CREATE TABLE `shima94_db_music`.`Order` (`ID` INT NOT NULL AUTO_INCREMENT , `Quantity` INT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;

SELECT *
FROM Orders
WHERE Quantity BETWEEN 1 AND 100;

/*o1 tempary copy of Orders */

SELECT o1.*
FROM (
    SELECT *
    FROM Orders
    WHERE Quantity BETWEEN 1 AND 100) o1


    SELECT *
FROM (
    SELECT *
    FROM Orders
    WHERE Quantity BETWEEN 1 AND 100) o1
LEFT JOIN (
    SELECT *
    FROM Orders
    WHERE Quantity BETWEEN 50 AND 75) o2
ON o1.id = o2.id



SELECT `Quantity` as qty FROM Orders;
