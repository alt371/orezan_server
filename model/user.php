<?php
require_once dirname(__FILE__).'/../lib/db.php';
$config = include(dirname(__FILE__).'/../config/app.php');

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
        $record = DB::select(self::$table_name, array('id' => $id), 1);
        if (count($record) > 0) {
            return self::typeConversion($record[0]);
        } else {
            return null;
        }
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
     * @param {array}  values ユーザ情報（下記参照）
     * @return {mexed} 作成に成功したら挿入したユーザの連想配列, 失敗したらnull
     *
     * USAGE: 
     * Model_User::create(array(
     *   'username' => 'Leko',
     *   'password' => 'password',
     *   'balance'  => 12345
     * ));
     */
    public static function create($values) {
        // パスワードをハッシュ化
        $values['password'] = self::sha256($values['password']);

        // DBに挿入
        $result = DB::insert(self::$table_name, $values);

        if($result !== false) {
            return self::find($result);
        } else {
            return null;
        }
    }

    /**
     * DBに登録されたユーザIDが$idのユーザの情報を$valuesで更新する
     * @param {int}   id     編集したいユーザのID
     * @param {array} values ユーザ情報（更新したいカラム名 => 値の連想配列）
     * @return {mexed} 作成に成功したら挿入したユーザの連想配列, 失敗したらnull
     *
     * USAGE: 更新したいカラムだけ指定してあげればOK
     * Model_User::create(1, array(
     *   'username' => 'Leko',
     * ));
     */
    public static function update($id, $values) {
        $result = DB::update(self::$table_name, $id, $values);

        if($result !== false) {
            return self::find($result);
        } else {
            return null;
        }
    }

    /**
     * DBに登録されたユーザIDが$idのユーザをDBから削除する
     * @param {int} id 削除したいユーザID
     * @return {boolean} 削除に成功すればtrue, 失敗したらfalse
     */
    public static function delete($id) {
        return DB::delete(self::$table_name, $id);
    }

    public static function update_balance($id, $balance){
        return DB::update(self::$table_name, $id, array(
            'balance' => $balance
        ));
    }

    /**
     * 生パスワードをハッシュ化して返す
     * @param {string} password_str 生パスワードの文字列
     * @return {string} ハッシュ化したパスワード
     */
    public static function sha256($password_str) {
        global $config;
        return hash('sha256', $config['salt'].$password_str);
    }
}
