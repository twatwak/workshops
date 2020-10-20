<?php
/**
 * List-3.  userテーブルの全レコードを取得して表示するプログラムデータベースに接続するプログラム
 */
?>
<?php
$dsn = "mysql:host=localhost;dbname=sampledb;charset=utf8";
$user = "sampledb_admin";
$password = "admin123";

try {
	$pdo = new PDO($dsn, $user, $password);
	$sql = "select * from user";
	$pstmt =$pdo->prepare($sql);
	$pstmt->execute();
	while ($record = $pstmt->fetch(PDO::FETCH_ASSOC)) {
		echo "{$record["id"]}:";
		echo "{$record["name"]}:";
		echo "{$record["age"]}:";
		echo "{$record["blood"]}:";
		echo "{$record["email"]}<br />";
	}
	echo "全レコードを取得しました。";
	unset($pstmt);
	unset($pdo);
} catch (PDOException $e) {
	echo $e->getMessage();
}