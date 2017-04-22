<?php

$title = 'Manage Departments';
include '../views/navbar.php';
include '../views/header.php';
include 'nav.php';

require '../config/db.php';
$db = new DB();

$result = $db->query("SELECT * FROM departments");

$departments = [];

while($row = $result->fetch_assoc()) {
    $departments[] = $row;
}

?>


<div>
    <table style="width: 75%" class="custab">
        <button id="addBtn" class="actionBtn" onclick="location.href='../config/add-dept.php'">Add New Department</button>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <?php foreach($departments as $department) { ?>
            <tr>
                <td><?php echo $department["id"] ?></td>
                <td><?php echo $department["name"] ?></td>
                <td>
                    <form id="modBtn" action="../config/add-dept.php?id=<?php echo $department['id']?>" method="post">
                        <input type="hidden" value="<?php echo $department['id'] ?>">
                        <button id="editBtn" class="actionBtn">Edit</button>
                    </form>
                    <form id="modBtn" action="../config/delete-dept.php" method="post">
                        <input name="id" type="hidden" value="<?php echo $department['id'] ?>">
                        <button id="deleteBtn" class="actionBtn" onclick="return confirm('Confirm department deletion?');">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

