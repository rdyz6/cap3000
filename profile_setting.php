
<?php
session_start();
if(!session_start()){
    header("Location: error.php");
    exit;  
}

$loggedIn=empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];

if($loggedIn){
    header("Location: index.php");
    exit;
}
include('server.php');
// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', 'capstone3000', 'Capstone3000');

// REGISTER USER
if (isset($_POST['profile_save'])) {
  // receive all input values from the form
  $username = $_SESSION['username'];
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $major = mysqli_real_escape_string($db, $_POST['major']);
  $birthday = mysqli_real_escape_string($db, $_POST['b_year']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $y_mu = mysqli_real_escape_string($db, $_POST['year']);
  $graduateday = mysqli_real_escape_string($db, $_POST['g_year']);
  $gpa = mysqli_real_escape_string($db, $_POST['gpa']);
  $d_word = mysqli_real_escape_string($db, $_POST['d_word']);
 
//
//echo "<div>$username</div>";
//echo "<div>$email</div>";
//echo "<div>$yearsinMU</div>";
//echo "<div>$graduateday</div>";
//echo "<div>$gpa</div>";
//echo "<div>$lname</div>";
//echo "<div>$fname</div>";
//echo "<div>$major</div>";
//echo "<div>$birthday</div>";
//echo "<div>$phone</div>";



  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($y_mu)) { alert("Please enter your year in University"); }
  if (empty($graduateday)) { alert("Please enter your graduate date in University");}
  if (empty($gpa)) { alert("GPA is required"); }
  if (empty($fname)) { alert("Firstname is required");}
  if (empty($lname)) { alert("Lastname is required");}
  if (empty($major)) { alert("Major is required");}
  if (empty($birthday)) { alert("Please enter your birthday"); }
  if (empty($phone)) { alert("Please enter your phone number");}
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email  

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "UPDATE UserProfile SET yearsinMU = '$y_mu' ,Graduateday = '$graduateday',GPA = $gpa,firstname = '$fname',lastname = '$lname', birthday = '$birthday', major = '$major', phone = $phone, descripition = '$d_word' WHERE username = '$username' " ;
  	mysqli_query($db, $query);
      
   
    
       
    
    
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['major'] = $major;
    $_SESSION['birthday'] = $birthday;
    $_SESSION['phone'] = $phone;
    $_SESSION['y_mu'] = $y_mu;
    $_SESSION['graduateday'] = $graduateday;
    $_SESSION['gpa'] = $gpa;
    $_SESSION['d_word'] = $d_word;
    echo '<script language="javascript">';
    echo 'alert("Your Profile Update Successful!")';
    echo '</script>';
    header( "Refresh:1; url=http://ec2-3-16-54-143.us-east-2.compute.amazonaws.com/capstone/profile.php", true, 303);
  }
  else{
    echo '<script language="javascript">';
    echo 'Error.';
    echo '</script>';
  }
  
    
  
}




