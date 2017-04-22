<?php

if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/sign-in.php');
}


require 'db.php';
$db = new DB();

$id = $_POST['id'];
$name = $_POST['name'];
$callsign = $_POST['callsign'];
$role = $_POST['role'];
$department = $_POST['department'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$statement = $db->conn->prepare("
    UPDATE users
    SET name = ?, callsign = ?, role = ?, department = ?, username = ?, password = ?
    WHERE id = ?
");
if (!$statement) die('Prepare failed: ' . $db->conn->error);
$bind = $statement->bind_param("ssssssi", $name, $callsign, $role, $department, $username, $password, $id);
if (!$bind) die('Bind Failed: ' . $db->conn->error);
$execute = $statement->execute();
if (!$execute) die('Execute Failed: ' . $db->conn->error);

if ($execute) {
    header('Location: ../admin/staffmgt.php');
} else {
    die('Could not update user: ' . $db->conn->error);
}