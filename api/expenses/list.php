<?php
require_once dirname(__FILE__).'/../../model/expenses.php';

session_start();

$response = array();

// ログインしているなら
if($_SESSION['user_id']) {
	//ユーザIDを受け取り、そのユーザの出費情報を全て取得する
	$response = Model_Expenses::find($_SESSION['user_id']);
} else {
	$response['error'] = array(
		'message' => 'Unauthorized',
		'code' => 401,
	);
}

echo json_encode($response);
