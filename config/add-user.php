<?php
// config/add-user.php
session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/sign-in.php');
}

$title = 'Register User';
include '../views/navbar.php';
include '../views/header.php';

require '../config/db.php';
$db = new DB();
$formAction = 'create-user.php';

$getRoles = $db->query("SELECT * FROM roles");
$getDepts = $db->query("SELECT * FROM departments");

$roles = [];
$departments = [];

while($row = $getRoles->fetch_assoc()) {
    $roles[] = $row;
}

while($row = $getDepts->fetch_assoc()) {
    $departments[] = $row;
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $statement = $db->conn->prepare("SELECT * FROM users WHERE id = ?");
    $bind = $statement->bind_param("i", $userId);
    $execute = $statement->execute();
    $bindResult = $statement->bind_result($userId, $userCallsign, $userName, $userEmail, $userRole, $userDepartment, $userUsername, $userPassword);
    $fetch = $statement->fetch();
    $formAction = 'edit-user.php';
}

?>
<div class="login-block">
    <form action="<?php echo $formAction ?>" method="POST">
        <h2>Add Staff Member</h2>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" value="<?php echo $userName ?>"/>
        <br>
        <label for="email">Email:  </label>
        <input type="email" name="email" id="email" value="<?php echo $userEmail ?>"/>
        <br>
        <label for="callsign">Callsign: </label>
        <input type="text" name="callsign" id="callsign" value="<?php echo $userCallsign ?>"/>
        <br>
        <label for="role">Role:</label>
        <select name="role" id="role">
            <option value="
                <?php
                    if ($userRole) {
                        echo $userRole;
                    } else {
                        echo 'select';
                    }
                ?>
            "><?php
                if ($userRole) {
                    echo $userRole;
                } else {
                    echo '--SELECT ONE--';
                }
                ?></option>
            <?php foreach ($roles as $role) {?>
            <option value="<?php echo $role["name"]?>"><?php echo $role["name"]?></option>
    <?php } ?>
        </select>
        <br>
        <label for="department">Department</label>
        <select name="department" id="department">
            <option value="
           <?php
            if ($userDepartment) {
                echo $userDepartment;
            } else {
                echo 'select';
            }
            ?>
            "><?php
                if ($userDepartment) {
                    echo $userDepartment;
                } else {
                    echo '--SELECT ONE--';
                }
                ?></option>
            <?php foreach ($departments as $department) { ?>
            <option value="<?php echo $department["name"] ?>"><?php echo $department["name"] ?></option>
    <?php } ?>
        </select>
        <br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $userUsername ?>">
        <br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <br>
        <input type="hidden" name="id" value="<?php echo $userId ?>">
        <button class="submit" id="submit" type="submit">Save</button>
    </form>
</div>
<?php include '../views/footer.php'; ?>