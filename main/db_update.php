
UPDATE sales_order
SET date = CONCAT(date, '/');
UPDATE sales_order
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));
UPDATE sales_order
SET date = SUBSTRING(date, 2);
UPDATE sales_order
SET date = REPLACE(date, '/', '-');
ALTER TABLE `sales_order` CHANGE `date` `date` DATE NOT NULL;

ALTER TABLE `sales` CHANGE `date` `date` VARCHAR(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

UPDATE sales
SET date = CONCAT(date, '/');
UPDATE sales
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));
UPDATE sales
SET date = SUBSTRING(date, 2);
UPDATE sales
SET date = REPLACE(date, '/', '-');
ALTER TABLE `sales` CHANGE `date` `date` DATE NOT NULL;

UPDATE purchases
SET date = CONCAT(date, '/');
UPDATE purchases
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));
UPDATE purchases
SET date = SUBSTRING(date, 2);
UPDATE purchases
SET date = REPLACE(date, '/', '-');
ALTER TABLE `purchases` CHANGE `date` `date` DATE NOT NULL;

UPDATE purchases2
SET date = CONCAT(date, '/');
UPDATE purchases2
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));
UPDATE purchases2
SET date = SUBSTRING(date, 2);
UPDATE purchases2
SET date = REPLACE(date, '/', '-');
ALTER TABLE `purchases2` CHANGE `date` `date` DATE NOT NULL;

UPDATE pending
SET date = CONCAT(date, '/');
UPDATE pending
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));
UPDATE pending
SET date = SUBSTRING(date, 2);
UPDATE pending
SET date = REPLACE(date, '/', '-');
ALTER TABLE `pending` CHANGE `date` `date` DATE NOT NULL;
ALTER TABLE `pending` CHANGE `transaction_id` `transaction_id` INT(10) NOT NULL AUTO_INCREMENT;


UPDATE payments
SET date = CONCAT(date, '/');
UPDATE payments
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date2, 1, 5));
UPDATE payments
SET date = SUBSTRING(date, 2);
UPDATE payments
SET date = REPLACE(date, '/', '-');
ALTER TABLE `payments` CHANGE `date` `date` DATE NOT NULL;

ALTER TABLE `payments` CHANGE `paymentid` `paymentid` INT(10) NOT NULL AUTO_INCREMENT;

UPDATE salaries
SET date = CONCAT(date, '/');
UPDATE salaries
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));
UPDATE salaries
SET date = SUBSTRING(date, 2);
UPDATE salaries
SET date = REPLACE(date, '/', '-');
ALTER TABLE `salaries` CHANGE `date` `date` DATE NOT NULL;

ALTER TABLE `salaries` CHANGE `id` `id` INT(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `sales_order` CHANGE `transaction_id` `transaction_id` INT(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `sales` CHANGE `transaction_id` `transaction_id` INT(10) NOT NULL AUTO_INCREMENT,;
ALTER TABLE `expenses` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`id`);
ALTER TABLE `salaries` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`id`);
ALTER TABLE `purchases` CHANGE `transaction_id` `transaction_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `collection` CHANGE `transaction_id` `transaction_id` INT(11) NOT NULL AUTO_INCREMENT;