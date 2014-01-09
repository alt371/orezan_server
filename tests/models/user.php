<?php
require_once dirname(__FILE__)."/../../lib/db.php";
require_once dirname(__FILE__)."/../../model/user.php";

echo "<pre>";
// echo "\n\nfind(1)\n";
// var_dump(Model_User::find(1));

// echo "\n\nfindAll()\n";
// print_r(Model_User::findAll());

echo "\n\ncreate()\n";
var_dump(Model_User::create(array(
    'name' => 'Leko',
    'password' => 'Unko'
)));

// echo "\n\nupdate()\n";
// var_dump(Model_User::update(1, array(
//     'name' => 'Leko'
// )));

// echo "\n\ndelete()\n";
// var_dump(Model_User::delete(2));
