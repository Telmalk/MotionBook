<?php
session_start();

if (isset($_SESSION['user'])){
    header('Location: index.php');
}

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
            <?php include "header.php"; ?>

    <div class="app_content">
        <form class="form_edit" action="addUser.php" method="POST">
            <p class="input_item input-item-first">
                <label for="username">Nom d'utilisateur</label>
                <input class="input_text input-text-correction" type="text" placeholder="Entrez votre username" name="username" id="username">
            </p>
            
            <?php
            if (isset($_SESSION['error']['username'])){
                echo $_SESSION['error']['username'];
            }
            if(isset($_SESSION['error']['userexist'])){
                echo $_SESSION['error']['userexist'];
            }
            ?>

            <p class="input_item">
                <label for="email">Email</label>
                <input class="input_text input-text-correction" type="text" placeholder="Entrez votre adresse mail" name="email" id="email">
            </p>
            
            <?php
            if (isset($_SESSION['error']['email'])){
                echo $_SESSION['error']['email'];
            }
            if(isset($_SESSION['error']['emailexist'])){
                echo $_SESSION['error']['emailexist'];
            }
            ?>

            <p class="input_item">
                <label for="password">Mot de passe</label>
                <input class="input_text input-text-correction" type="password" name="password" id="password" placeholder="Entrez un mot de passe">
            </p>
            
            <?php
            if (isset($_SESSION['error']['password'])){
                echo $_SESSION['error']['password'];
            }
            ?>

            <p class="input_item">
                <label for="confpassword">Confirmation de mot de passe</label>
                <input class="input_text input-text-correction" type="password" name="confpassword" id="confpassword" placeholder="Entrez un mot de passe">
            </p>
            
            <?php
            if (isset($_SESSION['error']['confpassword'])){
                echo $_SESSION['error']['confpassword'];
            }
            if(isset($_SESSION['error']['samepassword'])){
                echo $_SESSION['error']['samepassword'];
            };

            unset($_SESSION['error']);
            ?>

            <p class="input_item input-item-last">
                <input class="form_button" type="submit" value="S'inscrire">
            </p>
            
        </form>
    </div>
