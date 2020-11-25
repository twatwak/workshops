<?php
// 外部ファイルの読み込み
require_once "Building.php";
?>
<?php
class Tower extends Building {
	
	/** クラスプロパティ */
	private $builtAt;

	/**
	 * コンストラクタ
	 * @param string タワー名
	 * @param int    高さ
	 * @param int    完成年
	 */
	function __construct(string $name, int $height, int $builtAt) {
		parent::__construct($name, $height);
		$this->builtAt = $builtAt;
	}

	/** アクセサメソッド */
	function setBuiltAt(int $builtAt):void {
		$this->builtAt = $builtAt;
	}

	function getBuiltAt():int {
		return $this->builtAt;
	}

	/**
	 * 諸元文字列を取得する。
	 * @return string 諸元文字列：書式は「《タワー名》の高さは《高さ》mです。《完成年》年に完成しました。」
	 */
	function createSpec():string {
		$spec = parent::createSpec();
		$spec .= "{$this->builtAt}年に完成しました。";
		return $spec;
	}

}