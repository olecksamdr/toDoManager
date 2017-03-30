<div class='tasks'>
  <?
  $task = $tasks->getTasksFromList($_GET['listId']);
  while ($assocTasksArray = $task->fetch()) { 
    $isActive = $tasks->showIsActive($assocTasksArray['id']);
  $completion = ($tasks->isCompleted($assocTasksArray['id'])) ? 'taskCompleted': 'taskNotCompleted';
  $description = ($assocTasksArray['description']) ? nl2br($assocTasksArray['description']) :'This tasks haven`t description';
  ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <span class="<?=$isActive?>"><?= $assocTasksArray['title']?></span> 
          [DeadLine: <?= $tasks->showExpiredTime($assocTasksArray['id'])?>]
          <a href="actionsTask.php?act=taskCompleted&taskId=<?=$assocTasksArray['id']?>" class="<?=$completion?>" title="Task <?=$assocTasksArray['title']?>">
          <span class="glyphicon glyphicon-ok ok" aria-hidden="true"></span></a>
        </h3>
        <div class="actions">
		      <a href="creations.php?type=editTask&taskId=<?=$assocTasksArray['id']?>">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
		      <a href="actionsTask.php?act=delete&taskId=<?= $assocTasksArray['id']?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
	      </div>
      </div>
    <div class="panel-body">
	   <?=$description?>
    </div>
    </div>
  <?php } ?>
</div>