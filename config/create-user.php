<?php
session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/sign-in.php');
}
require 'db.php';
$db = new DB();

$callsign = $_POST["callsign"];
$name = $_POST["name"];
$email = $_POST["email"];
$role = $_POST["role"];
$department = $_POST["department"];
$userName = $_POST["username"];
$pw = md5($_POST["password"]);

$result = $db->queryOne("SELECT * FROM users WHERE username = '$_POST[username]'" );

if ($result == false) {
    $statement = $db->conn->prepare("
      INSERT INTO users(callsign, name, email, role, department, username, password)
      VALUES(?, ?, ?, ?, ?, ?, ?);
      ");
    if(!$statement) die('Prepare failed: ' . $db->conn->error);
    $bind = $statement->bind_param("sssssss", $callsign, $name, $email, $role, $department, $userName, $pw);
    if(!$bind) die('Bind failed: ' . $db->conn->error);
    $execute = $statement->execute();
    if(!$execute) die('Execute failed: ' . $db->conn->error);

    header('Location: ../admin/staffmgt.php');
} else {
    header('Location: add-user.php');
}

include '../views/footer.php';