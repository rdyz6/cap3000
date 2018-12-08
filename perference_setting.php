<?php
function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);
}
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
    
    $db = mysqli_connect('localhost', 'root', 'capstone3000', 'Capstone3000');

    $username = $_SESSION['username'];
    
    if (isset($_POST['Result'])){
    $q1 = mysqli_real_escape_string($db, $_POST['q1']);
    $q2 = mysqli_real_escape_string($db, $_POST['q2']);
    $q3 = mysqli_real_escape_string($db, $_POST['q3']);
    $q4 = mysqli_real_escape_string($db, $_POST['q4']);
    $q5 = mysqli_real_escape_string($db, $_POST['q5']);
    $q6 = mysqli_real_escape_string($db, $_POST['q6']);
    $q7 = mysqli_real_escape_string($db, $_POST['q7']);
    $q8 = mysqli_real_escape_string($db, $_POST['q8']);
    $q9 = mysqli_real_escape_string($db, $_POST['q9']);   
    
    $update = $db -> query("UPDATE StudentPerference Set answer=$q1 WHERE UserID = '$username' and questionnumber = 1 ");
    $update = $db -> query("UPDATE StudentPerference Set answer=$q2 WHERE UserID = '$username' and questionnumber = 2 ");
    $update = $db -> query("UPDATE StudentPerference Set answer=$q3 WHERE UserID = '$username' and questionnumber = 3 ");
    $update = $db -> query("UPDATE StudentPerference Set answer=$q4 WHERE UserID = '$username' and questionnumber = 4 ");
    $update = $db -> query("UPDATE StudentPerference Set answer=$q5 WHERE UserID = '$username' and questionnumber = 5 ");
    $update = $db -> query("UPDATE StudentPerference Set answer=$q6 WHERE UserID = '$username' and questionnumber = 6 ");
    $update = $db -> query("UPDATE StudentPerference Set answer=$q7 WHERE UserID = '$username' and questionnumber = 7 ");
    $update = $db -> query("UPDATE StudentPerference Set answer=$q8 WHERE UserID = '$username' and questionnumber = 8 ");
    $update = $db -> query("UPDATE StudentPerference Set answer=$q9 WHERE UserID = '$username' and questionnumber = 9 ");
    }
    if($result = $db->query("SELECT * from StudentPerference where UserID = '$username'"))
    {
    if($result->num_rows == 0){     
        $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',1)");
        $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',2)");
        $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',3)");
        $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',4)");
        $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',5)");
        $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',6)");
        $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',7)");
        $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',8)");
        $insert = $db -> query("INSERT into StudentPerference (UserID, questionnumber) VALUES ('$username',9)");
        $_SESSION['q1'] = 0;
        $_SESSION['q2'] = 0;
        $_SESSION['q3'] = 0;
        $_SESSION['q4'] = 0;
        $_SESSION['q5'] = 0;
        $_SESSION['q6'] = 0;
        $_SESSION['q7'] = 0;
        $_SESSION['q8'] = 0;
        $_SESSION['q9'] = 0;
    }
    else{  
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $_SESSION['q1'] = $row["answer"];
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $_SESSION['q2'] = $row["answer"]; 
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $_SESSION['q3'] = $row["answer"];
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $_SESSION['q4'] = $row["answer"];
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $_SESSION['q5'] = $row["answer"];
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $_SESSION['q6'] = $row["answer"];
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $_SESSION['q7'] = $row["answer"];
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $_SESSION['q8'] = $row["answer"];
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $_SESSION['q9'] = $row["answer"]; 

    }
    /* free result set */
    $result->close();
                         
}
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

    <title>Peference Setting</title>

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

    <style>
        .pl {
            position: relative;
            min-height: 1px;
            padding-left: 30px;
            padding-right: 30px;
        }
        
        .pt {
            padding-top: 10px;
        }
    </style>
    
    <script language="javascript">
        
        function MsgBox() //声明标识符
        {
            alert("Submitted!"); //弹出对话框
        }
        
    </script>
<!--引用JS代码

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
</head>

<body>
    <!-- container section start -->
    <section id="container" class="">
