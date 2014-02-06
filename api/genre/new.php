<?php
	require_once dirname(__FILE__).'/../../model/genre.php';

	//echo $_GET["user_id"];
if(isset($_POST['name'])) {

$res = Model_genre::create(array(

    "user_id" => $_GET['user_id'],
    "name" => $_GET['name']
));

} else {
    $res = array(
        'error' => 'invalid parameter'
    );
}

echo json_encode($res);
