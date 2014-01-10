<?php
	require_once dirname(__FILE__).'/../../model/expenses.php';

	//echo $_GET["user_id"];

Model_expenses::create_expenses(

    $_POST['title'],
    $_POST['day'],
    $_POST['genre_id'],
    $_POST['money'],
    $_POST['memo']
);



	//new.php: ユーザ情報受け取り、そのidのユーザを作成する


