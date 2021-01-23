<?php
// session_start();
// if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
// { header("Location: login.php");
// exit();
// }
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
          <?php include 'mainheader\header.php';?>
        </div>
      </div>
    </div><!--/header_top-->
  </header><!--/header-->
  <!-- Validate Input -->
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {                                //#1
    require('process-view_found_addresses.php');
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
            <div class="col-sm-12">
              <div class="h2 text-center">
                <h5>Search for an Address or Phone Number</h5>
                <h5 style="color: red;">Both Names are required items</h5>
              </div>
              <form action="view_found_addresses.php" method="post" name="searchform" id="searchform">
                <div class="form-group row">
                  <label for="first_name" class="col-sm-4 col-form-label text-right">First Name:</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" maxlength="30" required
                    value="<?php if (isset($_POST['first_name']))
                    echo htmlspecialchars($_POST['first_name'], ENT_QUOTES);?>"/>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="last_name" class="col-sm-4 col-form-label text-right">Last Name:</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="last_name" name="last_name"
                    placeholder="Enter Last Name" maxlength="40" required
                    value=
                    "<?php if (isset($_POST['last_name']))
                    echo htmlspecialchars($_POST['last_name'], ENT_QUOTES); ?>" >
                  </div>
                </div>
                <div class="form-group row">
                  <label for="l" class="col-sm-4 col-form-label"></label>
                  <div class="col-sm-5">
                    <input id="submit" class="btn btn-primary" type="submit" name="submit" value="Search">
                  </div>
                </div>
              </form>
            </div>
          </div>
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
                        include ('templateinfofooter.php');
                        include ('templatefootertwo.php');
                        include ('templatefooterthree.php');
                  echo '</div>';
        echo '</div>';
          echo '</div>';
      echo '<div class="footer-widget">';
    echo '<div class="container">';
      echo '<div class="row">';
                      include ('servicefooter.php');
                      include ('quickshopfooter.php');
                      include ('Policiesfooter.php');
                      include ('aboutshopperfooter.php');
                      include ('aboutshopperfootertwo.php');
              echo '</div>';
    echo '</div>';
      echo '</div>';
  }else{
      echo '<footer class="footer-bottom container row pull-left pull-right"
       style= "color:red;">';
  }
          include ('mainfooter.php');
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
