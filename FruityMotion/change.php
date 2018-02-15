<?php
require 'connexion.php';
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



    <html>
        <head>
            <meta charset="utf-8">
            <title>add</title>
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/grid.css">
            <link rel="stylesheet" href="css/form.css">
        </head>
        <body>
            <?php include "header.php"; ?>

    <div class="app_content">


      <form class="form_edit" action="update.php" method="post">
          <input type="hidden" name="user_id" value="<?=$_GET['user_id']?>"> <br>
          <p class="input_item input-item-first">
            <label>Username</label><input class="input_text input-text-correction" type="text" name="username" value="<?=$row['username']?>">
          </p>
          <p class="input_item">
            <label for="">Email</label><input class="input_text input-text-correction" type="email" name="email" value="<?=$row['email']?>">
          </p>
          <p class="input_item">
            <label>Password</label><input class="input_text input-text-correction" type="password" name="password">
          </p>
          <p class="input_item input-item-last">
            <input class="form_button" type="submit">
          </p>
          
      </form>

      </div>