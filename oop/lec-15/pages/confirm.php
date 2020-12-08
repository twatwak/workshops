<?php
// 外部ファイルの読み込み
require_once "db.php";
require_once "User.php";
?>
<?php
/* 1. リクエストパラメータから処理種別キー（actionキー）を取得 */
$action = $_REQUEST["action"];
$user = null;
$title = "";

/* 2. 処理の分岐 */
if ($action === "signup") {
	/* 2-1-1. 登録処理における［登録］ボタンがクリックされて遷移した場合の処理：リクエストパラメータを表示する */
	isset($_POST["id"])? $id = $_POST["id"]: $id = 0;
	isset($_POST["name"])? $name = $_POST["name"]: $name = "";
	isset($_POST["age"])? $age = $_POST["age"]: $age = 0;
	isset($_POST["blood"])? $blood = $_POST["blood"]: $blood = "";
	isset($_POST["email"])? $email = $_POST["email"]: $email = "";
	// 2-1-2. 新規追加するユーザをインスタンス化
	$user = new User($id, $name, $age, $blood, $email);
	$title = "登録";
} else if ($action === "update") {
	/* 2-2-1. 更新処理における［更新］ボタンがクリックされて遷移した場合の処理：リクエストパラメータを表示する */
	isset($_POST["id"])? $id = $_POST["id"]: $id = 0;
	isset($_POST["name"])? $name = $_POST["name"]: $name = "";
	isset($_POST["age"])? $age = $_POST["age"]: $age = 0;
	isset($_POST["blood"])? $blood = $_POST["blood"]: $blood = "";
	isset($_POST["email"])? $email = $_POST["email"]: $email = "";
	// 2-1-2. 新規追加するユーザをインスタンス化
	$user = new User($id, $name, $age, $blood, $email);
	$title = "更新";
} else if ($action === "delete") {
	/* 2-3. ［削除］ボタンがクリックされて遷移した場合 */
	try {
		// 2-3-1. リクエストパラメータを取得
		isset($_GET["id"])? $id = $_GET["id"]: $id = 0;
		// 2-3-2. データベース接続オブジェクトのインスタンス化
		$pdo = connectDB();
		// 2-3-3. 実行するSQLの設定
		$sql = "select * from user where id = ?";
		// 2-3-4. SQL実行オブジェクトを取得
		$pstmt = $pdo->prepare($sql);
		// 2-3-5. プレースホルダにパラメータを設定
		$pstmt->bindValue(1, $id);
		// 2-3-6. SQLを実行
		$pstmt->execute();
		// 2-3-7. 実行結果を取得
		$records = $pstmt->fetchALL(PDO::FETCH_ASSOC);
		// 2-3-8. 実行結果からUserクラスをインスタンス化
		$user = null;
		if (count($records) > 0) {
			$name = $records[0]["name"];
			$age = $records[0]["age"];
			$blood = $records[0]["blood"];
			$email = $records[0]["email"];
			$user = new User($id, $name, $age, $blood, $email);
		}
	} catch (PDOException $e) {
		// 2-3-9. メッセージを表示して強制終了
		echo $e->getMessage();
		die;
	} finally {
		// 2-3-10. データベース関連オブジェクトの解放
		unset($pstmt);
		unset($pdo);
	}
	$title = "削除";
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>確認画面 - データベースとクラス</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<h1>データベースとクラス</h1>
	<section id="confirm">
		<h2><?= $title ?>メンバーの確認</h2>
		<form name="member_confirm">
		<table>
			<?php if ($action !== "signup"): ?>
			<tr>
				<th>ID</th>
				<td><?= $user->getId() ?></td>
			</tr>
			<?php endif; ?>
			<tr>
				<th>氏名</th>
				<td><?= $user->getName() ?></td>
			</tr>
			<tr>
				<th>年齢</th>
				<td><?= $user->getAGe() ?> 歳</td>
			</tr>
			<tr>
				<th>血液型</th>
				<td><?= $user->getBlood() ?> 型</td>
			</tr>
			<tr>
				<th>電子メール</th>
				<td><?= $user->getEmail() ?></td>
			</tr>
			<tr>
				<td colspan="2">
					<?php if ($action === "signup" or $action === "update"):  ?>
					<!-- 次の画面で利用するためhidden要素として非表示にする -->
					<input type="hidden" name="id" value="<?= $user->getId() ?>" />
					<input type="hidden" name="name" value="<?= $user->getName() ?>" />
					<input type="hidden" name="age" value="<?= $user->getAge() ?>" />
					<input type="hidden" name="blood" value="<?= $user->getBlood() ?>" />
					<input type="hidden" name="email" value="<?= $user->getEmail() ?>" />
					<?php elseif ($action === "delete"): ?>
					<!-- 次の画面で利用するため主キーだけをhidden要素として非表示にする -->
					<input type="hidden" name="id" value="<?= $user->getId() ?>" />
					<?php endif; ?>
					<button formaction="complete.php" formmethod="post" name="action" value="<?= $action ?>"><?= $title ?></button>
				</td>
			</tr>
		</table>
		</form>
	</section>
</body>
</html>