/**
 * 【データベース生成スクリプト】
 * 初期化のスクリプトはDDL（Data Definition language）
 * ユーザの生成スクリプトはDCL（Data Control Language）
 * ユーザの生成スクリプトはDCL（Data Control Language）
 *
 * 【データベース接続情報】
 * 		データベースURL：mysql:host=localhost;dbname=sampledb;
 *		データベース接続ユーザ：sampledb_admin
 *		データベース接続パスワード：admin123
 *
 * 〈データベースsampledbが生成されたことの確認〉
 * 		mysql> show databases;
 * 
 */
-- データベースおよびそのユーザの初期化（削除）
drop database if exists sampledb;
drop user if exists sampledb_admin;

-- データベースおよびそのユーザの作成
create database sampledb character set utf8;
grant all privileges on sampledb.* to 'sampledb_admin'@'localhost' identified by 'admin123';
