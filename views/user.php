<?php
$title = 'User Profile';
include 'navbar.php';
include 'header.php';

require '../config/db.php';
$db = new DB();

$user = $db->getUserInfo($_GET["id"]);

?>

<article>
    <h1><?php echo $user["name"] ?></h1>
    <h3>Title: </h3>
    <p><?php echo $user["role"]?></p>
</article>