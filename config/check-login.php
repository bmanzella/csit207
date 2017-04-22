<?php
// get db helper
require 'db.php';
// create/connect
$db = new DB();

$userName = $_POST["username"];

// find the user
$user = $db->queryOne("SELECT * FROM users WHERE username = '$userName'");
// if no user, take to sign-in.php
// if user, check password
// if pw is wrong, take to sign-in.php
// if pw is right, take to posts.php
if($user == false) {
    header('Location: ../views/sign-in.php');
} else if($user['password'] != md5($_POST["password"])) {
    header('Location: ../views/sign-in.php');
} else {
    // create a session for that user
    session_start();
    $_SESSION['userId'] = $user['id'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['callsign'] = $user['callsign'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['department'] = $user['department'];

    header('Location: ../views/home.php');
}
