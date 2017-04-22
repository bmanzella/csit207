<?php session_start();?>


<div class="container">
    <div class="overlay"></div>
    <header>
        <div class="navBtn">+</div>
        <?php
        if ($title == 'Admin Home' ||
            $title == 'Manage Staff' ||
            $title == 'Manage Roles' ||
            $title == 'Manage Departments' ||
            $title == 'Register User' ||
            $title == 'Add Role' ||
            $title == 'Add Department'){
            if (isset($_SESSION["callsign"]) == false) {
                ?>
                <nav>
                    <a href="../views/home.php">Home</a>
                    <a href="../views/about.php">About</a>
                    <a href="../views/roster.php">Staff Roster</a>
                    <a href="../views/contact.php">Contact</a>
                    <a href="../views/sign-in.php">Sign In</a>
                </nav>
            <?php } else { ?>
                <nav>
                    <a href="../views/home.php">Home</a>
                    <a href="../views/about.php">About</a>
                    <a href="../views/roster.php">Staff Roster</a>
                    <a href="../views/contact.php">Contact</a>
                    <a href="../views/user.php?id=<?php echo $_SESSION["userId"] ?>">My Profile</a>
                    <a href="../admin/index.php">Admin home</a>
                    <a href="../config/logout.php">Sign Out</a>
                </nav>
            <?php }
        } else {
            if (isset($_SESSION["callsign"]) == false) {
                ?>
                <nav>
                    <a href="home.php">Home</a>
                    <a href="about.php">About</a>
                    <a href="roster.php">Staff Roster</a>
                    <a href="contact.php">Contact</a>
                    <a href="sign-in.php">Sign In</a>
                </nav>
            <?php } else { ?>
                <nav>
                    <a href="home.php">Home</a>
                    <a href="about.php">About</a>
                    <a href="roster.php">Staff Roster</a>
                    <a href="contact.php">Contact</a>
                    <a href="user.php?id=<?php echo $_SESSION["userId"] ?>">My Profile</a>
                    <a href="../admin/index.php">Admin home</a>
                    <a href="../config/logout.php">Sign Out</a>
                </nav>
            <?php }
        }?>

    </header>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../assets/js/mousetrap.min.js"></script>
<script>
    $(document).ready(function () {

        var toggleMenu = function() {
            $('header').toggleClass('toggle');
            $('.main').toggleClass('push');
            $('.overlay').toggleClass('block');
            $('#social, .logo').toggleClass('reveal');
        };

        //Nav
        $('.navBtn').click(function() {
            toggleMenu();
        });

        Mousetrap.bind('esc', function() {
            toggleMenu();
        });

    });
</script>
