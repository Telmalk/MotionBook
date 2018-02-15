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

saveFile();
$stmt = $conn->prepare($requete);
$stmt->bindValue(':id', $_POST['id']);
$stmt->bindValue(':titre', $_POST['title']);
var_dump($_FILES['file']['name']);
echo strlen($_FILES['file']['name']);
if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "")  {
    $stmt->bindValue(':media', "./asset/img/gif/" . $_POST['title'] . "_" . $_SESSION['user']['id'] . ".gif");
} else {
    $oldFile = "select
                media
                from
                post
                WHERE 
                `post_id` = :id;
                ;";
    $stmtOldFile = $conn->prepare($oldFile);
    $stmtOldFile->bindValue(':id', $_POST['id']);
    $stmtOldFile->execute();
    $row = $stmtOldFile->fetch(PDO::FETCH_ASSOC);
    $stmt->bindValue(':media', $row["media"]);
}
$stmt->bindValue(':description', $_POST['description']);
$stmt->execute();
header('Location: mymotions.php');