<div class="lists">	
  <div class="panel panel-default">
  	<div class="panel-heading">
      <h3 class="panel-title">Hi, <?=$user->login?> your lists</h3>
  	</div>
  	<div class="panel-body">
	  <div class="list-group">
		<?php 
		$userLists = $lists->getUserLists($user->id);
		while ($assocListArray = $userLists->fetch()) { 
			$tasksCounterQuery = "SELECT * FROM `tasks` WHERE `listId` = ?";
			$activeTasksCounterQuery = "SELECT * FROM `tasks` WHERE `listId` = ? AND `active` = '1'";
			$tasksCounter = $db->prepare($tasksCounterQuery);
			$activeTasksCounter = $db->prepare($activeTasksCounterQuery);
			$tasksCounter->execute(Array($assocListArray['id']));
			$activeTasksCounter->execute(Array($assocListArray['id']));
			?>
		  <a href="viewList.php?listId=<?= $assocListArray['id'] ?>" class="list-group-item">
		    <span class="badge"><?=$activeTasksCounter->rowCount()?>/<?= $tasksCounter->rowCount() ?></span>
		    <?= $assocListArray['caption'] ?>
    	  </a>
    	  <a class="listDeleteBtn" href="actionsList.php?act=delete&listId=<?= $assocListArray['id'] ?>" title="Delete <?= $assocListArray['caption'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
    	  <a href="creations.php?type=task&listId=<?=$assocListArray['id']?>" class="taskAddBtn" title="Add new task into <?= $assocListArray['caption'] ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
		<?php
		}

		?>
	  </div>
  	</div>
  </div>
</div>
<?php if(!$userLists->rowCount()):?>
	<div class='alert alert-warning' role='alert'>You haven`t lists</div>
<?php endif;?>