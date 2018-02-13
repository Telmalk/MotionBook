<?php
    try {
        $conn = new PDO("mysql:dbname=mydb;host=localhost", 'root', "wFo(pZt<");
    } catch (PDOException $exception) {
        die ($exception->getMessage());
    }


    $postSql = "SELECT
        post_id,
        titre,
        media,
        description,
        nb_vue,
        nb_like,
        user_id
       FROM
        post
        ;";

    $role = "SELECT
            role_id
            FROM
            `role`
            ";

    $stmt = $conn->prepare($postSql);
    $stmt2 = $conn->prepare($role);
    $stmt->execute();
    $stmt2->execute();
    $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    ?>
    <div style="display: flex;">
    <?php while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) :?>
        <div class="container" style="background: blue; width: 400px; margin-left: 15px;">
            <img src="https://scontent-cdt1-1.xx.fbcdn.net/v/t1.0-1/p160x160/11024699_10204377009249922_4343062706757335996_n.jpg?oh=c223d6aabff3152f1e75bb4509d5367a&oe=5B1BB1D4" />
            <div>
                 <ul style="color: white;">
                     <li><?=$row["titre"]?></li>
                     <li>vue: <?=$row["nb_vue"]?></li>
                     <li>like: <?=$row["nb_like"]?></li>
                     <li>role: <?=$row["post_id"]?></li>
                     <li>true role: <?=$row2["role_id"]?></li>
                </ul>
        </div>
    </div>
    <?php endwhile;?>
</div>
