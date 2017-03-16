<?php
class Task {
	static function create($listId, $title, $description){
		$sql = "INSERT INTO `tasks` (`listId`, `title`, `description`) VALUES ('$listId','$title', '$description')";
		$res = DB::connect()->query($sql);
		return $res;
	}
	static function edit($taskId, $title, $description){
		$sql = "UPDATE `tasks` SET `title` = '$title', `description` = '$description' WHERE `id` = '$taskId'";
		$res = DB::connect()->query($sql);
		return $res;
	}
	static function delete($taskId){
		$sql = "DELETE FROM `tasks` WHERE `id` = '$taskId' LIMIT 1";
		$res = DB::connect()->query($sql);
		return $res;
	}
}
?>