<?php
	require_once dirname(__FILE__).'/../../model/user.php';

	//echo $_GET["user_id"];

Model_User::create(array(

    'username' => $_POST['username'],
    'password' => $_POST['password'],
    'balance' => $_POST['balance']
));



	//new.php: ユーザ情報受け取り、そのidのユーザを作成する


