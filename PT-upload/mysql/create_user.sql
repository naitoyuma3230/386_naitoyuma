drop database if exists pt_upload_db;
create database pt_upload_db;
grant all on pt_upload_db.* to pt_user@localhost identified by '1071';
