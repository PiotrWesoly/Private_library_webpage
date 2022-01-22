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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ 
            font: 14px sans-serif; 
            text-align: center; 
            background: url("./images/book-bg.jpg");
            background-size: cover;
            background-attachment: fixed;
        }
        table {
        border-collapse: separate;
        border-spacing: 50px 0;
        }

        td {
        padding: 10px 0;
        }
        img{
            border: 7px solid black;
        }
    </style>
</head>
<body>
    <div>
    <h1 class="my-5, text-white" style="margin-top: 100px;">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p style="background-color: rgba(0,0,0,.5);color: #fff;">
    <a href="logout.php" class="btn btn-danger ml-3, align-baseline" style="position:absolute; top:0; right:0;">Sign Out of Your Account</a>    
    <div style="display: flex; justify-content: center; margin-top: 150px;">
        <table> 
            <tr>
                <td><img src="./images/library.png" alt="dodaj" style=" align-items: center; width:240px;height:240px;"></td>
                <td><img src="./images/book.png" alt="dodaj" style=" align-items: center; width:240px;height:240px;"></td>
                <td><img src="./images/collection.png" alt="dodaj" style=" align-items: center; width:240px;height:240px;"></td>
                <td><img src="./images/addCollection.png" alt="dodaj" style=" align-items: center; width:240px;height:240px;"></td>
            </tr>       
            <tr>
                <td style="border-spacing: 50px;"><a href="booksTable.php" class="btn btn-primary ml-3, align-baseline">Library with books</a></td>
                <td style="border-spacing: 50px;"><a href="addBook.php" class="btn btn-primary ml-3, align-baseline">Add book</a></td>
                <td style="border-spacing: 50px;"><a href="collection.php" class="btn btn-primary ml-3, align-baseline">My collection</a></td>
                <td style="border-spacing: 50px;"><a href="addCollection.php" class="btn btn-primary ml-3, align-baseline">Add to my collection</a></td>
            </tr>
        </table>
    </div>
    </p>
    </div>
</body>
</html>
