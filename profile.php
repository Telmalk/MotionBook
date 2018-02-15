<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 15/02/2018
 * Time: 16:45
 */

if (!isset($_GET["id"])){
    header('Location: index.php');
    exit;
}

require_once "./connexion.php";

$sql2 = "SELECT * FROM user WHERE user_id = :id;";
$stmt2 = $conn->prepare($sql2);
$stmt2->bindValue(':id', $_GET["id"]);
$stmt2->execute();
$row2 = $stmt2->fetch();

$sql = "SELECT * FROM user INNER JOIN post ON user.user_id = post.user_id WHERE user.user_id = :id;";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':id', $_GET["id"]);
$stmt->execute();
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
    <div class="profile_top">
        <div class="profile_img">
            <img src="img/<?= $row2['avatar']; ?>" alt="<?= $row2['username']; ?>">
        </div>
        <div class="profile_info">
            <h1><?= $row2['username']; ?></h1>
        </div>

    </div>

    <ul id="motions" class="grid-100 tablet-grid-100" data-columns>

        <?php while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) :?>
            <?php
            $time = strftime('%d %b %Y', strtotime($row["date"]));

            ?>
            <li class="grid-25 tablet-grid-50 grid-parent">
                <a href="vue.php?id=<?=$row["post_id"]?>" class="motion_link">
                    <div class="motion">
                        <div class="cadre">
                            <img src="<?=$row["media"]?>">
                        </div>

                        <div class="description grid-100 tablet-grid-100">
                            <div class="grid-20 tablet-grid-15 grid-parent">
                                <div class="user_avatar"><img src="img/<?=$row["avatar"]?>" alt=""></div>
                            </div>
                            <div class="grid-80 tablet-grid-85">
                                <div class="motion_title"><?=$row["titre"]?></div>
                                <div class="info"><a href="#" class="user_link"><?=$row["username"]?></a>, <?=$time?></div>
                            </div>

                        </div>
                        <div class="actionbar">
                            <a href="#" class="action"><span class="icon-heart"></span> <?=$row["nb_like"]?></a>
                            <a href="#" class="action"><span class="icon-bubble"></span> 2</a>
                            <a href="#" class="action"><span class="icon-eye"></span> <?=$row["nb_vue"]?></a>
                        </div>
                    </div>
                </a>
            </li>
        <?php endwhile;?>
    </ul>
</div>

<footer>
    MotionBook &copy; 2018 &bull; Designed & developed with love by Kevin Manssat real backend groupe 17 bang bang
</footer>

<script src="js/jquery.js"></script>
</body>
</html>

