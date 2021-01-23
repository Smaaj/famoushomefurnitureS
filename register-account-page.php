<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //require("cap.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Registration | FamousHomeFurniture</title>
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
</head><!--/head-->

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


    <section id="cart_items">
      <div class="container">
        <div class="breadcrumbs">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Registration</li>
          </ol>
        </div><!--/breadcrums-->


        <div class="step-one">
          <h2 class="heading">Registration Form</h2>
        </div>
        <div class="checkout-options">
          <h3>New User Signup!</h3>
          <p>Welcome to Registration Page</p>
          <!-- <ul class="nav">
            <li>
              <label><input type="checkbox"> Administration Side</label>
            </li>
            <li>
              <label><input type="checkbox"> User Or Buyer Side</label>
            </li>
            <li>
              <a href="register-account-page.php"><i class="fa fa-times"></i>Cancel</a>
            </li>
          </ul> -->
        </div><!--/checkout-options-->

        <div class="register-req">
          <p>Feelfree Registered for User Or Buyer Side.</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
          <div class="row">
            <div class="col-sm-3">
              <div class="shopper-info">
                <p>Latest Items Here!</p>
                <form>
                  <div class="shipping text-center"><!--shipping-->
                    <img src="images/home/shipping.jpg" alt="" />
                    <img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
                  </div><!--/shipping-->
                </form>
              </div>
            </div>
            <!--Validate Input-->
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
              require('process-register-page.php');
            }//End of the main submit conditional.
            ?>
            <div class="col-sm-5 clearfix">
              <div class="bill-to" >
                <p>Fill Following Text Boxes.</p>
                <div class="form-one">
                  <form action="register-account-page.php" method="post" onsubmit="return checked();"
                  name="regform" id="regform">
                  <!--Title-->
                  <input type="text" class="form-control" placeholder="Title" id="title" name="title"
                  pattern='[a-zA-Z][a-zA-Z\s\.]*' title="Alphabetic, period and space max 12 characters"
                  value=
                  "<?php if (isset($_POST['title']))
                  echo htmlspecialchars($_POST['title'], ENT_QUOTES);?>">
                  <!--First Name-->
                  <input type="text" id="first_name" class="form-control" name="first_name" pattern="[a-zA-Z][a-zA-Z\s]*"
                  title="Alphabetic and space only max of 30 characters"
                  placeholder="First Name *" maxlength="30" required
                  value=
                  "<?php if(isset($_POST['first_name']))
                  echo htmlspecialchars($_POST['first_name'], ENT_QUOTES);?>" >
                  <!--Middle Name-->
                  <input type="text" id="middle_name" class="form-control" name="middle_name" pattern="[a-zA-Z][a-zA-Z\s]*"
                  title="Alphabatic and space only max of 30 characters" placeholder="Middle Name"
                  maxlength="30" value=
                  "<?php if (isset($_POST['middle_name']))
                  echo htmlspecialchars($_POST['middle_name'], ENT_QUOTES);?>">
                  <!--Last Name-->
                  <input type="text" id="last_name" class="form-control" name="last_name" pattern="[a-zA-Z][a-zA-Z\s]*"
                  title="Alphabatic and space only max of 40 characters" placeholder="Last Name *"
                  maxlength="40" required value=
                  "<?php if(isset($_POST['last_name']))
                  echo htmlspecialchars($_POST['last_name'], ENT_QUOTES);?>">
                  <!--Email-->
                  <input type="email" id="email" class="form-control" name="email" placeholder="Email*"
                  maxlenght="60" required
                  value=
                  "<?php if (isset($_POST['email']))
                  echo htmlspecialchars($_POST['email'], ENT_QUOTES);?>">
                  <!--Password1-->
                  <input type="password" id="password1" class="form-control" name="password1"
                  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}"
                  title="One number, one upper, one lower, one special, with 8 to 12 characters"
                  placeholder="Password" minlength="8" maxlength="12" required
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
                  <!--Phone-->
                  <input type="tel" id="phone" class="form-control" name="phone" placeholder="Phone *"
                  maxlength="30" value=
                  "<?php
                  if (isset($_POST['phone']))
                  echo htmlspecialchars($_POST['phone'], ENT_QUOTES);
                  ?>">
                  <!--Zip Code Postal Code-->
                  <input type="text" id="zcode_pcode" class="form-control" name="zcode_pcode"
                  pattern="[a-zA-Z0-9][a-zA-Z0-9\s]*"
                  title="Alphabetic, period and space only max of 30 characters"
                  placeholder="Zip / Postal Code *" minlength="5" maxlength="20" required
                  value=
                  "<?php if(isset($_POST['zcode_pcode']))
                  echo htmlspecialchars($_POST['zcode_pcode'], ENT_QUOTES);
                  ?>">
                  <!--Country-->
                  <input type="text" id="country" class="form-control" name="country"
                  pattern="[a-zA-Z][a-zA-Z\s\.]*"
                  title="Alphabetic, period and space only max of 30 characters"
                  placeholder="Country Name" maxlength="30" required
                  value=
                  "<?php if(isset($_POST['country']))
                  echo htmlspecialchars($_POST['country'], ENT_QUOTES);
                  ?>">
                  <!--State-->
                  <input type="text" id="state" class="form-control" name="state"
                  pattern="[a-zA-Z][a-zA-Z\s\.]*"
                  title="Alphabetic, period and space only max of 30 characters"
                  placeholder="State Name" maxlength="30" required
                  value=
                  "<?php if(isset($_POST['state']))
                  echo htmlspecialchars($_POST['state'], ENT_QUOTES);?>">
                  <!--address1-->
                  <input type="text" id="address1" class="form-control" name="address1"
                  pattern="[a-zA-Z0-9][a-zA-Z0-9\s\.\,\-]*"
                  title="Alphabetic, numbers, period, comma, dash, and space only max of 30 characters"
                  placeholder="Address*" maxlength="30" required
                  value=
                  "<?php if(isset($_POST['address1']))
                  echo htmlspecialchars($_POST['address1'], ENT_QUOTES);?>">
                  <!--address2-->
                  <input type="text" id="address2" class="form-control" name="address2"
                  pattern="[a-zA-Z0-9][a-zA-Z0-9\s\.\,\-]*"
                  title="Alphabetic, numbers, period, comma, dash, and space only max of 30 characters"
                  placeholder="Address 2" maxlength="30" required
                  value=
                  "<?php if(isset($_POST['address2']))
                  echo htmlspecialchars($_POST['address2'], ENT_QUOTES);?>">
                  <!--Mobile Phone-->
                  <input type="tel" id="mobile_phone" class="form-control" name="mobile_phone" placeholder="Mobile Phone*"
                  maxlength="30" value=
                  "<?php
                  if (isset($_POST['mobile_phone']))
                  echo htmlspecialchars($_POST['mobile_phone'], ENT_QUOTES);
                  ?>">
                  <!--Fax-->
                  <input type="tel" id="fax" class="form-control" name="fax" placeholder="fax"
                  maxlength="30" value=
                  "<?php
                  if (isset($_POST['fax']))
                  echo htmlspecialchars($_POST['fax'], ENT_QUOTES);
                  ?>">
                  <input id="submit" class="btn btn-primary" type="submit" name="submit" value="Register">
                </form>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="order-message">
              <p>Feature Items Here!</p>
              <img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
              <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> <!--/#cart_items-->



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
