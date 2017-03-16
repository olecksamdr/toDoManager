<?php
	require_once "/sys/init.php";
	if (isset($_GET['act']) && $_GET['act'] != "") {
		$action = $_GET['act'];
		switch($action){
			case 'delete':
				$actionToUser = "Deleting";
				if (!isset($_GET['taskId']) || $_GET['taskId'] == "") {
					echo "<h1><a href='./'>toDo Lists Manager</a><small>/Error with actions</small></h1>";
					exit("<div class='alert alert-danger' role='alert'>
						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
						<span class='sr-only'>Error:</span>
						Please, select a task to deleting
						</div>");
				} else {
					$taskId = $_GET['taskId'];
					$actionToUser = "Deleting task";
					$deleting = Task::delete($taskId);
					if ($deleting) {
						$msg = "Deleting successful!";
					} else {
						$err = "Deleting error!";
					}
				}
				break;
			case 'add':
				$listId = $_GET['listId'];
				$title = $_POST['title'];
				$description = $_POST['description'];

				$creating = Task::create($listId, $title, $description);
				if ($creating) {
					$actionToUser = "Creating new task";
					$msg = "Creating successful!";
				} else {
					$err = "Creating error!";
				}
				break;
			case 'edit':
				$listId = $_GET['listId'];
				$title = $_POST['title'];
				$description = $_POST['description'];
				
				$editing = Task::edit($taskId, $title, $description);
				if ($editing) {
					$actionToUser = "Editing";
					$msg = "Editing successful!";
				} else {
					$err = "Editing error!";
				}
				break;
		}
	} elseif(!isset($_GET['act']) || $_GET['act'] == "") {
		$actionToUser = "Error with actions";
		$err = "Please, select action!";
	}
?>

<h1><a href='./'>toDo Lists Manager</a><small>/<?= $actionToUser?></small></h1>
<?php
if (isset($err)) {
?>
	<div class='alert alert-danger' role='alert'>
	<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
	<span class='sr-only'>Error:</span>
	<?= $err ?>
	</div>
<?php
} else if(isset($msg)) {
?>
	<div class="alert alert-success" role="alert">
	<?= $msg ?>
	</div>
<?php
}
?>
</body>
</html>