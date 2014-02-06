<?php
require_once dirname(__FILE__).'/../../model/expenses.php';

if(isset($_POST['id'])){
	$res = Model_expenses::delete($_GET['id']);
}} else {
    $res = array(
        'error' => 'invalid parameter'
    );
}
echo json_encode($res);



//delete.php: 出費情報を削除する
