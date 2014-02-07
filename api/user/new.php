<?php
//new.php: ユーザ情報受け取り、そのidのユーザを作成する

require_once dirname(__FILE__).'/../../model/user.php';
require_once dirname(__FILE__).'/../../model/expenses.php';

$response = array();

// username, password, balanceは必須
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['balance'])) {
    $response = Model_User::create(array(
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'balance' => $_POST['balance']
    ));

    // サンプル出費を追加
    Model_Expenses::create_expenses(
        $_SESSION['user_id'],
        "サンプル",
        date("Y-m-d H:i:s"),
        0,
        0,
        "出費のサンプルです。このように表示されます。"
    );
} else {
    $response['error'] = array(
        'message' => 'Bad Request',
        'code' => 400
    );
}

echo json_encode($response);
