<?php
session_start();
if (isset($_SESSION['user'])){
    header('Location: index.php');
}
?>

<form action="doSignIn.php" method="POST">
    <label for="username">Nom d'utilisateur</label>
    <input type="text" placeholder="Entrez votre username" name="username" id="username">
    <?php
    if (isset($_SESSION['error']['username'])){
        echo $_SESSION['error']['username'];
    }
    ?>

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" placeholder="Entrez un mot de passe">
    <?php
    if (isset($_SESSION['error']['password'])){
        echo $_SESSION['error']['password'];
    }
    ?>

    <?php
    unset($_SESSION['error']);
    ?>

    <input type="submit" value="Se logger">
</form>