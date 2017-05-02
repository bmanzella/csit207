<link rel="stylesheet" href="../assets/css/styles.css" type="text/css" />


<div id="notification">
    <h4 id="notification-title">New Member Alert!</h4>
    <p id="notification-text">Check out our newest member: </p>
    <br><br>
    <a href="#">View Profile</a>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    // Flow: every 3 secs, look for new post. If exists,
    // show the notification for 5 seconds with updated content
    var latestUserId = 0;
    setInterval(function() {
        $.get('../config/latest-user.php')
            .done(function(user) {
                user = JSON.parse(user);
                // If new, update the card and show it
                if(user.id !== latestUserId) {
                    $('#notification p').html('Check out our newest Member: ' + user.name);
                    $('#notification a').attr('href', 'user.php?id=' + user.id);
                    $('#notification').fadeIn();
                    setTimeout(function() {
                        $('#notification').fadeOut();
                    }, 5000);
                }
                latestUserId = user.id;
            })
            .fail(function(err) {
                console.error(err);
            })
    }, 3000); // 3000 milliseconds = 3 seconds
</script>