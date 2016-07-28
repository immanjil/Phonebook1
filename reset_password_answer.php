<html>
<head>
<title> Reset Question </title>
</head>
<body style="background-color:#E6E6FA">

<!--Heading of application and links to other pages-->
<center>
    <h2 class="c1">Phone Book Application</h3>
</center>
<hr>

<?php
if(isset($_POST["ResetAction"])){
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
	echo '<h3><a href="http://localhost/Phonebook1/index.php">Take me to Login</a></p>';
	echo "<hr>";
	echo "<center>";
	echo '<h3><a href="http://localhost/Phonebook1/index.php">Login</a></p>';
	echo "<p>Copyright 2016 Manjil Thapa Magar </p>";
	echo "</h3>";
	echo "</center>";
	exit();
}
	else {
		echo "Error updating record: " . mysqli_error($db);
}
mysqli_close($db);
}
?>

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
$v_answer_check = $_POST['answer_check'];
$v_answer_check = HTMLSpecialChars($v_answer_check);
$v_userName = $_POST['user_Name'];

//Get the Contact List from Database
$query = "SELECT v_resetAnswer FROM user_credentials WHERE v_userName='$v_userName'";
$response = @mysqli_query($db, $query);
$row = mysqli_fetch_array($response);

//Save the datat into new variables
$answer_check = $row['v_resetAnswer'];

if ($v_answer_check == $answer_check)
	{
		echo "Please Enter your new Password";
		//Form to get the user input of First, Middle, Last Names, Phone Number and Email
		echo '<table align="centre" cellspacing="5" cellpadding="10" width="100%">';
		echo "<form action='reset_password_answer.php' method='POST'>";
		
		echo "<tr><td><b>New Password</b></td>";
		echo "<td><input type='password' name='u_password' value='' maxlength=50></td></tr>";
		
		echo "<td><input type='hidden' name='user_Name' value='$v_userName'></td></tr>";
		echo "<td> <align='center'> <input type='submit' name='ResetAction' value='Submit'>";
		echo "<input type='reset' value='Clear'></td></tr>";
		echo "</form>";
		echo "</table>";
	}
	else { 
	echo "The answer was incorrect.";}
		
?>

<hr>

<!--Footer-->
<center>
<p><h3><a href="http://localhost/Phonebook1/index.php">Login</a></p>
<p>Copyright 2016 Manjil Thapa Magar </p>
</h3>
</center>

</body>
</html>