<?php
/**
 * Created by PhpStorm.
 * User: travailleur
 * Date: 15/02/2018
 * Time: 18:52
 */
session_start();

require 'connexion.php';
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
$stmt->bindValue(':username', $_POST['username']);
$stmt->bindValue(':email', $_POST['email']);
$stmt->bindValue(':user_id', $_POST['user_id']);
var_dump($_FILES);
if ($_FILES['avatar']['name'] !== "") {
    echo "je sios la poto";
    move_uploaded_file($_FILES['avatar']['tmp_name'], "asset/img/avatar/" . $_POST['username'] . "_" . $_SESSION['user']["id"]. ".jpg");
    $stmt->bindValue(':avatar', "asset/img/avatar/" . $_POST['username'] . "_" . $_SESSION['user']["id"]. ".jpg");
} else {
    $stmt->bindValue(':avatar', "asset/img/avatar/avatar_default.png");
}
if ($_POST["password"] != "") {
    $stmt->bindValue(':password', hash("sha256", $_POST['password']));
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
    $passwordStmt->bindValue(':id', $_POST["user_id"]);
    $passwordStmt->execute();
    $row = $passwordStmt->fetch(PDO::FETCH_ASSOC);
    $stmt->bindValue(':password', $row["password"]);

}
$stmt->execute();
header('Location: index.php');
exit;