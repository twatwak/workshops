<?php
/**
 * Buildingクラス
 */
class Building {
    /**
     * プロパティ
     */
    protected $name;   // 建物名
    protected $height; // 高さ

    /**
     * コンストラクタ
     */
    function __construct(string $name, int $height) {
        $this->name = $name;
        $this->height = $height;
    }
    
    /**
     * 建物名を設定する。
     * @param arg 建物名
     */
    function setName(string $arg):void {
        $this->name = $arg;
    }

    /**
     * 建物名を取得する。
     * @return string 建物名
     */
    function getName():string {
        return $this->name;
    }

    /**
     * 建物の高さを設定する。
     * @paeram arg 建物の高さ
     */
    function setHeight(int $arg):void {
        $this->height = $arg;
    }
    
    /**
     * 建物の高さを取得する。
     * @return int 建物の高さ
     */
    function getHeight():int {
        return $this->height;
    }

    /**
     * 諸元を取得する。
     * @return string 諸元：「（建物名）の高さは（建物の高さ）mです。」という文字列を返す
     */
    function createSpec():string {
        $spec = "{$this->name}の高さは{$this->height}mです。";
        return $spec;
    }
}
