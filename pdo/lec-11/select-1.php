<?php
/**
 * List-2. userテーブルの全レコードを取得するプログラム
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
	echo "SQLが実行されました。";
	unset($pstmt);
	unset($pdo);
} catch (PDOException $e) {
	echo $e->getMessage();
}