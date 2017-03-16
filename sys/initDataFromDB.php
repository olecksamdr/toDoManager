<?php
//Get data for task
if (isset($_GET['listId'])) {
	$listId = $_GET['listId'];
	$qForTask = "SELECT * FROM `tasks` WHERE `listId` = '".$listId."'";
	$task = $db->query($qForTask);
	// $dataFromTask = $task->fetchAll();
}
//Get data for list
if (isset($_GET['listId'])) {
	$listId = $_GET['listId'];
	$qForList = "SELECT * FROM `lists` WHERE `id` = '".$listId."'";
	$list = $db->query($qForList);
	$dataFromList = $list->fetch();
}
?>