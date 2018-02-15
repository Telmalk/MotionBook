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
    <?php
        include "header.php";
    ?>
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