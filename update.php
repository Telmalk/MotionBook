<?php
/**
 * Created by PhpStorm.
 * User: travailleur
 * Date: 13/02/2018
 * Time: 16:45
 */


require 'connection.php';
$requete = "UPDATE 
  `user` 
SET 
  `username` = :username, 
  `email` = :email,
  `password` = :password 
WHERE 
user_id = :user_id
;";



$stmt = $conn->prepare($requete);
$stmt->bindParam(':username', $_POST['username']);
$stmt->bindValue(':email', $_POST['email']);
$stmt->bindValue(':password', $_POST['password']);
$stmt->bindValue(':user_id', $_POST['user_id']);
$stmt->execute();
header('Location: read.php');
