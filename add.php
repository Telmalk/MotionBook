<?php
 session_start();
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>add</title>
    </head>
    <body>
        <form method="post" action="doadd.php" enctype="multipart/form-data">
            <p>
                Titre: <input type="text" name="title">
                <?php
                    if (isset($_SESSION['error']["title"])) {
                        echo $_SESSION['error']["title"];
                    }
                ?>
            </p>
            <p>
                description: <input type="text" name="description">
                <?php
                    if (isset($_SESSION['error']["description"])){
                        echo $_SESSION['error']["description"];
                    }
                ?>
            </p>
            <p>
                <input type="file" name="file">
                <?php
                    if (isset($_SESSION['error']['file'])) {
                        echo $_SESSION['error']['file'];
                    }
                ?>
            </p>
            <input type="submit" value="valider">
        </form>
    </body>
</html>
<?php
unset($_SESSION['error']);
?>