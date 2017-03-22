<?php
	require_once "sys/init.php";
	if (isset($_GET['type']) && $_GET['type'] != "") {
		$type = $_GET['type'];
	}
	if($type == "list"){
?>
	<h1><a href='./'>toDo Lists Manager</a><small>/Add new list</small></h1>
	<form action="actionsList.php?act=add" method="POST">
	  <div class="form-group">
	  	<input required="required" type="text" name="caption" class="form-control" placeholder="List caption">
	  </div>
	  <button type="submit" class="btn btn-default">Create list</button>
	</form>
<?php
	} elseif($type == 'task') {
?>
	<h1><a href='./'>toDo Lists Manager</a><small>/Add new task</small></h1>
	<form action="actionsTask.php?act=add&listId=<?=$_GET['listId']?>" method="POST">
	  <div class="form-group">
	    <input required="required" type="text" name="title" class="form-control" placeholder="Task caption">
	  </div>
	  <div class="form-group">
	    <textarea name="description" class="form-control" rows="3" placeholder="Task description"></textarea>
	  </div>
	  <button type="submit" class="btn btn-default">Create task</button>
	</form>
<?php
	} elseif($type == 'editTask'){
	require_once "sys/initDataFromDB.php";
	$task = $currentTask->fetch();
?>
	<h1><a href='./'>toDo Lists Manager</a><small>/<a href="viewList.php?listId=<?= $task['listId']?>"><?= $task['title']?></a>/Edit</small></h1>
	<form action="actionsTask.php?act=edit&taskId=<?=$_GET['taskId']?>" method="POST">
	  <div class="form-group">
	    <input required="required" type="text" name="title" class="form-control" placeholder="Task caption" value="<?= $task['title']?>">
	  </div>
	  <div class="form-group">
	    <textarea name="description" class="form-control" rows="3" placeholder="Task description" value="<?= $task['description']?>"></textarea>
	  </div>
	  <button type="submit" class="btn btn-default">Edit task</button>
	</form>
<?php
	}
?>
</body>
</html>