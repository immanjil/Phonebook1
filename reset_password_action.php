<html>
<head>
<title> Password Reset Confirmation </title>
</head>
<body>

<!--Heading of application and links to other pages-->
<center>
    <h2 class="c1">Phone Book Application</h3>
</center>
<hr>

<?php

//Connecting code to Database
$DB_USER ='root';
$DB_PASSWORD = '';
$DB_HOST = 'localhost';
$DB_NAME ='site';
$db= new mysqli($DB_HOST,$DB_USER, $DB_PASSWORD, $DB_NAME)
or die("Could not connect to MySQL");

//Receive & Validating the Data Provided by the User
$u_password = $_POST['u_password'];
$u_password= HTMLSpecialChars($u_password);
$v_userName = $_POST['user_Name'];

//data into database
$sql = "UPDATE user_credentials SET v_password = '$u_password' WHERE v_userName ='$v_userName'";

if (mysqli_query($db, $sql)) {
    echo "Record updated successfully";
}
	else {
		echo "Error updating record: " . mysqli_error($db);
}
mysqli_close($db);

?>

<hr>
<!--Footer-->
<center>
<p><h3><a href="http://localhost/Phonebook1/phoneBookApp_home.php">Login</a></p>
<p>Copyright 2016 Manjil Thapa Magar </p>
</h3>
</center>

</body>
</html>