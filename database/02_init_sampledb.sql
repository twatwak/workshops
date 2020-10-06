/**
 * 【テーブルの作成とサンプルレコードの登録のためのスクリプト】
 * テーブルの作成のスクリプトはDDL（Data Definition language）
 * レコードの登録のスクリプトはDML（Data Manupilate Language）
 * 
 * 〈本スクリプト実行の前提条件〉
 * 	sampledb_adminユーザでmysqlコマンドラインクライアントにログインしておくこと。
 *		    user：sampledb_admin
 *		password：admin123
 *
 * 		~public_html$workshop$database$ mysql sampledb -u sampledb_admin -p
 * 		Enter password: admin123
 *
 * 〈テーブルが作成されたことの確認〉
 * 		mysql> show tables;
 * 
 * 〈サンプルレコードが登録されたことの確認〉
 * 		mysql> selecthow * from user;
 * 
 */
-- アクセスするデータベースを選択
use sampledb

-- userテーブルの初期化（削除）
drop table if exists user;
-- userテーブルの作成
create table user (
	id int not null unique auto_increment,
	name varchar(10) not null,
	age tinyint unsigned,
	blood char(2),
	email varchar(100),
	primary key (id)
) engine=InnoDB default charset=utf8;

-- サンプルレコードの登録
insert into user (name, age, blood, email) values ('鈴木一郎', 37, 'A', 'sample1@sample1.com');
insert into user (id, name, age, blood, email) values (null, '佐藤花子', 32, 'AB', 'sample2@sample2.com');
insert into user (name, age, blood, email) values ('高橋健一', 48, 'B', 'sample3@sample3.com');
insert into user (id, name, blood, email, age) values (4, '佐々木大輔', 'O', 'sample4@sample4.com', 27);
insert into user values (5, '木原大輔', 41, 'AB', 'sample5@sample5.com');
-- insert into user values (5, '木原大輔', 41, 'AB', 'sample5@sample5.com');
-- insert into user values ('大山洋次郎', 38, 'B', 'sample6@sample6.com');

-- source add_tables_samples.sql
