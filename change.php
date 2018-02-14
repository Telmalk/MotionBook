<?php
/**
 * Created by PhpStorm.
 * User: travailleur
 * Date: 13/02/2018
 * Time: 17:00
 */
require 'connection.php';
$requete = "SELECT 
  `username`, 
  `email`,
  `password` 
FROM 
  `user`
WHERE
  `user_id` = :user_id
;";
$stmt = $conn->prepare($requete);
$stmt->bindValue(':user_id', $_GET['user_id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>




<form  action="update.php" method="post">
    <input type="hidden" name="user_id" value="<?=$_GET['user_id']?>"> <br>
    <label>username</label><input type="text" name="username" value="<?=$row['username']?>"> <br>
    <label for="">email</label><input type="email" name="email" value="<?=$row['email']?>"> <br>
    <label>password</label><input type="text" name="password" value="<?=$row['password']?>"> <br>
    <input type="submit">
</form>