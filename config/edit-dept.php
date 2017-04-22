<?php

require 'db.php';
$db = new DB();

$deptId = $_POST['id'];
$deptName = $_POST['name'];

$statement = $db->conn->prepare("UPDATE departments SET name = ? WHERE id = ?");
if (!$statement) die('Prepare Failed: ' . $db->conn->error);
$bind = $statement->bind_param("si", $deptName, $deptId);
if (!$bind) die('Bind Failed: ' . $db->conn->error);
$execute = $statement->execute();
if (!$execute) die('Execute Failed: ' . $db->conn->error);

if ($execute) {
    header('Location: ../admin/deptmgt.php');
} else {
    die('Could not update department: ' . $db->conn->error);
}
