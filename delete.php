<?php

if (!isset($_POST['id'])) {
    header('Location: index.php?error=nopostdatadelete');
    exit;
}
require_once "connexion.php";
$requete = "DELETE FROM 
`user` 
WHERE 
user_id = :id;";
$stmt = $conn->prepare($requete);
$stmt->bindValue(':id', $_POST['id']);
$stmt->execute();
header('Location: index.php');


