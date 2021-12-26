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

require('config.php');

$baza = mysqli_connect($hostname, $username, $password, $db);

// $select = "INSERT into book( book_id, title, author, publisher, published_dt)
// VALUES(1, 'A Game of Thrones', 'George R. Martin', 'Bantam', 196-08-01);";

$select = array("INSERT into user_book(user_id, book_id, status_id)
			VALUES(1, 1, 2)");

// $select = array(
// 	"INSERT into books(id, title, author, no_of_pages)
// 	VALUES(1, 'A Game of Thrones', 'George R. Martin', 450);"
// 	,
// 	"INSERT into status(id, status_value)
// 	VALUES(1, 'Read');"
// 	,
// 	"INSERT into status(id, status_value)
// 	VALUES(2, 'Currently reading');"
// 	,
// 	"INSERT into status(id, status_value)
// 	VALUES(3, 'Want to read');"
// 			);

// $select = array("TRUNCATE TABLE users;");

for($i=0; $i<1;$i++)
{
	echo '<p>'.$select[$i].'</p>';
	$result = mysqli_query($baza, $select[$i])
			or die(mysqli_error($baza));
}


?>
</body>
</html>