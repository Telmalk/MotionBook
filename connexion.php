<?php

try {
    $conn = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'riviere453!!!');
} catch(PDOException $exception) {
    die("Erreur");
}