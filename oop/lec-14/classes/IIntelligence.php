<?php
/**
 * IIntelligenceインタフェース
 */
interface IIntelligence {
	/**
	 * 空調完備：抽象メソッド
	 */
	function isAirConditioned():string;

	/**
	 * WiFi常時接続：抽象メソッド
	 */
	function isConnectedWiFi():string;
}