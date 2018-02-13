<?php
try {
    $conn = new PDO ('mysql:host=localhost;dbname=mydb', 'root', 'wFo(pZt<');
} catch (PDOException $exception){
    die($exception->getMessage());
}

if (!isset($_POST["title"])|| !isset($_POST["description"]) && $_POST['title'] === "" || $_POST['description'] === "") {
    header('Location: add.php?nopostdata');
    echo 'heuuuuuuu';
    exit;
}
    $sql = "INSERT INTO 
            `post`
            (`titre`, `media`, `description`, `nb_vue`, `nb_like`, `user_id`)
            VALUES
            (:titre, 'intenet', :description, 0, 0, 1)
            ;
            ";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':titre', $_POST['title']);
    $stmt->bindValue(':description', $_POST['description']);
    $stmt->execute();
    echo("succes");
header('Location: index.php');
exit;