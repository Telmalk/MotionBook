<?php
try {
    $conn = new PDO ('mysql:host=localhost;dbname=mydb', 'root', 'wFo(pZt<');
} catch (PDOException $exception){
    die("Can't connect bdd toussa");
}
