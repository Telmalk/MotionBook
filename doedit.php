<?php
session_start();
require_once "connexion.php";
include "function.php";

$requete = "UPDATE 
  `post` 
SET 
  `titre` = :titre, 
  `media` = :media, 
  `description` = :description
WHERE 
	post_id = :id
;";

/*if (($format = checkFormat($_FILES["file"]["name"]) === false)) {
    $_SESSION['error']["file"] = "Une erreur est survenue lors sur votre fichier";
    echo 'je ta baise';
    var_dump($FILES);
    //header("Location: doupdate.php?id=".$_POST['id']);
    exit;
}*/

saveFile();
$stmt = $conn->prepare($requete);
$stmt->bindValue(':id', $_POST['id']);
$stmt->bindValue(':titre', $_POST['title']);
$stmt->bindValue(':media', "./asset/img/gif/".$_POST['title']."_".$_SESSION['user']['id'].".gif");
$stmt->bindValue(':description', $_POST['description']);
$stmt->execute();
header('Location: mymotions.php');