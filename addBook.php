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

//Define varibales and initialize with empty values
$title = $author = $numOfPage = $status = "";
$title_err = $author_err = $numOfPage_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if title is empty
    if(empty(trim($_POST["title"]))){
        $title_err = "Please enter title.";
    } else{
        $title = trim($_POST["title"]);
    }

    // Check if author is empty
    if(empty(trim($_POST["author"]))){
        $author_err = "Please enter author's first and last name.";
    } else{
        $author = trim($_POST["author"]);
    }

    // Check if numOfPage is empty
    if(empty(trim($_POST["numOfPage"]))){
        $numOfPage_err = "Please enter number of book's pages.";
    } else{
        $numOfPage = trim($_POST["numOfPage"]);
    }
    
    //$status = trim($_POST["status"]);

    if(empty($title_err) && empty($author_err) && empty($numOfPage_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO books (title, author, no_of_pages) 
                VALUES (?, ?, ?);";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_title, $param_author, $param_numOfPage);
            echo $sql;
            // Set parameters
            $param_title = $title;
            $param_author = $author;
            $param_numOfPage = $numOfPage;

            echo $param_author;
            echo $numOfPage;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

               /* $select = "select max(id) from books;";
                $result = mysqli_query($link, $select)
			                or die(mysqli_error($link));
                $wiersz = mysqli_fetch_row($result);
                echo $wiersz[0];

                $sql1 = "INSERT INTO user_book (user_id, book_id, status_id) 
                    VALUES (?, ?, ?);";

                if($stmt1 = mysqli_prepare($link, $sql1)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt1, "iii", $param_user_id, $param_book_id, $param_status_id);
                    
                    // Set parameters
                    $param_user_id = $_SESSION["id"];
                    $param_book_id = $wiersz[0];
                    $param_status_id = $status;

                    echo $param_user_id;
                    echo $param_book_id;
                    echo $param_status_id;*/
                    
                    // Attempt to execute the prepared statement
                    //if(mysqli_stmt_execute($stmt1)){
                        // Redirect to main page
                header("location: booksTable.php");
                    /*} else{
                        echo "Oops! Something went wrong. Please try again later11.";
                    }*/

                   // mysqli_stmt_close($stmt1);
                
            } 
			else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            //Close statement
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
        <p>Specify the book that you want to add</p>

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
                <label>Number of pages</label>
                <input type="number" name="numOfPage" class="form-control" >
            </div>
            <!--<div class="form-group">
                <label>Status</label>
                <select name="status" name="status"id="status" class="form-control" >
                <?php
                /*$baza = mysqli_connect($hostname, $username, $password, $db);
                $select = 'select id, status_value from status;';
                $result = mysqli_query($baza, $select)
			                or die(mysqli_error($baza));
	
                while($wiersz = mysqli_fetch_row($result))
                {   
                    echo '<option value="'.$wiersz[0].'">'.$wiersz[1]."</option> /n";
                }*/
                ?>
            </div>-->
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add book">
            </div>
        </form>
    </div>
</body>
</html>
