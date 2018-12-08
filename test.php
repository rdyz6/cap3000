

<?php

          $servername = "3.16.54.143";
          $username = "root";
          $password = "12345678";
          $dbname = "Capstone3000"; 
          
          $conn = new mysqli($servername, $username, $password, $dbname);
          
          if($conn->connect_error){
              die("Connection failed: " . $conn->connect_error);
          }
     
          $startIndex = 0;
          $endIndex = 129;

         while($startIndex<=$endIndex)
          {
           $insert = $conn->query("Insert into Course (courseID, section, days, coursetime, instructor, room, CourseName, GPA, Credit, roomsize, courseindex) VALUES ('','','','','','','','','','','$startIndex')");
           $startIndex++;
            if($insert){
             echo "Thanks for your feed back.";
            }else{
             echo "fail";
           } 
         }


?> 

