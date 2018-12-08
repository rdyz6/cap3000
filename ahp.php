<?php

function calculateSecore($username,$courseID){
    $db = mysqli_connect('localhost', 'root', 'capstone3000', 'Capstone3000');

    if ($db->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
    }
    
    if($result = $db->query("SELECT * from StudentPerference where UserID = '$username'")){
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $q1 = $row["answer"];
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $q2 = $row["answer"];
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $q3 = $row["answer"];
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $q4 = $row["answer"];
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $q5 = $row["answer"];
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $q6 = $row["answer"];
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $q7 = $row["answer"];
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $q8 = $row["answer"];
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $q9 = $row["answer"];  
    }
    
    if($result = $db->query("SELECT * from Course where courseID = '$courseID'")){
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $courseDays = $row["days"];
        $gpa = $row["GPA"]; 
        $capacity = $row["roomsize"];
    }

    if($courseDays =="TBA")
    {
        $timeSecore = 5;
    }
    else{
    $timeArr = explode(" ", $courseDays);
    $startTimeString = $timeArr[1];
    $endTimeString = $timeArr[3];

    
    $startArr = explode(":", $startTimeString);
    $endArr = explode(":", $endTimeString);
    
    $startTime = intval($startArr[0]);
    $endTime = intval($endArr[0]);
    
    if(strpos($startTimeString,"AM")){
        $startAMPM = "AM";
    }
       else {
        $startAMPM = "PM";
    }
    
    if(strpos($endTimeString,"AM")){
        $endAMPM = "AM";
    }
       else {
        $endAMPM = "PM";
    }
        
    //TIME 
    if($startAMPM == "AM" || strpos($startTimeString,"12:00")){
        $setTime = 8 + $q2 -1;
        if($startTime >= $setTime)$timeSecore = 5;
        else $timeSecore = 5 - ($setTime - $startTime);
    }
    else{
        $setTime = 1 + $q3;
        if($endTime < $setTime)$timeSecore = 5;
        else $timeSecore = 4 - ($endTime - $setTime);
    }
             
    }
 
    $summark = 0;
    $nummark = 0;
    $avgmark = 0.00;
    
    if($result = $db->query("SELECT * from courseselection where courseID = '$courseID'")){
        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            $summark = $summark + $row["mark"];
//            echo $summark;
            $nummark ++ ;
        };
    }
    
    $avgmark = $summark / $nummark;
//    echo $avgmark;
    
    //GPA
    $gpaSecore = 0;
    $gpalevel = 0;   
    if($gpa>= 3.7)$gpalevel = 5;
    else if($gpa>=3.5)$gpalevel = 4;
    else if($gpa>=3.0)$gpalevel = 3;
    else if($gpa>=2.7)$gpalevel = 2;
    else $gpalevel = 1;  
    $setlevel = 5 - $q1 + 1;
    if($setlevel <= $gpalevel)$gpaSecore = 5;
    else {
        $gpaSecore = 5 - ($setlevel - $gpalevel);
    }
    

    
    //capacity
    if($capacity<=30)$capacitylevel=1;
    else if ($capacity<=60)$capacitylevel=3;
    else if ($capacity<=90)$capacitylevel=4;
    else if ($capacity<=120)$capacitylevel=5;
    else $capacitylevel = 5;
    
    $capacitySecore = 5 - abs($q1-$capacitylevel);

    //ahp
    $ahpMatrix[0] = array(1,1/3,1/5,1/7,1/9);
    $ahpMatrix[1] = array(3, 1,1/3,1/5,1/7);
    $ahpMatrix[2] = array(5,3,1,1/3,1/5);
    $ahpMatrix[3] = array(7,5,3,1,1/3,1/5,1/7);
    $ahpMatrix[4] = array(9,7,5,3,1);
    
    $parameter[0]= 6-$q5;
    $parameter[1]= 6-$q6;
    $parameter[2]= 6-$q7;
    $parameter[3]= 6-$q9;

    for($i=0;$i<4;$i++){
        for($j=0;$j<4;$j++){
            $a = $parameter[$i]-1;
            $b = $parameter[$j]-1;
            $matrix[$i][$j]=$ahpMatrix[$a][$b];
//            echo $matrix[$i][$j];
//            echo " ";
        }
    }
    
    for($i=0;$i<4;$i++){
            $sum[$i]=0;
        for($j=0;$j<4;$j++){
            $sum[$i]+= $matrix[$j][$i];
        }
//        echo $sum[$i];
//        echo "<br>";
    }
    
    for($i=0;$i<4;$i++){
        for($j=0;$j<4;$j++){
            $matrix[$i][$j]/=$sum[$j];
        }
    }
    $sum =0;
    for($i=0;$i<4;$i++){
        $weight[$i]=0;
        for($j=0;$j<4;$j++){
            $weight[$i]+=$matrix[$i][$j];
        }
        $weight[$i]/=4;
    }
    
    $totalSecore = $gpaSecore * $weight[0] + $timeSecore * $weight[1] + $capacitySecore * $weight[2] + $avgmark * $weight[3];
    
//    echo "<br>";
//    echo $totalSecore;
        
    $db->close();
    
    return $totalSecore;
    
    
}

//          $servername = "3.16.54.143";
//          $username = "root";
//          $password = "12345678";
//          $dbname = "Capstone3000"; 
//          
//          $conn = new mysqli($servername, $username, $password, $dbname);
//          
//          if($conn->connect_error){
//              die("Connection failed: " . $conn->connect_error);
//          }
//
//          $sql = "SELECT courseID, CourseName, days, instructor, GPA, Credit FROM Course";
//          
//          $result = $conn->query($sql);
//          
//          if($result->num_rows > 0) {
//              while($row = $result->fetch_assoc()){
//                echo (calculateSecore("swz45", $row["courseID"]));
//                   
//                }
//          }

// echo (calculateSecore("swz45", "52462"));


//if($result = $db->query("SELECT * from Course;")){
//    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
//    {
//        $courseID = $row["courseID"];
//        $mark = rand(0,5);
//        $insert = $db -> query("INSERT into courseselection (UserID, courseID,mark) VALUES ('$username','$courseID',$mark)");
//        
//    }

//class course
//{
//    $courseName;
//}
//if($result = $db->query("SELECT * from StudentPerference where UserID = 'lmhts'"))
//{
//    printf("Select returned %d rows.\n", $result->num_rows);
//    
//    if($result->num_rows == 0){
//        
//    $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',1)");
//    $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',2)");
//    $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',3)");
//    $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',4)");
//    $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',5)");
//    $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',6)");
//    $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',7)");
//    $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',8)");
//    $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',9)");
//    }
//    else{
//        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//        echo($row["answer"]);
//        $_SESSION['q1'] = $row["answer"];
//        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//        $_SESSION['q2'] = $row["answer"]; 
//        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//        $_SESSION['q3'] = $row["answer"];
//        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//        $_SESSION['q4'] = $row["answer"];
//        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//        $_SESSION['q5'] = $row["answer"];
//        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//        $_SESSION['q6'] = $row["answer"];
//        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//        $_SESSION['q7'] = $row["answer"];
//        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//        $_SESSION['q8'] = $row["answer"];
//        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//        $_SESSION['q9'] = $row["answer"]; 
//        
//    }
//    /* free result set */
//    $result->close();
//                         
//}

?>

