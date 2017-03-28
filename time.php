<?php
require_once "sys/init.php";
$date = $_GET['date'];
echo $date;
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
?>
	<form action="?">
	  <div class="form-group">
		<input type="date" name="date" class="form-control">
	  </div>
		<input type="submit" value="send">
	</form>
</body>
</html>