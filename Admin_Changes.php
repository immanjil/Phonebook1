<html>
<head>
<title> Users Log </title>
</head>
<body style="background-color:#E6E6FA">

<!--Heading of application and links to other pages-->
<p style="width: 100%;">
<div style="float:left"><img src="uploads/admin.jpg" height="100" width="200"/></div>
<div align="center"><h2 style="color:blue">Add New Admin</h2></div>
<div style="clear:both"/>
</p> 
<center>
	<div class="c2">
	<a href="http://localhost/Phonebook1/admin_register.php">Add More Admin</a> 
	</div>
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

//Get the Contact List from Database
$query = "SELECT user_id, v_password FROM user_credentials";
$response = @mysqli_query($db, $query);
$row = mysqli_fetch_array($response);

while($row = mysqli_fetch_array($response))
{
	$user_id=$row['user_id'];
	$password_change = $row['v_password'];
	$new_md5_password = md5($password_change);
	
	//Add new password into database
	$sql = "UPDATE user_credentials SET v_password = '$new_md5_password' WHERE user_id='$user_id'";
	if (mysqli_query($db, $sql)) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . mysqli_error($db);
		}
}
mysqli_close($db);
?>

<hr>
<!--Footer-->
<center>
<h3><a href="http://localhost/Phonebook1/logout_admin.php">Logout</a></p>
<h3><a href="http://localhost/Phonebook1/admin.php">Take me to Admin Login</a></p>
<p>Copyright 2016 Manjil Thapa Magar </p>
</h3>
</center>

</body>
</html>