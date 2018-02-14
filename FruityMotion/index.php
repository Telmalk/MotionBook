<?php
/**
 * Created by PhpStorm.
 * User: travailleur
 * Date: 12/02/2018
 * Time: 18:05
 */
try {
$conn = new PDO('mysql:dbname=mydb;host=127.0.0.1', 'root', 'kirby');
}catch(PDOException $exception) {
 die($exception ->getMessage());
}


$sql = "SELECT
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
user ON post.user_id=user.user_id
;";

$stmt = $conn->prepare($sql);
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
                    <a href="index.php" class="active"><span class="icon-notebook"></span><span>Following</span></a>
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
                    <a href="mymotions.php"><span class="icon-cabinet"></span><span>My motions</span></a>
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
            <ul id="motions" class="grid-100 tablet-grid-100" data-columns>
                <li class="grid-25 tablet-grid-50 grid-parent">
                    <div class="motion">

                        <div class="cadre" style="background: url(img/19.jpg) center center no-repeat"></div>

                        <div class="description grid-100 tablet-grid-100">
                            <div class="grid-20 tablet-grid-15 grid-parent">
                                <div class="user_avatar"><img src="img/profil.jpg" alt=""></div>
                            </div>
                            <div class="grid-80 tablet-grid-85">
                                <div class="motion_title">Warframe</div>
                                <div class="info"><a href="#" class="user_link">Craig Olejnik</a>, 2 minutes ago</div>
                            </div>

                        </div>
                        <div class="actionbar">
                            <a href="#" class="action"><span class="icon-heart"></span> 55</a>
                            <a href="#" class="action"><span class="icon-bubble"></span> 2</a>
                            <a href="#" class="action"><span class="icon-eye"></span> 132</a>
                        </div>
                    </div>
                </li>

                <li class="grid-25 tablet-grid-50 grid-parent">
                    <div class="motion">

                        <div class="cadre" style="background: url(img/pushy.png) center center no-repeat"></div>

                        <div class="description grid-100 tablet-grid-100">
                            <div class="grid-20 tablet-grid-15 grid-parent">
                                <div class="user_avatar"><img src="img/profil.jpg" alt=""></div>
                            </div>
                            <div class="grid-80 tablet-grid-85">
                                <div class="motion_title">Ice Cream Vision Introduction</div>
                                <div class="info"><a href="#" class="user_link">Craig Olejnik</a>, 2 days ago</div>
                            </div>

                        </div>
                        <div class="actionbar">
                            <a href="#" class="action"><span class="icon-heart"></span> 55</a>
                            <a href="#" class="action"><span class="icon-bubble"></span> 2</a>
                            <a href="#" class="action"><span class="icon-eye"></span> 132</a>
                        </div>
                    </div>
                </li>

                <li class="grid-25 tablet-grid-50 grid-parent">
                    <div class="motion">

                        <div class="cadre" style="background: url(img/Rim.png) center center no-repeat"></div>

                        <div class="description grid-100 tablet-grid-100">
                            <div class="grid-20 tablet-grid-15 grid-parent">
                                <div class="user_avatar"><img src="img/profil2.jpg" alt=""></div>
                            </div>
                            <div class="grid-80 tablet-grid-85">
                                <div class="motion_title">London war</div>
                                <div class="info"><a href="#" class="user_link">Paul Wesley</a>, 2 days ago</div>
                            </div>

                        </div>
                        <div class="actionbar">
                            <a href="#" class="action"><span class="icon-heart"></span> 55</a>
                            <a href="#" class="action"><span class="icon-bubble"></span> 2</a>
                            <a href="#" class="action"><span class="icon-eye"></span> 132</a>
                        </div>
                    </div>
                </li>

                <li class="grid-25 tablet-grid-50 grid-parent">
                    <div class="motion">

                        <div class="cadre" style="background: url(img/sky-island2.png) center center no-repeat"></div>

                        <div class="description grid-100 tablet-grid-100">
                            <div class="grid-20 tablet-grid-15 grid-parent">
                                <div class="user_avatar"><img src="img/profil2.jpg" alt=""></div>
                            </div>
                            <div class="grid-80 tablet-grid-85">
                                <div class="motion_title">London war</div>
                                <div class="info"><a href="#" class="user_link">Paul Wesley</a>, 2 days ago</div>
                            </div>

                        </div>
                        <div class="actionbar">
                            <a href="#" class="action"><span class="icon-heart"></span> 55</a>
                            <a href="#" class="action"><span class="icon-bubble"></span> 2</a>
                            <a href="#" class="action"><span class="icon-eye"></span> 132</a>
                        </div>
                    </div>
                </li>

                <li class="grid-25 tablet-grid-50 grid-parent">
                    <div class="motion">

                        <div class="cadre" style="background: url(img/Blur.jpg) center center no-repeat"></div>

                        <div class="description grid-100 tablet-grid-100">
                            <div class="grid-20 tablet-grid-15 grid-parent">
                                <div class="user_avatar"><img src="img/profil.jpg" alt=""></div>
                            </div>
                            <div class="grid-80 tablet-grid-85">
                                <div class="motion_title">Polygone background</div>
                                <div class="info"><a href="#" class="user_link">Craig Olejnik</a>, 3 days ago</div>
                            </div>

                        </div>
                        <div class="actionbar">
                            <a href="#" class="action"><span class="icon-heart"></span> 55</a>
                            <a href="#" class="action"><span class="icon-bubble"></span> 0</a>
                            <a href="#" class="action"><span class="icon-eye"></span> 132</a>
                        </div>
                    </div>
                </li>
                <?php while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) :?>
                    <?php
                    $time = strftime('%d / %b / %Y', strtotime($row["date"]));

                    ?>
                <li class="grid-25 tablet-grid-50 grid-parent">
                    <div class="motion">

                        <div class="cadre">
                            <img src="<?=$row["media"]?>">
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
                            <a href="#" class="action"><span class="icon-heart"></span> <?=$row["nb_like"]?></a>
                            <a href="#" class="action"><span class="icon-bubble"></span> 2</a>
                            <a href="#" class="action"><span class="icon-eye"></span> <?=$row["nb_vue"]?></a>
                        </div>
                    </div>
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
