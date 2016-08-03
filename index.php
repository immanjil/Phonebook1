<html>
<head>
<title> Index </title>
</head>
<body style="background-color:#E6E6FA">

<!--Heading of application and links to other pages-->

<p style="width: 100%;">
<div style="float:left"><img src="uploads/PhoneBook.jpg" height="100" width="100"/></div>
<div align="center"><h2 style="color:blue">Your Personal Phonebook</h2></div>
<div style="clear:both"/>
</p> 


<hr>

<?php 
//Check if User entered the Login Information
if(isset($_POST["Login"])){ 

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

$md5_password_check = md5($v_password);
echo $md5_password_check;

//Get the Contact List from Database
$query = "SELECT user_id,v_password FROM user_credentials WHERE v_userName='$v_userName'";
$response = @mysqli_query($db, $query);
$row = mysqli_fetch_array($response);

//Save the datat into new variables
$password_check = $row['v_password'];
echo "manjil";
echo $password_check;
$user_id = $row['user_id'];

if ($response)
{
	if ($md5_password_check == $password_check)
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

}
?>


<?php

//Form to get the user input of First, Middle, Last Names, Phone Number and Email
echo '<table align="center" cellspacing="5" cellpadding="10" >';
echo "<form action='index.php' method='POST'>";

echo "<tr><td><b>User Name</b></td>";
echo "<td> <input type='text' name='v_userName' value='' maxlength=25></td></tr>";

echo "<tr><td><b>Password</b></td>";
echo "<td><input type='password' name='v_password' value='' maxlength=1000></td></tr>";

echo "<td> <align='center'> <input type='submit' name='Login' value='Login'>";
echo "<input type='reset' name='reset' value='Clear'></td></tr>";

echo "</form>";
echo "</table>";

?>
<center>
<p><h4><a href="http://localhost/Phonebook1/registration.php">Sign Up</a></h4>
<h5><a href="http://localhost/Phonebook1/reset_password.php">Forgot Your Password?</a><h5></p>
</center>

<hr>
<!--Footer-->
<center>
<p><h4>Copyright 2016 Manjil Thapa Magar</h4></p>
<p><h5><a href="http://localhost/Phonebook1/admin.php">admin</a></p>
</center>

</body>
</html>