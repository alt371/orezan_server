<?php
require_once dirname(__FILE__).'/../../model/user.php';

//echo $_GET["user_id"];



$users = Model_User::find($_GET["user_id"]);
echo json_encode($users);


//$users = Model_User::findAll();
//echo json_encode($users);




//$sth->bindParam(':fstName', $_POST['first-name']);






//find.php: ユーザID(user_id=?)を渡しユーザ情報を取得する
