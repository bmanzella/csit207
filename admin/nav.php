<?php

    function activePage($pageName = '', $currentPage = '') {
        if ($pageName == $currentPage) {
            echo 'active';
        }
    }

?>

<ul id="adminMenu">
    <li class="<?php activePage('Admin Home', $title) ?>"><a href="index.php">Admin Home</a></li>
    <li class="<?php echo isset($title) && $title == 'Manage Staff' ? 'active' : '' ?>"><a href="staffmgt.php">Manage Staff</a></li>
    <li class="<?php echo isset($title) && $title == 'Manage Roles' ? 'active' : '' ?>"><a href="rolemgt.php">Manage Roles</a></li>
    <li class="<?php echo isset($title) && $title == 'Manage Departments' ? 'active' : '' ?>"><a href="deptmgt.php">Manage Departments</a></li>
</ul>