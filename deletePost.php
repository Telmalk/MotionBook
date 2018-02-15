<?php
session_start();

require_once "./connexion.php";

if (!isset($_GET['id'])){
    header('Location: index.php');
    exit;
}

$sql = "DELETE FROM
`post`
WHERE
`post_id` = :id
AND 
`user_id` = :user_id
;";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':id', $_GET['id']);
$stmt->bindValue(':user_id', $_SESSION['user']['id']);

$stmt->execute();

header("Location: mymotions.php");
exit;
