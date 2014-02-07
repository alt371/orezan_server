<?php
require_once dirname(__FILE__).'/../../model/user.php';

$response = Model_User::update($_POST['user_id'], array(
	'balance' => $_POST['balance']
));

echo json_encode($response);
