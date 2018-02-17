<?php
try {
    $conn = new PDO ('mysql:host=localhost;dbname=mydb', 'root', 'root');
} catch (PDOException $exception){
   echo $exception->getMessage( );
   exit;
}
