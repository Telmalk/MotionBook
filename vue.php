<?php
if (!isset($_GET['id'])) {
    header('Location: index.php?error=noidprovideddetails');
    exit;
}
require_once "connexion.php";
$requete = "SELECT 
  `post_id`, 
  `titre`, 
  `media`,
  `description`,
  `date`,
  `nb_vue`,
  `nb_like`,
  `username`
FROM 
  `post`, `user`
WHERE
  `post_id` = :id
;";
$stmt = $conn->prepare($requete);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$nb = $stmt->rowCount();

if ($nb === 0){
    header('Location: index.php');
    exit;
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Index &bull; Fruity Motion</title>

    <meta charset="utf-8">
    <meta value="notranslate" name="google">
    <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" name="viewport">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/vue.css">
</head>
<body>
<?php
session_start();
include "header.php";

$time = strftime('%d %b %Y', strtotime($row['date']));
?>

<div class="app_content">
    <div class="vue_container">
        <h1 class="title"><?=$row['titre']?></h1>
        <p class="username"><?=$row['username']?></p>
        <p><?=$time?></p>
        <img src="<?=$row['media']?>">
        <p><?=$row['description']?></p>
    </div>

</div>
