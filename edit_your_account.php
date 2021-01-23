<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
//require("cap.php");
}										
session_start();
//                                                                #1
if (isset($_SESSION['user_id']) && ($_SESSION['user_level'] == 0)){
$id = filter_var( $_SESSION['user_id'], FILTER_SANITIZE_STRING);
	define('ERROR_LOG',"errors.log");
} else {
header("Location: login.php");
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
                    <?php include ('membersheaders\members-middle-edit-your-account-header.php');?>
                </div>
			</div>
		</div><!--/header-middle-->
</header>
<!-- Body Section -->
  <div class="row" style="padding-left: 0px;">
<?php
try { 
require ('mysqli-connect.php'); 
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); 
//Is the title present? If it is, sanitize it 
    $title = filter_var( $_POST['title'], FILTER_SANITIZE_STRING);			                                
	if ((!empty($title)) && (preg_match('/[a-z\.\s]/i',$title)) &&
		(strlen($title) <= 12)) {
	//Sanitize the trimmed title		
	$titletrim = $title;							
	}else{	
	$titletrim = NULL; // Title is optional
	}
// Trim the first name
   $first_name = filter_var( $_POST['first_name'], FILTER_SANITIZE_STRING);	
if ((!empty($first_name)) && (preg_match('/[a-z\s]/i',$first_name)) &&
		(strlen($first_name) <= 30)) {				
	//Sanitize the trimmed first name
    $first_nametrim = $first_name;		
	}else{	
	$errors[] = 'First name missing or not alphabetic and space characters. Max 30';
	}
	//Is the last name present? If it is, sanitize it
	$last_name = filter_var( $_POST['last_name'], FILTER_SANITIZE_STRING);			
if ((!empty($last_name)) && (preg_match('/[a-z\-\s\']/i',$last_name)) &&
		(strlen($last_name) <= 40)) {					
	//Sanitize the trimmed last name
    $last_nametrim = $last_name;				
	}else{	
	$errors[] = 'Last name missing or not alphabetic, dash, quote or space. Max 30.';
	}
// Check that an email address has been entered				
  $emailtrim = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);	
	if  ((empty($emailtrim)) || (!filter_var($emailtrim, FILTER_VALIDATE_EMAIL))
			|| (strlen($emailtrim > 60))) {
		$errors[] = 'You forgot to enter your email address';
		$errors[] = ' or the e-mail format is incorrect.';
	}

//Is the 1st address present? If it is, sanitize it
$address1 = filter_var( $_POST['address1'], FILTER_SANITIZE_STRING);			
if ((!empty($address1)) && (preg_match('/[a-z0-9\.\s\,\-]/i', $address1)) &&
  (strlen($address1) <= 30)) {					
	//Sanitize the trimmed 1st address
    $address1trim = $address1;						
	}else{	
	$errors[] = 'Missing address. Only numeric, alphabetic, period, comma, dash and space. Max 30.';
	}

//If the 2nd address is present? If it is, sanitize it          #10
$address2 = filter_var( $_POST['address2'], FILTER_SANITIZE_STRING);	
if ((!empty($address2)) && (preg_match('/[a-z0-9\.\s\,\-]/i', $address2)) &&
  (strlen($address2) <= 30)) {				
	//Sanitize the trimmed 2nd address
	$address2trim = $address2;	
	}else{	
	$address2trim = NULL;
	}
//Is the state present? If it is, sanitize it
$state = filter_var( $_POST['state'], FILTER_SANITIZE_STRING);			
if ((!empty($state)) && (preg_match('/[a-z\.\s]/i', $state)) &&
  (strlen($state) <= 30)) {					
	//Sanitize the trimmed state						
	$statetrim = $state;							
	}else{	
	$errors[] = 'Missing state. Only alphabetic, period and space. Max 30.';
	}
//Is the state or country present? If it is, sanitize it
$country = filter_var( $_POST['country'], FILTER_SANITIZE_STRING);		
if ((!empty($country)) && (preg_match('/[a-z\.\s]/i', $country)) &&
    (strlen($country) <= 30))	 {				
	//Sanitize the trimmed state or country	
    $countrytrim = $country;						
	}else{	
	$errors[] = 'Missing state/country. Only alphabetic, period and space. Max 30.';
	}
//Is the zip code or post code present? If it is, sanitize it
$zcode_pcode = filter_var( $_POST['zcode_pcode'], FILTER_SANITIZE_STRING);	
$string_length = strlen($zcode_pcode);
if ((!empty($zcode_pcode)) && (preg_match('/[a-z0-9\s]/i', $zcode_pcode))  &&
   ($string_length <= 30) && ($string_length >= 5)) {						
	//Sanitize the trimmed zcode_pcode
    $zcode_pcodetrim = $zcode_pcode;							
	}else{	
	$errors[] = 'Missing zip code or post code. Alphabetic, numeric, space only max 30 characters';
	}
