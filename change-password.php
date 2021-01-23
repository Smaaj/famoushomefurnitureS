<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/prettyPhoto.css" rel="stylesheet">
  <link href="css/price-range.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
  <link rel="shortcut icon" href="images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

</head>
<body>
  <header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
      <div class="container">
        <div class="row">
          <?php include 'mainheader\header.php';?>
        </div>
      </div>
    </div><!--/header_top-->
  </header><!--/header-->

  <!-- Validate Input -->
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('process-change-password.php');
  } // End of the main Submit conditional.
  ?>


  <section id="form"><!--form-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="signup-form"><!--sign up form-->
            <h2 class="text-center">Change Password!</h2>
            <form action="change-password.php" method="post" name="regform" id="regform"
            onsubmit="return checked();">
            <!--Email-->
            <input type="email" id="email" class="form-control" name="email" placeholder="Email*"
            maxlenght="60" required
            value=
            "<?php if (isset($_POST['email']))
            echo htmlspecialchars($_POST['email'], ENT_QUOTES);?>">
            <!--Current Password-->
            <input type="password" id="password" class="form-control" name="password"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}"
            title="One number, one upper, one lower, one special, with 8 to 12 characters"
            placeholder="Current Password*" minlength="8" maxlength="12" required
            value=
            "<?php if (isset($_POST['password']))
            echo htmlspecialchars($_POST['password'], ENT_QUOTES);?>">
            <!--Password1-->
            <input type="password" id="password1" class="form-control" name="password1"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}"
            title="One number, one upper, one lower, one special, with 8 to 12 characters"
            placeholder="New Password" minlength="8" maxlength="12" required
            value=
            "<?php if (isset($_POST['password1']))
            echo htmlspecialchars($_POST['password1'], ENT_QUOTES);?>">
            <span id='message'>Between 8 and 12 characters.</span>
            <!--Password 2-->
            <input type="password" id="password2" class="form-control" name="password2"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}"
            title="One number, one uppercase, one lowercase letter, with 8 to 12 characters"
            placeholder="Confirm password" minlength="8" maxlength="12" required
            value=
            "<?php if (isset($_POST['password2']))
            echo htmlspecialchars($_POST['password2'], ENT_QUOTES);
            ?>">

            <input id="submit" class="btn btn-primary" type="submit" name="submit"
            value="Change Password">
          </form>
        </div><!--/sign up form-->
      </div>
    </div>
  </div>
</section>

<footer id="footer"><!--Footer-->
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <?php include ('templateinfofooter.php');?>
        <?php include ('templatefootertwo.php');?>
        <?php include ('templatefooterthree.php');?>
      </div>
    </div>
  </div>
  <div class="footer-widget">
    <div class="container">
      <div class="row">
        <?php include ('servicefooter.php');?>
        <?php include ('quickshopfooter.php');?>
        <?php include ('Policiesfooter.php');?>
        <?php include ('aboutshopperfooter.php');?>
        <?php include ('aboutshopperfootertwo.php');?>
      </div>
    </div>
  </div>
  <?php include ('mainfooter.php');?>
</footer><!--/Footer-->


<script src="js/verify.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>

</body>
</html>
