<?php
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}
require_once "connexion.php";
$requete = "SELECT
  `titre`,
  `media`,
  `description`,
  `date`,
  `nb_vue`,
  `nb_like`
FROM
  `post`
WHERE
  `post_id` = :id
;";
$stmt = $conn->prepare($requete);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <title>MotionBook</title>
    <meta charset="utf-8">
        <meta value="notranslate" name="google">
        <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" name="viewport">

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/grid.css">
        <link rel="stylesheet" href="css/form.css">
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

		<div class="app_content">

			<form class="form_edit" action="doedit.php" method="post">

			    <input type="hidden" name="id" value="<?=$_GET['id']?>">
                <div class="input_item input-item-first">
                    <label class="label" for="titre">Titre</label> <input class="input_text"  type="text" name="titre" value="<?=$row['titre']?>"><br>
                </div>

                <div class="input_item">
                    <label class="label" for="media">Media</label> <input type="file" name="media" value="<?=$row['media']?>"><br>
                </div>

                <div class="input_item">
                    <label class="label" for="description">Description</label>
                    <textarea class="input_paragraph" rows="2" cols="50"></textarea>
                    <br>
                </div>

                <div class="input_item input-item-last">
                    <input class="form_button" type="submit" value="Ajouter">
                </div>

			</form>

		</div>
</body>
</html>
