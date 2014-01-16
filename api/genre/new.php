<?php
	require_once dirname(__FILE__).'/../../model/genre.php';

	//echo $_GET["user_id"];

Model_genre::create(array(

    "user_id" => $_GET['user_id'],
    "id" => $_GET['id'],
    "name" => $_GET['name']
));