//Is the phone number present? If it is, sanitize it 
$phone = filter_var( $_POST['phone'], FILTER_SANITIZE_STRING);	    		
if ((!empty($phone)) && (strlen($phone) <= 30)) {					
	//Sanitize the trimmed phone number	
	$phonetrim = (filter_var($phone, FILTER_SANITIZE_NUMBER_INT));
    $phonetrim = preg_replace('/[^0-9]/', '', $phonetrim);		
	}else{	
	$phonetrim = NULL;
	}
	if (empty($errors)) { // If everything's OK.
		//  make the query
		$q = mysqli_stmt_init($dbcon);
		$query = 'SELECT userid FROM users WHERE email=? AND userid !=?';
         mysqli_stmt_prepare($q, $query);

        // bind $id to SQL Statement
		mysqli_stmt_bind_param($q, 'si', $emailtrim, $id);
		
       // execute query
	   
       mysqli_stmt_execute($q);
	   $result = mysqli_stmt_get_result($q);

if (mysqli_num_rows($result) == 0) { // e-mail does not exist in another record
		// Make the update query:                                     #5
		
		 $query = 'UPDATE users SET title=?, first_name=?, last_name=?, email=?, ';
		 $query .='address1=?, address2=?, state=?, country=?, zcode_pcode=?, ';
		 $query .='phone=?';
         $query .= ' WHERE userid=?';
		 $q = mysqli_stmt_init($dbcon);
         mysqli_stmt_prepare($q, $query);

        // bind values to SQL Statement
	
		mysqli_stmt_bind_param($q, 'ssssssssssi', $titletrim, $first_nametrim, $last_nametrim, 
			$emailtrim, $address1trim, $address2trim, $statetrim, $countrytrim, 
			$zcode_pcodetrim, $phonetrim, $id);
       // execute query
	   
       mysqli_stmt_execute($q);   
			if (mysqli_stmt_affected_rows($q) == 1) { // Update OK
	
			// Echo a message if the edit was satisfactory:
                $errorstring = 'The user has been edited.';
				echo "<p class=' text-center col-sm-2' style='color:green'>$errorstring</p>";
						} else { // Echo a message if the query failed.
				$errorstring = 'The user could not be edited. Did you change anything?';
                $errorstring .= ' We apologize for any inconvenience.'; // Public message.
				echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
				//echo '<p>' . mysqli_error($dbcon) . '<br />Query: ' . $q . '</p>'; // Debugging message.
				// Message above is only for debug and should not display sql in live mode
			}
		}
		} else { // Display the errors.
		// ---------------Process User Errors---------------
		// Display the users entry errors
		$errorstring = 'Error! The following error(s) occurred: ';
		foreach ($errors as $msg) { // Print each error.				
		$errorstring .= " - $msg<br>\n";
		}
		$errorstring .= 'Please try again.';
		echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
		}// End of if (empty($errors)) IF.
} // End of the conditionals
// Select the user's information:                                                       #6

$query = "SELECT title, first_name, last_name, email, address1, address2, state, country, zcode_pcode, phone ";
$query .=" FROM users WHERE userid=?";	
// id was retrieved from database prepared not needed	
   $q = mysqli_stmt_init($dbcon);
   mysqli_stmt_prepare($q, $query);

        // bind $id to SQL Statement
		mysqli_stmt_bind_param($q, 'i', $id);
		
       // execute query
	   
       mysqli_stmt_execute($q);
	   $result = mysqli_stmt_get_result($q);

