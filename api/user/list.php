<?php
require_once dirname(__FILE__).'/../../model/user.php';

$users = Model_User::findAll();
echo json_encode($users);
