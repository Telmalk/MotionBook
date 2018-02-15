<?php
session_start();
if (isset($_SESSION['user'])){
    header('Location: index.php');
}
?>

<?php if (isset($_SESSION['success']['adduser'])): ?>
    <div class="alert success">
        <?php echo $_SESSION['success']['adduser']; ?>
    </div>
    <?php endif; ?>

<form action="doSignIn.php" method="POST">

    <label for="username">Nom d'utilisateur</label>
    <input type="text" placeholder="Entrez votre username" name="username" id="username">
    <?php
    if (isset($_SESSION['error']['username'])){
        echo $_SESSION['error']['username'];
    }
    if (isset($_SESSION['error']['password'])){
        echo $_SESSION['error']['password'];
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
    unset($_SESSION['success']);
    ?>

    <input type="submit" value="Se logger">
</form>
