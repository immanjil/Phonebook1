<html>
<head>
<title> Update Contact Confirmation </title>
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

//Connecting code to Database
$DB_USER ='root';
$DB_PASSWORD = '';
$DB_HOST = 'localhost';
$DB_NAME ='site';
$db= new mysqli($DB_HOST,$DB_USER, $DB_PASSWORD, $DB_NAME)
or die("Could not connect to MySQL");

//Receive & Validating the Data Provided by the User
//Validating the Data Provided by the User
$v_firstName = $_POST['u_firstName'];
$v_firstName = HTMLSpecialChars($v_firstName);
$v_middleName = $_POST['u_middleName'];
$v_middleName = HTMLSpecialChars($v_middleName);
$v_lastName = $_POST['u_lastName'];
$v_lastName = HTMLSpecialChars($v_lastName);
$v_phoneNumber = $_POST['u_phoneNumber'];
$v_phoneNumber = HTMLSpecialChars($v_phoneNumber);
$v_email = $_POST['u_email'];
$v_email = HTMLSpecialChars($v_email);
$v_address = $_POST['u_address'];
$v_address = HTMLSpecialChars($v_address);
$v_city = $_POST['u_city'];
$v_city = HTMLSpecialChars($v_city);
$v_state = $_POST['u_state'];
$v_state = HTMLSpecialChars($v_state);
$v_zipcode = $_POST['u_zipcode'];
$v_zipcode = HTMLSpecialChars($v_zipcode);

//The First name chosen for update passed as post 
$update = $_POST['u_contact_id'];
$update = HTMLSpecialChars($update);

//Validating that all Important Data has been provided by the user
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
$sql = "UPDATE $table SET v_firstName = '$v_firstName', v_middleName = '$v_middleName', v_lastName = '$v_lastName',v_phoneNumber = '$v_phoneNumber', v_email = '$v_email', v_address = '$v_address', v_city = '$v_city', v_state = '$v_state',v_zipcode = '$v_zipcode' WHERE contact_id='$update' and user_id='$id'";

if (mysqli_query($db, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($db);
}

mysqli_close($db);

?>

<hr>
<!--Footer-->
<center>
<h3><a href="http://localhost/logout.php">Logout</a></p>
<h3><a href="http://localhost/phonebook_index.php">Go Back to Home</a></p>

<p>Copyright 2016 Manjil Thapa Magar </p>
</h3>
</center>

</body>
</html>