<?php

session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/sign-in.php');
}

require 'db.php';
$db = new DB();

$deptToDelete = $_POST['id'];

$result = $db->query("DELETE FROM departments WHERE id = '$_POST[id]'");

// Check for success
if ($result == true) {
    header('Location: ../admin/deptmgt.php');
} else {
    die('Error deleting department: ' . $db->conn->error);
}