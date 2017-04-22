<?php
session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/sign-in.php');
}

$title = 'Manage Roles';
include '../views/navbar.php';
include '../views/header.php';
include 'nav.php';

require '../config/db.php';
$db = new DB();

$result = $db->query("SELECT * FROM roles");

$roles = [];
while($row = $result->fetch_assoc()) {
    $roles[] = $row;
}

?>

<div>
    <table style="width: 75%" class="custab">
        <button id="addBtn" class="actionBtn" onclick="location.href='../config/add-role.php'">Add New Role</button>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <?php foreach($roles as $role) { ?>
            <tr>
                <td><?php echo $role["id"] ?></td>
                <td><?php echo $role["name"] ?></td>
                <td>
                    <form id="modBtn" action="../config/add-role.php?id=<?php echo $role['id'] ?>" method="post">
                        <input name="id" type="hidden" value="<?php echo $role['id'] ?>">
                        <button id="editBtn" class="actionBtn">Edit</button>
                    </form>
                    <form id="modBtn" action="../config/delete-role.php" method="post">
                        <input name="id" type="hidden" value="<?php echo $role['id'] ?>">
                        <button id="deleteBtn" class="actionBtn" onclick="return confirm('Confirm role deletion?');">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

