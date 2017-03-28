<?php
	require_once 'sys/init.php';
	require_once 'sys/initDataFromDB.php';
	if (isset($_GET['act']) && $_GET['act'] != '') {
		$action = $_GET['act'];
		switch($action){
			case 'delete':
				if (!isset($_GET['taskId']) || $_GET['taskId'] == '') {
					$actionToUser = 'Error with actions';
					$err = 'Please, select a task to deleting';
				} else {
					$taskId = $_GET['taskId'];
					$actionToUser = 'Deleting task';
					$deleting = $tasks->delete($taskId);
					if ($deleting) {
						$msg = 'Deleting successful!';
					} else {
						$actionToUser = 'Error';
						$err = 'Deleting error!';
					}
				}
				break;
			case 'add':
				$listId = $_GET['listId'];
				$title = $_POST['title'];
				$description = $_POST['description'];
				$expiredBy = $_POST['expiredBy'];
				$active = $_POST['isActive'];

				$creating = $tasks->create($listId, $title, $description, $expiredBy, $active);

				if ($creating) {
					$actionToUser = 'Creating new task';
					$currentTask = $tasks->getCurrentTaskByTitle($title)->fetch();
					$msg = 'Creating a task '.$currentTask['title'].' successful!';
					$sender->sendMessage($user['chatId'], "You are create a new task ".$currentTask['title']." with content:
						".$currentTask['description']);
				} else {
					$actionToUser = 'Error';
					$err = 'Creating error!';
				}
				break;
			case 'edit':
				$taskId = $_GET['taskId'];
				$title = $_POST['title'];
				$description = $_POST['description'];
				$expiredBy = $_POST['expiredBy'];
				$active = $_POST['isActive'];

				$editing = $tasks->edit($title, $description, $expiredBy, $active, $taskId);
				if ($editing) {
					$actionToUser = "Editing a task ".$title;
					$msg = 'Editing a task "'.$title.'" successful!';
				} else {
					$actionToUser = 'Error';
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
<? if(isset($err)): ?>
	<div class='alert alert-danger' role='alert'>
	<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
	<span class='sr-only'>Error:</span>
	<?= $err ?>
	</div>
<? elseif(isset($msg)): ?>
	<div class='alert alert-success' role='alert'>
	<?= $msg ?>
	</div>
<? endif; ?>
</body>
</html>