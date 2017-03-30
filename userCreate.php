<?php

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}
session_start();
require_once 'sys/classes/Auth.class.php';

?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP Ajax Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sys/theme/bootstrap.min.css">
    <link rel="stylesheet" href="sys/theme/style.css">
  </head>

  <body>

    <div class="container">

      <?php if (Auth\User::isAuthorized()): ?>
    
      <h1>Your are already registered!</h1>

      <form class="ajax" method="post" action="sys/ajax.php">
          <input type="hidden" name="act" value="logout">
          <div class="form-actions">
              <button class="btn btn-large btn-primary" type="submit">Logout</button>
          </div>
      </form>

      <?php else: ?>

      <form class="form-signin ajax" method="post" action="sys/ajax.php">
        <div class="main-error alert alert-error hide"></div>

        <h2 class="form-signin-heading">Please sign up</h2>
        <input name="username" type="text" class="input-block-level" placeholder="Username" autofocus>
        <input name="password1" type="password" class="input-block-level" placeholder="Password">
        <input name="password2" type="password" class="input-block-level" placeholder="Confirm password">
        <input type="hidden" name="act" value="register">
        <button class="btn btn-large btn-primary" type="submit">Register</button>
        <div class="alert alert-info" style="margin-top:15px;">
            <p>Already have account? <a href="/">Sign In.</a>
        </div>
      </form>

      <?php endif; ?>

    </div> <!-- /container -->

    <script src="sys/theme/jquery-2.0.3.min.js"></script>
    <script src="sys/theme/bootstrap/js/bootstrap.min.js"></script>
    <script src="sys/js/ajax-form.js"></script>

  </body>
</html>
