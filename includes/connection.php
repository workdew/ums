<?php
global $db;
try {
    $host = 'localhost';
    $username = 'dev';
    $password = 'info@del';
    $dbname = 'usermanagementsystem';
    
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
session_start();
define('BASE_DIR', dirname(__DIR__));

