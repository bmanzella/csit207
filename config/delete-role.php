<?php

session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/sign-in.php');
}

require 'db.php';
$db = new DB();

$roleToDelete = $_POST['id'];

$result = $db->query("DELETE FROM roles WHERE id = '$_POST[id]'");

// Check for success
if ($result == true) {
    header('Location: ../admin/rolemgt.php');
} else {
    die('Error deleting role: ' . $db->conn->error);
}