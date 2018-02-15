<?php
session_start();
require_once "connexion.php";
//if ($_SESSION['user']['role_id'] != 1) {
  //  echo "Vous avez pas accès a cette page";
    //exit;
//}
$sql = "SELECT
        user_id,
        username,
        email,
        create_time,
        role_id
        FROM
        `user`
        ; 
        ";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<html>
    <head>
        <head>
            <title>all user &bull; Fruity Motion</title>

            <meta charset="utf-8">
            <meta value="notranslate" name="google">
            <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" name="viewport">

            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/grid.css">
            <link rel="stylesheet" type="text/css" href="form.css">
        </head>
        <body>
    <?php include "header.php"; ?>
    <div class="container" style="margin-top: 200px; margin-left:30px;">
                <?php
                while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                <div class="userCard" style="border: 1px solid rgb(209, 209, 209); position: relative; width: 300px; color:rgb(209, 209, 209);">
                    <p><?=$row["username"]?></p>
                    <p><?=$row["email"]?></p>
                    <p><?=$row["create_time"]?></p>
                    <?php if ($row["role_id"] == 1) : ?>
                    <p>Admin</p>
                    <?php else : ?>
                    <p>User</p>
                        <a href="deleteUser.php?id=<?=$row["user_id"]?>"><span style="position: absolute; top: 2px; right: 2px; color: black">X</span></a>
                    <span style="position: absolute; top: 2px; right: 15px; color: black">O</span>
                    <?php endif ?>
                </div>
                <?php endwhile; ?>
            </div>
        </body>
</html>