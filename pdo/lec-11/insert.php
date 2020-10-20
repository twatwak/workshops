<?php
$dsn = "mysql:host=localhost;dbname=sampledb;charset=utf8";
$user = "sampledb_admin";
$password = "admin123";

try {
	$pdo = new PDO($dsn, $user, $password);
	$sql = "insert into user (name, age, blood) values ('山田五郎', 28, 'B')";
	$pstmt = $pdo->prepare($sql);
	$pstmt->execute();
	echo "新規レコードを追加しました。";
	unset($pstmt);
	unset($pdo);
} catch (PDOException $e) {
	echo $e->getMessage();
}