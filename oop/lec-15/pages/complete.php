<?php
// 外部ファイルの読み込み
require_once "db.php";
require_once "User.php";
?>
<?php
/* 1. リクエストパラメータから処理種別キー（actionキー）を取得 */
$action = $_POST["action"];
$title = "";

/* 2. 処理の分岐 */
if ($action === "signup") {
	/* 2-1. ［登録］ボタンをクリックされた場合の処理 */
	try {
		// 2-1-1. リクエストパラメータを取得
		isset($_POST["id"])? $id = $_POST["id"]: $id = 0;
		isset($_POST["name"])? $name = $_POST["name"]: $name = "";
		isset($_POST["age"])? $age = $_POST["age"]: $age = 0;
		isset($_POST["blood"])? $blood = $_POST["blood"]: $blood = "";
		isset($_POST["email"])? $email = $_POST["email"]: $email = "";
		// 2-1-2. 新規追加のUserクラスをインスタンス化
		$user = new USer($id, $name, $age, $blood, $email);
		// 2-1-3. データベース接続オブジェクトをインスタンス化
		$pdo = connectDB();
		// 2-1-4. 実行するSQLを設定
		$sql = "insert into user (name, age, blood, email) values (:name, :age, :blood, :email)";
		// 2-1-5. プレースホルダに設定するパラメータの連想配列を生成
		$params = [];
		$params[":name"] = $user->getName();
		$params[":age"] = $user->getAge();
		$params[":blood"] = $user->getBlood();
		$params[":email"] = $user->getEmail();
		// 2-1-6. SQL実行オブジェクトを取得
		$pstmt = $pdo->prepare($sql);
		// 2-1-7. SQLを実行
		$pstmt->execute($params);
	} catch (PDOException $e) {
		// 2-1-8. メッセージを表示して強制終了
		echo $e->getMessage();
		die;
	} finally {
		// 2-1-9. データベース接続関連オブジェクトの開放
		unset($pstmt);
		unset($pdo);
	}
	$title = "新規ユーザの追加";
} else if ($action === "update") {
	/* 2-2. ［更新］ボタンをクリックされた場合の処理 */
	try {
		// 2-2-1. リクエストパラメータを取得
		isset($_POST["id"])? $id = $_POST["id"]: $id = 0;
		isset($_POST["name"])? $name = $_POST["name"]: $name = "";
		isset($_POST["age"])? $age = $_POST["age"]: $age = 0;
		isset($_POST["blood"])? $blood = $_POST["blood"]: $blood = "";
		isset($_POST["email"])? $email = $_POST["email"]: $email = "";
		// 2-2-2. 更新のUserクラスをインスタンス化
		$user = new User($id, $name, $age, $blood, $email);
		// 2-2-3. データベース接続オブジェクトをインスタンス化
		$pdo = connectDB();
		// 2-2-4. 実行するSQLを設定
		$sql = "update user set name = :name, age = :age, blood = :blood, email = :email where id = :id";
		// 2-2-5. プレースホルダに設定するパラメータの連想配列を生成
		$params = [];
		$params[":id"] = $user->getId();
		$params[":name"] = $user->getName();
		$params[":age"] = $user->getAge();
		$params[":blood"] = $user->getBlood();
		$params[":email"] = $user->getEmail();
		// 2-2-6. SQL実行オブジェクトを取得
		$pstmt = $pdo->prepare($sql);
		// 2-2-7. SQLを実行
		$pstmt->execute($params);
	} catch (PDOException $e) {
		// 2-2-8. メッセージを表示して強制終了
		echo $e->getMessage();
		die;
	} finally {
		// 2-2-9. データベース接続関連オブジェクトの開放
		unset($pstmt);
		unset($pdo);
	}
	$title = "ID{$user->getId()}のユーザの更新";
} else if ($action === "delete") {
	/* 2-3. ［削除］ボタンをクリックされた場合の処理 */
	// 2-3-1. リクエストパラメータを取得
	isset($_POST["id"])? $id = $_POST["id"]: $id = 0;
	try {
		// 2-3-2. データベース接続オブジェクトをインスタンス化
		$pdo = connectDB();
		// 2-3-3. 実行するSQLを設定
		$sql = "delete from user where id = ?";
		// 2-3-4. SQL実行オブジェクトを取得
		$pstmt = $pdo->prepare($sql);
		// 2-3-5. プレースホルダにパラメータを設定
		$pstmt->bindValue(1, $id);
		// 2-3-6. SQLを実行
		$pstmt->execute();
	} catch (PDOException $e) {
		// 2-3-7. メッセージを表示して強制終了
		echo $e->getMessage();
		die;
	} finally {
		// 2-3-8. データベース接続関連オブジェクトの開放
		unset($pstmt);
		unset($pdo);
	}
	$title = "ID{$id}のユーザの削除";
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>完了 - データベースとクラス</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<h1>データベースとクラス</h1>
	<section>
		<h2>処理完了</h2>
		<p><?= $title ?>を完了しました。</p>
		<p><a href="entry.php">トップページに戻る</a></p>
	</section>
</body>
</html>