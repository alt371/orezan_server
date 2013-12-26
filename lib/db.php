<?php
class DB {
    private static $pdo;

    // データベースに接続する
    private static function connect() {
        $config = include(dirname(__FILE__).'/../config/db.php');
        $dsn = 'mysql:dbname='.$config['dbname'].';host='.$config['host'];
        static::$pdo = new PDO($dsn, $config['user'], $config['password']);
    }

    /**
     * 結果を取得しない(更新、削除、挿入)系SQL
     * @private
     * @param {string} sql_str SQL文字列
     * @param {array}  params  バインドするパラメータの配列
     * @return {boolean} 実行に成功したらtrue, 失敗したらfalse
     */
    private static function _run($sql_str, $params = array()) {
        self::connect();

        $query = self::$pdo->prepare($sql_str);

        if($query->execute($params)) {
            return true;
        } else {
            var_dump($query->errorInfo());
            return false;
        }
    }

    /**
     * 結果を取得する(読み取り)系SQL
     * @private
     * @param {string} sql_str SQL文字列
     * @param {array}  params  バインドするパタメータの配列
     * @return {array} SQLを実行した結果の連想配列
     */
    private static function _execute($sql_str, $params = array()) {
        self::connect();
        $query = self::$pdo->prepare($sql_str);

        var_dump($params);
        $cnt = 1;
        foreach($params as $param) {
            if(is_int($param)) {
                $query->bindParam($cnt++, $param, PDO::PARAM_INT);
            } else {
                $query->bindParam($cnt++, $param, PDO::PARAM_STR);
            }
        }
        $result = $query->execute($params);

        if($result === false) {
            var_dump($query->errorInfo());
        }

        return $query->fetchAll();
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
            $sql .= " LIMIT ?";
            array_push($params, $limit);
        }
        var_dump($sql);
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
        return self::_run($sql, $params);
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
            array_push($column, "? = ?");
            array_push($params, $key, $val);
        }

        array_push($params, $id);
        $column = implode($column, ", ");
        $sql = "UPDATE $table_name SET $column WHERE id = ?";

        return DB::_run($sql, $params);
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

        return DB::_run($sql, $params);
    }
}
