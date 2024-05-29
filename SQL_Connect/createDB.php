<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    // creat connection
    $conn = new mysqli($servername, $username, $password);

    //check connection
    if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }
    echo "Conected Successfully";

    // create database
    $sql = "CREATE DATABASE myDB123";
    if($conn->query($sql) == TRUE){
        echo "database created successfully";
    }else{
        echo "error creating database:".$conn->connect_error;
    }
    $conn->close();
?>