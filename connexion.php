<?php
try {
    $conn = new PDO('mysql:dbname=mydb;host=localhost', 'root', 'root');
} catch (PDOException $exception) {
    die($exception->getMessage());
}
