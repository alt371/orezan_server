<?php
//new.php: ユーザ情報受け取り、そのidのユーザを作成する

require_once dirname(__FILE__).'/../../model/user.php';

$response = array();

// username, password, balanceは必須
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['balance'])) {
    $response = Model_User::create(array(
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'balance' => $_POST['balance']
    ));
} else {
    $response['error'] = array(
        'message' => 'Bad Request',
        'code' => 400
    );
}

echo json_encode($response);
