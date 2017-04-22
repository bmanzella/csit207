<?php
session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/sign-in.php');
}
require 'db.php';
$db = new DB();

$roleName = $_POST["name"];

$result = $db->queryOne("SELECT * FROM roles WHERE name = '$_POST[name]'");

if ($result == false) {
    $statement = $db->conn->prepare("INSERT INTO roles(name) VALUES (?)");
    if(!$statement) die('Prepare failed: ' . $db->conn->error);
    $bind = $statement->bind_param("s", $roleName);
    if(!$bind) die('Bind failed: ' . $db->conn->error);
    $execute = $statement->execute();
    if(!$execute) die('Execute failed: ' . $db->conn->error);

    header('Location: ../admin/rolemgt.php');
} else {
    header('Location: add-role.php');
}