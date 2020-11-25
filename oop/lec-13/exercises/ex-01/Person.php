<?php
/**
 * Personクラス
 */
class Person {
	/**
	 * クラスプロパティ
	 */
	private $id;    // ID
	private $name;  // 氏名
	private $age;   // 年齢
	private $blood; // 血液型
	private $email; // 電子メール

	/**
	 * コンストラクタ
	 */
	function __construct(int $id, string $name, int $age, string $blood, string $email) {
		$this->id = $id;
		$this->name = $name;
		$this->age = $age;
		$this->blood = $blood;
		$this->email = $email;
	}

	/** アクセサメソッド */

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