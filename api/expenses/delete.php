<?php
require_once dirname(__FILE__).'/../../model/expenses.php';


Model_expenses::delete($_GET['id']);



//delete.php: 出費情報を削除する
