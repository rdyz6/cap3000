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
    include('profile_setting.php');
    include('logout.php')
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
  
  <title>Profile | Creative - Bootstrap 3 Responsive Admin Template</title>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>   
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
  <script src="js_profile/profile_function.js"></script>
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

<body onload = "start()">
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
            <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="http://ec2-3-16-54-143.us-east-2.compute.amazonaws.com/capstone/mainPage.php">Home</a></li>
              <li><i class="icon_documents_alt"></i>Pages</li>
              <li><i class="fa fa-user-md"></i>Profile</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <!-- profile-widget -->
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2">
                  <h4><?php echo $_SESSION['fname'];
                            echo " ";
                            echo $_SESSION['lname']; ?></h4>
                  <div class="follow-ava">
                    <img src="img/profile-widget-avatar.png" alt="">
                  </div>
<!--                  <h6>Administrator</h6>-->
                </div>
                <div class="col-lg-4 col-sm-4 follow-info">
                  <p><?php echo $_SESSION['d_word'];?></p>
                  <p>@<?php echo $_SESSION['username'];?></p>
<!--                  <p><i class="fa fa-twitter">jenifertweet</i></p>-->
                  <h6>
                      <span><i class="icon_clock_alt"></i></span>
                      <span  id = "txt"></span>
                      <span><i class="icon_calendar"></i></span>
                      <span id = "DATE"></span>
                      <span><i class="icon_pin_alt"></i>MU</span>
                  </h6>
                </div>
                <div class="col-lg-2 col-sm-6 follow-info weather-category">
                  <ul>
                    <li class="active">

                      <i class="fa fa-comments fa-2x"> </i><br> one
                    </li>

                  </ul>
                </div>
                <div class="col-lg-2 col-sm-6 follow-info weather-category">
                  <ul>
                    <li class="active">

                      <i class="fa fa-bell fa-2x"> </i><br> Two
                    </li>

                  </ul>
                </div>
                <div class="col-lg-2 col-sm-6 follow-info weather-category">
                  <ul>
                    <li class="active">

                      <i class="fa fa-tachometer fa-2x"> </i><br> Three
                    </li>

                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                  
                  <li class="active">
                    <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Edit Profile
                                      </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Profile
                                      </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#recent-activity">
                                          <i class="icon-home"></i>
                                          Daily Activity
                                      </a>
                  </li>
                  
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                                    <!-- edit-profile -->
                  <div id="edit-profile" class="tab-pane active">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1> Profile Info</h1>
                        <form class="form-horizontal" role="form" method="post" action="profile_setting.php">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Firstname</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="fname" name="fname" pattern="[a-zA-Z]+" title = "Only alphabet is allowed"  maxlength="15" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Last name</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="lname" name="lname" pattern="[a-zA-Z]+" title = "Only alphabet is allowed" maxlength="15" required>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Major</label>
                            <div class="col-lg-6">
                                <select name = "major" id = "major" required>
                                    <option value="">---Please select---</option>
                                    <option value="ComputerScience">Computer  Science</option>
                                    <option value="InformationTechnology">Information Technology</option>
                                    <option value="major1">Major1</option>
                                    <option value="major2">Major2</option>
<!--
                                    <option value="India">India</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Japan">Japan</option>
                                    <option value="German">German</option>
                                    <option value="UnitedKingdom">UnitedKingdom</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Zone">Zone</option>
                                    <option value="Korea">Korea</option>
-->
                                </select>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Birthday</label>
                            <div class="col-lg-6">
                              <input type="date" class="form-control" id="b_year" name="b_year" placeholder="" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Phone</label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" name="phone" id="phone" pattern = "^[0-9]{10}$" title = "Invalid phone number" min = "1000000000" max = "9999999999" required>
                              
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Year in MU</label>
                            <div class="col-lg-6">
                                <select name = "year" id = "year" required>
                                    <option value="">---Please select---</option>
                                    <option value="Freshman">Freshman</option>
                                    <option value="Sophomore">Sophomore</option>
                                    <option value="Junior">Junior</option>
                                    <option value="Senior">Senior</option>
                                </select>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Graduate Year</label>
                            <div class="col-lg-6">
                              <input type="date" class="form-control" id="g_year" name="g_year" placeholder=" " required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">GPA</label>
                            <div class="col-lg-6">
                              <input type="number" class="form-control" min = "0" max = "4" step= "0.01" name="gpa" id="gpa" placeholder="Your GPA" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Description</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="description" name="d_word"  title = "100 word is the max size"  maxlength="100" required >
                            </div>
                          </div>
                          
                        

                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              
                                  <button type="submit" name="profile_save" class="btn btn-primary">Save</button>
                              
                              
                              <button type="button" name="profile_cancel" class="btn btn-danger">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </section>
                  </div>
                  <div id="recent-activity" class="tab-pane">
                    <div class="profile-activity">
                      <div class="act-time">
                        <div class="activity-body act-in">
                          <span class="arrow"></span>
                          <div class="text">
                            <a href="#" class="activity-img"><img class="avatar" src="img/profile-widget-avatar.png" alt=""></a>
                            <p class="attribution"><a href="#"><?php echo $_SESSION['username']; ?></a> at 5:25am, 30th Octmber 2014</p>
                            <p>Pellentesque.</p>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <!-- profile -->
                  <div id="profile" class="tab-pane">
                    <section class="panel">
                      <div class="bio-graph-heading">
                        <p><?php echo $_SESSION['d_word'];?></p>
                      </div>
                      <div class="panel-body bio-graph-info">
                        <h1>Student Profile</h1>
                        <div class="row">
                          <div class="bio-row">
                            <p><span>First Name </span>: <?php echo $_SESSION['fname'];?> </p>
                          </div>
                          <div class="bio-row">
                            <p><span>Last Name </span>: <?php echo $_SESSION['lname'];?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Email </span>:<?php echo $_SESSION['email'];?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Phone </span>: <?php echo $_SESSION['phone'];?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Birthday</span>: <?php echo $_SESSION['birthday'];?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Year in MU</span>: <?php echo $_SESSION['y_mu'];?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Graduate date </span>: <?php echo $_SESSION['graduateday'];?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>GPA</span>: <?php echo $_SESSION['gpa'];?></p>
                          </div>
<!--
                            $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['major'] = $major;
    $_SESSION['birthday'] = $birthday;
    $_SESSION['phone'] = $phone;
    $_SESSION['email'] = $email;
    $_SESSION['yearsinmu'] = $yearsinmu;
    $_SESSION['graduateday'] = $graduateday;
    $_SESSION['gpa'] = $gpa;
    $_SESSION['d_word'] = $d_word;
-->
                        </div>
                      </div>
                    </section>
                    <section>
                      <div class="row">
                      </div>
                    </section>
                  </div>

                </div>
              </div>
            </section>
          </div>
        </div>

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
<!--          <a href="https://bootstrapmade.com/">Free Bootstrap Templates</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
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
  <!-- jquery knob -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>

  <script>
    //knob
    $(".knob").knob();
  </script>


</body>

</html>
