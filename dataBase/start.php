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

$select = 'alter table zwierzaki add constraint nazwa_konstrejnta foreign key (ID_kolor) references kolor(ID) on update cascade on delete set null;';

/*
	constraint nazwa_konstrejnta foreign key ID_kolor references kolor(ID) on update cascade on delete set null

$select = 'create table kolor 
(
	id serial PRIMARY KEY,
	nazwa varchar(30) NOT NULL unique
);';

$select = 'create table zwierzaki 
(
	id serial PRIMARY KEY,
	nazwa VARCHAR(30) unique not NULL,
	wiek int, 
	ilosc_nog int
);';*/

$result = mysqli_query($baza, $select)
			or die(mysqli_error($baza));
?>
</body>
</html>