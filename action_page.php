<?php

if(isset($_POST["submit"]) && !empty($_POST["courseID"]) && !empty($_POST["score"])) {
//    echo "CourseID is: ";
//    echo $_POST["courseID"];
//    echo "<br>";
//    echo "The score for this course is: ";
//    echo $_POST["score"];
//    echo "<br>";
          $servername = "3.16.54.143";
          $username = "root";
          $password = "12345678";
          $dbname = "Capstone3000"; 
    $a = $_POST["courseID"];
    $score = $_POST["score"];
    $conn = new mysqli($servername, $username, $password, $dbname);//Create connection and select DB
    
    if($conn->connect_error){
            die("Connection failed: " . $db->connect_error);
    }
    $sql="SELECT CourseName FROM Course WHERE courseID='$a'" ;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    //echo $row["CourseName"];
    $coursename = $row["CourseName"];
    $insert = $conn->query("INSERT INTO UserScore(CourseName, Userscore) VALUES ('$coursename', '$score')");
    
     if($insert){
       echo "Thanks for your feed back.";
     }else{
         echo "fail";
     }
         
    

    
}

?>