<!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="http://ec2-3-16-54-143.us-east-2.compute.amazonaws.com/capstone/mainPage.php" class="logo">Cap <span class="lite">3000</span></a>
        
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
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-files-o"></i> Perference Setting</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                            <li><i class="icon_document_alt"></i>Settings</li>
                            <li><i class="fa fa-files-o"></i>Perference Setting</li>
                        </ol>
                    </div>
                </div>
                <!-- Form validations -->
                <form class="form-validate form-horizontal" id="feedback_form" method="post" action="" onsubmit="MsgBox()">
        <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Question 1
                            </header>
                            <div class="panel-body">
                                <div class="form pl">
                                    
                                        <div class="form-group ">
                                            <label for="cname" class="control-label">What degrees of difficulty/challenges do you expect to have for general courses?</label>
                                        </div>
                                         <div class="form-group ">
                                            <input type="radio" name="q1" value="1" required <?php if($_SESSION['q1'] ==1){echo 'checked="checked"';}?>> Very easy<br>
                                            <input type="radio" name="q1" value="2"<?php if($_SESSION['q1'] ==2){echo 'checked="checked"';}?>> Easy<br>
                                            <input type="radio" name="q1" value="3"<?php if($_SESSION['q1'] ==3){echo 'checked="checked"';}?>> Meidum<br>
                                            <input type="radio" name="q1" value="4"<?php if($_SESSION['q1'] ==4){echo 'checked="checked"';}?>> Somehow challenge<br>
                                            <input type="radio" name="q1" value="5"<?php if($_SESSION['q1'] ==5){echo 'checked="checked"';}?>> Fallout challenge<br>
                                            
                                        </div>
        
                                </div>

                            </div>
                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Question 2
                            </header>
                            <div class="panel-body">
                                <div class="form pl">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label">What is the start time of the first course you expect in the morning?</label>
                                        </div>
                                        <div class="form-group ">
                                            <input type="radio" name="q2" value="1" required <?php if($_SESSION['q2'] ==1){echo 'checked="checked"';}?>> After 8:00 am<br>
                                            <input type="radio" name="q2" value="2" <?php if($_SESSION['q2'] ==2){echo 'checked="checked"';}?>> After 9:00 am<br>
                                            <input type="radio" name="q2" value="3" <?php if($_SESSION['q2'] ==3){echo 'checked="checked"';}?>> After 10:00 am<br>
                                            <input type="radio" name="q2" value="4" <?php if($_SESSION['q2'] ==4){echo 'checked="checked"';}?>> After 11:00 am<br>
                                            <input type="radio" name="q2" value="5" <?php if($_SESSION['q2'] ==5){echo 'checked="checked"';}?>> After 12:00 am<br>
                                            
                                        </div>
       
                            
                                </div>

                            </div>
                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Question 3
                            </header>
                            <div class="panel-body">
                                <div class="form pl">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label">What is the end time of the course you expect in the afternoon?</label>
                                        </div>
                                        <div class="form-group ">
                                            <input type="radio" name="q3" value="1" required <?php if($_SESSION['q3'] ==1){echo 'checked="checked"';}?>> Before 2:00 pm<br>
                                            <input type="radio" name="q3" value="2" <?php if($_SESSION['q3'] ==2){echo 'checked="checked"';}?>> Before 3:00 pm<br>
                                            <input type="radio" name="q3" value="3" <?php if($_SESSION['q3'] ==3){echo 'checked="checked"';}?>> Before 4:00 pm<br>
                                            <input type="radio" name="q3" value="4" <?php if($_SESSION['q3'] ==4){echo 'checked="checked"';}?>> Before 5:00 pm<br>
                                            <input type="radio" name="q3" value="5" <?php if($_SESSION['q3'] ==5){echo 'checked="checked"';}?>> Before 6:00 pm<br>
                                            
                                        </div>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Question 4
                            </header>
                            <div class="panel-body">
                                <div class="form pl">
   
                                        <div class="form-group ">
                                            <label for="cname" class="control-label ">What is your preferred capacity of classroom?</label>
                                        </div>
                                          <div class="form-group ">
                                            <input type="radio" name="q4" value="1" required <?php if($_SESSION['q4'] ==1){echo 'checked="checked"';}?>> Mini class (<=30)<br>
                                            <input type="radio" name="q4" value="2" <?php if($_SESSION['q4'] ==2){echo 'checked="checked"';}?>> Small class (<=60)<br>
                                            <input type="radio" name="q4" value="3" <?php if($_SESSION['q4'] ==3){echo 'checked="checked"';}?>> Medium size class (<=90)<br>
                                            <input type="radio" name="q4" value="4" <?php if($_SESSION['q4'] ==4){echo 'checked="checked"';}?>> large class (<=120)<br>
                                            <input type="radio" name="q4" value="5" <?php if($_SESSION['q4'] ==5){echo 'checked="checked"';}?>> Colossal class(>120) <br>
                                            
                                        </div>
                            
                          
                                </div>
                            </div>
                        </section>
                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Question 6
                            </header>
                            <div class="panel-body">
                                <div class="form pl">
                   
                                    <div class="form-group ">
                                            <label for="cname" class="control-label ">Grade the importance of the factors listed below:</label>
                                    </div>
                                          <div class="form-group ">
                                            <label for="cname" class="control-label ">Difficulty</label><br>
                                            <input type="radio" name="q5" value="1" required <?php if($_SESSION['q5'] ==1){echo 'checked="checked"';}?>> Not at all<br>
                                            <input type="radio" name="q5" value="2" <?php if($_SESSION['q5'] ==2){echo 'checked="checked"';}?>> Not really<br>
                                            <input type="radio" name="q5" value="3" <?php if($_SESSION['q5'] ==3){echo 'checked="checked"';}?>> Somehow<br>
                                            <input type="radio" name="q5" value="4" <?php if($_SESSION['q5'] ==4){echo 'checked="checked"';}?>> Pretty much<br>
                                            <input type="radio" name="q5" value="5" <?php if($_SESSION['q5'] ==5){echo 'checked="checked"';}?>> Absolutely<br>
                                            
                                        </div>
                                        
                                        <div class="form-group ">
                                            <label for="cname" class="control-label ">Time</label><br>
                                            <input type="radio" name="q6" value="1" required <?php if($_SESSION['q6'] ==1){echo 'checked="checked"';}?>> Not at all<br>
                                            <input type="radio" name="q6" value="2" <?php if($_SESSION['q6'] ==2){echo 'checked="checked"';}?>> Not really<br>
                                            <input type="radio" name="q6" value="3" <?php if($_SESSION['q6'] ==3){echo 'checked="checked"';}?>> Somehow<br>
                                            <input type="radio" name="q6" value="4" <?php if($_SESSION['q6'] ==4){echo 'checked="checked"';}?>> Pretty much<br>
                                            <input type="radio" name="q6" value="5" <?php if($_SESSION['q6'] ==5){echo 'checked="checked"';}?>> Absolutely<br>
                                            
                                        </div>
                                        
                                        <div class="form-group ">
                                            <label for="cname" class="control-label ">Capacity</label><br>
                                            <input type="radio" name="q7" value="1" required <?php if($_SESSION['q7'] ==1){echo 'checked="checked"';}?>> Not at all<br>
                                            <input type="radio" name="q7" value="2" <?php if($_SESSION['q7'] ==2){echo 'checked="checked"';}?>> Not really<br>
                                            <input type="radio" name="q7" value="3" <?php if($_SESSION['q7'] ==3){echo 'checked="checked"';}?>> Somehow<br>
                                            <input type="radio" name="q7" value="4" <?php if($_SESSION['q7'] ==4){echo 'checked="checked"';}?>> Pretty much<br>
                                            <input type="radio" name="q7" value="5" <?php if($_SESSION['q7'] ==5){echo 'checked="checked"';}?>> Absolutely<br>
                                            
                                        </div>
                                        
                                        <div class="form-group ">
                                            <label for="cname" class="control-label ">Instructor</label><br>
                                            <input type="radio" name="q8" value="1" required <?php if($_SESSION['q8'] ==1){echo 'checked="checked"';}?>> Not at all<br>
                                            <input type="radio" name="q8" value="2" <?php if($_SESSION['q8'] ==2){echo 'checked="checked"';}?>> Not really<br>
                                            <input type="radio" name="q8" value="3" <?php if($_SESSION['q8'] ==3){echo 'checked="checked"';}?>> Somehow<br>
                                            <input type="radio" name="q8" value="4" <?php if($_SESSION['q8'] ==4){echo 'checked="checked"';}?>> Pretty much<br>
                                            <input type="radio" name="q8" value="5" <?php if($_SESSION['q8'] ==5){echo 'checked="checked"';}?>> Absolutely<br>
                                            
                                        </div>
                                        
                                           <div class="form-group ">
                                            <label for="cname" class="control-label ">Student's markings</label><br>
                                            <input type="radio" name="q9" value="1" required <?php if($_SESSION['q9'] ==1){echo 'checked="checked"';}?>> Not at all<br>
                                            <input type="radio" name="q9" value="2" <?php if($_SESSION['q9'] ==2){echo 'checked="checked"';}?>> Not really<br>
                                            <input type="radio" name="q9" value="3" <?php if($_SESSION['q9'] ==3){echo 'checked="checked"';}?>> Somehow<br>
                                            <input type="radio" name="q9" value="4" <?php if($_SESSION['q9'] ==4){echo 'checked="checked"';}?>> Pretty much<br>
                                            <input type="radio" name="q9" value="5" <?php if($_SESSION['q9'] ==5){echo 'checked="checked"';}?>> Absolutely<br>
                                            
                                        </div>
                                        
                                         <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-primary" type="submit" name="Result">Save</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                </form>
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
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery validate js -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>


</body>

</html>