<?php 
	require_once "sys/init.php";
	require_once "sys/pnation.php";

	if (!isset($_GET['listId']) || $_GET['listId'] == "") {
		$err = "Please, select a list of tasks!";
		$title = "Error";
	} else {
		require_once "sys/initDataFromDB.php";
		$listId = $_GET['listId'];
		$currentList = $lists->getCurrentList($listId);
		$currentList = $currentList->fetch();
		$captionForTitle = (strlen($currentList['caption']) > 7) ? substr($currentList['caption'], 0, 12) : $currentList['caption'];
		$title = "Tasks from \"".$captionForTitle."...\"";
	}
?>
	<? if (isset($err)): ?>
	  <h1><a href='./'>toDo Lists Manager</a><small>/<?=$title?></small></h1>
	  <div class="alert alert-danger" role="alert">
	  	<?= $err ?>
	  </div>
	<? else: ?>
	  	<h1><a href='./'>toDo Lists Manager</a><small>/<?=$title?></small>
	  		<div style="float: right;" class="dropdown">
  				<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    				Actions
    				<span class="caret"></span>
  				</button>
  				<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
  				  <li><a href='creations.php?type=task&listId=<?=$listId?>'>Add new task</a></li>
  				  <li><a href="actionsList.php?act=clear&listId=<?=$listId?>">Clear all list</a></li>
  				  <li role="separator" class="divider"></li>
  				  <li><a href="actionsList.php?act=delete&listId=<?=$listId?>">Delete list</a></li>
  				</ul>
			</div>
	  	</h1>
		<?php
	  	  require_once 'showTasks.php';
	  	?>
	  <?= $paginate?>
	  <? if (!$task->rowCount()):?>
	  	<div class='alert alert-warning' role='alert'>This list haven`t tasks</div>
	  <?
	     endif;
	  endif;
	?>
</body>
</html>