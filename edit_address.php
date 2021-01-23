<?php                                                                       
session_start();
if (!isset($_SESSION['user_level']) || ($_SESSION['user_level'] != 1))
{ header("Location: login.php");
 exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User | FamousHomeFurniture</title>
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
    <div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
                    <?php include ('admin-header.php');?>
                </div>
			</div>
		</div><!--/header-middle-->
  </header><!--/header-->
<!-- Center Column Content Section -->
<section id="form"><!--form-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="signup-form"><!--sign up form-->
            <h2 class="text-center">Edit Addresses</h2>
            <div class="companyinfo text-center">
                <h2><a href="index.php"><span>f</span>amous<span>h</span>ome<span>f</span>urniture</a></h2>
                <p>We believe that strong communities and good business are inextricably linked.</p>
            </div>

  <div class="col-sm-12">
    <?php 
    require ("process_edit_address.php");
    ?>
  </div>
  </div>
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


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
