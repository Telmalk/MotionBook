<?php

/* if (!isset($_POST['titre']) || !isset($_POST['media']) || !isset($_POST['description'])) {
    header('Location: index.php');
    exit;
}*/
require_once "connexion.php";
$requete = "UPDATE
  `post`
SET
  `titre` = :titre,
  `media` = :media,
  `description` = :description
WHERE
	post_id = :id
;";
$stmt = $conn->prepare($requete);
$stmt->bindValue(':id', $_POST['id']);
$stmt->bindValue(':titre', $_POST['titre']);
$stmt->bindValue(':media', $_POST['media']);
$stmt->bindValue(':description', $_POST['description']);
$stmt->execute();
header('Location: mymotions.html');
