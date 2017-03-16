<?php
class Lists {
	function create(){
		$sql = func_get_arg(0);
		$res = $db->query($sql);
		return $res;
	}
	function edit(){
		$sql = func_get_arg(0);
		$res = $db->query($sql);
		return $res;
	}
	function delete(){
		$sql = func_get_arg(0);
		$res = $db->query($sql);
		return $res;
	}
	function clearList($listId){
		$sql = "DELETE FROM `tasks` WHERE `listId` = '$listId'";
		$res = $db->query($sql);
	}
}
?>