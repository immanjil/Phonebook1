<html>
<head>
<title> Add Contact </title>
</head>
<body style="background-color:#E6E6FA">

<!--Heading of application and links to other pages-->
<center>
    <h2 class="c1">Phone Book Application</h3>
	<div class="c2">
	<a href="http://localhost/Phonebook1/addcontact.php">Add Contact</a> | <a href="http://localhost/Phonebook1/deletecontact.php">Delete Contact</a> | <a href="http://localhost/Phonebook1/updatecontact.php">Update Contact</a>
	</div>
</center>
<hr>

<?php
if (isset($_POST["AddContact"])){
// Start the session
session_start();

//Connecting code to Database
$DB_USER ='root';
$DB_PASSWORD = '';
$DB_HOST = 'localhost';
$DB_NAME ='site';
$db= new mysqli($DB_HOST,$DB_USER, $DB_PASSWORD, $DB_NAME)
or die("Could not connect to MySQL");

//Validating the Data Provided by the User
$v_firstName = $_POST['v_firstName'];
$v_firstName = HTMLSpecialChars($v_firstName);
$v_middleName = $_POST['v_middleName'];
$v_middleName = HTMLSpecialChars($v_middleName);
$v_lastName = $_POST['v_lastName'];
$v_lastName = HTMLSpecialChars($v_lastName);
$v_phoneNumber = $_POST['v_phoneNumber'];
$v_phoneNumber = HTMLSpecialChars($v_phoneNumber);
$v_email = $_POST['v_email'];
$v_email = HTMLSpecialChars($v_email);
$v_address = $_POST['v_address'];
$v_address = HTMLSpecialChars($v_address);
$v_city = $_POST['v_city'];
$v_city = HTMLSpecialChars($v_city);
$v_state = $_POST['v_state'];
$v_state = HTMLSpecialChars($v_state);
$v_zipcode = $_POST['v_zipcode'];
$v_zipcode = HTMLSpecialChars($v_zipcode);

//Validating that all Important Data has been provided by the user

//Check if email address has right Formatif
if (!filter_var($v_email, FILTER_VALIDATE_EMAIL) === true) {
	exit("Enter Valid Email Address (<a href='http://localhost/Phonebook1/addcontact.php'>Enter Contact again</a>)");
}
if (!filter_var($v_phoneNumber, FILTER_VALIDATE_INT) === true)
{
	exit("Enter a Valid Name (<a href='http://localhost/Phonebook1/addcontact.php'>Enter Contact again</a>)");
}

if(empty($v_firstName))
{
	$Prompt='First Name<br>';
}
if(empty($v_phoneNumber))
{
	$Prompt='Phone Number<br>';
}

// Echo session variables that were set on previous page
$id = $_SESSION["user_id"] ;
$table = 'contacts';

//data into database
$query = "INSERT INTO $table (user_id,v_firstName, v_middleName, v_lastName, v_phoneNumber, v_email, v_address, v_city, v_state, v_zipcode, time_stamp) VALUES (?,?,?,?,?,?,?,?,?,?,NOW())";
$stmt = mysqli_prepare($db, $query);
mysqli_stmt_bind_param($stmt,"isssssssss",$id,$v_firstName,$v_middleName,$v_lastName,$v_phoneNumber,$v_email,$v_address,$v_city,$v_state,$v_zipcode);
mysqli_stmt_execute($stmt);


$added = mysqli_stmt_affected_rows($stmt);
if($added == 1){
//Message to the user based on input
	echo "<colspan=2 class='main-text'><b> Your Contact has been Saved";
	mysqli_stmt_close($stmt);
	mysqli_close($db);
	echo '<h3><a href="http://localhost/Phonebook1/phonebook_index.php">Take me to Contact List</a></p>';
	echo "<hr>";
	echo "<center>";
	echo '<h3><a href="http://localhost/Phonebook1/logout.php">Logout</a></p>';
	echo '<h3><a href="http://localhost/Phonebook1/phonebook_index.php">Go Back to Home</a></p>';
	echo "<p>Copyright 2016 Manjil Thapa Magar </p>";
	echo "</h3>";
	echo "</center>";
	exit();
}else {
	echo 'Error Occurred <br />';
	echo mysqli_error();
}
}
?>

<?php

//Form to get the user input of First, Middle, Last Names, Phone Number and Email
echo '<table align="centre" cellspacing="5" cellpadding="10" width="100%">';
echo "<form action='addcontact.php' method='POST'>";


echo "<tr><td><b>First Name</b></td>";
echo "<td><input type='text' name='v_firstName' value='' maxlength=50></td></tr>";

echo "<tr><td><b>Middle Name</b></td>";
echo "<td><input type='text' name='v_middleName' value='' maxlength=50></td></tr>";
echo "<tr><td><b>Last Name</b></td>";
echo "<td><input type='text' name='v_lastName' value='' maxlength=50></td></tr>";
echo "<tr><td><b>Phone Number</b></td>";
echo "<td><input type='text' name='v_phoneNumber' value='' maxlength=50></td></tr>";
echo "<tr><td><b>Email</b></td>";
echo "<td><input type='text' name='v_email' value='' maxlength=50></td></tr>";
echo "<tr><td><b>Address</b></td>";
echo "<td><input type='text' name='v_address' value='' maxlength=50></td></tr>";
echo "<tr><td><b>City</b></td>";
echo "<td><input type='text' name='v_city' value='' maxlength=50></td></tr>";
echo "<tr><td><b>State</b></td>";
echo "<td><input type='text' name='v_state' value='' maxlength=50></td></tr>";
echo "<tr><td><b>Zip Code</b></td>";
echo "<td><input type='text' name='v_zipcode' value='' maxlength=50></td></tr>";

echo "<td> <align='center'> <input type='submit' name='AddContact' value='Submit'>";
echo "<input type='reset' name='reset' value='Clear'></td></tr>";
echo "</form>";
echo "</table>";

?>

<hr>
<!--Footer-->
<center>
<h3><a href="http://localhost/Phonebook1/logout.php">Logout</a></p>
<h3><a href="http://localhost/Phonebook1/phonebook_index.php">Show My Contacts</a></p>
<p>Copyright 2016 Manjil Thapa Magar </p>
</h3>
</center>

</body>
</html>
