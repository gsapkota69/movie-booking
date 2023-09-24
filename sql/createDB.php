<?php

// Connection Variables
$server = "localhost";
$user = "root";
$pass = "";
$db = "movies";

//Connection or Creation of Database
$conn = new mysqli($server, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$createDBQuery = "CREATE DATABASE IF NOT EXISTS $db";
if ($conn->query($createDBQuery) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn = new mysqli($server, $user, $pass, $db);

//Creation of Tables
$createTableQuery1 = "CREATE TABLE IF NOT EXISTS comingsoon (
    title VARCHAR(50) NOT NULL primary key,
    name VARCHAR(255) NOT NULL,
    description text,
    images VARCHAR(255) NOT NULL
    )";
if ($conn->query($createTableQuery1) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$createTableQuery2 = "CREATE TABLE IF NOT EXISTS nowshowing (
    title VARCHAR(50) NOT NULL primary key,
    name VARCHAR(255) NOT NULL,
    description text,
    images VARCHAR(255) NOT NULL
    )";
if ($conn->query($createTableQuery2) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

//Creating Tables for users
$createTableQuery3 = "CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
    )";
if ($conn->query($createTableQuery3) === TRUE) {
    echo "Users created successfully";
} else {
    echo "Error creating Users: " . $conn->error;
}

$createTableQuery4 = "CREATE TABLE IF NOT EXISTS admin (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
    )";

?>