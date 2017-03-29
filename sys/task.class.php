<?php
class Task {
	public function isActive($taskId){
		$taskIsActive = $this->getCurrentTaskById($taskId);
		$taskIsActive = $taskIsActive->fetch();
		return $isActive = ($taskIsActive['active']) ? true : false;
	}
	public function getTasksFromList($listId){
		$qForTaskFromList = "SELECT `tasks`.`id`, `tasks`.`title`, `tasks`.`description`, `tasks`.`expiredBy` FROM `lists` LEFT JOIN `tasks` ON (`lists`.`id` = `tasks`.`listId`) WHERE `lists`.`id` = ? AND `tasks`.`id` != 'NULL' ORDER BY `id` DESC LIMIT ".$_SESSION['start'].", 3";
		$taskFromList = DB::connect()->prepare($qForTaskFromList);
		$taskFromList->execute(Array($listId));
		return $taskFromList;
	}
	public function getCurrentTaskById($taskId){
		$qForTaskById = "SELECT * FROM `tasks` WHERE `id` = ?";
		$taskById = DB::connect()->prepare($qForTaskById);
		$taskById->execute(Array($taskId));
		return $taskById;
	}
	public function getCurrentTaskByTitle($title){
		$qForTaskByTitle = "SELECT * FROM `tasks` WHERE `title` = ?";
		$taskByTitle = DB::connect()->prepare($qForTaskByTitle);
		$taskByTitle->execute(Array($title));
		return $taskByTitle;
	}
	public function showExpiredTime($taskId){
		$taskForShowing = $this->getCurrentTaskById($taskId)->fetch();
		if($taskForShowing['expiredBy'] < date('Y-m-d', strtotime('+2 day'))){
			return "<span style='color: red;'>".$taskForShowing['expiredBy']."</span>";
		} elseif ($taskForShowing['expiredBy'] > date('Y-m-d', strtotime('+4 day'))) {
			return "<span style='color: blue;'>".$taskForShowing['expiredBy']."</span>";
		} else{
			return "<span style='color: grey;'>".$taskForShowing['expiredBy']."</span>";
		}
	}
	public function showIsActive($taskId){
		$workedTask = $this->isActive($taskId);
		return $isActive = ($workedTask) ? "isActive" : "isUnActive" ;
	}
	public function create($listId, $title, $description, $expiredBy){
		$sqlCreate = "INSERT INTO `tasks` (`listId`, `title`, `description`, `expiredBy`) VALUES (?, ?, ?, ?)";
		$create = DB::connect()->prepare($sqlCreate);
		$create->execute(Array($listId, $title, $description, $expiredBy));
		return $create;
	}
	public function edit($taskId, $title, $description, $expiredBy, $isActive){
		$sqlEdit = "UPDATE `tasks` SET `title` = ?, `description` = ?, `expiredBy` = ?, `active` = ? WHERE `id` = ? LIMIT 1";
		$edit = DB::connect()->prepare($sqlEdit);
		$edit->execute(Array($title, $description, $expiredBy, $isActive, $taskId));
		return $edit;
	}
	public function delete($taskId){
		$sqlDelete = "DELETE FROM `tasks` WHERE `id` = ? LIMIT 1";
		$delete = DB::connect()->prepare($sqlDelete);
		$delete->execute(Array($taskId));
		return $delete;
	}
}
?>