<?php
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}
require_once "connexion.php";
$requete = "SELECT 
  `titre`, 
  `media`, 
  `description`,
  `date`, 
  `nb_vue`, 
  `nb_like` 
FROM 
  `post`
WHERE
  `post_id` = :id
;";
$stmt = $conn->prepare($requete);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <title>MotionBook</title>
    <meta charset="utf-8">
        <meta value="notranslate" name="google">
        <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" name="viewport">

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/grid.css">
        <link rel="stylesheet" href="css/form.css">
</head>
<body>

<?php
    session_start();
    include 'header.php';
?>

		<div class="app_content">
        
			<form class="form_edit" action="doedit.php" method="post" enctype="multipart/form-data">
            
			    <input type="hidden" name="id" value="<?=$_GET['id']?>">
                <div class="input_item input-item-first">
                    <label class="label" for="titre">Titre</label> <input class="input_text"  type="text" name="title" value="<?=$row['titre']?>"><br>
                </div>
			    
                <div class="input_item">
                    <label class="label" for="file">Media</label> <input type="file" name="file"><br>
                </div>
			    
                <div class="input_item">
                    <label class="label" for="description" name="description">Description</label>
                    <textarea class="input_paragraph" rows="2" cols="50" name="description"></textarea>
                    <br>
                </div>
			    
                <div class="input_item input-item-last">
                    <input class="form_button" type="submit" value="Ajouter">
                </div>
			
			</form>
        
		</div>
</body>
</html>
