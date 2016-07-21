<html>
<head>
<title> Update Contact Confirmation </title>
</head>
<body>

<!--Heading of application and links to other pages-->
<center>
    <h2 class="c1">Phone Book Application</h3>
	<div class="c2">
	<a href="http://localhost/Phonebook1/addcontact.php">Add Contact</a> | <a href="http://localhost/Phonebook1/deletecontact.php">Delete Contact</a> | <a href="http://localhost/Phonebook1/updatecontact.php">Update Contact</a>
	</div>
</center>
<hr>

<?php

// Start the session
session_start();

//Connecting code to Database
$DB_USER ='root';
$DB_PASSWORD = '';
$DB_HOST = 'localhost';
$DB_NAME ='site';
$db= new mysqli($DB_HOST,$DB_USER, $DB_PASSWORD, $DB_NAME)
or die("Could not connect to MySQL");


//Receive & Validating the Data Provided by the User
$delete1 = $_POST['delete1'];
$delete1= HTMLSpecialChars($delete1);

// Echo session variables that were set on previous page
$id = $_SESSION["user_id"] ;
$table = 'contacts';

//List the Contacts available on the Database
$query = "SELECT v_firstName, v_middleName, v_lastName, v_phoneNumber, v_email, v_address, v_city, v_state, v_zipcode FROM $table WHERE contact_id='$delete1' and user_id=$id";
$response = @mysqli_query($db, $query);
$row = mysqli_fetch_array($response);
//Save the datat into new variables
$u_firstName = $row['v_firstName'];
$u_middleName = $row['v_middleName'];
$u_lastName = $row['v_lastName'];
$u_phoneNumber = $row['v_phoneNumber'];
$u_email = $row['v_email'];
$u_address = $row['v_address'];
$u_city = $row['v_city'];
$u_state = $row['v_state'];
$u_zipcode = $row['v_zipcode'];

//Form to get the user input of First, Middle, Last Names, Phone Number and Email
echo '<table align="centre" cellspacing="5" cellpadding="10" width="100%">';
echo "<form action='updatecontact_complete.php' method='POST'>";

echo "<tr><td><b>First Name</b></td>";
echo "<td><input type='text' name='u_firstName' value='$u_firstName' maxlength=50></td></tr>";

echo "<tr><td><b>Middle Name</b></td>";
echo "<td><input type='text' name='u_middleName' value='$u_middleName' maxlength=50></td></tr>";
echo "<tr><td><b>Last Name</b></td>";
echo "<td><input type='text' name='u_lastName' value='$u_lastName' maxlength=50></td></tr>";
echo "<tr><td><b>Phone Number</b></td>";
echo "<td><input type='text' name='u_phoneNumber' value='$u_phoneNumber' maxlength=50></td></tr>";
echo "<tr><td><b>Email</b></td>";
echo "<td><input type='text' name='u_email' value='$u_email' maxlength=50></td></tr>";
echo "<tr><td><b>Address</b></td>";
echo "<td><input type='text' name='u_address' value='$u_address' maxlength=50></td></tr>";
echo "<tr><td><b>City</b></td>";
echo "<td><input type='text' name='u_city' value='$u_city' maxlength=50></td></tr>";
echo "<tr><td><b>State</b></td>";
echo "<td><input type='text' name='u_state' value='$u_state' maxlength=50></td></tr>";
echo "<tr><td><b>Zip Code</b></td>";
echo "<td><input type='text' name='u_zipcode' value='$u_zipcode' maxlength=50></td></tr>";

echo "<tr><td><input type='hidden' name='u_contact_id' value='$delete1'</td></tr>";

echo "<td> <align='center'> <input type='submit' name='submit' value='Submit'>";
echo "<input type='reset' name='reset' value='Clear'></td></tr>";
echo "</form>";
echo "</table>";

//Check if the Contact was Updated
if (mysqli_query($db, $query)) {
    echo "<colspan=2 class='main-text'><b>Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($db);
} 
mysqli_close($db);

?>

<hr>
<!--Footer-->
<center>
<h3><a href="http://localhost/Phonebook1/logout.php">Logout</a></p>
<h3><a href="http://localhost/Phonebook1/phonebook_index.php">Go Back to Home</a></p>
<p>Copyright 2016 Manjil Thapa Magar </p>
</h3>
</center>

</body>
</html>