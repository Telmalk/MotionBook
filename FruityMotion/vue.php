<?php
if (!isset($_GET['id'])) {
    header('Location: index.php?error=noidprovideddetails');
    exit;
}
require_once "connexion.php";
$requete = "SELECT 
  `post_id`, 
  `titre`, 
  `media`,
  `description`,
  `date`,
  `nb_vue`,
  `nb_like`,
  `username`
FROM 
  `post`, `user`
WHERE
  `post_id` = :id
;";
$stmt = $conn->prepare($requete);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Index &bull; Fruity Motion</title>

        <meta charset="utf-8">
        <meta value="notranslate" name="google">
        <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" name="viewport">

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/grid.css">
        <link rel="stylesheet" href="css/vue.css">
        <!--[if gte IE 9]
            <style type="text/css">
                .gradient {
                    filter: none;
                }
            </style>
        <![endif]-->
    </head>
    <body>
        <header id="header">
            <div class="grid-100 tablet-grid-100">
                <span class="logo"><span class="vert">Motion</span>Book</span>
                <nav class="topnav">
                    <a href="#">Motions</a>
                    <a href="#">Designers</a>
                    <a href="#">Teams</a>
                    <a href="#">Jobs</a>
                    <a href="#">About</a>
                </nav>

                <div class="search grid-30 tablet-grid-20">
                    <label for="search">
                        <i class="icon-search"></i>
                        <input type="text" placeholder="Search..." name="search">
                    </label>

                </div>

                <div class="right grid-10 tablet-grid-20">
                    <a href="#" class="circle-button"><span class="icon-plus"></span></a>
                    <a href="#" class="user"></a>
                </div>

            </div>

        </header>
        <div class="submenu">
            <div class="grid-100 tablet-grid-100 grid-parent">

                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="index.html" class="active"><span class="icon-notebook"></span><span>Following</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="#"><span class="icon-heart"></span><span>Popular</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="#"><span class="icon-clock"></span><span>Newest</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="#"><span class="icon-star"></span><span>Favorites</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="#"><span class="icon-users"></span><span>Teams</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="#"><span class="icon-layout"></span><span>All</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="#"><span class="icon-mail"></span><span>Messages</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="mymotions.html"><span class="icon-cabinet"></span><span>My motions</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="params.html"><span class="icon-cog"></span><span>Settings</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="#"><span class="icon-close"></span><span>Sign out</span></a>
                </div>
            </div>
        </div>

        <?php 
            $time = strftime('%d / %b / %Y', strtotime($row['date']));

        ?>

        <div class="app_content">
            <div class="vue_container">
                <h1 class="title"><?=$row['titre']?></h1>
                <img src="<?=$row['avatar']?>">
                <p class="username"><?=$row['username']?></p>
                <p><?=$time?></p>
                <img src="<?=$row['media']?>">
                <p><?=$row['description']?></p>
            </div>
            
        </div>