<?php
//new.php: 出費情報受け取り、DBに出費データを作成する
require_once dirname(__FILE__).'/../../model/expenses.php';

session_start();

$response = array();

// ログインしているなら
if($_SESSION['user_id']) {
    // `title`, `day`, `genre_id`, `money`は必須
    if(isset($_POST['title']) && isset($_POST['day']) && isset($_POST['genre_id']) && isset($_POST['money'])) {
        $response = Model_expenses::create_expenses(
            $_SESSION['user_id'],
            $_POST['title'],
            $_POST['day'],
            $_POST['genre_id'],
            $_POST['money'],
            $_POST['memo']
        );
    } else {
        $response['error'] = array(
            'message' => 'Bad Request',
            'code' => 400,
        );
    }
} else {
    $response['error'] = array(
        'message' => 'Unauthorized',
        'code' => 401,
    );
}

echo json_encode($response);
