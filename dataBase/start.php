<!DOCTYPE html>
<html>
<head>
	<title>
		Piotr Wesoly - stud22
	</title>
	<meta charset="UTF-8"/>
	<?php
	ini_set('display_errors', 1);
	ini_set('display_strtup_errors', 1);
	error_reporting(E_ALL);
	?>
</head>
<body>
<?php

require('../config.php');

$baza = mysqli_connect($hostname, $username, $password, $db);


// $select = 'CREATE TABLE users (
//     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     username VARCHAR(50) NOT NULL UNIQUE,
//     password VARCHAR(255) NOT NULL,
//     created_at DATETIME DEFAULT CURRENT_TIMESTAMP
// );';

// $select = '
// CREATE OR REPLACE TABLE users 
// ( user_id            INTEGER         NOT NULL    PRIMARY KEY AUTO_INCREMENT
// , username      VARCHAR(50)     NOT NULL    UNIQUE
// , password      VARCHAR(255)    NOT NULL
// , created_at    DATETIME        DEFAULT     CURRENT_TIMESTAMP
// );';
// $select = '
// CREATE TABLE book
// ( book_id        INTEGER        PRIMARY KEY
// , title          VARCHAR(50)    NOT NULL
// , author         VARCHAR(50)    NOT NULL
// , publisher      VARCHAR(50)    NOT NULL
// , published_dt   DATE
// );';

// $select = '
// CREATE TABLE common_lookup
// ( element_id    INTEGER         PRIMARY KEY
// , element_value VARCHAR(2000)   NOT NULL
// );';

// $select = '
// CREATE TABLE user_books
// ( user_id        INTEGER         NOT NULL
// , book_id        INTEGER         NOT NULL
// , status_id      INTEGER         NOT NULL
// , FOREIGN KEY (user_id) REFERENCES users(user_id)
// , FOREIGN KEY (book_id) REFERENCES book(book_id)
// , FOREIGN KEY (status_id) REFERENCES common_lookup(element_id)
// );
// ';

$result = mysqli_query($baza, $select)
			or die(mysqli_error($baza));

?>
</body>
</html>