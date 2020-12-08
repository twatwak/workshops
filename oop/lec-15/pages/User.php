<?php
/**
 * ユーザークラス：userテーブルの1レコードを管理するクラス
 */
class User {

	/**
	 * プロパティ
	 */
	private $id;
	private $name;
	private $age;
	private $blood;
	private $email;

	/**
	 * コンストラクタ
	 * @param int ユーザID
	 * @param string ユーザ名
	 * @param int 年齢
	 * @param string 血液型
	 * @param string 電子メール
	 */
	function __construct(int $id, string $name, int $age, string $blood, string $email) {
		$this->id = $id;
		$this->name = $name;
		$this->age = $age;
		$this->blood = $blood;
		$this->email = $email;
	}

	/** アクセサメソッド群 */

	function setId(int $id):void {
		$this->id = $id;
	}

	function getId():int {
		return $this->id;
	}

	function setName(string $name):void {
		$this->name = $name;
	}

	function getName():string {
		return $this->name;
	}

	function setAge(int $age):void {
		$this->age = $age;
	}

	function getAge():int {
		return $this->age;
	}

	function setBlood(string $blood):void {
		$this->blood = $blood;
	}

	function getBlood():string {
		return $this->blood;
	}

	function setEmail(string $email):void {
		$this->email = $email;
	}

	function getEmail():string {
		return $this->email;
	}

}