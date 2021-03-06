<?php
$title = 'Sign In';
include 'navbar.php';
include 'header.php';

?>
<article>
    <form action="../config/check-login.php" method="post">
        <div class="login">
        <div class="login-screen">
            <div class="app-title">
                <h1>Login</h1>
            </div>
            <div class="login-form">
                <div class="control-group">
                    <input type="text" class="login-field" placeholder="username" id="username" name="username">
                    <label class="login-field-icon fui-user" for="username"></label>
                </div>

                <div class="control-group">
                    <input type="password" class="login-field" placeholder="password" id="password" name="password">
                    <label class="login-field-icon fui-lock" for="password"></label>
                </div>
                <button class="btn btn-primary btn-large btn-block">Login</button>
            </div>
        </div>
    </div>
    </form>
</article>
