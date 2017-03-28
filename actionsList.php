<?php
	require_once "sys/init.php";
	require_once "sys/initDataFromDB.php";
	if (isset($_GET['act']) && $_GET['act'] != "") {
		$action = $_GET['act'];
		switch($action){
			case 'delete':
				if (!isset($_GET['listId']) || $_GET['listId'] == "") {
					$actionToUser = "Error with actions";
					$err = "Please, select a list to deleting";
				} else {
					$listId = $_GET['listId'];
					// $thisList = "SELECT * FROM `lists` WHERE `caption` = ? LIMIT 1";
					// $currentList = $db->prepare($thisList);
					// $currentList->execute(Array($listId));
					// $currentList = $currentList->fetch();
					$actionToUser = "Deleting list";
					$deleting = Lists::delete($listId);
					if ($deleting) {
						$msg = "Deleting a list successful!";
						$sender->sendMessage($user['chatId'], "You are delete a list ");
					} else {
						$err = "Deleting error!";
					}
				}
				break;
			case 'clear':
				if (!isset($_GET['listId']) || $_GET['listId'] == "") {
					$actionToUser = "Error with clearing";
					$err = "Please, select a list to clearing";
					break;
				} else {
					$listId = $_GET['listId'];
					$thisList = $lists->getCurrentList($listId);
					$currentList = $thisList->fetch();

					$actionToUser = "Clearing list ".$currentList['caption'];
					$clearing = Lists::clearList($listId);
					if ($clearing) {
						$msg = "Clearing a list successful!";
						$sender->sendMessage($user['chatId'], "You are delete all tasks from list ".$currentList['caption']);
					} else {
						$actionToUser = "Error";
						$err = "Clearing error!";
					}
				}
				break;
			case 'add':
				$caption = $_POST['caption'];
				if ($caption === "") {
					$err = "List caption can`t be empty";
					break;
				} else {
					$creating = Lists::create($caption);
					if ($creating) {
						$actionToUser = "Creating new list";
						$thisList = "SELECT * FROM `lists` WHERE `caption` = ? LIMIT 1";
						$currentList = $db->prepare($thisList);
						$currentList->execute(Array($caption));
						$currentList = $currentList->fetch();
						$msg = "Creating a list ".$currentList['caption']." successful!";
						$sender->sendMessage($user['chatId'], "You are create a new list ".$currentList['caption']);
					} else {
						$actionToUser = "Error";
						$err = "Creating error!";
					}
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