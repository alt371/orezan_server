<?php
require_once dirname(__FILE__).'/../../model/user.php';

session_start();

$response = array();

if(isset($_POST['username']) && isset($_POST['password'])) {
	$user = Model_User::findAll(array(
		'username' => $_POST['username'],
		'password' => Model_User::sha256($_POST['password']),
	));
	$response['result'] = count($user) > 0;

	if($response['result']) {
		$_SESSION['user_id'] = $user[0]['id'];
	}
} else {
	$response['error'] = array(
		'message' => 'Bad Request',
		'code' => 400
	);
}

echo json_encode($response);
