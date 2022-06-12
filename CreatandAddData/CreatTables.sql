drop database if exists ll;
create database if not exists ll;
use ll;

#
# create table bags(
#     b_id integer not null,
#     designer varchar(25) not null,
#     color varchar(15) not null,
#     manufacturer varchar(25) not null,
#     price float not null,
#     primary key(b_id)
# );

create table bags(
    包包编号 integer not null,
    设计师 varchar(25) not null,
    颜色 varchar(15) not null,
    品牌 varchar(25) not null,
    价格（天） float not null,
    状态 boolean not null,
    primary key(包包编号)
);


create table customers(
  顾客编号 varchar(10) not null,
  password varchar(15) not null,
  lastName varchar(25) not null,
  firstName varchar(25) not null,
  address varchar(25) not null,
  TelePhone varchar(20) not null,
  cellPhone varchar(20) not null,
  email varchar(25) not null,
  card varchar(15) not null,
  primary key(顾客编号)
);

create table logs
(
    订单编号 integer     not null,
    顾客编号 varchar(10) not null,
    包包编号 integer     not null,
    租出日期 datetime    not null,
    归还日期 datetime,
    保险状态 boolean not null,
    primary key (订单编号),
    foreign key (顾客编号) references customers (顾客编号),
    foreign key (包包编号) references bags (包包编号)
);