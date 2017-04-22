<?php
session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/sign-in.php');
}

// config/add-role.php
$title = 'Add Role';
include '../views/navbar.php';
include '../views/header.php';

require 'db.php';
$db = new DB();
$formAction = 'create-role.php';

if (isset($_POST['id'])) {
    $roleId = $_POST['id'];

    $statement = $db->conn->prepare("SELECT * FROM roles WHERE id = ?");
    $bind = $statement->bind_param("i", $roleId);
    $execute = $statement->execute();
    $bindResult = $statement->bind_result($roleId, $roleName);
    $fetch = $statement->fetch();

    $formAction = 'edit-role.php';
}


?>

<div class="login-block">
    <form action="<?php echo $formAction ?>" method="post">
        <h2>Add Role</h2>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" value="<?php echo $roleName ?>">
        <br>
        <input type="hidden" name="id" value="<?php echo $roleId ?>">
        <button class="submit" id="submit" type="submit">Save</button>
    </form>
</div>

<?php include '../views/footer.php'; ?>