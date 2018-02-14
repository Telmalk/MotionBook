<?php
/**
 * Created by PhpStorm.
 * User: travailleur
 * Date: 12/02/2018
 * Time: 18:05
 */

require 'connection.php';

$sql = "SELECT 
`user_id`,
`username`,
`email`,
`password`
FROM 
`user`
;";

$stmt = $conn->prepare($sql);
$stmt->bindValue(':user_id', $_GET['user_id']);
$stmt->execute();
?>

<table>
    <?php while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) :?>
    <tr>
        <td><?=$row["username"]?></td>
        <td><?=$row["email"]?></td>
        <td><?=$row["password"]?></td>
        <td><a href="change.php?user_id=<?=$row['user_id']?>">Modifier</a></td>
    <?php endwhile;?>
        </tr>
</table>




