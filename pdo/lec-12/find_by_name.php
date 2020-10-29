<?php 
$dsn = "mysql:host=localhost;dbname=sampledb;charset=utf8";
$user = "sampledb_admin";
$password = "admin123";

isset($_GET["name"]) ? $name = $_GET["name"] : $name = "";

try {
	$pdo = new PDO($dsn, $user, $password);
	$sql = "select * from user where name like ?";
	$pstmt = $pdo->prepare($sql);
	$pstmt->bindValue(1, "%$name%");
	$pstmt->execute();
	$records = [];
	$records = $pstmt->fetchAll(PDO::FETCH_ASSOC);
	unset($pstmt);
	unset($pdo);
} catch (PDOException $e) { 
	echo $e->getMessage();
} 
?>
<html>
	<head>
		<title>動的SQLを実行するプログラム</title>
		<style>
			.entry, .result {margin: 1.25rem;} 
		</style>
	</head>
	<body>
		<h1>動的SQLを実行するプログラム</h1>
		<div class="entry">
			<form action="find_by_name.php" method="get">
				<label for="id_name">検索する名前 
				<input typr="text" id="id_name" name="name" />
				</label>
				<input type="submit" value="検索" />
			</form>
		</div>
		<?php if(count($records) >0): ?>
		<div class="result">
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
				<?php endforeach;?>
			</table>
		</div>
		<?php endif;?>
	</body>
</html>
