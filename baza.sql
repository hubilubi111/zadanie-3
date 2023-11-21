CREATE DATABASE IF NOT EXISTS baza;

USE baza;

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) UNIQUE,
    password VARCHAR(255)
);
INSERT INTO users (username, password) VALUES
    ('admin', 'test'),
    ('maciek', 'haslo123'),
    ('marcin12', 'trudnehaslo8888811111fsd!@');