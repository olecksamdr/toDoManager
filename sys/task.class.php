<?php
class Task {
	public function getTasksFromList($listId){
		$qForTask = "SELECT `tasks`.`id`, `tasks`.`title`, `tasks`.`description` FROM `lists` LEFT 	JOIN `tasks` ON (`lists`.`id` = `tasks`.`listId`) WHERE `lists`.`id` = ? ORDER BY `id` 	DESC";
		$task = DB::connect()->prepare($qForTask);
		$task->execute(Array($listId));
		return $task;
	}
	static function create($listId, $title, $description){
		$sql = "INSERT INTO `tasks` (`listId`, `title`, `description`) VALUES (?, ?, ?)";
		$res = DB::connect()->prepare($sql);
		$res->execute(Array($listId, $title, $description));
		return $res;
	}
	static function edit($taskId, $title, $description){
		$sql = "UPDATE `tasks` SET `title` = ?, `description` = ? WHERE `id` = ? LIMIT 1";
		$res = DB::connect()->prepare($sql);
		$res->execute(Array($taskId, $title, $description));
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