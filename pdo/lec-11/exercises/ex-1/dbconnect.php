<?php
/**
 * データベース接続オブジェクトを取得する。
 * @return PDO
 */
function createDBConnection() {
	// データベース接続情報の設定
	$dsn = "mysql:host=localhost;dbname=sampledb;charset=utf8";
	$user = "sampledb_admin";
	$password = "admin123";
	// データベース接続オブジェクトを取得：データベースに接続する
	$pdo = new PDO($dsn, $user, $password);
	// 取得したデータベース接続オブジェクトを返却
	return $pdo;
}
?>
<?php
try {
	$pdo = createDBConnection();
	$sql = "select * from user";
	$pstmt =$pdo->prepare($sql);
	$pstmt->execute();
	echo "データベースに接続しました。";
	unset($pdo);
} catch (PDOException $e) {
	echo $e->getMessage();
}