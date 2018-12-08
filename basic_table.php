<?php
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

//    include('ahp.php'); 
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>CourseCatalog | Creative - Bootstrap 3 Responsive Admin Template</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
    <script>
     function myFunction() {
     var input, filter, table, tr, td, i;
     input = document.getElementById("myInput");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");
     for (i = 0; i < tr.length; i++) {
     td = tr[i].getElementsByTagName("td")[1];
     if (td) {
     if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
    
  }
}
        
        function searchfunction() {
     var input, filter, table, tr, td, i;
     input = document.getElementById("major");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");
     for (i = 0; i < tr.length; i++) {
     td = tr[i].getElementsByTagName("td")[1];
     if (td) {
     if (td.innerHTML.toUpperCase().indexOf(filter) > -1 && filter!="ALL") {
        tr[i].style.display = "";
      }else if(filter=="ALL"){
        tr[i].style.display = "";
      }else {
        tr[i].style.display = "None";
      }
    }
    
  }
}
        
//    function searchfunction(){
//     console.log("1");
//     var input, filter, table, tr, td, i;
//     input = document.getElementById("major");
//     filter = input.value.toUpperCase();
//     console.log(filter.length);
//     table = document.getElementById("myTable");
//     tr = table.getElementsByTagName("tr");
//     for (i = 0; i < tr.length; i++) {
//      td = tr[i].getElementsByTagName("td")[1].nodeValue;
//      console.log(td); 
////console.log(td.innerHTML.toUpperCase);
////     if (td) {
////     if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
////        //tr[i].style.display = "";
////         //console.log("ok");
////      } else {
////        //tr[i].style.display = "";
////         console.log("not ok");
////      }
////    }
//    
//  }
//}    
        
    function Button1(credit, GPA){ 
        
        window.alert('\nThe Credit for this course: ' + credit + '\n\nThe Average GPA for this course is: ' + GPA);
    }
        

    
    function Button3(coursename){
        var myWindow = window.open("", "Userscore", "left=700, top=350, width=400, height=300");
        //window.alert("hi");
        myWindow.document.write("<!DOCTYPE html>");
        myWindow.document.write("<html>");
        myWindow.document.write("<body>");
        myWindow.document.write("<form action='action_page.php' method='post'>");
        myWindow.document.write("The corresponding courseID you select is: <br>");
        myWindow.document.write("<input type='text' name='courseID' value='" + coursename + "' readonly='readonly'><br><br>");
        myWindow.document.write("Please choose one of the following score:<br>");
        myWindow.document.write("<input type='radio' name='score' value='1'>1(sucks)<br>");
        myWindow.document.write("<input type='radio' name='score' value='2'>2(not that bad)<br>");
        myWindow.document.write("<input type='radio' name='score' value='3'>3(average)<br>");
        myWindow.document.write("<input type='radio' name='score' value='4'>4(good)<br>");
        myWindow.document.write("<input type='radio' name='score' value='5'>5(awesome)<br>");
        myWindow.document.write("<input type='submit' name='submit' value='SUBMIT'>");
        
        //myWindow.document.write("<input type='text' name='coursescore' >")
        myWindow.document.write("</form>");
        myWindow.document.write("</body>");
        myWindow.document.write("</html>");
        myWindow.document.close();
    }
    </script>
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo">CAP <span class="lite">3000</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
          <li>
<!--
            <form class="navbar-form">
              <input class="form-control" placeholder="Search what you want" type="text" id="myInput" onkeyup="myFunction()">
              <button type="button" class="btn btn-primary">Search</button> 
              <select class="form-control" onchange="searchfunction()" id="major">
               <option value="All">All</option>
               <option value="HIST">HIST</option>
               <option value="INFOTC">INFOTC</option>
               <option value="PHYSCS">PHYSCS</option>
               <option value="CMP_SC">CMP_SC</option>
               <option value="MATH">MATH</option>
             </select>    
            </form>
-->
           
          </li>
        </ul>
        <!--  search form end -->
         </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" width = "30" height = "30" src="img/profile-widget-avatar.png">
                            </span>
                            <span class="username">
                            <?php echo $_SESSION['username']; ?>
                            </span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="http://ec2-18-191-48-108.us-east-2.compute.amazonaws.com/capstone/profile.php"><i class="icon_profile"></i> My Profile</a>
              </li>
              <li>
                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
              </li>
              <li>
                <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
              </li>
              <li>
                <a href="#"><i class="icon_chat_alt"></i> Chats</a>
              </li>
              <li>
                <a  href="index.php?logout='1'"><i class="icon_key_alt"></i> Log Out</a>
              </li>
              <li>
                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
              </li>
              <li>
                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
           <li class="active">
            <a class="" href="mainPage.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Settings</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="profile.php">Personal Information</a></li>
              <li><a class="" href="perference_setting.php">Perference Setting</a></li>
            </ul>
          </li>
            
           <li>
            <a class="" href="basic_table.php">
                          <i class="icon_table"></i>
                          <span>Course</span>

                      </a>

          </li>
            
          <li>
            <a class="" href="chart-chartjs.php">
                          <i class="icon_table"></i>
                          <span>Schedule</span>

                      </a>

          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i> Table</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-table"></i>Table</li>
              <li><i class="fa fa-th-list"></i>CourseCatalog</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
  
  
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Advanced Table
              </header>
                <div><p></p></div>
                <div><p></p></div>
              <form class="navbar-form">
              <input class="form-control" placeholder="Search what you want" type="text" id="myInput" onkeyup="myFunction()">
<!--              <button type="button" class="btn btn-primary">Search</button> -->
              <select class="form-control" onchange="searchfunction()" id="major">
               <option value="All">All</option>
               <option value="HIST">HIST</option>
               <option value="INFOTC">INFOTC</option>
               <option value="PHYSCS">PHYSCS</option>
               <option value="CMP_SC">CMP_SC</option>
               <option value="MATH">MATH</option>
             </select>    
             </form> 
                <div><p></p></div>
                <div><p></p></div>
             <table class="table table-striped table-advance table-hover" id="myTable">
                <tbody>
                  <tr class="coursetable">
                    <th><i class="icon_profile"></i>CourseID</th>
                    <th><i class="icon_calendar"></i>CourseName</th>
                    <th><i class="icon_mail_alt"></i>CourseTime</th>
                    <th><i class="icon_pin_alt"></i>Instructor</th>
                    <th><i calss="icon_cogs">Algorithmscore</i></th>
<!--                    <th><i class="icon_mobile"></i>Room</th>-->
                    <th><i class="icon_cogs"></i>Moreinformation</th>
                  </tr>    
            <?php
                
          include('ahp.php');
        
          $servername = "3.16.54.143";
          $username = "root";
          $password = "12345678";
          $dbname = "Capstone3000"; 
          
          $conn = new mysqli($servername, $username, $password, $dbname);
          
          if($conn->connect_error){
              die("Connection failed: " . $conn->connect_error);
          }
          
//          function Button1(){
//              echo "<script type=\"text/javascript\">
//                      window.alert('Hello');
//                    </script>";
//          }
//          function Button2(){
//              echo "<script type=\"text/javascript\">
//                    window.alert('Hello');
//                    </script>";
//          }            
                    
                    
                    
          $sql = "SELECT courseID, CourseName, days, instructor, GPA, Credit FROM Course";
          
          $result = $conn->query($sql);
          
          if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()){
                  echo ('<tr>
                  <td>' . $row["courseID"] . '</td>
                  <td>' . $row["CourseName"] . '</td>
                  <td>' . $row["days"]. '</td>
                  <td>' . $row["instructor"]. '</td>
                  <td>' . calculateSecore($_SESSION['username'], $row["courseID"]). '</td>
                  <td>
                  
                  <div class= "btn-group">
                        <a class="btn btn-primary" onclick="Button1(' . $row["Credit"]. ',' . $row["GPA"] . ')"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-success" onclick="Button3(' . $row["courseID"]. ')"><i class="icon_check_alt2"></i></a>
                        
                    </div>
                  </td>
                </tr>');
                   
                }
          }
          
                    
                    
         ?>
                 </tbody>
                </table>
              </section>  
            </div>
          </div>
        
