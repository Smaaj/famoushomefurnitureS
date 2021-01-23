<?php
//Has the form been submitted?
try {
  require ('../greenh.php'); //Connect to the database
  $errors = array(); //Initialize an error array.
  //---------------------check the entries-------------
  //Is the title present? If it is, sanitize it
  $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
  if ((!empty($title)) && (preg_match('/[a-z\.\s]/i',$title)) &&
  (strlen($title) <= 12)) {
    # code...
    $titletrim = $title;
  }else{
    $titletrim =  NULL;
  }
  //Trim the first name
  $first_name = filter_var( $_POST['first_name'], FILTER_SANITIZE_STRING);
  if ((!empty($first_name)) && (preg_match('/[a-z\s]/i',$first_name)) &&
  (strlen($first_name) <= 30)) {
    # code...
    $first_nametrim = $first_name;
  }else {
    $errors[] = 'First name missing or not alphabetic and space characters. Max 30';
  }
  //Is the middle_name present? If it is, sanitize it
  $middle_name = filter_var($_POST['middle_name'], FILTER_SANITIZE_STRING);
  if ((!empty($middle_name)) && (preg_match('/[a-z\s]/i',$middle_name)) &&
  (strlen($middle_name) <= 30)) {
    $middle_nametrim = $middle_name;
  }else {
    $middle_nametrim = NULL;
  }
  //Is the last_name present? If it is, sanitize it
  $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
  if ((!empty($last_name)) && (preg_match('/[a-z\-\s\']/i', $last_name)) &&
  (strlen($last_name) <= 40)){
    $last_nametrim = $last_name;
  }else {
    $errors[] = 'Last name missing or not alphabetic, dash, quote or space. Max 30.';
  }
  //Check that an email address has been entered
  $emailtrim = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  if ((empty($emailtrim)) || (!filter_var($emailtrim, FILTER_VALIDATE_EMAIL))
  || (strlen($emailtrim > 60))) {
    # code...
    $errors[] = 'You forgot to enter your email address';
    $errors[] = 'or the e-mail format is incorrect.';
  }
  // Check for a password and match against the confirmed password:
  $password1trim = filter_var($_POST['password1'], FILTER_SANITIZE_STRING);
  $string_length = strlen($password1trim);
  if (empty($password1trim)) { //
    $errors[] = 'Please enter a valid password';
    # code...
  }else {
    if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,12}$/',
    $password1trim)){//
      $errors[] = 'Invalid password, 8 to 12 chars, one upper, one lower, one number, one special.';
    }else {
      $password2trim = filter_var ( $_POST['password2'], FILTER_SANITIZE_STRING);
      if ($password1trim === $password2trim) {
        $password = $password1trim;
      }else {
        $errors[] = 'Your two password do not match.';
        $errors[] = 'Please try again';
      }
    }
  }
  //Is the phone number present? If it is, sanitize it
  $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
  if ((!empty($phone)) && (strlen($phone) <= 30)) {
    $phonetrim = (filter_var($phone, FILTER_SANITIZE_NUMBER_INT));
    $phonetrim = preg_replace('/[^0-9]/', '', $phonetrim);
    # code...
  }else {
    $phonetrim = NULL;
  }
  //Is the zip code or post code present? If it is, sanitize it
  $zcode_pcode = filter_var($_POST['zcode_pcode'], FILTER_SANITIZE_STRING);
  $string_length = strlen($zcode_pcode);
  if ((!empty($zcode_pcode)) && (preg_match('/[a-z0-9\s]/i', $zcode_pcode)) &&
  ($string_length <= 30) && ($string_length >= 5)) {
    # code...
    $zcode_pcodetrim = $zcode_pcode;
  }else {
    $errors[] = 'Missing zip code or post code. Alphabetic, numeric, space only max 30 characters';
  }
  //Is the country present? If it is, sanitize it
  $country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
  if ((!empty($country)) && (preg_match('/[a-z\.\s]/i', $country)) &&
  (strlen($country) <= 30)) {
    # code...
    $countrytrim = $country;
  }else {
    $errors[] = 'Missing country. only alphabetic, period and space. Max 30.';
  }
  //Is the state present? If it is, sanitize it
  $state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
  if ((!empty($state)) && (preg_match('/[a-z\.\s]/i', $state)) &&
  (strlen($state) <= 30)) {
    # code...
    $statetrim = $state;
  }else {
    $errors[] = 'Missing state. only alphabetic, period and space. Max 30.';
  }
  //Is the 1st address present? If it is, sanitize it
  $address1 = filter_var($_POST['address1'], FILTER_SANITIZE_STRING);
  if ((!empty($address1)) && (preg_match('/[a-z0-9\.\s\,\-]/i', $address1)) &&
  (strlen($address1) <= 30)) {
    # code...
    $address1trim = $address1;
  }else {
    $errors[] = 'Missing address. Only numeric, alphabetic, period, comma, dash and space. Max 30.';
  }
  //If the 2nd address is present? If it is, sanitize it
  $address2 = filter_var($_POST['address2'], FILTER_SANITIZE_STRING);
  if ((!empty($address2)) && (preg_match('/[a-z0-9\.\s\,\-]/i', $address2)) &&
  (strlen($address2) <= 30)){
    $address2trim = $address2;
  }else{
    $address2trim = NULL;
  }
  //Is the Mobile phone number present? If it is, sanitize it
  $mobile_phone = filter_var($_POST['mobile_phone'], FILTER_SANITIZE_STRING);
  if ((!empty($mobile_phone)) && (strlen($mobile_phone) <= 30)) {
    $mobile_phonetrim = (filter_var($mobile_phone, FILTER_SANITIZE_NUMBER_INT));
    $mobile_phonetrim = preg_replace('/[^0-9]/', '', $mobile_phonetrim);
    # code...
  }else {
    $errors[] = 'Missing Mobile Number. Only numeric,Max 30.';
  }
  //Is the fax number present? If it is, sanitize it
  $phone = filter_var($_POST['fax'], FILTER_SANITIZE_STRING);
  if ((!empty($fax)) && (strlen($fax) <= 30)) {
    $faxtrim = (filter_var($fax, FILTER_SANITIZE_NUMBER_INT));
    $faxtrim = preg_replace('/[^0-9]/', '', $faxtrim);
    # code...
  }else {
    $faxtrim = NULL;
  }
  if (empty($errors)) {// If everything's OK.
    //If no problems encountered, register user in the database
    //Determine whether the email address has already been registered
    # code...
    $query = "SELECT userid FROM users WHERE email = ?";
    $q = mysqli_stmt_init($dbcon);
    mysqli_stmt_prepare($q, $query);
    mysqli_stmt_bind_param($q, 's', $emailtrim);
    mysqli_stmt_execute($q);
    $result = mysqli_stmt_get_result($q);

    if (mysqli_num_rows($result) == 0) {//The email address has not been registered
      //already therefore register the user in the users table
      //-------------Valid Entries - Save to database -----
      //Start of the SUSSESSFUL SECTION. i.e. all the required fields were filled out
      # code...
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      //Register the user in the database...

      $query = "INSERT INTO users (userid, title, first_name, middle_name, last_name, email, password, phone,";
        $query .= " zcode_pcode, country, state, address1, address2, mobile_phone, fax, registration_date)";
        $query .= "VALUES ";
        $query .= "('',?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())";
        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);
        // use prepared statement to insure that only text is inserted
        // bind fields to SQL Statement
        mysqli_stmt_bind_param($q, 'ssssssssssssss',
        $titletrim, $first_nametrim, $middle_nametrim, $last_nametrim, $emailtrim,
        $hashed_password, $phonetrim, $zcode_pcodetrim, $countrytrim, $statetrim,
        $address1trim, $address2trim, $mobile_phonetrim, $faxtrim);
        // execute query
        mysqli_stmt_execute($q);
        if(mysqli_stmt_affected_rows($q) == 1) {
          header("location: register-thanks.php");
        } else {
          $errorstring = "System is busy, please try later";
          echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
        }
      }else {
        $errorstring = 'The email address is already registered.';
        echo "<div class='register-req'>
        <p style='color:red'>$errorstring</p>
        </div>";
      }
    }else {
      $errorstring = 'Error! The following error(s) occurred: ';
      foreach($errors as $msg){
        $errorstring .= " - $msg<br>\n";
      }
      $errorstring .= 'Please try again.';
      echo "<p class='text-center col-sm-2' style='color:red'>$errorstring</p>";
    }
  } catch (Exception $e) {
    //throw $th;
    print "The system is busy, please try later";
  }catch (Error $e)
  {
    print "The system is busy, please come back later";
  }
  ?>
