<?php
require_once "sys/init.php";

// $task = $tasks->getTasksFromList($_GET['listId']);
// while ($assocTasksArray = $task->fetch()) {
// 	// $assocTasksArray['expiredBy'] = date('Y-m-d', strtotime('+1 week'));
// 	// $expired = $assocTasksArray['expiredBy'];
// 	// echo $tasks->showExpiredTime($assocTasksArray['id']);
// 	// $color = $tasks->showExpiredTime($assocTasksArray['id']);
// 	// echo "ID:".$assocTasksArray['id'].", EXPIRED: <span style='color: $color'>".$assocTasksArray['expiredBy']."</span><br />";
// 	echo "ID:".$assocTasksArray['id'].":".$tasks->showExpiredTime($assocTasksArray['id']);

// 	// if($expired < date('Y-m-d', strtotime('+1 week'))){
// 	// 	echo "Good";
// 	// }
// }
	$var = $tasks->create(13, 'test', 'td', '2007-12-12');
	var_dump($var);
?>