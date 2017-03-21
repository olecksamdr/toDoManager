<?php
	require_once "/sys/init.php";
	if (isset($_GET['act']) && $_GET['act'] != "") {
		$action = $_GET['act'];
		switch($action){
			case 'delete':
				$actionToUser = "Deleting";
				if (!isset($_GET['listId']) || $_GET['listId'] == "") {
					echo "<h1><a href='./'>toDo Lists Manager</a><small>/Error with actions</small></h1>";
					echo "<div class='alert alert-danger' role='alert'>
						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
						<span class='sr-only'>Error:</span>
						Please, select a list to deleting
						</div>";
					sleep(5);
					header("Location: ".$_SERVER['HTTP_REFERER']);
				} else {
					$listId = $_GET['listId'];
					$actionToUser = "Deleting list";
					$deleting = Lists::delete($listId);
					if ($deleting) {
						$msg = "Deleting successful!";
					} else {
						$err = "Deleting error!";
					}
				}
				break;
			case 'add':
				if ($_POST['caption'] = "") {
					$err = "List caption can`t be empty";
					break;
				} else {
					$caption = $_POST['caption'];
					$creating = Lists::create($caption);
					if ($creating) {
						$actionToUser = "Creating new list";
						$msg = "Creating successful!";
					} else {
						$err = "Creating error!";
					}
					break;
				}
		}
	} elseif(!isset($_GET['act']) || $_GET['act'] == "") {
		$actionToUser = "Error with actions";
		$err = "Please, select action!";
	}
?>
<h1><a href='./'>toDo Lists Manager</a><small>/<?= $actionToUser?></small></h1>
<?php
if (isset($err)) {
?>
	<div class='alert alert-danger' role='alert'>
	<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
	<span class='sr-only'>Error:</span>
	<?= $err ?>
	</div>
<?php
} else if(isset($msg)) {
?>
	<div class="alert alert-success" role="alert">
	<?= $msg ?>
	</div>
<?php
}
?>
</body>
</html>