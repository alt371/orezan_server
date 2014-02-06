<?php
require_once dirname(__FILE__).'/../../model/genre.php';

if(isset($_POST['user_id'])) {

$res = Model_Genre::find($_GET["user_id"]);

} else {
    $res = array(
        'error' => 'invalid parameter'
    );
}

echo json_encode($res);

//ユーザIDを受け取り、そのユーザのジャンル情報を全て取得する
