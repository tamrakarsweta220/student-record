-- database name
CREATE DATABASE php10am;

-- create table

CREATE TABLE tbl_users(
    id int unsigned AUTO_INCREMENT PRIMARY KEY,
    name varchar(100) not null,
    email varchar(100) UNIQUE not null,
    password varchar(100) not null,
    gender ENUM('male','female'),
    language SET ('nepali','chinese','english'),
    country varchar(100) not null,
    image varchar(100) not null,
    description text
    )