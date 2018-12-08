<?php
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username'],$_SESSION['fname'],
    $_SESSION['lname'],
    $_SESSION['major'],
    $_SESSION['birthday'], 
    $_SESSION['phone'], 
    $_SESSION['email'],
    $_SESSION['y_mu'], 
    $_SESSION['graduateday'], 
    $_SESSION['gpa'],
    $_SESSION['d_word']);
      
	header("location: index.php");
}?>