<?php
$dsn = "mysql:host=localhost;dbname=sampledb;charset=utf8";
$user = "sampledb_admin";
$password = "admin123";

try {

  // ADD START
  isset($_GET["name"])? $name = $_GET["name"]: $name = "";
  // ADD END

  $pdo = new PDO($dsn, $user, $password);
  $sql = "select * from user where name like ?";
  $pstmt = $pdo->prepare($sql);
  
  $pstmt->bindValue(1, "%{$name}%");
  
  $pstmt->execute();
  $records = [];
  $records = $pstmt->fetchAll(PDO::FETCH_ASSOC);
  unset($pstmt);
  unset($pdo);
  /* DEL START
  foreach ($records as $record) {
    echo "{$record["id"]}:";
    echo "{$record["name"]}:";
    echo "{$record["age"]}:";
    echo "{$record["blood"]}:";
    echo "{$record["email"]}<br />";
  }
  echo "レコードが検索されました。";
  DEL END */
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <title>課題-2</title>
</head>
<body>
  <form action="select_by_name.php" method="get">
    <input type="text" name="name" />
    <input type="submit" value="検索" />
  </form>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>氏名</th>
      <th>年齢</th>
      <th>血液型</th>
      <th>電子メール</th>
    </tr>
    <?php foreach ($records as $record): ?>
    <tr>
      <td><?= $record["id"] ?></td>
      <td><?= $record["name"] ?></td>
      <td><?= $record["age"] ?></td>
      <td><?= $record["blood"] ?></td>
      <td><?= $record["email"] ?></td>
    </tr>
    <?php endforeach; ?>
  <table>
</body>
</html>