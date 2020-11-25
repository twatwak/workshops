<?php
// 外部ファイルの読み込み
require_once "Building.php";
require_once "IIntelligence.php";
?>
<?php
class IntelligenceBuilding extends Building implements IIntelligence {
	/**
	 * @override
	 */
	function isAirConditioned():string {
		return "冷暖房完備しています。";
	}

	/**
	 * @override
	 */
	function isConnectedWiFi():string {
		return "WiFi常時接続できます。";
	}
}