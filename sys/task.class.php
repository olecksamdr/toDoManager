<?php
class Task {
	public function getTasksFromList($listId){
		$qForTask = "SELECT `tasks`.`id`, `tasks`.`title`, `tasks`.`description`, `tasks`.`expiredBy` FROM `lists` LEFT JOIN `tasks` ON (`lists`.`id` = `tasks`.`listId`) WHERE `lists`.`id` = ? AND `tasks`.`id` != 'NULL' ORDER BY `id` DESC";
		$task = DB::connect()->prepare($qForTask);
		$task->execute(Array($listId));
		return $task;
	}
	public function getCurrentTask($taskId){
		$qForTask = "SELECT * FROM `tasks` WHERE `id` = ?";
		$task = DB::connect()->prepare($qForTask);
		$task->execute(Array($taskId));
		return $task;
	}
	public function showExpiredTime($taskId){
		$task = $this->getCurrentTask($taskId)->fetch();
		if($task['expiredBy'] < date('Y-m-d', strtotime('+2 day'))){
			return "<span style='color: red;'>".$task['expiredBy']."</span>";
		} elseif ($task['expiredBy'] > date('Y-m-d', strtotime('+4 day'))) {
			return "<span style='color: blue;'>".$task['expiredBy']."</span>";
		} else{
			return "<span style='color: grey;'>".$task['expiredBy']."</span>";
		}
	}
	static function create($listId, $title, $description, $expiredBy){
		$sql = "INSERT INTO `tasks` (`listId`, `title`, `description`, `expiredBy`) VALUES (?, ?, ?, ?)";
		$res = DB::connect()->prepare($sql);
		$res->execute(Array($listId, $title, $description, $expiredBy));
		return $res;
	}
	static function edit($taskId, $title, $description){
		$sql = "UPDATE `tasks` SET `title` = ?, `description` = ? WHERE `id` = ? LIMIT 1";
		$res = DB::connect()->prepare($sql);
		$res->execute(Array($title, $description, $taskId));
		return $res;
	}
	static function delete($taskId){
		$sql = "DELETE FROM `tasks` WHERE `id` = ? LIMIT 1";
		$res = DB::connect()->prepare($sql);
		$res->execute(Array($taskId));
		return $res;
	}
}
?>