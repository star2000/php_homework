drop database if exists php_homework;
create database php_homework;

use php_homework;

create table user(
    id int unsigned auto_increment primary key,
    name varchar(20) unique not null,
    pwd char(40) not null
);

insert into user(name,pwd) values(
    '李星',sha1(1753304)
);
