<html>
<head>
<title> Reset Password </title>
</head>
<body style="background-color:#E6E6FA">

<!--Heading of application and links to other pages-->
<center>
    <h2 class="c1">Phone Book Application</h3>
	
</center>
<hr>

<?php
if(isset($_POST["ResetQuestion"])){
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

//Get the Contact List from Database
$query = "SELECT v_userName, v_resetQuestion, v_resetAnswer FROM user_credentials WHERE v_userName='$v_userName'";
$response = @mysqli_query($db, $query);
$row = mysqli_fetch_array($response);

//Save the datat into new variables
$userName_check = $row['v_userName'];
$question_check = $row['v_resetQuestion'];
$answer_check = $row['v_resetAnswer'];

if ($response)
{
		echo "Please answer the Security Question.";
		
		//Form to get the user input of First, Middle, Last Names, Phone Number and Email
		echo '<table align="centre" cellspacing="5" cellpadding="10" >';
		echo "<form action='reset_password_answer.php' method='post'>";
		echo "<tr>";
		echo "<tr><td><b>Security Question</b></td>";
		echo "<td>'$question_check'</td></tr>";
		echo "<tr><td><b>Security Answer</b></td>";
		echo "<td><input type='hidden' name='user_Name' value='$v_userName'></td></tr>";
		echo "<td><input type='text' name='answer_check' value='' maxlength=50></td></tr>";
		

		//Submit the chosen contacts to be deleted
		echo "<td> <align='center'> <input type='submit' value='Submit'>";
		echo "</form>";
		echo "</table>";

}
else {
	echo "The username was not found in Records.";
	header("Location: http://localhost/Phonebook1/reset_password.php");
}
		echo "<hr>";
		echo "<center>";
		echo '<h3><a href="http://localhost/Phonebook1/index.php">Login</a></p>';
		echo "<p>Copyright 2016 Manjil Thapa Magar </p>";
		echo "</h3>";
		echo "</center>";
		exit();
}
?>


<?php

//Form to get the user input of First, Middle, Last Names, Phone Number and Email
echo '<table align="centre" cellspacing="5" cellpadding="10" >';
echo "<form action='reset_password.php' method='post'>";
echo "<tr>";

echo "<tr><td><b>User Name</b></td>";
echo "<td><input type='text' name='v_userName' value='' maxlength=50></td></tr>";

//Submit the chosen contacts to be deleted
echo "<td> <input type='submit' name='ResetQuestion' value='Submit'>";

echo "</form>";
echo "</table>";

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