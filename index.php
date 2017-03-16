<?php 
	require_once "/sys/init.php";
	// $db->query("INSERT INTO `tasks` (`listId`, `title`, `description`) VALUES ('1', 'Test', 'Test descr')");
?>
<h1>toDo Lists Manager<small>/</small></h1>
<div class="lists">	
  <div class="panel panel-default">
  	<div class="panel-heading">
      <h3 class="panel-title">Your Lists</h3>
  	</div>
  	<div class="panel-body">
	  <div class="list-group">
		<?php 
		while ($assocListArray = $lists->fetch()) { 
			$tasksCounterQuery = "SELECT * FROM `tasks` WHERE `listId` = '".$assocListArray['id']."'";
			$tasksCounter = $db->query($tasksCounterQuery);
			?>
		  <a href="viewList.php?listId=<?= $assocListArray['id'] ?>" class="list-group-item">
		    <span class="badge"><?= $tasksCounter->rowCount() ?></span>
		    <?= $assocListArray['caption'] ?>
    	  </a>
		<?php
		}
		?>
	  </div>
  	</div>
  </div>
</div>
</body>
</html>