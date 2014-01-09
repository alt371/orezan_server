<?php
require_once dirname(__FILE__).'/../lib/db.php';

class Model_User {
    private static $table_name = "user";

    /**
     * 
     */
    public static function find($id) {
        return DB::select(self::$table_name, array('id' => $id), 1)[0];
    }

    public static function findAll($where = array()) {
        return DB::select(self::$table_name, $where);
    }

    public static function create($values) {
        return DB::insert(self::$table_name, $values);
    }

    public static function update($id, $values) {
        return DB::update(self::$table_name, $id, $values);
    }

    public static function delete($id) {
        return DB::delete(self::$table_name, $id);
    }
}
