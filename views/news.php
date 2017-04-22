<?php
$title = 'News';
include 'navbar.php';
include 'header.php';
require '../config/db.php';
$db = new DB();

// call the helper class and make the query
$news = $db->query("SELECT * FROM news");

// set up an empty array to hold news
$newsItem = [];

// for each row, add an object to the array
while($row = $news->fetch_assoc()) {
    $newsItem[] = $row;
}

?>
<article>
<h1>News</h1>
<div id="news">
    <ul class="news-list">
        <?php foreach ($newsItem as $item) { ?>
            <br>
            <li>
                <img width="25%" src="<?php echo $item["img"] ?>" />
                <h3><?php echo $item["title"] ?></h3>
                <p><?php echo $item["content"] ?></p>
            </li>
        <?php } ?>
    </ul>
</div>
</article>