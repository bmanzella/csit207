<?php
session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/sign-in.php');
}
$title = 'Manage Staff';
include '../views/navbar.php';
include '../views/header.php';
include 'nav.php';

require '../config/db.php';
$db = new DB();

$result = $db->query("SELECT * FROM users ORDER BY callsign ASC");

$users = [];

while($row = $result->fetch_assoc()) {
    $users[] = $row;
}
?>

<div>
    <table style="width: 75%" class="custab">
        <button id="addBtn" class="actionBtn" onclick="location.href='../config/add-user.php'">Add Staff Member</button>
        <thead>
        <tr>
            <th>Callsign</th>
            <th>Name</th>
            <th>Role</th>
            <th>Department</th>
            <th>Actions</th>
        </tr>
        </thead>
        <?php foreach($users as $user) { ?>
            <tr>
                <td><?php echo $user["callsign"] ?></td>
                <td><?php echo $user["name"] ?></td>
                <td><?php echo $user["role"] ?></td>
                <td><?php echo $user["department"] ?></td>
                <td>
                    <form id="modBtn" action="../config/add-user.php?id=<?php echo $user['id'] ?>" method="post"">
                        <input type="hidden" value="<?php echo $user['id'] ?>">
                        <button id="editBtn" class="actionBtn">Edit</button>
                    </form>
                    <form id="modBtn" action="../config/delete-user.php" method="post">
                        <input name="id" type="hidden" value="<?php echo $user['id'] ?>">
                        <button id="deleteBtn" class="actionBtn" onclick="return confirm('Confirm user deletion?');">Delete</button>
                    </form>
                </td>
            </tr>
    <?php } ?>
    </table>
</div>


