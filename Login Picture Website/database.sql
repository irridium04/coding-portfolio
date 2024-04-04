DROP DATABASE IF EXISTS wp_login;

-- CREATE DATABASE
CREATE DATABASE IF NOT EXISTS wp_login;

-- Use Database
USE wp_login;

CREATE TABLE tbl_user(
	firstname VARCHAR(255),
	lastname VARCHAR(255),
	username VARCHAR(255) UNIQUE NOT NULL,
	pwd VARCHAR(255) NOT NULL,
	user_id int(9) AUTO_INCREMENT NOT NULL PRIMARY KEY
);

CREATE OR REPLACE TABLE tbl_img(
    imgname VARCHAR(255),
    imgdesc TEXT,
    img LONGBLOB,
    imgtype VARCHAR(255),
    imgsize INT(12),
    user_id int(9),
    img_id int(9) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CONSTRAINT imguser_fk FOREIGN KEY(user_id)
        REFERENCES tbl_user(user_id)
    ON DELETE CASCADE

);
