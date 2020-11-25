<?php
// 外部ファイルの読み込み
require_once "./classes/IntelligenceBuilding.php";
?>
<?php
// IntelligenceBuildingクラスのインスタンス（渋谷スクランブルスクエア）
$scrambleSquare = new IntelligenceBuilding("渋谷スクランブルスクエア", 239);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>インタフェース</title>
</head>
<body>
	<h1>インタフェース</h1>
	<table border="1">
		<tr>
			<th>インテリジェントビル名</th>
			<td><?= $scrambleSquare->getName() ?></td>
		</tr>
		<tr>
			<th>高さ</th>
			<td><?= $scrambleSquare->getHeight() ?></td>
		</tr>
		<tr>
			<th>ビルの機能</th>
			<td>
				<?= $scrambleSquare->isAirConditioned() ?><br />
				<?= $scrambleSquare->isConnectedWiFi() ?>
			</td>
		</tr>
	</table>
</body>
</html>