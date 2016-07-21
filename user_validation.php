<html>
<head>
<title> User Validation Confirmation </title>
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

//Validating the Data Provided by the User
$v_userName = $_POST['v_userName'];
$v_userName = HTMLSpecialChars($v_userName);
$v_password = $_POST['v_password'];
$v_password = HTMLSpecialChars($v_password);


//Validating that user name and password has been provided by the user
if(empty($v_userName))
{
	$Prompt='User Name Please<br>';
}
if(empty($v_password))
{
	$Prompt='Password Please<br>';
}

//Get the Contact List from Database
$query = "SELECT user_id,v_password FROM user_credentials WHERE v_userName='$v_userName'";
$response = @mysqli_query($db, $query);
$row = mysqli_fetch_array($response);

//Save the datat into new variables
$password_check = $row['v_password'];
$user_id = $row['user_id'];

if ($response)
{
	if ($v_password == $password_check)
	{
		echo "You are logged in";
		$_SESSION['user_id']=$user_id;
		$link = "<script>window.open('http://localhost/Phonebook1/phonebook_index.php','_self')</script>";
		echo $link;
	}
	else { 
		echo "The password is not valid.";}
}
else {
	echo "The username was not found in Records.";
}
?>

<hr>
<!--Footer-->
<center>
<h3><a href="http://localhost/Phonebook1/phonebook_index.php">Go Back to Home</a></p>
<p>Copyright 2016 Manjil Thapa Magar </p>
</h3>
</center>

</body>
</html>