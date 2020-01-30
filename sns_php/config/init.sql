create database dotinstall_sns_php;

grant all on gotinstall_sns_php.* to dbuser@localhost identified by '7110';

use dotinstall_sns_php

create table users(
  id int not null auto_increment primary key,
  email varchar(255),
  password varchar(255),
  created datetime,
  modified datetime
);

desc users;
