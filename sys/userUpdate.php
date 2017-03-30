<?php
require_once 'init.php';
if (isset($_POST['email']) && $_POST['ipp']) {
	$email = $_POST['email'];
	$ipp = $_POST['ipp'];

	$user->userUpdate($ipp, $email);
	header('Location: ../');
}
