<?php
//Get data about user
$qForUser = "SELECT * FROM `users` WHERE `id` = ?";
$userPrepare = $db->prepare($qForUser);
$userPrepare->execute(Array(1));
$user = $userPrepare->fetch();
?>