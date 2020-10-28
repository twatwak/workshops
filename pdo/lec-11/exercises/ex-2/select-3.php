<?php
/**
 * データベース接続オブジェクトを取得する。
 * @return PDO
 */
function createDBConnection():PDO {
	// データベース接続情報の設定
	$dsn = "mysql:host=localhost;dbname=sampledb;charset=utf8";
	$user = "sampledb_admin";
	$password = "admin123";
	// データベース接続オブジェクトを取得：データベースに接続する
	$pdo = new PDO($dsn, $user, $password);
	// 取得したデータベース接続オブジェクトを返却
	return $pdo;
}

/**
 * 検索結果を格納した配列の全要素を表示する。
 * @param array 検索結果を格納した配列：1レコードの各フィールドをキーとした連想配列を要素とする
 */
function showRecords(array $records):void {
	foreach ($records as $record) {
		echo "{$record["id"]}:";
		echo "{$record["name"]}:";
		echo "{$record["age"]}:";
		echo "{$record["blood"]}:";
		echo "{$record["email"]}<br />";
	}
}
?>
<?php
try {
	$pdo = createDBConnection();
	$sql = "select * from user";
	$pstmt =$pdo->prepare($sql);
	$pstmt->execute();
	$records = [];
	$records = $pstmt->fetchAll(PDO::FETCH_ASSOC);
	unset($pstmt);
	unset($pdo);
	// shoowRecords関数を呼び出して検索結果の全要素を表示する
	showRecords($records);
	echo "すべてのレコードを取得しました。";
} catch (PDOException $e) {
	echo $e->getMessage();
}