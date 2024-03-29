<?php
try
{
// This script retrieves records from the users table.                         
require ('./mysqli-connect.php'); // Connect to the db.
echo '<p class="text-center">If no record is shown, ';
echo 'this is because you had an incorrect ';
echo ' or missing entry in the search form.';
echo '<br>Click the back button on the browser and try again</p>';
$first_name = htmlspecialchars($_POST['first_name'], ENT_QUOTES);
$last_name = htmlspecialchars($_POST['last_name'], ENT_QUOTES);
// Since it's a prepared statement below this sanitizing is not needed
// However, to consistantly retrieve than sanitize is a good habit

$query = "SELECT userid, title, last_name, first_name, ";
$query .= "address1, address2, country, zcode_pcode, phone ";
$query .= "FROM users WHERE ";
$query .= "last_name=? AND first_name=?";

$q = mysqli_stmt_init($dbcon);
mysqli_stmt_prepare($q, $query);

// bind values to SQL Statement
mysqli_stmt_bind_param($q, 'ss', $last_name, $first_name);

// execute query	 
mysqli_stmt_execute($q); 

$result = mysqli_stmt_get_result($q);

if ($result) { // If it ran, display the records.
// Table header.
echo '<table class="table table-striped table-sm">
<tr>
<th scope="col">Edit</th>
<th scope="col">Title</th>
<th scope="col">Last Name</th>
<th scope="col">First Name</th>
<th scope="col">Address1</th>
<th scope="col">Address2</th>
<th scope="col">Country</th>
<th scope="col">Zip or Postal Code</th>
<th scope="col">Phone</th>
</tr>';	

// Fetch and display the records:
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	// Remove special characters that might already be in table to 
	// reduce the chance of XSS exploits
	$user_id = htmlspecialchars($row['userid'], ENT_QUOTES);
	$title = htmlspecialchars($row['title'], ENT_QUOTES);
	$last_name = htmlspecialchars($row['last_name'], ENT_QUOTES);
	$first_name = htmlspecialchars($row['first_name'], ENT_QUOTES);
	$address1 = htmlspecialchars($row['address1'], ENT_QUOTES);
	$address2 = htmlspecialchars($row['address2'], ENT_QUOTES);
	$country = htmlspecialchars($row['country'], ENT_QUOTES);
	$zcode_pcode = htmlspecialchars($row['zcode_pcode'], ENT_QUOTES);
	$phone = htmlspecialchars($row['phone'], ENT_QUOTES);
	echo '<tr>
	<td scope="row"><a href="edit_address.php?id=' . $user_id . '">Edit</a></td>
	<td scope="row">' . $title . '</td>
	<td scope="row">' . $last_name . '</td>
	<td scope="row">' . $first_name . '</td>
	<td scope="row">' . $address1 . '</td>
	<td scope="row">' . $address2 . '</td>
	<td scope="row">' . $country . '</td>
	<td scope="row">' . $zcode_pcode . '</td>
	<td scope="row">' . $phone . '</td>
	</tr>';	
	}
	echo '</table>'; // Close the table.
	//                                                            
	mysqli_free_result ($result); // Free up the resources.	
} else { // If it did not run OK.
// Public message:
	echo '<p class="center-text">The current users could not be retrieved.';
	echo 'We apologize for any inconvenience.</p>';
	// Debugging message:
	//echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>'; 
	//Show $q is debug mode only
} // End of if ($result). Now display the total number of records/members.
mysqli_close($dbcon); // Close the database connection.
}
catch(Exception $e)
{
print "The system is currently busy. Please try later.";
//print "An Exception occurred.Message: " . $e->getMessage();
}catch(Error $e)
{
print "The system us busy. Please try later.";
//print "An Error occured. Message: " . $e->getMessage();
}
?>