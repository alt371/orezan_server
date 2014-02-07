<?php
session_start();

if(isset($_POST['username']) && isset($_POST['password'])) {
	$user = Model_User::findAll(array(
		'username' => $_POST['username'],
		'password' => Model_User::sha256($_POST['password'])
	));
}