<?php

/**
 * Created by PhpStorm.
 * User: travailleur
 * Date: 12/02/2018
 * Time: 18:05
 */
session_start();
if (!isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}

require_once "./connexion.php";

$sql = "SELECT
post_id,
titre,
media,
description,
nb_vue,
nb_like,
post.user_id,
username,
date
FROM
post
INNER JOIN
user ON post.user_id = user.user_id
WHERE
post.user_id = :user_id
;";



$stmt = $conn->prepare($sql);
$stmt->bindValue(':user_id', $_SESSION['user']['id']);
$stmt->execute();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Index &bull; Fruity Motion</title>

    <meta charset="utf-8">
    <meta value="notranslate" name="google">
    <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" name="viewport">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="grid.css">
    <!--[if gte IE 9]
        <style type="text/css">
            .gradient {
                filter: none;
            }
        </style>
    <![endif]-->
</head>
<body>
<?php include "header.php"; ?>

<div class="app_content">
    <ul id="motions" class="grid-100 " data-columns>
        <li class="grid-25 tablet-grid-50 grid-parent">
            <a class="motion add_motion" href="#">
                <span class="repere"></span>
                <div class="center">
                    <div class="circle-button"><span class="icon-plus"></span></div>
                    <p>Add a motion</p>
                </div>
            </a>
        </li>

        <?php while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) :?>
            <?php
            $time = strftime('%d/%b/%Y', strtotime($row["date"]));

            ?>
            <li class="grid-25 tablet-grid-50 grid-parent">
                <div class="motion">

                    <div class="cadre">
                        <img src="<?=$row["media"]?>">
                        <button class="edit-button"><span class="icon-pencil"></span></button>
                    </div>

                    <div class="description grid-100 tablet-grid-100">
                        <div class="grid-20 tablet-grid-15 grid-parent">
                            <div class="user_avatar"><img src="<?=$row["media"]?>" alt=""></div>
                        </div>
                        <div class="grid-80 tablet-grid-85">
                            <div class="motion_title"><?=$row["titre"]?></div>
                            <div class="info"><a href="#" class="user_link"><?=$row["username"]?></a>, <?=$time?></div>
                        </div>

                    </div>
                    <div class="actionbar">
                        <a href="#" class="action"><span class="icon-heart"></span><?=$row["nb_like"]?></a>
                        <a href="#" class="action"><span class="icon-bubble"></span> 2</a>
                        <a href="#" class="action"><span class="icon-eye"></span><?=$row["nb_vue"]?></a>
                    </div>
                </div>
            </li>
        <?php endwhile;?>
    </ul>
</div>

<footer>
    MotionBook &copy; 2014 &bull; Designed & developed with love by Kevin Manssat
</footer>

<script src="js/jquery.js"></script>
</body>
</html>