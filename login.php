<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | FamousHomeFurniture</title>
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
          <?php include 'mainheader/header.php';?>
        </div>
      </div>
    </div><!--/header_top-->
  </header><!--/header-->

  <!-- Validate Input -->
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('process-login.php');
  } // End of the main Submit conditional.
  ?>


  <section id="form"><!--form-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="signup-form"><!--sign up form-->
            <h2 class="text-center">Login</h2>
            <div class="companyinfo text-center">
                <h2><a href="index.php"><span>f</span>amous<span>h</span>ome<span>f</span>urniture</a></h2>
                <p>We believe that strong communities and good business are inextricably linked.</p>
            </div>
            <form action="login.php" method="post" name="loginform" id="loginform">
            <!--Email-->
            <input type="email" id="email" class="form-control" name="email" placeholder="Email*"
            maxlenght="60" required
            value=
            "<?php if (isset($_POST['email']))
            echo htmlspecialchars($_POST['email'], ENT_QUOTES);?>">
            <!--Password1-->
            <input type="password" id="password" class="form-control" name="password"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}"
            title="One number, one upper, one lower, one special, with 8 to 12 characters"
            placeholder="Password" minlength="8" maxlength="12" required
            value=
            "<?php if (isset($_POST['password']))
            echo htmlspecialchars($_POST['password'], ENT_QUOTES);?>">
            <span id='message'>Between 8 and 12 characters.</span>

            <input id="submit" class="btn btn-primary" type="submit" name="submit"
            value="Login">
          </form>
        </div><!--/sign up form-->
      </div>
    </div>
  </div>
</section>

  <!-- Right-side Column Content Section -->
  <?php
  if(!isset($errorstring)){
      echo '<footer id="footer">';
      echo '<div class="footer-top">';
        echo '<div class="container">';
          echo '<div class="row">';
                        include ('mainfooter/templateinfofooter.php');
                        include ('mainfooter/templatefootertwo.php');
                        include ('mainfooter/templatefooterthree.php');
                  echo '</div>';
        echo '</div>';
          echo '</div>';
      echo '<div class="footer-widget">';
    echo '<div class="container">';
      echo '<div class="row">';
                      include ('mainfooter/servicefooter.php');
                      include ('mainfooter/quickshopfooter.php');
                      include ('mainfooter/policiesfooter.php');
                      include ('mainfooter/aboutshopperfooter.php');
                      include ('mainfooter/aboutshopperfootertwo.php');
              echo '</div>';
    echo '</div>';
      echo '</div>';
  }else{
      echo '<footer class="footer-bottom container row pull-left pull-right"
       style= "color:red;">';
  }
          include ('mainfooter/mainfooter.php');
  echo'</footer>';
  ?>



<script src="js/verify.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>

</body>
</html>
