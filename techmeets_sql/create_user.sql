drop database if exists techdb;
create database techdb;
grant all on techdb.* to techdb_user@localhost identified by '1071';