if (mysqli_num_rows($result) == 1) { // Valid user ID, display the form.
	// Get the user's information:
	$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
	// Create the form: 	#7
	
	
?>
  <!-- Validate Input -->
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
<h2 class="h2 text-center">Edit Your Account Details</h2>
<h3 class="text-center">For your own security, please remember to log out!</h3>

<form action="edit_your_account.php" method="post"
name="editform" id="editform">
 <div class="form-group row">
    <label for="title" class="col-sm-4 col-form-label text-right">Title:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="title" name="title" 
	  placeholder="Title" maxlength="12"
	  pattern='[a-zA-Z][a-zA-Z\s\.]*' 
	  title="Alphabetic, period and space max 12 characters"
	   value=
		"<?php if (isset($row['title'])) 
		echo htmlspecialchars($row['title'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="first_name" class="col-sm-4 col-form-label text-right">First Name*:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="first_name" name="first_name" 
	  pattern="[a-zA-Z][a-zA-Z\s]*" title="Alphabetic and space only max of 30 characters"
	  placeholder="First Name" maxlength="30" required
	   value=
		"<?php if (isset($row['first_name'])) 
		echo htmlspecialchars($row['first_name'], ENT_QUOTES); ?>" >
    </div>
  </div>
 <div class="form-group row">
    <label for="last_name" class="col-sm-4 col-form-label text-right">Last Name*:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="last_name" name="last_name" 
	  pattern="[a-zA-Z][a-zA-Z\s\-\']*" 
	  title="Alphabetic, dash, quote and space only max of 40 characters"
	  placeholder="Last Name" maxlength="40" required
	  value=
		"<?php if (isset($row['last_name'])) 
		echo htmlspecialchars($row['last_name'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label text-right">E-mail*:</label>
    <div class="col-sm-5">
      <input type="email" class="form-control" id="email" name="email" 
	  placeholder="E-mail" maxlength="60" required
	   value=
		"<?php if (isset($row['email'])) 
		echo htmlspecialchars($row['email'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="address1" class="col-sm-4 col-form-label text-right">Address*:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="address1" name="address1" 
	  pattern="[a-zA-Z0-9][a-zA-Z0-9\s\.\,\-]*" 
	  title="Alphabetic, numbers, period, comma, dash and space only max of 30 characters" 
	  placeholder="Address" maxlength="30" required
	   value=
		"<?php if (isset($row['address1'])) 
		echo htmlspecialchars($row['address1'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="address2" class="col-sm-4 col-form-label text-right">Address:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="address2" name="address2" 
	  pattern="[a-zA-Z0-9][a-zA-Z0-9\s\.\,\-]*" 
	  title="Alphabetic, numbers, period, comma, dash and space only max of 30 characters" 
	  placeholder="Address" maxlength="30"
	   value=
		"<?php if (isset($row['address2'])) 
		echo htmlspecialchars($row['address2'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="state" class="col-sm-4 col-form-label text-right">state*:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="state" name="state" 
	  pattern="[a-zA-Z][a-zA-Z\s\.]*" 
	  title="Alphabetic, period and space only max of 30 characters" 
	  placeholder="state" maxlength="30" required
	   value=
		"<?php if (isset($row['state'])) 
		echo htmlspecialchars($row['state'], ENT_QUOTES); ?>" >
    </div>
  </div>
<div class="form-group row">
    <label for="country" class="col-sm-4 col-form-label text-right">
	Country/state*:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="country" name="country"
      pattern="[a-zA-Z][a-zA-Z\s\.]*" 
	  title="Alphabetic, period and space only max of 30 characters" 
	  placeholder="State or Country" maxlength="30" required
	   value=
		"<?php if (isset($row['country'])) 
		echo htmlspecialchars($row['country'], ENT_QUOTES); ?>" >
    </div>
  </div>	
<div class="form-group row">
    <label for="zcode_pcode" class="col-sm-4 col-form-label text-right">
	Zip/Postal Code*:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="zcode_pcode" name="zcode_pcode" 
	  pattern="[a-zA-Z0-9][a-zA-Z0-9\s]*" 
	  title="Alphabetic, period and space only max of 30 characters" 
	  placeholder="Zip or Postal Code" minlength="5" maxlength="30" required
	   value=
		"<?php if (isset($row['zcode_pcode'])) 
		echo htmlspecialchars($row['zcode_pcode'], ENT_QUOTES); ?>" >
    </div>
  </div>		
<div class="form-group row">
    <label for="phone" class="col-sm-4 col-form-label text-right">Telephone:</label>
    <div class="col-sm-5">
      <input type="tel" class="form-control" id="phone" name="phone" 
	  placeholder="Phone Number" maxlength="30"
	   value=
		"<?php if (isset($row['phone'])) 
		echo htmlspecialchars($row['phone'], ENT_QUOTES); ?>" >
    </div>
	</div>
	<input type="hidden" name="id" value="' . $id . '">
<div class="form-group row">
  <label class="col-sm-4 col-form-label"></label>
  <div class="col-sm-5">
  <div class="float-left g-recaptcha" style="padding-left: 80px;" data-sitekey="6LcrQ1wUAAAAAPxlrAkLuPdpY5qwS9rXF1j46fhq"></div>
  </div>
  </div>
<div class="form-group row">
	<label for="" class="col-sm-4 col-form-label"></label>
    <div class="col-sm-5 text-center">
	<input id="submit" class="btn btn-primary" type="submit" name="submit" value="Edit Your Record">
    </div>
	</div>
	</form>
</div>
</div>
  </div>
  </div>
  </div>
  </div>
</section>
<footer>
<?php

   }

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
}       include ('mainfooter.php');
echo'</footer>';
}
catch(Exception $e) // We finally handle any problems here                
   {
	      // print "An Exception occurred. Message: " . $e->getMessage();
     print "The system is busy please try later";
   //  $date = date(‘m.d.y h:i:s’);
   //  $errormessage = $e->getMessage();
   //  $eMessage = $date . “ | Exception Error | “ , $errormessage . |\n”;
  //   error_log($eMessage,3,ERROR_LOG);
     // e-mail support person to alert there is a problem
   //  error_log(“Date/Time: $date – Exception Error, Check error log for
//details”, 1, noone@helpme.com, “Subject: Exception Error \nFrom: Error Log <errorlog@helpme.com>” . “\r\n”);

   }
   catch(Error $e)
   {
           // print "An Error occurred. Message: " . $e->getMessage();
     print "The system is busy please try later";
    // $date = date(‘m.d.y h:i:s’);
    // $errormessage = $e->getMessage();
    // $eMessage = $date . “ | Error | “ , $errormessage . |\n”;
    // error_log($eMessage,3,ERROR_LOG);
    // // e-mail support person to alert there is a problem
   //  error_log(“Date/Time: $date – Error, Check error log for
//details”, 1, noone@helpme.com, “Subject: Error \nFrom: Error Log <errorlog@helpme.com>” . “\r\n”);

   }
 ?>
</body>
</html>