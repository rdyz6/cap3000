<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
</head>
<body class="login-img3-body">

  <div class = "container">
      
      <form class="login-form" method="post" action="register.php">
      <div class="login-wrap">
  	  <?php include('errors.php'); ?>
  	  <div class="input-group">
  	  <label class="input-group">Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Your pawprint" pattern="[A-Za-z0-9]{5}" title="Invalid student name should contain 5 characters"  ng-required = "true">
  	  </div>
  	  <div class="input-group">
  	  <label class="input-group">Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Your Email address" title="invalid E-mail address"  ng-required = "true">
  	  </div>
  	  <div class="input-group">
  	  <label class="input-group">Password</label>
  	  <input type="password" name="password_1">
  	  </div>
  	  <div class="input-group">
  	  <label class="input-group">Confirm password</label>
  	  <input type="password" name="password_2">
  	  </div>
  	  <div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	  </div>
  	  <p>
  		Already a member? <a href="index.php">Sign in</a>
  	  </p>
      </div>
      </form>
      
      
  </div>
</body>
</html>