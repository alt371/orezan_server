<?php
// 設定(項目)
// 	ジャンルの登録
// 	　ジャンルテーブルのデータの登録
// 	ジャンルの削除
// 	　ジャンルテーブルのデータの削除

class Model_Genre {
	private static $table_name = "genre";

    public static function create($values) {
        return DB::insert(self::$table_name, $values);
    }

    public static function delete($id) {
        return DB::delete(self::$table_name, $id);
    }

    public static function find_genre($user_id){
		$data=DB::select(self::$table_name,array(
			"user_id"=>$user_id
			));
		return $data;
	}

}


	// public static function find_balance($id){
	// 	$data=DB::select(self::$table_name,array(
	// 		"id"=>$id
	// 	));
	// 	return $data["balance"];
	// }



?>
