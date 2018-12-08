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

  <title>Schedule</title>
  <!--  schedule style-->
  
  
  
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style_schedule.css"> <!-- Resource style -->
    
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

    
    <script src="js/jquery.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- chartjs -->
    <script src="assets/chart-master/Chart.js"></script>
    <!-- custom chart script for this page only-->
<!--    <script src="js/chartjs-custom.js"></script>-->
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
     <script>
	if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
     </script>

    
    <script src="js/schedule.js"></script>
    <script>
        function printSC(){
            print_advance_schedule();
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
      <a href="mainPage.php" class="logo">Cap <span class="lite">3000</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
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

      <!--sidebar start-->
      <aside>
        <div id="sidebar" class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu">
            <li class="active">
              <a class="" href="index.html">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Forms</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
                <li><a class="" href="form_component.html"></a></li>
                <li><a class="" href="form_validation.html">Form Validation</a></li>
              </ul>
            </li>
            
            
            <li>
              <a class="" href="chart-chartjs.php">
                          <i class="icon_search_alt"></i>
                          <span>Schedule</span>

                      </a>

            </li>

            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Tables</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
                <li><a class="" href="basic_table.html">Basic Table</a></li>
              </ul>
            </li>

            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pages</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              
            </li>

          </ul>
          <!-- sidebar menu end-->
        </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      
      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="icon_piechart"></i> SCHEDULE</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="mainPage.php">Home</a></li>
                <li><i class="icon_search_alt"></i>Schedule</li>

              </ol>
            </div>
          </div>
          <div class="row">
            <section class="panel">
                <header class="panel-heading">
                  <h3>Your Schedule</Char>
                </header>
<!--                   <div class="panel-body">-->
                     <div class="cd-schedule loading">
                         <div class="timeline">
                             <ul>
                                 <li><span>08:00</span></li>
                                 <li><span>08:30</span></li>
                                 <li><span>09:00</span></li>
                                 <li><span>09:30</span></li>
                                 <li><span>10:00</span></li>
                                 <li><span>10:30</span></li>
                                 <li><span>11:00</span></li>
                                 <li><span>11:30</span></li>
                                 <li><span>12:00</span></li>
                                 <li><span>12:30</span></li>
                                 <li><span>13:00</span></li>
                                 <li><span>13:30</span></li>
                                 <li><span>14:00</span></li>
                                 <li><span>14:30</span></li>
                                 <li><span>15:00</span></li>
                                 <li><span>15:30</span></li>
                                 <li><span>16:00</span></li>
                                 <li><span>16:30</span></li>
                                 <li><span>17:00</span></li>
                                 
                             </ul>
                         </div> <!-- .timeline -->

	<div class="events">
		<ul>
			<li class="events-group">
				<div class="top-info"><span>Monday</span></div>

				<ul id = "mo">
					
				</ul>
			</li>

			<li class="events-group">
				<div class="top-info"><span>Tuesday</span></div>

				<ul id = "tu">
					

					
				</ul>
			</li>

			<li class="events-group">
				<div class="top-info"><span>Wednesday</span></div>

				<ul id = "we">
					
				</ul>
			</li>

			<li class="events-group">
				<div class="top-info"><span>Thursday</span></div>

				<ul id = "th">
					
				</ul>
			</li>

			<li class="events-group">
				<div class="top-info"><span>Friday</span></div>

				<ul id = "fr">
					
				</ul>
			</li>
		</ul>
	</div>

	<div class="event-modal">
		<header class="header">
			<div class="content">
				<span class="event-date"></span>
				<h3 class="event-name"></h3>
			</div>

			<div class="header-bg"></div>
		</header>

		<div class="body">
			<div class="event-info"></div>
			<div class="body-bg"></div>
		</div>

		<a href="#0" class="close">Close</a>
	</div>
                         <div class="cover-layer"></div>
</div> 
                      <!-- .cd-schedule -->
<!--                   </div>-->
            </section>
          </div>
          <div class="row">
            <!-- chart morris start -->
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  <h3>Your Schedule</Char>
                </header>
                      <div class="panel-body">
                      <div class="tab-pane" id="chartjs">
<!--                      schedule-->
                         
                              
                         
<!--                schedule-->
                          
                    <div class="row">
                       
                          
                        <form class="navbar-form">
                            <div>
                    <select id = "selection_num" onchange = "get_num()">
                        <option value="">Choose your class number</option>
                        <option value=3>3</option>
                        <option value=4>4</option>
                        <option value=5>5</option>
                        <option value=6>6</option>
                        
                    </select>
                    </div> 
                        <div><p></p></div>
                        <div><p id ="alert1"></p></div>
                            <input class="form-control" placeholder="Search what you want" type="text" id="myInput" onkeyup="myFunction()">

              <select class="form-control" onchange="searchfunction()" id="major">
               <option value="All">All</option>
               <option value="HIST">HIST</option>
               <option value="INFOTC">INFOTC</option>
               <option value="PHYSCS">PHYSCS</option>
               <option value="CMP_SC">CMP_SC</option>
               <option value="MATH">MATH</option>
              </select>
                    <div><p></p></div>
                    <button type="button" class="btn btn-primary" onclick="print_array()" id = "submit_list">Print your schedule</button>
                            <label></label><label></label>
                    <button type="button" class="btn btn-info" onclick="printSC()" id = "passarray" disabled>Advance Your Schedule</button>
                            
                            

                    </form>
                    <p></p>
                    <p></p>
                    <div id = "demo"></div>
                    <br>
                    <br>
                    
                    
                        <div id = "lap">
                            

                        
                        </div>
                    
                    
                    
                    
                        
                        <div  id = "card_info">
                            
<!--print schedule                        -->
                        
                        </div>
                        
                    
                    
                    
                    
                    
                     
                         
                         <hr>
                         <br>
                         <div id = "card_info2">
                            
<!--print recommend schedule                        -->
                        
                         </div>
                    
                        
                    
                    

                    
                    
                    
                    
                    
                    
                    
                <table class="table table-striped table-advance table-hover" id="myTable">
                <tbody>
                  <tr class="coursetable">
                    <th><i class="icon_profile"></i>CourseID</th>
                    <th><i class="icon_clipboard"></i>CourseName</th>
                    <th><i class="icon_clock"></i>CourseTime</th>
                    <th><i class="icon_clock"></i>Instructor</th>
                    <th><i class="icon_clock"></i>Advance Score</th>
                    <th><i class="icon_clock"></i>Average Gpa</th>
                    <th></th>
                    
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
          
          
                    
                    
                    
          $sql = "SELECT courseID, CourseName, days, instructor, GPA, Credit FROM Course";
          
          $result = $conn->query($sql);
          $num = 0;
          if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()){
                  
                  $let = "checkbox";
                  $id =  $let.$num;
                   echo '<tr>
                  <td>' . $row["courseID"] . '</td>
                  <td>' . $row["CourseName"] . '</td>
                  <td>' . $row["days"]. '</td>
                  <td>' . $row["instructor"]. '</td>
                  <td>' .calculateSecore($_SESSION['username'], $row["courseID"]).'</td>
                  <td>' . $row["GPA"]. '</td>
                  <td><input type="checkbox" id = '.$id.' class = "single-checkbox" onclick = "print_course('.$row["courseID"].', \''.$row["CourseName"].'\',\''.$row["days"].'\',\''.$row["instructor"].'\', '.$row["GPA"].',' . calculateSecore($_SESSION['username'], $row["courseID"]).')" disabled><br></td>
                  </tr>';
                  $num++;
                }
          }
        ?>
                </tbody>
                </table>
                
                          
                      </div>
                      
                      
                      </div>
                      </div>
                  </section>
                </div>
                    
              </div>
        
              <!-- chart morris start -->
            
      
      <!--main content end-->
          </section>
      </section>
    </section>
    <!-- container section end -->
    <!-- javascripts -->
    

</body>
</html>