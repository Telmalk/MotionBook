<?php
/**
 * Created by PhpStorm.
 * User: travailleur
 * Date: 15/02/2018
 * Time: 18:52
 */


require 'connexion.php';
include 'fonction.php';
$requete = "UPDATE
`user`
SET
`username` = :username,
`email` = :email,
`password` = :password,
`avatar` = :avatar
WHERE
user_id = :user_id
;";
$stmt = $conn->prepare($requete);
$stmt->bindParam(':username', $_POST['username']);
$stmt->bindValue(':email', $_POST['email']);
$stmt->bindValue(':password', hash("sha256", $_POST['password']));
$stmt->bindValue(':avatar',"./asset/img/avatar/".$_SESSION['user']['id'].".jpg");
$stmt->bindValue(move_uploaded_file($_FILES['file']['tmp_name'],"./asset/img/avatar/".$_SESSION["user"]."_".["id"]));
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