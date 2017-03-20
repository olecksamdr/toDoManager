<?php
//Get data for task
if (isset($_GET['listId'])) {
	$listId = $_GET['listId'];
	$qForTask = "SELECT `tasks`.`id`, `tasks`.`title`, `tasks`.`description` FROM `lists` LEFT JOIN `tasks` ON (`lists`.`id` = `tasks`.`listId`) WHERE `lists`.`id` = ? ORDER BY `id` DESC";
	$task = $db->prepare($qForTask);
	$task->execute(Array($listId));
}
//Get data for list
if (isset($_GET['listId'])) {
	$qForList = "SELECT * FROM `lists` WHERE `id` = ?";
	$list = $db->prepare($qForList);
	$list->execute(Array($listId));
	$dataFromList = $list->fetch();
}
?>