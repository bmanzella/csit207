<?php
session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/sign-in.php');
}

//config/add-dept.php
$title = 'Add Department';
include '../views/navbar.php';
include '../views/header.php';

require 'db.php';
$db = new DB();

$formAction = 'create-dept.php';

if (isset($_GET['id'])) {
    $deptId = $_GET['id'];

    $statement = $db->conn->prepare("SELECT * FROM departments WHERE id = ?");
    $bind = $statement->bind_param("i", $deptId);
    $execute = $statement->execute();
    $bindResult = $statement->bind_result($deptId, $deptName);
    $fetch = $statement->fetch();

    $formAction = 'edit-dept.php';
}
?>

<div class="login-block">
    <form action="<?php echo $formAction ?>" method="post">
        <h2>Add Department</h2>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" value="<?php echo $deptName ?>">
        <br>
        <input type="hidden" name="id" value="<?php echo $deptId ?>">
        <button class="submit" id="submit" type="submit">Save</button>
    </form>
</div>

<?php include '../views/footer.php'; ?>
