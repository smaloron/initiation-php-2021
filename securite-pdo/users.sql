USE formation_php;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    user_login VARCHAR(50) NOT NULL,
    user_password VARCHAR(64) NOT NULL,
    avatar_image VARCHAR(64) NOT NULL DEFAULT 'default_avatar.jpg',
    PRIMARY KEY (id)
);