<?php
$dsn = "mysql:host=localhost;dbname=sampledb;charset=utf8";
$user = "sampledb_admin";
$password = "admin123";

try {
	$pdo = new PDO($dsn, $user, $password);
	$sql = "select * from user";
	$pstmt =$pdo->prepare($sql);
	$pstmt->execute();
	$records = [];
	$recoreds = $pstmt->fetchAll(PDO::FETCH_ASSOC);
	unset($pstmt);
	unset($pdo);
	foreach ($records as $record) {
		echo "{$record["id"]}:";
		echo "{$record["name"]}:";
		echo "{$record["age"]}:";
		echo "{$record["blood"]}:";
		echo "{$record["email"]}<br />";
	}
	echo "すべてのレコードを取得しました。";
} catch (PDOException $e) {
	echo $e->getMessage();
}