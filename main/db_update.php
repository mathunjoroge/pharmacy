-- Update sales_order table
UPDATE sales_order
SET date = CONCAT(date, '/');

UPDATE sales_order
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));

UPDATE sales_order
SET date = SUBSTRING(date, 2);

UPDATE sales_order
SET date = REPLACE(date, '/', '-');

-- Change column date to DATE type in sales_order table
ALTER TABLE `sales_order` CHANGE `date` `date` DATE NOT NULL;

-- Update sales table
ALTER TABLE `sales` CHANGE `date` `date` VARCHAR(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

UPDATE sales
SET date = CONCAT(date, '/');

UPDATE sales
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));

UPDATE sales
SET date = SUBSTRING(date, 2);

UPDATE sales
SET date = REPLACE(date, '/', '-');

-- Change column date to DATE type in sales table
ALTER TABLE `sales` CHANGE `date` `date` DATE NOT NULL;

-- Update purchases table
UPDATE purchases
SET date = CONCAT(date, '/');

UPDATE purchases
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));

UPDATE purchases
SET date = SUBSTRING(date, 2);

UPDATE purchases
SET date = REPLACE(date, '/', '-');

-- Change column date to DATE type in purchases table
ALTER TABLE `purchases` CHANGE `date` `date` DATE NOT NULL;

-- Update purchases2 table
UPDATE purchases2
SET date = CONCAT(date, '/');

UPDATE purchases2
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));

UPDATE purchases2
SET date = SUBSTRING(date, 2);

UPDATE purchases2
SET date = REPLACE(date, '/', '-');

-- Change column date to DATE type in purchases2 table
ALTER TABLE `purchases2` CHANGE `date` `date` DATE NOT NULL;

-- Update pending table
UPDATE pending
SET date = CONCAT(date, '/');

UPDATE pending
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));

UPDATE pending
SET date = SUBSTRING(date, 2);

UPDATE pending
SET date = REPLACE(date, '/', '-');

-- Change column date to DATE type and make transaction_id AUTO_INCREMENT in pending table
ALTER TABLE `pending` CHANGE `date` `date` DATE NOT NULL;


-- Update payments table

UPDATE payments
SET date2 = CONCAT(date2, '/');

UPDATE payments
SET date2 = CONCAT(SUBSTRING(date2, 6), SUBSTRING(date2, 1, 5)); -- Corrected from date2 to date

UPDATE payments
SET date2 = SUBSTRING(date2, 2);

UPDATE payments
SET date2 = REPLACE(date2, '/', '-');



-- Update salaries table
UPDATE salaries
SET date = CONCAT(date, '/');

UPDATE salaries
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));

UPDATE salaries
SET date = SUBSTRING(date, 2);

UPDATE salaries
SET date = REPLACE(date, '/', '-');

-- Change column date to DATE type and make id AUTO_INCREMENT in salaries table
ALTER TABLE `salaries` CHANGE `date` `date` DATE NOT NULL;
ALTER TABLE `salaries` CHANGE `id` `id` INT(10) NOT NULL AUTO_INCREMENT;

-- Change transaction_id to AUTO_INCREMENT in sales_order table
ALTER TABLE `sales_order` CHANGE `transaction_id` `transaction_id` INT(10) NOT NULL AUTO_INCREMENT;

-- Change transaction_id to AUTO_INCREMENT in sales table
ALTER TABLE `sales` CHANGE `transaction_id` `transaction_id` INT(10) NOT NULL AUTO_INCREMENT;

-- Add PRIMARY KEY to expenses table
ALTER TABLE `expenses` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`id`);

-- Add PRIMARY KEY to salaries table
ALTER TABLE `salaries` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`id`);

-- Change transaction_id to AUTO_INCREMENT in purchases table
ALTER TABLE `purchases` CHANGE `transaction_id` `transaction_id` INT(11) NOT NULL AUTO_INCREMENT;

-- Change transaction_id to AUTO_INCREMENT in collection table
ALTER TABLE `collection` CHANGE `transaction_id` `transaction_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `payments` CHANGE `paymentid` `paymentid` INT(10) NOT NULL AUTO_INCREMENT;
