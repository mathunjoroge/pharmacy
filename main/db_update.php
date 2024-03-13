--altering sales_order
UPDATE sales_order
SET date = CONCAT(date, '/');
UPDATE sales_order
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));
UPDATE sales_order
SET date = SUBSTRING(date, 2);
UPDATE sales_order
SET date = REPLACE(date, '/', '-');
ALTER TABLE `sales_order` CHANGE `date` `date` DATE NOT NULL;

--altering sales table
UPDATE sales
SET date = CONCAT(date, '/');
UPDATE sales
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));
UPDATE sales
SET date = SUBSTRING(date, 2);
UPDATE sales
SET date = REPLACE(date, '/', '-');
ALTER TABLE `sales` CHANGE `date` `date` DATE NOT NULL;

--altering purchases table
UPDATE purchases
SET date = CONCAT(date, '/');
UPDATE purchases
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));
UPDATE purchases
SET date = SUBSTRING(date, 2);
UPDATE purchases
SET date = REPLACE(date, '/', '-');
ALTER TABLE `purchases` CHANGE `date` `date` DATE NOT NULL;

--altering purchases2 table
UPDATE purchases2
SET date = CONCAT(date, '/');
UPDATE purchases2
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));
UPDATE purchases2
SET date = SUBSTRING(date, 2);
UPDATE purchases2
SET date = REPLACE(date, '/', '-');
ALTER TABLE `purchases2` CHANGE `date` `date` DATE NOT NULL;

--altering pending table this is a purchases table that was in test
UPDATE pending
SET date = CONCAT(date, '/');
UPDATE pending
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));
UPDATE pending
SET date = SUBSTRING(date, 2);
UPDATE pending
SET date = REPLACE(date, '/', '-');
ALTER TABLE `pending` CHANGE `date` `date` DATE NOT NULL;
ALTER TABLE `pending` CHANGE `transaction_id` `transaction_id` INT(10) NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`transaction_id`);

--altering payments table this is money out
UPDATE payments
SET date2 = CONCAT(date, '/');
UPDATE payments
SET date2 = CONCAT(SUBSTRING(date2, 6), SUBSTRING(date2, 1, 5));
UPDATE payments
SET date = SUBSTRING(date2, 2);
UPDATE payments
SET date = REPLACE(date, '/', '-');
ALTER TABLE `payments` CHANGE `date2` `date` DATE NOT NULL;
ALTER TABLE `payments` ADD PRIMARY KEY(`paymentid`);
ALTER TABLE `payments` CHANGE `paymentid` `paymentid` INT(10) NOT NULL AUTO_INCREMENT;

--altering salaries table this is money out
UPDATE salaries
SET date = CONCAT(date, '/');
UPDATE salaries
SET date = CONCAT(SUBSTRING(date, 6), SUBSTRING(date, 1, 5));
UPDATE salaries
SET date = SUBSTRING(date, 2);
UPDATE salaries
SET date = REPLACE(date, '/', '-');
ALTER TABLE `salaries` CHANGE `date` `date` DATE NOT NULL;
ALTER TABLE `salaries` ADD PRIMARY KEY(`id`);
ALTER TABLE `salaries` CHANGE `paymentid` `id` INT(10) NOT NULL AUTO_INCREMENT;