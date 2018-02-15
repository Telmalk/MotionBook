<?php
session_start();
require_once './connexion.php';

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
$stmt->bindValue(':user_id', $_SESSION['user']['id']);
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
<?php
    include "header.php";
?>

<form action="update.php" method="post" class="app_content" enctype="multipart/form-data">
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
            <div><input type="file" name="avatar"></div>
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
            <div><input type="password" name="password"></div>
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
