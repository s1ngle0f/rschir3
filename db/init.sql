CREATE DATABASE IF NOT EXISTS app_db;

CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON app_db.* TO 'user'@'%';
FLUSH PRIVILEGES;
USE app_db;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS catalogue;

CREATE TABLE IF NOT EXISTS users
(
    ID       INT(11) NOT NULL AUTO_INCREMENT,
    name     VARCHAR(20) CHARACTER SET ascii NOT NULL,
    password VARCHAR(45) CHARACTER SET ascii NOT NULL,
    PRIMARY KEY (ID)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS catalogue
(
    ID          INT(10) NOT NULL AUTO_INCREMENT,
    name        VARCHAR(32)  NOT NULL,
    description VARCHAR(256) NOT NULL,
    price       INT(6) NOT NULL,
    PRIMARY KEY (ID)
);

INSERT INTO users (name, password)
VALUES ('admin', '{SHA}0DPiKuNIrrVmD8IUCuw1hQxNqZc=');


INSERT INTO catalogue (name, description, price)
VALUES ('Dvigatel', 'Ochen bystryj dvizhok', 100000);

INSERT INTO catalogue (name, description, price)
VALUES ('Cep GRM', 'Dvizhok bez etogo ne poedet', 30000);

INSERT INTO catalogue (name, description, price)
VALUES ('Shiny', 'Nu eto voobshche baza kak by', 15000);