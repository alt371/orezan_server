<?php
//new.php: 出費情報受け取り、DBに出費データを作成する
require_once dirname(__FILE__).'/../../model/expenses.php';

// `title`, `day`, `genre_id`, `money`は必須
if(isset($_POST['title']) && isset($_POST['day']) && isset($_POST['genre_id']) && isset($_POST['money'])) {
    $res = Model_expenses::create_expenses(
        $_POST['title'],
        $_POST['day'],
        $_POST['genre_id'],
        $_POST['money'],
        $_POST['memo']
    );
} else {
    $res = array(
        'error' => 'invalid parameter'
    );
}

echo json_encode($res);
