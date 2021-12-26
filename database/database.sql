CREATE OR REPLACE TABLE users 
( id            INTEGER         NOT NULL    PRIMARY KEY AUTO_INCREMENT
, username      VARCHAR(50)     NOT NULL    UNIQUE
, password      VARCHAR(255)    NOT NULL
, created_at    DATETIME        DEFAULT     CURRENT_TIMESTAMP
);

CREATE OR REPLACE TABLE books
-- Stores book info
( id             INTEGER        PRIMARY KEY AUTO_INCREMENT
, title          VARCHAR(50)    NOT NULL
, author         VARCHAR(50)    NOT NULL
, no_of_pages    INTEGER        NOT NULL    
);

CREATE OR REPLACE TABLE status
-- This column stores common values that are used in various select lists.
-- The first three values are going to be
-- a - Read
-- b - Currently reading
-- c - Want to read
( id            INTEGER         PRIMARY KEY AUTO_INCREMENT
, status_value  VARCHAR(2000)   NOT NULL
);

CREATE OR REPLACE TABLE user_book
( user_id        INTEGER         NOT NULL   AUTO_INCREMENT
, book_id        INTEGER         NOT NULL
, status_id      INTEGER         NOT NULL
, FOREIGN KEY (user_id) REFERENCES users(id)
, FOREIGN KEY (book_id) REFERENCES books(id)
, FOREIGN KEY (status_id) REFERENCES status(id)
);

INSERT into book( book_id, title, author, no_of_pages)
VALUES(1, 'A Game of Thrones', 'George R. Martin', 450);

INSERT into status(id, status_value)
VALUES(1, "Read");

INSERT into status(id, status_value)
VALUES(2, "Currently reading");

INSERT into status(id, status_value)
VALUES(3, "Want to read");