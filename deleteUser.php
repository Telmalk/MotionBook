<?php
session_start();
if (!isset($_SESSION['user']) || (isset($_SESSION['user']) && $_SESSION['user']['role_id'] != 1)) {
    header('Location: index.php');
    exit;
}

require_once "connexion.php";

$deleteAllPost = " DELETE FROM
                  `post`
                  WHERE
                  `user_id` = :id
                  ;";

$stmt = $conn->prepare($deleteAllPost);
$stmt->bindValue(':id', $_GET["id"]);
$stmt->execute();

$sql = "DELETE FROM
        `user`
        WHERE
        `user_id` = :id
        ;";

if (!isset($_GET["id"])) {
    header("Location: readUser.php?noapdata");
    exit;
}

var_dump($_GET["id"]);
$stmt = $conn->prepare($sql);
$stmt->bindValue(":id", $_GET["id"]);
$stmt->execute();
header("location: readUser.php");
exit;
