<?php
session_start();

require_once "./connexion.php";
/**
 * function who check if the file in parameter is in on format jpg, gif, or mp4
 * @param $way
 * @return True or false
 */
function checkFormat($way) {
    $keyWord = preg_split("/[\\\\,.\/]+/ ", $way);
    $formatAccept = ["gif"];
    var_dump($keyWord);
    for ($j = 0; $j <= sizeof($formatAccept); $j++) {
        if ($keyWord[sizeof($keyWord) - 1] === $formatAccept[$j]) {
            return true;
        }
    }
    return false;
}

/**
 * function who save one file un directories user/file
 * @param $file
 * @return -1 if the creation fail;
 */
function saveFile() {
    $move = move_uploaded_file($_FILES['file']['tmp_name'], "./user/file/".$_FILES['file']['name']);
    if ($move === false) {
        return -1;
    }
}

if (!isset($_POST["title"]) || !isset($_POST["description"]) && $_POST['title'] === "" || $_POST['description'] === "") {
    if ($_POST['title'] === "") {
        $_SESSION["error"]["title"] = "veuillez indiquer un titre";
    }
    if ($_POST['description'] === "") {
        $_SESSION["error"]["description"] = "veuillez indqier une déscription";
    }
    if ($_FILES['file']['name'] === "") {
        $_SESSION['error']['file'] = "Veuillez upload un fichier au format gif";
    }
    header('Location: add.php?nopostdata');
    exit;
}
$sql = "INSERT INTO 
            `post`
            (`titre`, `media`, `description`, `nb_vue`, `nb_like`, `user_id`)
            VALUES
            (:titre, :media, :description, 0, 0, :user_id)
            ;
            ";

if (($format = checkFormat($_FILES["file"]["name"]) === false)) {
    header('Location: add.php?nopostdata');
    $_SESSION['erroe']["file"] = "Une erreur est survenue lors sur votre fichier";
    header("Location: add.php");
    exit;
}



saveFile();
$stmt = $conn->prepare($sql);
$stmt->bindValue(':titre', $_POST['title']);
$stmt->bindValue(':user_id', $_SESSION['user']['id']);
$stmt->bindValue(':description', $_POST['description']);
$stmt->bindValue(':media', "user/file/".$_FILES['file']['name']);
$stmt->bindValue(":user_id", $_SESSION['user']['id']);
$stmt->execute();
header('Location: index.php');
exit;