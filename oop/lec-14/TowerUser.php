<?php
// 外部ファイルの読み込み
require_once "./classes/Tower.php";
?>
<?php
// Towerクラスのインスタンス（東京スカイツリー）
$skytree = new Tower("東京スカイツリー", 634, 2012);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>クラスの継承</title>
</head>
<body>
	<h1>クラスの継承</h1>
	<P><?= $skytree->createSpec() ?></p>
</body>
</html>