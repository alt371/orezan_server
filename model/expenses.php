<?php
require_once dirname(__FILE__).'/../lib/db.php';

class Model_Expenses{

	public static function create_expenses($user_id, $title, $day, $genre_id, $money, $memo) {
		return DB::insert(self::$table_name, array(
			'user_id'	=> $user_id,
			'title'		=> $title,
			'day'		=> $day,
			'genre_id'	=> $genre_id,
			'money'		=> $money,
			'memo'		=> $memo
		));
	}

	public static function find_balance($id){
		$data = DB::select(self::$table_name,array(
			"id"=>$id
		));
		return $data["balance"];
	}


	public static function find($id) {
    	return DB::select(self::$table_name, array('user_id' => $id));
    }


	public static function payment(){
		
	}
	public static function find_expenses(){
		
	}
	public static function find_payment(){
		
	}
	public static function delete_expenses(){
		
	}






	private static $table_name = "expenses";

    public static function delete($id) {
        return DB::delete(self::$table_name, $id);
    }

    public static function update($id, $columns) {
    	return DB::update(self::$table_name, $id, $columns);
    }
}

// 登録(出費)
// 	日付選択
// 	　日付の登録 create_day
// 	タイトル入力
// 	　タイトルの登録 create_title
// 	ジャンル選択
// 	　ジャンルテーブルのデータ呼び出し find_genre
// 	　ジャンルidの登録 create_id_genre
// 	金額入力
// 	　金額の登録 create_money
// 	メモ入力
// 	　メモの登録 create_memo
// 	データの登録 create_expenses
// 	残高呼び出し find_balance
// 	残高から金額を引く payment

// 一覧(出費)
// 　　出費テーブルのデータ表示
// 		出費テーブルのデータ呼び出し find_expenses
// 	残高の表示
// 		残高の呼び出し find_payment

// 詳細(出費)
// 	詳細表示
// 	　出費テーブルのデータの呼び出し
// 	データ削除
// 	　出費テーブルのデータ削除 delete_expenses

// 履歴(出費)
// 	履歴表示
// 	　出費テーブルのデータ呼び出し
// 	戻る


// +class Model_User {
// +    private static $table_name = "user";
// +
// +    public static function find($id) {
// +        return DB::select(self::$table_name, array('id' => $id), 1);
// +    }
// +
// +    public static function findAll($where = array()) {
// +        return DB::select(self::$table_name, $where);
// +    }
// +
// +    public static function create($values) {
// +        return DB::insert(self::$table_name, $values);
// +    }
// +
// +    public static function update($id, $values) {
// +        return DB::update(self::$table_name, $id, $values);
// +    }
// +
// +    public static function delete($id) {
// +        return DB::delete(self::$table_name, $id);
// +    }
// +}