<!--
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i>CourseID</th>
                    <th><i class="icon_calendar"></i>CourseName</th>
                    <th><i class="icon_mail_alt"></i>CourseTime</th>
                    <th><i class="icon_pin_alt"></i>Instructor</th>
                    <th><i class="icon_mobile"></i>Room</th>
                    <th><i class="icon_cogs"></i>Moreinformation</th>
                  </tr>
                  <tr>
                    <td>Angeline Mcclain</td>

                    <td>2004-07-06</td>
                    <td>dale@chief.info</td>
                    <td>Rosser</td>
                    <td>176-026-5992</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Sung Carlson</td>
                    <td>2011-01-10</td>
                    <td>ione.gisela@high.org</td>
                    <td>Robert Lee</td>
                    <td>724-639-4784</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Bryon Osborne</td>
                    <td>2006-10-29</td>
                    <td>sol.raleigh@language.edu</td>
                    <td>York</td>
                    <td>180-456-0056</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Dalia Marquez</td>
                    <td>2011-12-15</td>
                    <td>angeline.frieda@thick.com</td>
                    <td>Alton</td>
                    <td>690-601-1922</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Selina Fitzgerald</td>
                    <td>2003-01-06</td>
                    <td>moshe.mikel@parcelpart.info</td>
                    <td>Waelder</td>
                    <td>922-810-0915</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Abraham Avery</td>
                    <td>2006-07-14</td>
                    <td>harvey.jared@pullpump.org</td>
                    <td>Harker Heights</td>
                    <td>511-175-7115</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Caren Mcdowell</td>
                    <td>2002-03-29</td>
                    <td>valeria@hookhope.org</td>
                    <td>Blackwell</td>
                    <td>970-147-5550</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Owen Bingham</td>
                    <td>2013-04-06</td>
                    <td>thomas.christopher@firstfish.info</td>
                    <td>Rule</td>
                    <td>934-118-6046</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Ahmed Dean</td>
                    <td>2008-03-19</td>
                    <td>lakesha.geri.allene@recordred.com</td>
                    <td>Darrouzett</td>
                    <td>338-081-8817</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Mario Norris</td>
                    <td>2010-02-08</td>
                    <td>mildred@hour.info</td>
                    <td>Amarillo</td>
                    <td>945-547-5302</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </section>
          </div>
        </div>
-->
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          <a href="https://bootstrapmade.com/">Free Bootstrap Templates</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nicescroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>


</body>

</html>

