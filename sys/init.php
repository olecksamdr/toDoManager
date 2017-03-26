<?php
//Need to include all system files
require_once "header.html";
require_once "settings.php";
require_once "db.class.php";
require_once "list.class.php";
require_once "task.class.php";
require_once "telegram.class.php";

//trying connect to DB with cathcing errors
try {
    $db = DB::connect(HOST, DB_NAME, USER, DB_PASS);
} catch (ExceptionPdoNotExists $e) {
    @mysqli_connect(HOST, USER, DB_PASS) or die('MySQL server connection are not exist');
    @mysqli_select_db(DB_NAME) or die('Can`t access to select data base');
    mysqli_query('SET NAMES "utf8"');

    die($e->getMessage());
} catch (Exception $e) {
    die('DB connection error: ' . $e->getMessage());
}

//Get all lists from DB
$qForLists = "SELECT * FROM `lists`";
$lists  = $db->query($qForLists);

//Get tasks by list ID;
$qForTasks = "SELECT * FROM `tasks` WHERE `listId` = '1'";
$tasks = $db->query($qForTasks);

$sender = new Telegram();
$sender->token = "227521073:AAHiaG6tlSQ5Ozc_p-hJ_joJISxK0gJHdKI";
$tasks = new Task();
$lists = new Lists();
?>