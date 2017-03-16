<?php
class Lists {
	static function create($caption){
		$sql = "INSERT INTO `lists` (`caption`) VALUES ('$caption')";
		$res = DB::connect()->query($sql);
		return $res;
	}
	static function edit($listId, $caption, $description){
		$sql = "UPDATE `lists` SET `caption` = '$caption' WHERE `id` = '$listId'";
		$res = DB::connect()->query($sql);
		return $res;
	}
	static function delete($listId){
		$sqlForList = "DELETE FROM `lists` WHERE `id` = '$listId' LIMIT 1";
		$sqlForTasksInList = "DELETE FROM `tasks` WHERE `listId` = '$listId'";
		$res = DB::connect()->query($sqlForList);
		$resForTasks = DB::connect()->query($sqlForTasksInList);
		return $res;
	}
	static function clearList($listId){
		$sql = "DELETE * FROM `tasks` WHERE `listId` = '$listId'";
		$res = DB::connect()->query($sql);
	}
}
?>