<?php
	
    // here we are using sessions to propagate the login
    // we always have to call session_start() to use $_session[] (session)
    /*if(!session_start()){
        header("Location: error.php");
        exit;  
    }
	$loggedIn=empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];

    if($loggedIn){
        header("Location: mainPage.php");
        exit;
    }

	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_login') {
		handle_login();
	} else {
		login_form();
	}
	
	function handle_login() {
        
        $username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
        
        require_once "db.conf";
        
        $mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
        
        if($mysqli->connect_error){
            $error = "Error:" .$mysqli->connect_errno." " .$mysqli->connect_error;
            require "index.php";
            exit;
        }
        
        $username = $mysqli->real_escape_string($username);
        $password = $mysqli->real_escape_string($password);
        
        $query = "select username from user where username = '$username' and password = '$password'";
        
        $mysqliResult = $mysqli->query($query);
        
        if($mysqliResult){
            $match =$mysqliResult -> num_rows;
            
            $mysqliResult->close();
            $mysqli -> close();
            
            if($match == 1) {
                $_SESSION[loggedin]=$username;
                header("Location:mainPage.php");
                exit;
            }
            else{
                $error = "Error:Incorrect username and/or password";
                require "index.php";
                exit;
            }
        }
		   
         //Else, there was no result
        else {
          $error = 'Login Error: Please contact the system administrator.';
          require "index.php";
          exit;
        }
        
       
	}
	
	function login_form() {
		$username = "";
		$error = "";
		require "index.php";
	}*/ 
        include('server.php');
        if (isset($_POST['login_user'])) {
           $username = mysqli_real_escape_string($db, $_POST['username']);
           $password = mysqli_real_escape_string($db, $_POST['password']);
           
           if (empty($username)) {
  	          array_push($errors, "Username is required");
           }
           if (empty($password)) {
  	          array_push($errors, "Password is required");
           }

           if (count($errors) == 0) {
  	          $password = md5($password);
  	          $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
              $query_profile = "SELECT * FROM UserProfile WHERE username='$username'";
  	          $query_email  = "SELECT email FROM users WHERE username='$username'";
              $results = mysqli_query($db, $query);
              $result_profile = $db->query($query_profile);
              $result_email = $db->query($query_email);
               if (mysqli_num_rows($results) == 1) {
  	             $_SESSION['username'] = $username;
                 $_SESSION['email'] = $email;
  	             $_SESSION['success'] = "You are now logged in";
  	             header('location: mainPage.php');
  	          }else {
  		         array_push($errors, "Wrong username/password combination");
                  header('location: index.php');
  	          }
               
               if($result_profile->num_rows>0){
                   while($row = $result_profile->fetch_assoc()){
                       $_SESSION['fname'] = $row['firstname'];
                       $_SESSION['lname'] = $row['lastname'];
                       $_SESSION['major'] = $row['major'];
                       $_SESSION['phone'] = $row['phone'];
                       $_SESSION['email'] = $row['email'];
                       $_SESSION['y_mu'] = $row['yearsinMU'];
                       $_SESSION['graduateday'] = $row['Graduateday'];
                       $_SESSION['gpa'] = $row['GPA'];
                       $_SESSION['d_word'] = $row['descripition'];
                       $_SESSION['birthday'] = $row['birthday'];
                   }
               }
               if($result_email->num_rows>0){
                   while($row = $result_email->fetch_assoc()){
                       $_SESSION['email'] = $row['email'];
                   }
               }
           }
        }
        
	
	
?>