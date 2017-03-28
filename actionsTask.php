<?php
	require_once "sys/init.php";
	require_once "sys/initDataFromDB.php";
	if (isset($_GET['act']) && $_GET['act'] != "") {
		$action = $_GET['act'];
		switch($action){
			case 'delete':
				$actionToUser = "Deleting";
				if (!isset($_GET['taskId']) || $_GET['taskId'] == "") {
					$actionToUser = "Error with actions";
					$err = "Please, select a task to deleting";
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

				$creating = $tasks->create($listId, $title, $description, '0000-00-00');
				if ($creating) {
					$actionToUser = "Creating new task";

					$thisTask = "SELECT * FROM `tasks` WHERE `title` = ? LIMIT 1";
					$currentTask = $db->prepare($thisTask);
					$currentTask->execute(Array($title));
					$currentTask = $currentTask->fetch();
					
					$msg = "Creating a task ".$currentTask['title']." successful!";
					$sender->sendMessage($user['chatId'], "You are create a new task ".$currentTask['title']." with content:
						".$currentTask['description']);
				} else {
					$err = "Creating error!";
				}
				break;
			case 'edit':
				$taskId = $_GET['taskId'];
				$title = $_POST['title'];
				$description = $_POST['description'];

				$editing = Task::edit($taskId, $title, $description);
				if ($editing) {
					$actionToUser = "Editing a task ".$title;
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