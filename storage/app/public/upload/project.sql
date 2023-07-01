create database FANoFAN;
use FANoFAN;
create table user(
id int primary key auto_increment,
username varchar(50),
email varchar(100),
phone numeric,
password varchar(30),
user_type char(5)
);
select * from user;
create table category(
id int primary key auto_increment,
name varchar(50)
);
create table photo(
id int primary key auto_increment,
value varchar(50),
status bit
);
create table product(
id int primary key auto_increment,
name varchar(100),
id_category int,
id_photo int,
foreign key(id_category) references category(id),
foreign key(id_photo) references photo(id)
);
create table feedback(
id int primary key auto_increment, 
id_user int,
id_product int,
content text,

foreign key(id_user) references user(id),
foreign key(id_product) references product(id)
);
select*from user;
insert into user(username,Email,Password,user_type) values('Phong','admin@gmail.com','123456','adm');
