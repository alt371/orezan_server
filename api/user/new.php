<?php
//new.php: ユーザ情報受け取り、そのidのユーザを作成する

require_once dirname(__FILE__).'/../../model/user.php';

// username, password, balanceは必須
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['balance'])) {
    $res = Model_User::create(array(
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'balance' => $_POST['balance']
    ));
} else {
    $res = array(
        'error' => 'invalid parameter'
    );
}

echo json_encode($res);
