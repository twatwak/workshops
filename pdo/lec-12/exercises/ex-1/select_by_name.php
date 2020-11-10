<?php
$dsn = "mysql:host=localhost;dbname=sampledb;charset=utf8";
$user = "sampledb_admin";
$password = "admin123";

try {
    $pdo = new PDO($dsn, $user, $password);
    // MOD START
    // BEFORE
    // $sql = "select * from user where name = '佐藤花子'";
    // AFTER
    $sql = "select * from user where name like ?";
    // MOD END
    $pstmt = $pdo->prepare($sql);
    
    // ADD START
    $pstmt->bindValue(1, "%{$name}%");
    // ADD END
		
    $pstmt->execute();
    $records = [];
    $records = $pstmt->fetchAll(PDO::FETCH_ASSOC);
    unset($pstmt);
		unset($pdo);
		
    foreach ($records as $record) {
      echo "{$record["id"]}:";
      echo "{$record["name"]}:";
      echo "{$record["age"]}:";
      echo "{$record["blood"]}:";
      echo "{$record["email"]}<br />";
    }
    echo "レコードが検索されました。";
} catch (PDOException $e) {
    echo $e->getMessage();
}
