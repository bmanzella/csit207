<?php
$title = 'Roster';
include 'navbar.php';
include 'header.php';
require '../config/db.php';
$db = new DB();
include 'notification.php';


$result = $db->query("SELECT * FROM users ORDER BY callsign ASC");

$staff = [];

while($row = $result->fetch_assoc()) {
    $staff[] = $row;
}

?>
<article>
    <section id="roster">
    <h1>Staff Roster</h1>
    <div class="table-header">
        <table id="staffTable">
            <thead>
                <tr>
                    <th><span onclick='sortTable("callsign")'>Callsign</span></th>
                    <th><span onclick='sortTable("name")'>Name</span></th>
                    <th><span onclick='sortTable("role")'>Title</span></th>
                    <th><span onclick='sortTable("department")'>Department</span></th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="table-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
                foreach ($staff as $staffMembers) { ?>
                    <tr>
                        <td><a href="https://stats.vatsim.net/search_callsign.php?callsign=<?php echo $staffMembers['callsign']?>"><?php echo $staffMembers['callsign'] ?></a></td>
                        <td><a href="user.php?id=<?php echo $staffMembers["id"] ?>"><?php echo $staffMembers["name"] ?></a></td>
                        <td><?php echo $staffMembers["role"] ?></td>
                        <td><?php echo $staffMembers["department"] ?></td>
                    </tr>
           <?php } ?>
            </tbody>
        </table>
    </div>
    </section>
</article>
</div>
<?php include 'footer.php'; ?>
