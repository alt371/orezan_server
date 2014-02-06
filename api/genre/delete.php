<?php
require_once dirname(__FILE__).'/../../model/genre.php';
if(isset($_POST['id'])) {
	$res = Model_Genre::delete($_GET['id']);
} else {
    $res = array(
        'error' => 'invalid parameter'
    );
}

echo json_encode($res);



//delete.php: ジャンルを削除する
