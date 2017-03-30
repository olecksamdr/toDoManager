<?php 
	require_once "sys/init.php";
    require_once 'sys/userSettings.php';
?>
<?php if (userAuth::isAuthorized()): ?>

	<h1>toDo Lists Manager<small>/<a data-toggle="modal" data-target="#userSettings"><?=$user->login?></a></small>
	<a style="float: right;" class="btn btn-primary btn-lg" href="	creations.php?type=list" role="button">Add new list</a>
	</h1>
	<?php 
	require_once 'showLists.php';
	?>
<?php else: ?>
	<form class="ajax" method="post" action="sys/ajax.php">
    	<div class="main-error alert alert-error hide"></div> 	
    	<h2 class="form-signin-heading">To use toDo Manager need auth</h2>
        <div class="form-group">
           <label for="login">Login</label>
           <input name="username" type="text" id="login" class="form-control" placeholder="Login" autofocus>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input name="password" type="password" id="password" class="form-control" placeholder="Password" autofocus>
        </div>
    	<!-- <label class="checkbox"> -->
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary active">
              <input name="remember-me" type="checkbox" value="remember-me" autocomplete="off" checked> Remember me
          </label>
        </div>
    	  <!-- <input name="remember-me" type="checkbox" value="remember-me" checked> 	Remember me -->
    	<!-- </label> -->
    	<input type="hidden" name="act" value="login">
    	<button class="btn btn-large btn-primary" type="submit">Sign in</button>
    	
    	<div class="alert alert-info" style="margin-top:15px;">
    	    <p>Not have an account? <a href="userCreate.php">Register it.</a>
    	</div>
    </form>

<?php endif; ?>
</body>
</html>