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
    <div class="user-header">
        <h4>Title: <?php echo $user["role"]?></h4>
        <h4>Department: <?php echo $user["department"] ?></h4>
        <h4><a href="mailto:<?php echo $user["email"]?>">Email <?php echo $user["name"] ?></a> </h4>
    </div>
</article>