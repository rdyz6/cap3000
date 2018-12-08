<?php

    $db = mysqli_connect('localhost', 'root', 'capstone3000', 'Capstone3000');

    if ($db->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
    }

    if($result = $db->query("SELECT * from Course")){
        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
           $courseid = $row["courseID"];
            $ran = rand(1,5);
            if($ran == 1)$size = 30;
            else if ($ran == 2)$size = 60;
            else if ($ran == 3)$size = 90;
            else if ($ran == 4)$size = 120;
            else if ($ran == 5)$size = 150;
            
            $update = $db -> query("UPDATE Course Set roomsize=$size WHERE courseID = '$courseid'");
        }  
        
    }
    $db->close();
?>