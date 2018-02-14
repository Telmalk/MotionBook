<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 13/02/2018
 * Time: 20:14
 */

session_start();
unset($_SESSION['user']);
header('Location: index.php');
