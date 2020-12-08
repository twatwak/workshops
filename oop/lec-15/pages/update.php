<?php
require_once "db.php";
require_once "User.php";
?>
<?php
/* 1. リクエストパラメータを取得 */
isset($_GET["id"])? $id = $_GET["id"]: $id = 0;
/* 2. 指定されたユーザをデータベースから取得 */
try {
	// 2-1. データベース接続オブジェクトのインスタンス化
	$pdo = connectDB();
	// 2-2. 実行するSQLの設定
	$sql = "select * from user where id = ?";
	// 2-3. SQL実行オブジェクトを取得
	$pstmt = $pdo->prepare($sql);
	// 2-4. プレースホルダにパラメータを設定
	$pstmt->bindValue(1, $id);
	// 2-5. SQLを実行
	$pstmt->execute();
	// 2.6. 実行結果の配列を取得
	$records = $pstmt->fetchAll(PDO::FETCH_ASSOC);
	// 2-7. 実行結果からUserクラスのインスタンスを取得
	$user = null;
	if (count($records) > 0) {
		$name = $records[0]["name"];
		$age = $records[0]["age"];
		$blood = $records[0]["blood"];
		$email = $records[0]["email"];
		$user = new User($id, $name, $age, $blood, $email);
	}
} catch (PDOException $e) {
	// 2-8. メッセージを表示して強制終了
	echo $e->getMessage();
	die;
} finally {
	// 2-9. データベース関連オブジェクトの解放
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
		<?php if (!is_null($user)): ?>
		<form name="member_entry">
			<table>
				<tr>
					<th>ID</th>
					<td>
						<input type="hidden" name="id" value="<?= $user->getId() ?>" />
						<?= $user->getId() ?>
					</td>
				</tr>
				<tr>
					<th>氏名</th>
					<td><input type="text" name="name" value="<?= $user->getName() ?>" /></td>
				</tr>
				<tr>
					<th>年齢</th>
					<td><input type="text" name="age" value="<?= $user->getAge() ?>" /></td>
				</tr>
				<tr>
					<th>血液型</th>
					<td>
						<select name="blood">
							<option id="id_a" value="A" <?php if ($user->getBlood() === "A") echo "selected"; ?>><label for="id_a">A型</label></option>
							<option id="id_b" value="B" <?php if ($user->getBlood() === "B") echo "selected"; ?>><label for="id_b">B型</label></option>
							<option id="id_o" value="O" <?php if ($user->getBlood() === "O") echo "selected"; ?>><label for="id_o">O型</label></option>
							<option id="id_ab" value="AB" <?php if ($user->getBlood() === "AB") echo "selected"; ?>><label for="id_ab">AB型</label></option>
						</select>
					</td>
				</tr>
				<tr>
					<th>電子メール</th>
					<td><input type="text" name="email" value="<?= $user->getEmail() ?>" /></td>
				</tr>
				<tr>
					<td colspan="2">
						<button formaction="confirm.php" formmethod="post" name="action" value="update">更新</button>
						<button type="reset">リセット</button>
					</td>
				</tr>
			</table>
		</form>
		<?php endif; ?>
	</section>
	</div>
</body>
</html>