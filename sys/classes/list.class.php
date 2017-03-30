<?php
class Lists {
	public function getUserLists($userId){
		$qForLists = "SELECT * FROM `lists` WHERE `userId` = ?";
		$res = DB::connect()->prepare($qForLists);
		$res->execute(Array($userId));
		return $userLists = $res;
	}
	public function getCurrentList($listId){
		$qForList = "SELECT * FROM `lists` WHERE `id` = ?";
		$list = DB::connect()->prepare($qForList);
		$list->execute(Array($listId));
		return $list;
	}
	static function create($caption){
		$sql = "INSERT INTO `lists` (`caption`) VALUES (?)";
		$res = DB::connect()->prepare($sql);
		$res->execute(Array($caption));
		return $res;
	}
	static function delete($listId){
		$sqlForList = "DELETE FROM `lists` WHERE `id` = ? LIMIT 1";
		$sqlForTasksInList = "DELETE FROM `tasks` WHERE `listId` = ?";
		$res = DB::connect()->prepare($sqlForList);
		$res->execute(Array($listId));
		$resForTasks = DB::connect()->prepare($sqlForTasksInList);
		$resForTasks->execute(Array($listId));
		return $res;
	}
	static function clearList($listId){
		$sql = "DELETE FROM `tasks` WHERE `listId` = ?";
		$res = DB::connect()->prepare($sql);
		$res->execute(Array($listId));
	}
}
?>