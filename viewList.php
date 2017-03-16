<?php 
	require_once "/sys/init.php";
	if (!isset($_GET['listId'])) {
		$err = "Please, select a list of tasks!";
		$title = "Error";
	} else {
		require_once "sys/initDataFromDB.php";
		$listId = $_GET['listId'];
		$title = "Tasks from ".$dataFromList['caption'];
	}
?>
<h1>toDo Lists Manager<small>/Tasks from <?= $dataFromList['caption']?></small></h1>
	<?php 
	  if (isset($err)) {
	?>
	<div class="alert alert-danger" role="alert">
		<?= $err ?>
	</div>
	<?php
	  } else {
	  	echo "<div class='tasks'>";
	  	while ($assocTasksArray = $task->fetch()) { 
	?>
	      <div class="panel panel-default">
  	    	<div class="panel-heading">
        	  <h3 class="panel-title"><?= $assocTasksArray['title']?></h3>
  	    	</div>
  	      <div class="panel-body">
			<?= $assocTasksArray['description']?>
  	      </div>
 	      </div>
	<?php
	    }
	  echo "</div>";
	  }
	?>
</body>
</html>