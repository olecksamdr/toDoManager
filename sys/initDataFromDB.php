<?php
//Get data for task
if (isset($_GET['listId'])) {
	$listId = $_GET['listId'];
	$qForTask = "SELECT * FROM `tasks` WHERE `listId` = '".$listId."'";
	$task = $db->query($qForTask);
	// $dataFromTask = $task->fetchAll();
}
if (isset($_GET['dev']) && isset($_GET['listId'])) {
	$listId = $_GET['listId'];
	$qForTask = "SELECT `tasks.id`, `tasks.title` AS taskName, `lists.caption` FROM `lists` LEFT JOIN `tasks` ON (`lists.id` = `tasks.listId`)";
	$task = $db->query($qForTask);
}
//Get data for list
if (isset($_GET['listId'])) {
	$listId = $_GET['listId'];
	$qForList = "SELECT * FROM `lists` WHERE `id` = '".$listId."'";
	$list = $db->query($qForList);
	$dataFromList = $list->fetch();
}
?>