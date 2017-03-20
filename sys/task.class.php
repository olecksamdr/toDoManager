<?php
class Task {
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