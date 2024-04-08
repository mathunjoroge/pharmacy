CREATE TABLE sales_order_bonus (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice INT,
    product VARCHAR(50),
    quantity INT,
    amount DECIMAL(10, 2),
    price DECIMAL(10, 2),
    profit DECIMAL(10, 2),
    date DATE,
    discount DECIMAL(5, 2),
    batch VARCHAR(20),
    balance DECIMAL(10, 2),
    has_bonus BOOLEAN
);
