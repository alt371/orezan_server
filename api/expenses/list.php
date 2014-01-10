<?php
require_once dirname(__FILE__).'/../../model/expenses.php';

$expenses = Model_Expenses::find($_GET["user_id"]);
var_dump($expenses);
echo json_encode($expenses);

//ユーザIDを受け取り、そのユーザの出費情報を全て取得する
