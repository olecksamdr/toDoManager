<?php 
	require_once "/sys/init.php";
?>
<h1>toDo Lists Manager<small>/</small>
<a style="float: right;" class="btn btn-primary btn-lg" href="creations.php?type=list" role="button">Add new list</a>
</h1>
<div class="lists">	
  <div class="panel panel-default">
  	<div class="panel-heading">
      <h3 class="panel-title">Your Lists</h3>
  	</div>
  	<div class="panel-body">
	  <div class="list-group">
		<?php 
		$userLists = $lists->getUserLists(1);
		while ($assocListArray = $userLists->fetch()) { 
			$tasksCounterQuery = "SELECT * FROM `tasks` WHERE `listId` = ?";
			$tasksCounter = $db->prepare($tasksCounterQuery);
			$tasksCounter->execute(Array($assocListArray['id']));
			?>
		  <a href="viewList.php?listId=<?= $assocListArray['id'] ?>" class="list-group-item">
		    <span class="badge"><?= $tasksCounter->rowCount() ?></span>
		    <?= $assocListArray['caption'] ?>
    	  </a>
    	  <a class="listDeleteBtn" href="actionsList.php?act=delete&listId=<?= $assocListArray['id'] ?>" title="Delete <?= $assocListArray['caption'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
		<?php
		}

		?>
	  </div>
  	</div>
  </div>
</div>
<?php
if (!$userLists->rowCount()) {
	echo "<div class='alert alert-warning' role='alert'>This list haven`t tasks</div>";
}
?>
</body>
</html>