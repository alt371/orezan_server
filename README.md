## APIドキュメント

### User
エンドポイント：`/api/user/`

#### `/api/user/list.php`
ユーザの一覧を取得する

|項目|内容・値|
|:--|:--|
|メソッド|`GET`|
|必須パラメータ|なし|
|パラメータ|なし|

#### `/api/user/find.php`
ユーザ１人を取得する

|項目|内容・値|
|:--|:--|
|メソッド|`GET`|
|必須パラメータ|`user_id`：ユーザのID|
|パラメータ|なし|

#### `/api/user/new.php`
ユーザを作成する

|項目|内容・値|
|:--|:--|
|メソッド|`GET`|
|必須パラメータ|`username`：ユーザ名、`password`：パスワード、`balance`：予算|
|パラメータ|なし|

#### `/api/user/authenticate.php`
ユーザ認証する

|項目|内容・値|
|:--|:--|
|メソッド|`GET`|
|必須パラメータ|`username`：ユーザ名、`password`：パスワード|
|パラメータ|なし|

### Expenses
エンドポイント：`/api/expenses/`

#### `/api/expenses/list.php`
|項目|内容・値|
|:--|:--|
|概要|する|
|メソッド|`GET`|
|必須パラメータ||
|パラメータ||


#### `/api/expenses/new.php`
|項目|内容・値|
|:--|:--|
|概要|する|
|メソッド|`GET`|
|必須パラメータ||
|パラメータ||


#### `/api/expenses/edit.php`
|項目|内容・値|
|:--|:--|
|概要|する|
|メソッド|`GET`|
|必須パラメータ||
|パラメータ||


#### `/api/expenses/delete.php`
|項目|内容・値|
|:--|:--|
|概要|する|
|メソッド|`GET`|
|必須パラメータ||
|パラメータ||


### Genre
エンドポイント：`/api/genre/`

#### `/api/genre/list.php`
|項目|内容・値|
|:--|:--|
|概要|する|
|メソッド|`GET`|
|必須パラメータ||
|パラメータ||

#### `/api/genre/new.php`
|項目|内容・値|
|:--|:--|
|概要|する|
|メソッド|`GET`|
|必須パラメータ||
|パラメータ||

#### `/api/genre/delete.php`
|項目|内容・値|
|:--|:--|
|概要|する|
|メソッド|`GET`|
|必須パラメータ||
|パラメータ||

