<?php
require_once dirname(__FILE__).'/../lib/db.php';

class Model_User {
    private static $table_name = "user";

    // カラムごとの型の指定
    private static $attributes = array(
        'id' => 'int',
        'username' => 'string',
        'password' => 'string',
        'balance' => 'int'
    );

    private static function typeConversion($record) {
        foreach(self::$attributes as $column => $type) {
            if($type === 'string') continue;

            if($type === 'int') $record[$column] = (int)$record[$column];
            if($type === 'boolean') $record[$column] = (bool)$record[$column];
        }
        return $record;
    }

    /**
     * idが$idのユーザをDBから取得する
     * @param {int} id 取得したいユーザのID 
     * @return array ユーザ情報の連想配列
     */
    public static function find($id) {
        $record = DB::select(self::$table_name, array('id' => $id), 1)[0];
        return self::typeConversion($record);
    }

    /**
     * DBに格納されているユーザを全て取得する
     * @return array<array> ユーザ情報の連想配列の配列
     */
    public static function findAll($where = array()) {
        $records = DB::select(self::$table_name, $where);
        foreach($records as &$record) {
            $record = self::typeConversion($record);
        }
        return $records;
    }

    /**
     * DBにユーザを挿入する
     * @param {array} values ユーザ情報（下記参照）
     * @return {boolean} 作成に催行すればtrue, 失敗したらfalse 
     * FIXME: 作成したユーザ情報の連想配列を返したい
     *
     * USAGE: 
     * Model_User::create(array(
     *   'username' => 'Leko',
     *   'password' => 'password',
     *   'balance'  => 12345
     * ));
     */
    public static function create($values) {
        return DB::insert(self::$table_name, $values);
    }

    /**
     * DBに登録されたユーザIDが$idのユーザの情報を$valuesで更新する
     * @param {int}   id     編集したいユーザのID
     * @param {array} values ユーザ情報（更新したいカラム名 => 値の連想配列）
     * @return {boolean} 更新に催行すればtrue, 失敗したらfalse 
     *
     * USAGE: 更新したいカラムだけ指定してあげればOK
     * Model_User::create(1, array(
     *   'username' => 'Leko',
     * ));
     */
    public static function update($id, $values) {
        return DB::update(self::$table_name, $id, $values);
    }

    /**
     * DBに登録されたユーザIDが$idのユーザをDBから削除する
     * @param {int} id 削除したいユーザID
     * @return {boolean} 削除に成功すればtrue, 失敗したらfalse
     */
    public static function delete($id) {
        return DB::delete(self::$table_name, $id);
    }
}
