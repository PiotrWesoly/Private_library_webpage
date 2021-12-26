<?php

ini_set('display_errors', 1);
ini_set('display_strtup_errors', 1);
error_reporting(E_ALL);
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";

//Define varibales and initialize with emptu values
$title = $author = $publisher = "";
$title_err = $author_err = $publisher_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if title is empty
    if(empty(trim($_POST["title"]))){
        $title_err = "Please enter title.";
    } else{
        $username = trim($_POST["title"]);
    }

    // Check if author is empty
    if(empty(trim($_POST["author"]))){
        $title_err = "Please enter author first and last name.";
    } else{
        $username = trim($_POST["author"]);
    }

    // Check if publihser is empty
    if(empty(trim($_POST["publisher"]))){
        $title_err = "Please enter the name of publisher.";
    } else{
        $username = trim($_POST["publisher"]);
    }
    // Fetch the last id of book
    $result = mysqli_query($link, "SELECT max(book_id) FROM book");

    $id = mysqli_fetch_row($result);
    // $id = mysqli_result($result, 0, 'book_id');

    if(empty($title_err) && empty($author_err) && empty($publisher_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO book (title, author, publisher) 
                VALUES (?, ?, ?)
                INSERT INTO common_lookup (element_value)
                VALUES (?)
                INSERT INTO user_books(user_id, book_id)
                VALUES(".$_SESSION["id"].", 2";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_title, $param_author, $param_publisher, $param_status);
            
            // Set parameters
            $param_title = $title;
            $param_author = $author;
            $param_publihser = $publihser;
            $param_status = $status;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to main page
                header("location: booksTable.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{
             font: 14px sans-serif; 
             background: url("https://wallpaperstock.net/old-office-wallpapers_22279_1920x1200.jpg");
            background-size: cover;
            background-attachment: fixed;
            }
        .wrapper{ 
            width: 360px; 
            padding: 20px;
            background-color: rgba(0,0,0,.5);
            color: #fff;
            margin-left: auto;
            margin-right: auto
            }
    </style>
</head>
<body style="margin: 300px 0 0 0;">
    <div class="wrapper">
        <h2>New book</h2>
        <p>Specify the book that you wan to add</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" >
            </div>    
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" >
            </div>
            <div class="form-group">
                <label>Publisher</label>
                <input type="text" name="publisher" class="form-control" >
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" name="status"id="status" class="form-control" >
                <?php
                $baza = mysqli_connect($hostname, $username, $password, $db);
                $select = 'select element_id, element_value from common_lookup;';
                $result = mysqli_query($baza, $select)
			                or die(mysqli_error($baza));
	
                while($wiersz = mysqli_fetch_row($result))
                {   
                    echo '<option value="'.$wiersz[0].'">'.$wiersz[1]."</option> /n";
                }
                ?>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add book">
            </div>
        </form>
    </div>
</body>
</html>
