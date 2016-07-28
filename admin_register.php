<html>
<head>
<title> Register New User </title>
</head>
<body style="background-color:#E6E6FA">

<!--Heading of application and links to other pages-->
<center>
    <h2 class="c1">Admin Registration</h3>
	</div>
	</center>
<hr>

<?php
//Check if the Form has been Submitted
if(isset($_POST["Register"])){ 

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
$md5_password= md5($v_password);

//Validating that all Important Data has been provided by the user
if(empty($v_userName))
{	$Prompt='User Name Please<br>';}
if(empty($v_password)){
	$Prompt='Password Please<br>';}

//Checking if the Username has already been used
$query = "SELECT v_userName FROM admin_table";
$response = @mysqli_query($db, $query);
$row = mysqli_fetch_array($response);

while($row = mysqli_fetch_array($response))
{
	$check_user=$row['v_userName'];
	if ($userName = $check_user){
		$Prompt = "User Name Already Exists!";
	}
}

if ($Prompt){
	echo $Prompt;
}
else{

//User Credentials into database 
$query = "INSERT INTO admin_table (admin_id,v_userName,v_password) VALUES (Null,?,?)";
$stmt = mysqli_prepare($db, $query);

mysqli_stmt_bind_param($stmt,"ss",$v_userName,$md5_password);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($db);

echo "Registration successful";
echo '<h3><a href="http://localhost/Phonebook1/admin.php">Take me to Admin Login</a></p>';
echo "<hr>";
echo "<center>";
echo "<p>Copyright 2016 Manjil Thapa Magar </p>";
echo "</h3>";
echo "</center>";
exit();
}
}
?>

<?php

//Form to get the user input of First, Middle, Last Names, Phone Number and Email
echo '<table align="centre" cellspacing="5" cellpadding="10" width="100%">';
echo "<form action='admin_register.php' method='POST' enctype='multipart/form-data'>";

echo "<tr><td><b>User Name</b></td>";
echo "<td><input type='text' name='v_userName' value='' maxlength=50></td></tr>";
echo "<tr><td><b>Password</b></td>";
echo "<td><input type='password' name='v_password' value='' maxlength=50></td></tr>";
echo "<td> <align='center'> <input type='submit' name='Register' value='Submit'>";
echo "</form>";
echo "</table>";

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