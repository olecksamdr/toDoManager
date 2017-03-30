<?php 
	require_once "sys/init.php";
    require_once 'sys/userSettings.php';
?>
<?php if (Auth\User::isAuthorized()): ?>

	<h1>toDo Lists Manager<small>/<a data-toggle="modal" data-target="#userSettings"><?=$user->login?></a></small>
	<a style="float: right;" class="btn btn-primary btn-lg" href="	creations.php?type=list" role="button">Add new list</a>
	</h1>
<!--       <form class="ajax" method="post" action="sys/ajax.php">
          <input type="hidden" name="act" value="logout">
          <div class="form-actions">
              <button class="btn btn-large btn-primary" type="submit">Logout</button>
          </div>
      </form> -->
	<?php 
	require_once 'showLists.php';
	?>
<?php else: ?>
	<form class="form-signin ajax" method="post" action="sys/ajax.php">
    	<div class="main-error alert alert-error hide"></div> 	
    	<h2 class="form-signin-heading">Please sign in</h2>
    	<input name="username" type="text" class="input-block-level" placeholder= 	Username" autofocus>
    	<input name="password" type="password" class="input-block-level" placeholder= 	Password">
    	<label class="checkbox">
    	  <input name="remember-me" type="checkbox" value="remember-me" checked> 	Remember me
    	</label>
    	<input type="hidden" name="act" value="login">
    	<button class="btn btn-large btn-primary" type="submit">Sign in</button>
    	
    	<div class="alert alert-info" style="margin-top:15px;">
    	    <p>Not have an account? <a href="/userCreate.php">Register it.</a>
    	</div>
    </form>

<?php endif; ?>
</body>
</html>