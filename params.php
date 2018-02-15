<?php

require '../connexion.php';

$requete = "SELECT
  `user_id`, 
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
                    <a href="index.html"><span class="icon-notebook"></span><span>Following</span></a>
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
                    <a href="params.php?user_id=<?=$row['user_id']?> class="active"><span class="icon-cog"></span><span>Settings</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="#"><span class="icon-close"></span><span>Sign out</span></a>
                </div>
            </div>
        </div>

        <form action="../change.php" method="post" class="app_content">
            <ul class="grid-container settings">
                <li>
                    <h2>Profil</h2>
                </li>

                    <input type="hidden" name="user_id" value="<?=$row['user_id']?>">

                <li>
                    <label for="username">User name</label>
                    <div><input type="text" name="username" value="<?=$row['username']?>"></div>
                </li>
                <li>
                    <label for="about">About you</label>
                    <div><textarea name="about" placeholder="About you"></textarea></div>
                </li>
                <li>
                    <label for="location">Avatar</label>
                    <div><input type="file" name="avatar" value="<?=$row['password']?>"></div>
                </li>
                <li>
                    <label for="website">Website</label>
                    <div><input type="text" name="website" placeholder="http://"></div>
                </li>
            </ul>

            <ul class="grid-container settings">
                <li>
                    <h2>Basic Info</h2>
                </li>
                <li>
                    <label for="email">Email adress</label>
                    <div><input type="email" name="email" value="<?=$row['email']?>"></div>
                </li>
                <li>
                    <label for="email">Password</label>
                    <div><input type="password" name="password" value="<?=$row['password']?>"></div>
                </li>
            </ul>

            <div class="grid-container settings">
                <button class="btn-default">Delete account</button>
                <div class="right">
                    <button class="btn-default">Cancel</button>
                    <button type="submit" class="btn-submit">Save settings</button>
                </div>

            </div>
        </form>


        <footer>
            MotionBook &copy; 2014 &bull; Designed & developed with love by Kevin Manssat
        </footer>

        <script src="js/jquery.js"></script>
        <script src="js/salvattore.min.js"></script>
    </body>
</html>
