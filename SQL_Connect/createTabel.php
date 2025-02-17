<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myDB";
    
    // create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // check connection
    if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }

    // sql to create table
    $sql = "CREATE TABLE MyGuests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        firstname VARCHAR(30) NOT NULL, 
        lastname VARCHAR(30) NOT NULL, 
        email VARCHAR(50) NOT NULL, 
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if($conn->query($sql) === TRUE){
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
?>
