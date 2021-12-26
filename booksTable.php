<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Piotr Wesoly - stud22
	</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="mystyle.scss" >
	<?php
	ini_set('display_errors', 1);
	ini_set('display_strtup_errors', 1);
	error_reporting(E_ALL);
	?>
</head>
<body style="margin: 50px 0 0 0;">
<div>
    <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to your library.</h1>
    <p>
        <a href="logout.php" class="button" style="position:absolute; top:0; right:0;">Sign Out of Your Account</a>
    </p>
    </div>

<div class="myDiv" style="background-color: rgba(0,0,0,.5);
            color: #fff;">

<table class="myTable" style="margin: 200px 0 0 0;">
	<thead>
        <th>User</th>
		<th>Title</th>
		<th>Author</th>
		<th>Number of pages</th>
		<th>Status</th>
	</thead>

<?php

require('config.php');

$baza = mysqli_connect($hostname, $username, $password, $db);


	$select = '
    select * from books
            ';

    // $select = '
    // select u.username, b.title, b.author, b.no_of_pages, s.status_value from user_book ub
    // join users u on u.id = ub.user_id
    // join books b on b.id = ub.book_id
    // join status s on s.id=ub.status_id
    // order by b.title;
    //         ';

	$result = mysqli_query($baza, $select)
			or die(mysqli_error($baza));

while($wiersz = mysqli_fetch_row($result))
{
	echo '<tr>';
	echo '<td>'.$wiersz[0].'</td>';
	echo '<td>'.$wiersz[1].'</td>';
	echo '<td>'.$wiersz[2].'</td>';
    echo '<td>'.$wiersz[3].'</td>';
    echo '<td>'.$wiersz[4].'</td>';

	
	// $ID_kolor=$wiersz[4];
	// if($ID_kolor == "")
	// {
	// 	echo '<td> &nbsp; </td>';
	// }
	// else
	// {
	// $select2='select nazwa from kolor where ID='.$ID_kolor.';';
	
	// $result2 = mysqli_query($baza, $select2)
	// 		or die(mysqli_error($baza));
			
	// $kolorek = mysqli_fetch_row($result2);
			
	// echo '<td>'.$kolorek[0].'</td>';
	// }
	// echo '<td> <a href="edit.php?id='.$wiersz[0].'"> <img src="./images/edit.jpg" alt="dodaj" style=" align-items: center; width:40px;height:40px;"></a> <a href="delete.php?id='.$wiersz[0].'"> <img src="./images/delete.png" alt="dodaj" style=" align-items: center; width:40px;height:40px;"></a> </td>'; 
	echo '</tr>';
}

mysqli_free_result($result);

//mysqli_close
?>
</table>
</body>
</html>