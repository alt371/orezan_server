## APIドキュメント

### User
ユーザにまつわるAPI。  
エンドポイント：`/api/user/`

#### `/api/user/list.php`
ユーザの一覧を取得する

|項目|内容・値|
|:--|:--|
|メソッド|`GET`|
|必須パラメータ|なし|
|パラメータ|なし|
|ログインの必要|なし|

#### `/api/user/find.php`
ユーザ１人を取得する

|項目|内容・値|
|:--|:--|
|メソッド|`GET`|
|必須パラメータ|`user_id`：ユーザのID|
|パラメータ|なし|
|ログインの必要|なし|

#### `/api/user/new.php`
ユーザを作成する

|項目|内容・値|
|:--|:--|
|メソッド|`GET`|
|必須パラメータ|`username`：ユーザ名、`password`：パスワード、`balance`：予算|
|パラメータ|なし|
|ログインの必要|なし|

#### `/api/user/authenticate.php`
ユーザ認証する

|項目|内容・値|
|:--|:--|
|メソッド|`GET`|
|必須パラメータ|`username`：ユーザ名、`password`：パスワード|
|パラメータ|なし|
|ログインの必要|なし|

### Expenses
出費にまつわるAPI。  
エンドポイント：`/api/expenses/`

#### `/api/expenses/list.php`
出費一覧を取得する  
ログインしているユーザIDを利用するため`user_id`は不要。  
ログインしていなければ`login required`とか返す

|項目|内容・値|
|:--|:--|
|メソッド|`GET`|
|必須パラメータ|なし|
|パラメータ|なし|
|ログインの必要|なし|

#### `/api/expenses/delete.php`
出費を１つ削除する  
指定されたidの出費に紐付いたユーザとしてログインしていなければ、エラーを返す

|項目|内容・値|
|:--|:--|
|メソッド|`GET`|
|必須パラメータ|`id`：削除したいexpensesのid|
|パラメータ|なし|
|ログインの必要|あり|


### Genre
エンドポイント：`/api/genre/`

#### `/api/genre/list.php`
ジャンルの一覧を取得する  
指定されたユーザIDでログインしていなければエラーを返す。

|項目|内容・値|
|:--|:--|
|メソッド|`GET`|
|必須パラメータ|`user_id`：ジャンルを取得したいユーザのID|
|パラメータ|なし|
|ログインの必要|あり|

#### `/api/genre/new.php`
ジャンルを作成する  
ログインしているユーザのIDでジャンルを作成するためuser_idは不要。
ログインしていなければエラーを返す。

|項目|内容・値|
|:--|:--|
|メソッド|`GET`|
|必須パラメータ|`name`：ジャンル名|
|パラメータ|なし|
|ログインの必要|あり|

#### `/api/genre/delete.php`
ジャンルを削除する
指定したidのジャンルのユーザとしてログインしていなければ、エラーを返す。

|項目|内容・値|
|:--|:--|
|メソッド|`GET`|
|必須パラメータ|`id`：削除したいジャンルのid|
|パラメータ|なし|
|ログインの必要|あり|

