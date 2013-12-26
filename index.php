<?php
require_once "lib/db.php";
require_once "model/user.php";

echo "<pre>";
echo "\n\nfind(1)\n";
var_dump(Model_User::find(1));

echo "\n\nfindAll()\n";
print_r(Model_User::findAll());

echo "\n\ncreate()\n";
var_dump(Model_User::create(array(
    'name' => 'hoge',
    'password' => 'foo'
)));

echo "\n\nupdate()\n";
var_dump(Model_User::update(1, array(
    'name' => 'Leko'
)));

echo "\n\ndelete()\n";
var_dump(Model_User::delete(2));
