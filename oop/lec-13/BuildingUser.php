<?php
// 利用するクラスが定義されているファイルをロードする
require_once("./classes/Building.php");
?>
<?php
// クラスをインスタンス化する
$sunshine = new Building("サンシャイン６０", 240);
$cityBuilding = new Building("東京都庁", 239);
$marunouchi = new Building("丸ビル", 179);
// クラスを養素する配列を生成する
$buildings = [];
$buildings[] = new Building("NTTドコモタワービル", 239);
$buildings[] = new Building("六本木ヒルズ", 238);
$buildings[] = new Building("ペニンシュラ東京", 111);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <title>Buildingクラス - OOPDocument</title>
</head>
<body>
  <h1>Buildingクラスを使ってみる</h1>
  <p>個別にインスタンス化して諸元を表示する。</p>
  <ol>
    <li><?= $sunshine->createSpec() ?></li>
    <!-- サンシャイン６０の高さは240mです。 -->
    <li><?= $cityBuilding->createSpec() ?></li>
    <!-- 東京都庁の高さは239mです。-->
    <li><?= $marunouchi->createSpec() ?></li>
    <!-- 丸ビルの高さは179mです。-->
  </ol>
  <p>Buildingクラスの配列を作成して諸元を表示する。</p>
  <ol>
    <?php foreach ($buildings as $building): ?>
    <li><?= $building->createSpec() ?></li>
    <?php endforeach; ?>
    <!--
    <li>NTTドコモタワービルの高さは239mです。</li>
    <li>六本木ヒルズの高さは238mです。</li>
    <li>ペニンシュラ東京の高さは111mです。</li>
    -->
  </ol>
</body>
</html>
<!--
出典：東京都・超高層ビルデータベース・ランキング一覧（https://www.eonet.ne.jp/~building-pc/tokyo/to.htm）
-->
