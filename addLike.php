<?php
session_start();
require_once "connexion.php";

$sql = "UPDATE
        `post`
        SET
        `nb_like` = :like
        WHERE
        `post_id` = :id
";

$stmt = $conn->prepare($sql);
$stmt->bindValue(':id', $_GET["id"]);
$stmt->bindValue(":like", $_GET["like"] + 1);
$stmt->execute();
header("Location: index.php");
exit;
