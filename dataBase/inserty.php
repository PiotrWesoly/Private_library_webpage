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

$select = array("INSERT into zwierzaki( nazwa, wiek, ilosc_nog)
VALUES( 'pies', 10, 4);",

"INSERT into zwierzaki( nazwa, wiek, ilosc_nog)
VALUES( 'stonoga', 1, 100);",

"INSERT into zwierzaki( nazwa, wiek, ilosc_nog)
VALUES( 'kangur', 15, 2);",

"INSERT into zwierzaki(nazwa, wiek, ilosc_nog)
VALUES( 'wąż', 8, 0);");

for($i=0; $i<4;$i++)
{
	echo '<p>'.$select[$i].'</p>';
	$result = mysqli_query($baza, $select[$i])
			or die(mysqli_error($baza));
}


?>
</body>
</html>