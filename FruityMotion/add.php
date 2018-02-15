<?php
 session_start();
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
            <form class="form_edit" method="post" action="doadd.php" enctype="multipart/form-data">
                <p class="input_item input-item-first">
                    Titre: <input class="input_text input-text-correction" type="text" name="title">
                    <?php
                        if (isset($_SESSION['error']["title"])) {
                            echo $_SESSION['error']["title"];
                        }
                    ?>
                </p>
                <p class="input_item">
                    Description: <input class="input_text input-text-correction" type="text" name="description">
                    <?php
                        if (isset($_SESSION['error']["description"])){
                            echo $_SESSION['error']["description"];
                        }
                    ?>
                </p>
                <p class="input_item">
                    <input type="file" name="file">
                    <?php
                        if (isset($_SESSION['error']['file'])) {
                            echo $_SESSION['error']['file'];
                        }
                    ?>
                </p>
                <div class="input_item input-item-last">
                    <input class="form_button" type="submit" value="valider">
                </div>
                
            </form>
        </div>
    </body>
</html>
<?php
unset($_SESSION['error']);
?>