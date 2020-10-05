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
insert into user (name, age, blood, email) values ("佐藤次郎", 67, "A", "sample3@ssample3.com");
insert into user (id, name, age, blood, email) values (null, "山本京子", 38, 'AB', "sample4@ssample4.com");
insert into user (name, age, blood, email) values ("佐々木四郎", 28, 'B', "sasaki@sasaki.com");	-- エラーとなる
-- insert into user values ("佐々木四郎", 28, 'B', "sasaki@sasaki.com");	-- エラーとなる
insert into user (id, name, blood, email, age) values (11, "山田宏一", "O", "yamada@koichi.com", 47);

source add_tables_samples.sql
