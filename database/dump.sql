CREATE TABLE IF NOT EXISTS User
(
    id        INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username  VARCHAR(255) NOT NULL,
    password  VARCHAR(255) NOT NULL,
    email     VARCHAR(255) NOT NULL,
    access VARCHAR(10) NOT NULL
);

CREATE TABLE IF NOT EXISTS Post
(
    id      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    user_id  int NOT NULL,
    created_at timestamp NOT NULL,
    image VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Comment
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    post_id INT NOT NULL,
    response VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    created_at timestamp NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES Post(id) ON DELETE CASCADE
);