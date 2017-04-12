<?php
require_once 'sys/init.php';
?>
<?php if (userAuth::isAuthorized()): ?>

<h1>Your are already registered!</h1>

<form class="ajax" method="post" action="sys/ajax.php">
    <input type="hidden" name="act" value="logout">
    <div class="form-actions">
        <button class="btn btn-large btn-primary" type="submit">Logout</button>
    </div>
</form>

<?php else: ?>

<form class="ajax" method="POST" action="sys/ajax.php">
  <div class="main-error alert alert-danger" style="display: none;"></div>
  <h2 class="form-signin-heading">Please sign up</h2>
    <div class="form-group">
        <label for="login">Login</label>
        <input name="username" type="text" id="login" class="form-control" placeholder="Username" autofocus>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input name="password1" type="password" id="password" class="form-control" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="passwordConfirm">Password confirm</label>
        <input name="password2" type="password" id="passwordConfirm" class="form-control" placeholder="Confirm password">
    </div>
  <input type="hidden" name="act" value="register">
  <button class="btn btn-large btn-primary" type="submit">Sign Up</button>
  <div class="alert alert-info" style="margin-top:15px;">
      <p>Already have account? <a href="index.php">Sign In.</a>
  </div>
</form>

<?php endif; ?>
<script src="sys/js/ajax-form.js"></script>

  </body>
</html>
