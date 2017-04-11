<?php
require_once 'sys/init.php';
require_once 'sys/classes/mail.class.php';

// Mail::sendOfMail('cool.ksandr2013@gmail.com', 'Test', 'It`s test message');
// $user = new User(2);

// $user->chatId = 4564567;
// var_dump($user->login);

// require_once 'sys/pnation.php';


// echo $paginate;

// $taskId = $_GET['taskId'];

// echo $res = $tasks->showIsActive($taskId);


// $date = $_GET['date'];
// echo $date;
// $task = $tasks->getTasksFromList($_GET['listId']);
// while ($assocTasksArray = $task->fetch()) {
// 	// $assocTasksArray['expiredBy'] = date('Y-m-d', strtotime('+1 week'));
// 	// $expired = $assocTasksArray['expiredBy'];
// 	// echo $tasks->showExpiredTime($assocTasksArray['id']);
// 	// $color = $tasks->showExpiredTime($assocTasksArray['id']);
// 	// echo "ID:".$assocTasksArray['id'].", EXPIRED: <span style='color: $color'>".$assocTasksArray['expiredBy']."</span><br />";
// 	echo "ID:".$assocTasksArray['id'].":".$tasks->showExpiredTime($assocTasksArray['id']);

// 	// if($expired < date('Y-m-d', strtotime('+1 week'))){
// 	// 	echo "Good";
// 	// }
// }

// $pages = new Pages($db->query("SELECT COUNT(*) FROM `tasks`")->fetchColumn());

// $pages->display('?'); 
?>
<!-- 	<form action="?">
	  <div class="form-group">
		<input type="date" name="date" class="form-control">
	  </div>
		<input type="submit" value="send">
	</form> -->
<!-- <div class="row"> -->
<!--   <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-addon">
        <input type="checkbox" aria-label="...">
      </span>
      <input type="text" class="form-control" aria-label="..." value="Is Active?">
    </div><!-- /input-group
  </div><!-- /.col-lg-6 -->
  <!-- <div class="col-lg-6"> -->
<!--     <div class="input-group">
      <span class="input-group-addon">
        <input type="radio" aria-label="...">
      </span>
      <input type="text" class="form-control" aria-label="...">
    </div><!-- /input-group -->
  <!-- </div>/.col-lg-6 -->

<!-- <a data-toggle="modal" data-target="#userSettings">
  Launch demo modal
</a> -->

<!-- Modal -->
<!-- <div class="modal fade" id="userSettings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
</body>
</html>