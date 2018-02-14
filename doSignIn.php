<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 13/02/2018
 * Time: 16:06
 */

if ($_POST){
    if (isset($_POST['username']) && $_POST['username'] === ""){
        $_SESSION['error']['username'] = "Entrez un nom d'utilisateur";
    }
    if (isset($_POST['password']) && $_POST['password'] === ""){
        $_SESSION['error']['password'] = "Entrez un mot de passe";
    }

    if (!isset($_SESSION['error'])){
        require_once 'connexion.php';

        $sql = "SELECT
        user_id,
        username,
        password,
        role_id
        FROM
        `user`
        WHERE
        username = :username
        AND
        password = :password";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":username", $_POST['username']);
        $stmt->bindValue(":password", hash("sha256", $_POST['password']));
        $stmt->execute();
        $row = $stmt->fetch();
        $nbFind = $stmt->rowCount();

        if($nbFind > 0){
            $_SESSION['user']['id'] = $row["user_id"];
            $_SESSION['user']['username'] = $row["username"];
            $_SESSION['user']['role_id'] = $row["role_id"];
            header('Location: index.php');
            exit;
        }else{
            $_SESSION['error']['nouser'] = "Compte inexistant";
            header('Location: signIn.php');
            exit;
        }
    }
}
