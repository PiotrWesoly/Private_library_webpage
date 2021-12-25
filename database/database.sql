CREATE TABLE users 
( user_id       INTEGER         NOT NULL    PRIMARY KEY AUTO_INCREMENT
, username      VARCHAR(50)     NOT NULL    UNIQUE
, password      VARCHAR(255)    NOT NULL
, created_at    DATETIME        DEFAULT     CURRENT_TIMESTAMP
);

CREATE TABLE books
-- Stores book info
( book_id        INTEGER        PRIMARY KEY
, title          VARCHAR(50)    NOT NULL
, author         VARCHAR(50)    NOT NULL
, publisher      VARCHAR(50)    NOT NULL
, published_dt   DATE
);

CREATE TABLE common_lookup
-- This column stores common values that are used in various select lists.
-- The first three values are going to be
-- a - Read
-- b - Currently reading
-- c - Want to read
( element_id    INTEGER         PRIMARY KEY
, element_value VARCHAR(2000)   NOT NULL
);

CREATE TABLE user_books
( user_id        INTEGER         NOT NULL
, book_id        INTEGER         NOT NULL
, status_id      INTEGER         NOT NULL
, FOREIGN KEY (user_id) REFERENCES user(user_id)
, FOREIGN KEY (book_id) REFERENCES books(book_id)
, FOREIGN KEY (status_id) REFERENCES common_lookup(element_id)
);