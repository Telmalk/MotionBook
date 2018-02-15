<?php
require 'connexion.php';
$requete = "UPDATE
`user`
SET
`username` = :username,
`email` = :email,
`password` = :password
WHERE
user_id = :user_id
;";
$stmt = $conn->prepare($requete);
$stmt->bindParam(':username', $_POST['username']);
$stmt->bindValue(':email', $_POST['email']);
$stmt->bindValue(':password', hash("sha256", $_POST['password']));
if ($_POST["password"] != "") {
    $stmt->bindValue(':user_id', $_POST['user_id']);
} else {
    $password = "SELECT
            `password`
            FROM
            `user`
            WHERE
            `user_id` = :id
            ;
    ";
    $passwordStmt = $conn->prepare($password);
    $passwordStmt->bindValue(':id', $_GET["user_id"]);
    $passwordStmt->execute();
    $row = $passwordStmt->fetch(PDO::FETCH_ASSOC);
    $stmt->bindValue(':password', $row["password"]);

}
$stmt->execute();
header('Location: index.php');
exit;