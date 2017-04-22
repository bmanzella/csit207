<?php

require 'db.php';
$db = new DB();

$roleId = $_POST['id'];
$roleName = $_POST['name'];


$statement = $db->conn->prepare("UPDATE roles SET name = ? WHERE id = ?");
if (!$statement) die('Prepare Failed: ' . $db->conn->error);
$bind = $statement->bind_param("si", $roleName, $roleId);
if (!$bind) die('Bind Failed: ' . $db->conn->error);
$execute = $statement->execute();
if (!$execute) die('Execute Failed: ' . $db->conn->error);

if ($execute) {
    header('Location: ../admin/rolemgt.php');
} else {
    die('Could not update user: ' . $db->conn->error);
}
