<?php
define('DB_CONFIG_PATH', dirname(__FILE__).'/../config/db.php');

class DB {
    private static $pdo;

    /**
     * データベースに接続する
     * @private
     * @return {void}
     */
    private static function connect() {
        if(!isset(self::$pdo)) {
            $config = include(DB_CONFIG_PATH);
            $dsn = 'mysql:dbname='.$config['dbname'].';host='.$config['host'];
            self::$pdo = new PDO($dsn, $config['user'], $config['password']);
        }
    }

    /**
     * 疑問符パラメータの配列をPDOStatementオブジェクトにバインドする
     * @private
     * @param {PDOStatement} バインドしたいPDOStatementインスタンス
     * @param {array}        バインドする変数の配列
     * @return {void}
     */
    private static function _bind($statement, $params) {
        $cnt = 1;
        foreach($params as $param) {
            if(is_int($param)) {
                $statement->bindParam($cnt, $param, PDO::PARAM_INT);
            } else {
                $statement->bindParam($cnt, $param, PDO::PARAM_STR);
            }
            $cnt++;
        }
    }

    /**
     * 結果を取得しない(UPDATE, DELETE, INSERT)SQLを実行する
     * @private
     * @param {string} sql_str SQL文字列
     * @param {array}  params  バインドするパラメータの配列
     * @return {mixed} 実行に成功したら挿入したID, 失敗したらfalseを返す
     */
    private static function _exec($sql_str, $params = array()) {
        self::connect();

        $query = self::$pdo->prepare($sql_str);

        if($query->execute($params)) {
            return (int)self::$pdo->lastInsertId();
        } else {
            throw new PDOException($e);
            return false;
        }
    }

    /**
     * 結果を取得する(SELECT)SQLを実行する
     * @private
     * @param {string} sql_str SQL文字列
     * @param {array}  params  バインドするパタメータの配列
     * @return {array} SQLを実行した結果の連想配列
     */
    private static function _execute($sql_str, $params = array()) {
        self::connect();

        $query = self::$pdo->prepare($sql_str);
        // self::_bind($query, $params);

        $result = $query->execute($params);

        // DEBUG
        if($result === false) {
            var_dump($query->errorInfo());
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * SELECT文の実行
     * @param {string} table_name SELECT文を実行するテーブル名
     * @param {array}  [where]    WHERE句を指定した連想配列(ex. array('id' => 1))
     * @param {int}    [limit]    LIMIT句を整数で指定
     * @return {array} INSERTを実行した結果の連想配列
     */
    public static function select($table_name, $where = array(), $limit = null) {
        $sql = "SELECT * FROM $table_name";
        $params = array();

        if(count($where)) {
            $where_arr = array();

            foreach($where as $key => $val) {
                array_push($where_arr, "$key = ?");
                array_push($params, $val);
            }
            $sql .= " WHERE ".implode($where_arr, " AND ");
        }
        if(!is_null($limit)) {
            $sql .= " LIMIT $limit";
        }
        return self::_execute($sql, $params);
    }

    /**
     * INSERT文を実行する
     * @param {string} table_name INSERT文を実行するテーブル名
     * @param {array}  columns    挿入するカラム名
     * @return {boolean} 挿入に成功したらtrue, 失敗したらfalse
     */
    public static function insert($table_name, $columns) {
        $column = array();
        $value = array();
        $params = array();

        foreach($columns as $col => $val) {
            array_push($column, $col);

            array_push($value , '?');
            array_push($params, $val);
        }

        $column = implode($column, ", ");
        $value = implode($value, ", ");

        $sql = "INSERT INTO $table_name ($column) VALUES ($value)";
        return self::_exec($sql, $params);
    }

    /**
     * UPDATE文を実行する
     * @param {string} table_name UPDATE文を実行するテーブル名
     * @param {array}  columns    挿入するカラム名
     * @return {boolean} 更新に成功したらtrue, 失敗したらfalse
     */
    public static function update($table_name, $id, $columns) {
        $column = array();
        $params = array();

        foreach($columns as $key => $val) {
            array_push($column, "$key = ?");
            array_push($params, $val);
        }

        array_push($params, $id);
        $column = implode($column, ", ");
        $sql = "UPDATE $table_name SET $column WHERE id = ?";

        return DB::_exec($sql, $params);
    }

    /**
     * DELETE文を実行する
     * @param {string} table_name DELETE文を実行するテーブル名
     * @param {array}  columns    挿入するカラム名
     * @return {boolean} 削除に成功したらtrue, 削除に失敗したらfalse
     */
    public static function delete($table_name, $id) {
        $params = array($id);
        $sql = "DELETE FROM $table_name WHERE id = ?";

        return DB::_exec($sql, $params);
    }
}
