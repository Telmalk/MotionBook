<?php
session_start();
var_dump($_SESSION);
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
        user_id
        FROM
        `user`
        WHERE
        email = :email;";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bindValue(':email', $_POST['email']);
        $stmt2->execute();
        $nbRow = $stmt2->rowCount();
        var_dump($nbRow);

        if($nbRow > 0){
            $_SESSION['error']['user'] = "Adresse mail déjà existante";
            header('Location: ./inscription.php');
            exit;
        }
            $sql = "INSERT INTO
                                `user`
                                (`username`, `email`, `password`, `create_time`, `role_id`)
                                VALUES
                                (:username, :email, :password, 2)
                                ;";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':username', htmlspecialchars($_POST['username']));
            $stmt->bindValue(':email', $_POST['email']);
            $stmt->bindValue(':password', hash('sha256', $_POST['password']));

            $stmt->execute();
            header("Location: ./index.php");
            exit;


    }
    header("Location: ./inscription.php");
    exit;
}else{
    header("Location: ./index.php");
    exit;
}
