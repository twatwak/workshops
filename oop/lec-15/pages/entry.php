<?php
// 外部ファイルの読み込み
require_once "db.php";
require_once "User.php";
?>
<?php
/* 1. userテーブルのレコードを全件取得する */
$users = [];   // userテーブルの全県検索結果を格納する配列
$pdo= null;
$pstmt = null; // SQL実行オブジェクトの初期化
try {
	// 1-1. データベース接続オブジェクトをインスタンス化
	$pdo = connectDB();
	// 1-2. 実行するSQLを設定
	$sql = "select * from user";
	// 1-3. SQL実行オブジェクトを取得
	$pstmt = $pdo->prepare($sql);
	// 1-4. SQLを実行
	$pstmt->execute();
	// 1-5. SQLの実行結果を取得
	$records = $pstmt->fetchAll(PDO::FETCH_ASSOC);
	// 1-6. 実行結果をUserクラスのインスタンスを要素とする配列に入れ替え
	$user = null;
	foreach ($records as $record) {
		$id = $record["id"];
		$name = $record["name"];
		$age = $record["age"];
		$blood = $record["blood"];
		$email = $record["email"];
		// Userクラスをインスタンス化
		$user = new User($id, $name, $age, $blood,$email);
		// 配列に格納
		$users[] = $user;
	}
} catch (PDOException $e) {
	// 1-7. エラーメッセージを表示して強制終了
	echo $e->getMessage();
	die;
} finally {
	// 1-8. データベース関連オブジェクトの解放
	unset($pstmt);
	unset($pdo);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>データベースとクラス</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<h1>データベースとクラス</h1>
	<div id="wrapper">
	<section id="entry">
		<h2>新規ユーザの登録</h2>
		<form name="member_entry">
		<table>
			<tr>
				<th>氏名</th>
				<td><input type="text" name="name" /></td>
			</tr>
			<tr>
				<th>年齢</th>
				<td><input type="text" name="age" /></td>
			</tr>
			<tr>
				<th>血液型</th>
				<td>
					<label for="id_a"><input type="radio" id="id_a" name="blood" value="A">A型</label>
					<label for="id_b"><input type="radio" id="id_b" name="blood" value="B">B型</label>
					<label for="id_o"><input type="radio" id="id_o" name="blood" value="O">O型</label>
					<label for="id_ab"><input type="radio" id="id_ab" name="blood" value="AB">AB型</label>
				</td>
			</tr>
			<tr>
				<th>電子メール</th>
				<td><input type="text" name="email" /></td>
			</tr>
			<tr>
				<td colspan="2">
					<button formaction="confirm.php" formmethod="post" name="action" value="signup">登録</button>
					<button type="reset">リセット</button>
				</td>
			</tr>
		</table>
		</form>
	</section>
	<section id="list">
		<h2>ユーザ一覧</h2>
		<table>
			<tr>
				<th>ID</th>
				<th>氏名</th>
				<th>年齢</th>
				<th>血液型</th>
				<th>電子メール</th>
				<th></th>
			</tr>
			<?php foreach ($users as $user): ?>
			<tr>
				<td><?= $user->getId() ?></td>
				<td><?= $user->getName() ?></td>
				<td><?= $user->getAge() ?> 歳</td>
				<td><?= $user->getBlood() ?> 型</td>
				<td><?= $user->getEmail() ?></td>
				<td>
					<form name="buttons">
						<input type="hidden" name="id" value="<?= $user->getId() ?>" />
						<button formaction="update.php" formmethod="get" name="action" value="update">修正</button>
						<button formaction="confirm.php" formmethod="get" name="action" value="delete">削除</button>
					</form>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</section>
	</div>
</body>
</html>