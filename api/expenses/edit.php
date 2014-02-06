<?php
require_once dirname(__FILE__).'/../../model/expenses.php';

$id =$_POST["id"];
$res = Model_Expensess:update($id, array(
	"title" => $_POST["title"]
));
echo json_encode($res);
