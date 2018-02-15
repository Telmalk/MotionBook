<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 13/02/2018
 * Time: 10:37
 */

if($_POST){
    if (isset($_POST['username']) && $_POST['username'] === "") {
        $_SESSION['error']['username'] = "Renseignez un username";
    }
    if(isset($_POST['email']) && $_POST['email'] === "" && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error']['email'] = "Renseignez un email valide";
    }
    if (isset($_POST['password']) && $_POST['password'] === "") {
        $_SESSION['error']['password'] = "Renseignez un mot de passe";
    }
    if (isset($_POST['confpassword']) && $_POST['confpassword'] === "") {
        $_SESSION['error']['confpassword'] = "Confirmez votre mot de passe";
    }
    if ($_POST['password'] !== $_POST['confpassword']) {
        $_SESSION['error']['samepassword'] = "Veuillez entrer des mots de passe identiques";
    }


    if (!isset($_SESSION['error'])){
        require_once "./connexion.php";

        $sql2 = "SELECT
        username, email
        FROM
        `user`
        WHERE
        email = :email
        OR 
        username = :username;";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bindValue(':email', $_POST['email']);
        $stmt2->bindValue(':username', $_POST['username']);
        $stmt2->execute();
        $row = $stmt2->fetch();
        $nbRow = $stmt2->rowCount();

        if($nbRow > 0){
            if($row['email'] === $_POST['email']){
                $_SESSION['error']['emailexist'] = "Adresse mail déjà existante";
            }
            if($row['username'] === $_POST['username']){
                $_SESSION['error']['userexist'] = "Username déjà existant";
            }
            header('Location: ./inscription.php');
            exit;
        }
            $sql = "INSERT INTO
                                `user`
                                (`username`, `email`, `password`, `role_id`)
                                VALUES
                                (:username, :email, :password, 2)
                                ;";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':username', htmlspecialchars($_POST['username']));
            $stmt->bindValue(':email', $_POST['email']);
            $stmt->bindValue(':password', hash('sha256', $_POST['password']));

            $stmt->execute();
            $_SESSION['success']['adduser'] = "Votre inscription a bien été prise en compte. Vous pouvez maintenant vous connecter";
            header("Location: ./signIn.php");
            exit;
    }
    header("Location: ./inscription.php");
    exit;
}else{
    header("Location: ./index.php");
    exit;
}
?>
