<html>
<head>
<title> Phone Book Index </title>
</head>
<body>

<!--Heading of application and links to other pages-->
<center>
    <h2 class="c1">Phone Book Application</h3>
	<div class="c2">
	<a href="http://localhost/addcontact.php">Add Contact</a> | <a href="http://localhost/deletecontact.php">Delete Contact</a> | <a href="http://localhost/updatecontact.php">Update Contact</a>
	</div>
</center>
<hr>

<?php

// Start the session
session_start();
//Checks if Session is still active
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
 
//Connecting code to Database
$DB_USER ='root';
$DB_PASSWORD = '';
$DB_HOST = 'localhost';
$DB_NAME ='site';
$db= new mysqli($DB_HOST,$DB_USER, $DB_PASSWORD, $DB_NAME)
or die("Could not connect to MySQL");

// Echo session variables that were set on previous page
$id = $_SESSION["user_id"] ;
$table = 'contacts';

if ($table)
{
//List the Contacts available on the Database
$query = "SELECT contact_id, v_firstName, v_middleName, v_lastName, v_phoneNumber, v_email, v_address, v_city, v_state, v_zipcode FROM $table where user_id='$id'";
$response = @mysqli_query($db, $query);

//count the color$number
$number = 1;

if ($response)
{
echo '<table align="centre" cellspacing="2" cellpadding="5" width="100%">';
echo '<tr> <td align="left"><b>Contact ID</b></td>';
echo '<td align="left"><b>First Name</b></td>';
echo '<td align="left"><b>Middle Name</b></td>';
echo '<td align="left"><b>Last Name</b></td>';
echo '<td align="left"><b>Phone Number</b></td>';
echo '<td align="left"><b>Email</b></td>';
echo '<td align="left"><b>Address</b></td>';
echo '<td align="left"><b>City</b></td>';
echo '<td align="left"><b>State</b></td>';
echo '<td align="left"><b>Zip Code</b></td></tr>';

while($row = mysqli_fetch_array($response))
{
	if ($number % 2 == 0) 
	{
		echo '<tr bgcolor=#8AD3FC><td align="left">'.
		$row['contact_id'].'</td><td align="left">'.
		$row['v_firstName'].'</td><td align="left">'.
		$row['v_middleName'].'</td><td align="left">'.
		$row['v_lastName'].'</td><td align="left">'.
		$row['v_phoneNumber'].'</td><td align="left">'.
		$row['v_email'].'</td><td align="left">'.
		$row['v_address'].'</td><td align="left">'.
		$row['v_city'].'</td><td align="left">'.
		$row['v_state'].'</td><td align="left">'.
		$row['v_zipcode'].'</td><td align="left">';
		echo '</tr>';
	}
		else {
		echo '<tr bgcolor=#FFFFFF><td align="left">'.
		$row['contact_id'].'</td><td align="left">'.
		$row['v_firstName'].'</td><td align="left">'.
		$row['v_middleName'].'</td><td align="left">'.
		$row['v_lastName'].'</td><td align="left">'.
		$row['v_phoneNumber'].'</td><td align="left">'.
		$row['v_email'].'</td><td align="left">'.
		$row['v_address'].'</td><td align="left">'.
		$row['v_city'].'</td><td align="left">'.
		$row['v_state'].'</td><td align="left">'.
		$row['v_zipcode'].'</td><td align="left">';
		echo '</tr>';
	}
		
	$number++;
}
echo '</table>';

}
else{
	echo"No DATABASE";
	//echo mysqli_error($db);
}
}
	else{
		echo "Please Enter your Login Info";
		echo '<h3><a href="http://localhost/phoneBookApp_home.php">Login</a></h3>';
	}
mysqli_close($db);
}else {
	echo 'Session Complete! Please Login!';
}

?>

<hr>
<!--Footer-->
<center>
<h3><a href="http://localhost/phonebook_index.php">Previous Page</a>
<h5><a href="http://localhost/logout.php">Logout</a>
<h5><a href="http://localhost/phoneBookApp_home.php">Take me to Login</a>
<p>Copyright 2016 Manjil Thapa Magar </p>
</center>

</body>
</html>