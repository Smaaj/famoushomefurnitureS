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
    <title>View Search Users | FamousHomeFurniture</title>
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
                    <?php include 'header-for-registration.php';?>
                </div>
		    </div>
        </div><!--/header_top-->
       <div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
                    <?php include('admin-header.php');?>
                </div>
			</div>
		</div><!--/header-middle-->
        <div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
                    <?php include('admin-search-header.php');?>
                </div>
			</div>
		</div><!--/header-bottom-->
    </header><!--/header-->

    <section id="cart_items">
      <div class="container">
        <div class="breadcrumbs">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">View Users Table</li>
          </ol>
        </div><!--/breadcrums-->


        <div class="step-one">
          <h2 class="heading">Registrated Memebers</h2>
        </div>
        <div class="col-sm-12">
        <h2 class="text-center">These are the registered users</h2>
        <p>
            <?php 
                require ("process_view_found_record.php");
            ?>
        </div>