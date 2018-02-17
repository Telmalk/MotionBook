<?php
session_start();

require_once "connexion.php";
include "function.php";


if (!isset($_POST["title"]) || !isset($_POST["description"]) && $_POST['title'] === "" || $_POST['description'] === "") {
    if ($_POST['title'] === "") {
        $_SESSION["error"]["title"] = "veuillez indiquer un titre";
    }
    if ($_POST['description'] === "") {
        $_SESSION["error"]["description"] = "veuillez indqier une déscription";
    }
    if ($_FILES['file']['name'] === "") {
        $_SESSION['error']['file'] = "Veuillez upload un fichier au format gif";
    }
    header('Location: add.php?nopostdata');
    exit;
}
$sql = "INSERT INTO 
            `post`
            (`titre`, `media`, `description`, `nb_vue`, `nb_like`, `user_id`)
            VALUES
            (:titre, :media, :description, 0, 0, :user_id)
            ;
            ";

if (($format = checkFormat($_FILES["file"]["name"]) === false)) {
    $_SESSION['error']["file"] = "Une erreur est survenue lors sur votre fichier";
    header("Location: add.php");
    exit;
}



saveFile();
$stmt = $conn->prepare($sql);
$stmt->bindValue(':titre', $_POST['title']);
$stmt->bindValue(':description', $_POST['description']);
$stmt->bindValue(':media', "./asset/img/gif/".$_POST['title']."_".$_SESSION['user']['id'].".gif");
$stmt->bindValue(":user_id", $_SESSION['user']['id']);
$stmt->execute();
header('Location: index.php');
exit;