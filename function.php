<?php
session_start();

/**
 * function who check if the file in parameter is in on format jpg, gif, or mp4
 * @param $way
 * @return True or false
 */
function checkFormat($way) {
    $keyWord = preg_split("/[\\\\,.\/]+/ ", $way);
    $formatAccept = ["gif"];
    for ($j = 0; $j <= sizeof($formatAccept); $j++) {
        if ($keyWord[sizeof($keyWord) - 1] === $formatAccept[$j]) {
            return true;
        }
    }
    return false;
}

function copyToJpg($src)
{
    $dest = "./asset/img/jpg/".$_POST['title']."_".$_SESSION['user']['id'].".jpg";
    copy($src, $dest);
}
/**
 * function who save one file un directories user/file
 * @param $file
 * @return int;
 */
function saveFile() {
    $move = move_uploaded_file($_FILES['file']['tmp_name'], "./asset/img/gif/".$_POST['title']."_".$_SESSION['user']['id'].".gif");
    if ($move === false) {
        return -1;
    } else
        copyToJpg("./asset/img/gif/".$_POST['title']."_".$_SESSION['user']['id'].".gif");
    return 0;
}
