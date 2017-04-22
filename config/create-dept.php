<?php
session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/sign-in.php');
}

require 'db.php';
$db = new DB();

$deptName = $_POST['name'];

$result = $db->queryOne("SELECT * FROM departments WHERE name = '$_POST[name]'");


if ($result == false) {
    $statement = $db->conn->prepare("INSERT INTO departments(name) VALUES (?)");
    if(!$statement) die('Prepare failed: ' . $db->conn->error);
    $bind = $statement->bind_param("s", $deptName);
    if(!$bind) die('Bind failed: ' . $db->conn->error);
    $execute = $statement->execute();
    if(!$execute) die('Execute failed: ' . $db->conn->error);

    header('Location: ../admin/deptmgt.php');
} else {
    header('Location: add-dept.php');
}