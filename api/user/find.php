<?php
require_once dirname(__FILE__).'/../../model/user.php';

//echo $_GET["user_id"];

// user_id必須
if(isset($_GET['user_id'])) {
	$users = Model_User::find($_GET["user_id"]);
	if($users == null){
		$users = array(
    	    'error' => "
＼　　 　　　　 　　　　　　　￤　　　　　　 　 /
　 ＼　　　　　 　　　　　　　￤　　　　　 　 /
　　　　　　　　　　　　　／￣￣　ヽ,
　　　　　　　　　　　　/　　　　　 　 ',　　　　　　/　　 　　＿/＼／＼/＼／|＿
　　　 ＼　　　 ﾉ//, {0}　 /¨`ヽ　{0}　,ﾐヽ　 　 /　 　　 ＼　　 　　　　　　　／
　　　　　＼ ／　く　ｌ　　 ヽ._.ノ　　　', ゝ　＼　　　 　　 ＜　　 ねーよ！　　＞
　　　　　／ ／⌒　ﾘ　　　	 ｀ー'′　　 ' ⌒＼ ＼　　　　  ／　 　　　　　　　　＼
　　　　　(　　￣￣⌒　　　　　  　　　　　⌒￣　＿)　　	    ￣|／＼/＼/＼/￣
　　　　　　｀￣￣｀ヽ　　　　　　　　　　　/´￣
　　　　　　　　　　　|　　　　　　　　　 　 |
　　－－－ ‐　　　ﾉ　 　　　　　　　　　｜
　　　　　　　　　 ／ 　　　　　　　 　 　ﾉ　　　　　　　 －－－－
　　　　　　　　 /　　　　　　　　 　　∠＿
　　－－　　　|　 　 f＼　　　　　　ﾉ　 　 ￣`丶.
　　　　　　　　| 　 　|　　ヽ＿＿ﾉー─-- ､_ 　　）　　　　－　_
.　　　　　　　 ｜　　| 　 　　　　　　　　　/　　/
　　　　 　　 　｜　｜　　　　　　　　　　,'　　/
　　　　／ 　／　　ﾉ　　　　　　　　　 　| 　 ,'　　　 ＼
　　　　　　/ 　 ／ 　 　　　　　　　　 　|　 /　　　　　 ＼
　　　／_ノ　／　 　 　 　　　　　　　　,ﾉ　〈 　 　 　 　 　 ＼
　　　　(　 〈　　　　　　　　　　　　 　ヽ.__　＼　　　　　　　　＼
　　　　　ヽ.＿>　　　　　　　　　　　　　　＼__)

    	    "//不正なパラメータ
    	);
	}
} else{
		$users = array(
        'error' => 'invalid parameter'
    );
	    

}

echo json_encode($users);


//$users = Model_User::findAll();
//echo json_encode($users);




//$sth->bindParam(':fstName', $_POST['first-name']);






//find.php: ユーザID(user_id=?)を渡しユーザ情報を取得する
