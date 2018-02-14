<?php

require_once "../connexion.php";

if (!isset($_GET['post_id'])){
    header('Location: index.php');
    exit;
}

$sql = "DELETE FROM
`post`
WHERE
`post_id` = :id
;";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':id', $_GET['post_id']);
$stmt->execute();

header("Location: index.php");
exit;
