<?php
session_start();

if (!isset($_SESSION['user'])){
    header('Location: index.php');
}
?>

<form action="addUser.php" method="POST">
    <label for="username">Nom d'utilisateur</label>
    <input type="text" placeholder="Entrez votre username" name="username" id="username">
    <?php
    if (isset($_SESSION['error']['username'])){
        echo $_SESSION['error']['username'];
    }
    if(isset($_SESSION['error']['userexist'])){
        echo $_SESSION['error']['userexist'];
    }
    ?>

    <label for="email">Email</label>
    <input type="text" placeholder="Entrez votre adresse mail" name="email" id="email">
    <?php
    if (isset($_SESSION['error']['email'])){
        echo $_SESSION['error']['email'];
    }
    if(isset($_SESSION['error']['emailexist'])){
        echo $_SESSION['error']['emailexist'];
    }
    ?>

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" placeholder="Entrez un mot de passe">
    <?php
    if (isset($_SESSION['error']['password'])){
        echo $_SESSION['error']['password'];
    }
    ?>

    <label for="confpassword">Confirmation de mot de passe</label>
    <input type="password" name="confpassword" id="confpassword" placeholder="Entrez un mot de passe">
    <?php
    if (isset($_SESSION['error']['confpassword'])){
        echo $_SESSION['error']['confpassword'];
    }
    if(isset($_SESSION['error']['samepassword'])){
        echo $_SESSION['error']['samepassword'];
    };

    unset($_SESSION['error']);
    ?>


    <input type="submit" value="S'inscrire">
</form>
