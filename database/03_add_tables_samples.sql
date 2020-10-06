/**
 * 【テーブルのフィールド追加とサンプルレコードの登録のためのスクリプト】
 * テーブルのフィールド追加のスクリプトはDDL（Data Definition language）
 * 
 * 〈本スクリプト実行の前提条件〉
 * 	sampledb_adminユーザでmysqlコマンドラインクライアントにログインしておくこと。
 *		    user：sampledb_admin
 *		password：admin123
 *
 * 		~public_html$workshop$database$ mysql sampledb -u sampledb_admin -p
 * 		Enter password: admin123
 *
 * 〈userテーブルにclub_idフィールドが追加されたことの確認〉
 * 		mysql> show fields from user;
 * 
 * 〈clubテーブルが作成されたことの確認〉
 * 		mysql> show tables;
 * 
 * 〈サンプルレコードが登録されたことの確認〉
 * 		mysql> selecthow * from user;
 * 		mysql> selecthow * from club;
 * 
 */
-- アクセスするデータベースを選択
use sampledb

-- userテーブルにclub_idフィールドを追加
alter table user drop if exists club_id ;
alter table user add club_id int default 1 after email;

drop table if exists club;
create table club (
	club_id int(2) not null unique auto_increment,
	club_name varchar(100),
	count tinyint(2),
	overview text,
	primary key (club_id)
) engine=InnoDB default charset=utf8;

-- clubテーブル
insert into club (club_name, count, overview) values ('球技愛好会', 4, '毎週日曜に市営体育館で球技をします。\nテニスやバスケットボールなど毎週球技は変更します。');
insert into club (club_name, count, overview) values ('ハイキング', 1, '月に1度、日曜日にハイキングをします。\n訪れる場所は開会仲間で相談しています。');
insert into club (club_name, count, overview) values ('ジャズ同好会', 2, '不定期で活動しています。\nそれぞれ楽器を持ち寄ってスタジオでセッションをします。');
insert into club (club_name, count, overview) values ('料理部', 4, '和食、中華、洋食など定番の料理を練習します。\nレンタルキッチンをみんなでレンタルします。');
-- userテーブル
insert into user (name, age, email, club_id) values ('磯田直子', 35, 'sample5@sample5.com', 4);
