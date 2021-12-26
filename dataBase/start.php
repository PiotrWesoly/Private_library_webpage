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

// $select = 'CREATE OR REPLACE TABLE users 
// ( id            INTEGER         NOT NULL    PRIMARY KEY AUTO_INCREMENT
// , username      VARCHAR(50)     NOT NULL    UNIQUE
// , password      VARCHAR(255)    NOT NULL
// , created_at    DATETIME        DEFAULT     CURRENT_TIMESTAMP
// );';

// $select = 'CREATE OR REPLACE TABLE books
// -- Stores book info
// ( id             INTEGER        PRIMARY KEY AUTO_INCREMENT
// , title          VARCHAR(50)    NOT NULL
// , author         VARCHAR(50)    NOT NULL
// , no_of_pages    INTEGER        NOT NULL    
// );';

// $select = 'CREATE OR REPLACE TABLE status
// -- This column stores common values that are used in various select lists.
// -- The first three values are going to be
// -- a - Read
// -- b - Currently reading
// -- c - Want to read
// ( id            INTEGER         PRIMARY KEY AUTO_INCREMENT
// , status_value  VARCHAR(2000)   NOT NULL
// );';

$select = 'CREATE OR REPLACE TABLE user_book
( user_id        INTEGER         NOT NULL
, book_id        INTEGER         NOT NULL
, status_id      INTEGER         NOT NULL
, FOREIGN KEY (user_id) REFERENCES users(id)
, FOREIGN KEY (book_id) REFERENCES books(id)
, FOREIGN KEY (status_id) REFERENCES status(id)
);
';

// $select = 'delete from user_books where user_id=1';

echo $select;
$result = mysqli_query($baza, $select)
			or die(mysqli_error($baza));

?>
</body>
</html>