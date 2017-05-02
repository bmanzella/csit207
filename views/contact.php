<?php
$title = 'Contact Us';
include 'navbar.php';
include 'header.php';
?>
<form id="contact" action="../config/send-form.php" method="post">
    <div class="container">
        <h3>Contact Us</h3>
        <fieldset>
            <input name="name" placeholder="Your name" type="text" tabindex="1" required autofocus>
        </fieldset>
        <fieldset>
            <input name="email" placeholder="Your Email Address" type="email" tabindex="2" required>
        </fieldset>
        <fieldset>
            <textarea name="message" placeholder="Type your message here...." tabindex="5" required></textarea>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
        </fieldset>
    </div>
</form>