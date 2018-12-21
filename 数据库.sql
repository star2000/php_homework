drop database if exists php_homework;
create database php_homework;

use php_homework;

create table user(
    id int unsigned auto_increment primary key,
    name varchar(20) unique not null,
    pwd char(40) not null
);

-- 创建数据库管理员
-- create user 'xing'@'localhost' identified by 'xing';
-- grant all on php_homework.* to 'xing'@'localhost';