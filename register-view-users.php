<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users | FamousHomeFurniture</title>
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
                    <?php include('membersheaders\members-header-for-bottom.php');?>
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
try {
// This script retrieves all the records from the users table.
require('mysqli-connect.php'); // Connect to the database.
// Make the query:
// Nothing passed from user safe query									#1
$query = "SELECT CONCAT(first_name, ', ', last_name) AS name, ";
$query .= "DATE_FORMAT(registration_date, '%M %d, %Y') AS ";
$query .= "regdat FROM users ORDER BY registration_date ASC";		
$result = mysqli_query ($dbcon, $query); // Run the query.
if ($result) { // If it ran OK, display the records.
// Table header. 									#2
echo '<table class="table table-striped">
<th scope="col">Name</th><th scope="col">Date Registered</th></tr>';				
// Fetch and print all the records:							#3
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
echo '<tr><td>' . $row['name'] . '</td><td>' . $row['regdat'] . '</td></tr>'; }
    echo '</table>'; // Close the table so that it is ready for displaying.
    mysqli_free_result ($result); // Free up the resources.
} else { // If it did not run OK.
// Error message:
echo '<p class="error">The current users could not be retrieved. We apologize';
echo ' for any inconvenience.</p>';
// Debug message:
// echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
exit;
} // End of if ($result) 
mysqli_close($dbcon); // Close the database connection.
}
catch(Exception $e) // We finally handle any problems here                
   {
     // print "An Exception occurred. Message: " . $e->getMessage();
     print "The system is busy please try later";
   }
   catch(Error $e)
   {
      //print "An Error occurred. Message: " . $e->getMessage();
      print "The system is busy please try again later.";
   }
?>
        </div>
</body>
</html>