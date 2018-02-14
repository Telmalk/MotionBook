<?php
/**
 * Created by PhpStorm.
 * User: travailleur
 * Date: 13/02/2018
 * Time: 16:46
 */

try {
    $conn = new PDO('mysql:dbname=mydb;host=127.0.0.1', 'root', 'kirby');
}catch(PDOException $exception) {
    die($exception ->getMessage());
}