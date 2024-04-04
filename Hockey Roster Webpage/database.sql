-- RUN THIS SQL FILE TO SETUP THE DATABSE TO RUN THE WEBSITE

-- Code by Collin Shook

DROP DATABASE IF EXISTS wp_final;

CREATE DATABASE wp_final;

USE wp_final;

CREATE OR REPLACE TABLE tbl_player
(
    firstName       VARCHAR(255),
    lastName        VARCHAR(255),
    team            CHAR(3),
    position        VARCHAR(255),
    picture         LONGBLOB,
    imgtype         VARCHAR(255),
    imgsize         INT(12),
    points          INT(5),
    goals           INT(5),
    assists         INT(5),
    gaa             DECIMAL(5,2),
    save_percent    DECIMAL(3,2),
    shutouts        INT(5),
    player_id       INT(9) NOT NULL AUTO_INCREMENT PRIMARY KEY
);