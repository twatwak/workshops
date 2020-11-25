<?php
// 外部ファイルの読み込み
require_once "../ex-01/Person.php";
// Personクラスのインスタンス化
$person = new Person(1, "マリオ兄", 27, "B", "mario.bros@game.com");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>課題-2</title>
</head>
<body>
	<h1>課題-2</h1>
	<table border="1">
		<tr>
			<th>ID</th>
			<td><?= $person->getId() ?></td>
		</tr>
		<tr>
			<th>氏名</th>
			<td><?= $person->getName() ?></td>
		</tr>
		<tr>
			<th>年齢</th>
			<td><?= $person->getAge() ?>歳</td>
		</tr>
		<tr>
			<th>血液型</th>
			<td><?= $person->getBlood() ?>型</td>
		</tr>
		<tr>
			<th>電子メール</th>
			<td><?= $person->getEmail() ?></td>
		</tr>
	</table>
</body>
</html>