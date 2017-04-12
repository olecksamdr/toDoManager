<?php
require_once 'init.php';
if (isset($_POST['email']) && $_POST['ipp']) {
	$email = $_POST['email'];
	$ipp = $_POST['ipp'];
	$eNotifs = ($_POST['eNotifs']);
	$tNotifs = ($_POST['tNotifs']);

	$user->userUpdate($ipp, $email, $eNotifs, $tNotifs);
	header('Location: ../');
}
