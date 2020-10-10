/** 検索操作 */
-- 全件検索：userテーブルからすべてのレコードを抽出する
-- select * from user;

-- フィールド指定検索：userテーブルからすべてのレコードのidフィールドとnameフィールドを抽出する
-- select id, name from user;

-- 条件検索-1：userテーブルからidが３以上のレコードを抽出する
-- select * from user where id >= 3;
-- select * from user where id > 2;

-- 条件検索-2：userテーブルからidが2以上で年齢が30未満のレコードを抽出する
-- select * from user where (id >= 2) and (age < 30);

-- 条件検索-3：【完全一致検索】userテーブルからnameが「佐々木大輔」のレコードを抽出する
-- select * from user where name = '佐々木大輔';

-- 条件検索-4：【後方一致検索】userテーブルからnameが「大輔」で終わるレコードのnameフィールドを抽出する⇒「大輔」さんを抽出
-- select * from user where name like '%大輔';

-- 並べ替え-1：【降順】userテーブルのレコードをidの大きい順に並べ換える
-- select * from user order by id desc;

-- 並べ替え-2：【昇順】userテーブルのレコードのうち年齢が奇数のレコードを年齢順に並べる
-- select * from user where age % 2 = 1 order by age;

/** 登録操作 */
-- 新規登録-1：「5, '天野慎一郎', 29」は追加できない
-- insert into user (id, name, age) values (5, '天野慎一郎', 29);

-- 新規登録-2：「6, '天野慎一郎', 29」を追加する
-- insert into user (id, name, age) values (6, '天野慎一郎', 29);
-- select * from user;

-- 新規登録-3：「10, '江戸川洪庵', 43, 'O', 'sample10@sample10.com'」を追加する
-- insert into user (id, name, age, blood, email) values (10, '江戸川洪庵', 43, 'O', 'sample10@sample10.com');
-- select * from user;

/** 更新操作 */
-- 項目編集-1：【選択更新】idが「5」のレコードの年齢を「44」に変更する
-- update user set age = 44 where id = 5;
-- select * from user;

-- 項目編集-2：【一括更新】年齢を1.5倍に変更する
-- update user set age = age * 1.5;
-- select * from user;

/** 削除操作 */
-- 削除-1：【選択削除】idが「10」のレコードを削除する
-- delete from user where id = 10;
-- select * from user;

-- 削除-2：【一括削除】レコードを削除する
-- delete from user;
-- select * from user;

/** 集合関数 */
-- 集合関数-1：【count関数】userテーブルのレコード件数を求める
select count(*) as 'count of records' from user;

-- 集合関数-2：【sum関数】userテーブルのレコードの年齢の合計を求める
select sum(age) as 'total of ages' from user;

-- 集合関数-3：【avg関数】userテーブルのレコードの平均年齢を求める
select avg(age) as 'average of ages' from user;

-- 集合関数-4：【min関数とmax関数】userテーブルの年齢の最小値と最大値を求める
select min(age) as 'minimum of age', max(age) as 'maximum of age' from user;

-- 集合関数-5：一度のSQLでまとめる
select count(id) as count, sum(age) as 'total', avg(age) as 'average', min(age) as min, max(age) as max from user;
