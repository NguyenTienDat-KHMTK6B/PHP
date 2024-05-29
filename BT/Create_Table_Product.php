<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Product";
    
    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password);

    // Kiểm tra kết nối
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    // Tạo cơ sở dữ liệu
    $sql = "CREATE DATABASE IF NOT EXISTS Product";
    if($conn->query($sql) === TRUE){
        echo "Database created successfully<br>";
    }else{
        echo "Error creating database: " . $conn->error;
    }

    // Chọn cơ sở dữ liệu
    $conn->select_db($dbname);

    // Tạo bảng
    $sql = "CREATE TABLE IF NOT EXISTS ProductTble (
        Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        Namee VARCHAR(30) NOT NULL, 
        Company VARCHAR(30) NOT NULL, 
        Color VARCHAR(50) NOT NULL, 
        Amount INT(6) NOT NULL, 
        Price FLOAT NOT NULL, 
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    if($conn->query($sql) === TRUE){
        echo "Table created successfully<br>";
    }else{
        echo "Error creating table: " . $conn->error;
    }

    // Thêm dữ liệu
    $sql = "INSERT INTO ProductTble (Namee, Company, Color, Amount, Price) VALUES
            ('Banh my', 'KCN', 'Red', 5, 1000),
            ('Banh keo', 'XYZ', 'Blue', 8, 1200),
            ('Banh quy', 'ABC', 'Green', 10, 800),
            ('Sua tuoi', 'DEF', 'White', 20, 2000),
            ('Ca phe', 'GHI', 'Brown', 15, 1500),
            ('Nuoc ngot', 'JKL', 'Yellow', 30, 500),
            ('Keo mut', 'MNO', 'Purple', 25, 300),
            ('Pizza', 'PQR', 'Orange', 12, 1800),
            ('Chocolate', 'STU', 'Black', 7, 900),
            ('Gao', 'VWX', 'Beige', 40, 1500)";

    if($conn->query($sql) === TRUE){
        echo "New records created successfully";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
