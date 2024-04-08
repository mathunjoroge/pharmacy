<?php
ini_set("display_errors", "On");
session_start();
include('../connect.php');

try {
    // Table creation
    $tableName = 'sales_order_bonus';
    $sql = "CREATE TABLE IF NOT EXISTS $tableName (
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
    )";

    $db->exec($sql);
    echo "Table $tableName creation status: Success<br>";

    // Table import from file
    $tableName = 'promotion';
    $tableExistsQuery = "SHOW TABLES LIKE ?";
    $stmt = $db->prepare($tableExistsQuery);
    $stmt->execute([$tableName]);

    if ($stmt->rowCount() == 0) {
        $sqlFilePath = 'promotion.sql';
        $sqlContent = file_get_contents($sqlFilePath);
        
        if ($sqlContent === false) {
            throw new Exception("Failed to read SQL file");
        }

        if ($db->exec($sqlContent) === false) {
            throw new Exception("Failed to execute SQL queries from file");
        }
        
        echo "Table $tableName import status: Success<br>";
    } else {
        echo "Table $tableName already exists<br>";
    }

    // Column addition
    $tableName = 'products';
    $stmt = $db->prepare("SHOW TABLES LIKE :tableName");
    $stmt->execute([':tableName' => $tableName]);

    if ($stmt->rowCount() > 0) {
        $columns = $db->query("SHOW COLUMNS FROM $tableName")->fetchAll(PDO::FETCH_COLUMN);

        if (!in_array('promotionqty', $columns)) {
            $db->exec("ALTER TABLE $tableName ADD promotionqty INT DEFAULT 0");
            echo "Column promotionqty added successfully to $tableName.<br>";
        }

        if (!in_array('promotion_number', $columns)) {
            $db->exec("ALTER TABLE $tableName ADD promotion_number INT DEFAULT 0");
            echo "Column promotion_number added successfully to $tableName.<br>";
        }
    } else {
        echo "Table $tableName does not exist.<br>";
    }

    // Check and alter product_id column
    $tableName = "products";
    $showTableQuery = "SHOW CREATE TABLE $tableName";
    $stmt = $db->prepare($showTableQuery);
    $stmt->execute();
    $tableInfo = $stmt->fetch(PDO::FETCH_ASSOC);

    // Extract the table creation query
    $tableCreationQuery = $tableInfo['Create Table'];

    // Check if the product_id is already a primary key and auto-incrementing
    if (strpos($tableCreationQuery, 'product_id INT AUTO_INCREMENT PRIMARY KEY') === false) {
        // Step 2: Alter the table to make product_id primary key auto-increment
        $alterTableQuery = "ALTER TABLE $tableName MODIFY COLUMN product_id INT AUTO_INCREMENT PRIMARY KEY";

        // Execute the alter table query
        $stmt = $db->prepare($alterTableQuery);
        $stmt->execute();
        echo "Table altered successfully. product_id is now a primary key and auto-incrementing.";
    } else {
        echo "product_id is already a primary key and auto-incrementing.";
    }
} catch (PDOException $e) {
    echo "PDOException: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $db = null;
}
?>
