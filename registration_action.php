<html>
<head>
<title> Registration Confirmation </title>
</head>
<body>

<!--Heading of application and links to other pages-->
<center>
    <h2 class="c1">Phone Book Application</h3>
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
$v_question = $_POST['v_question'];
$v_question = HTMLSpecialChars($v_question);
$v_answer = $_POST['v_answer'];
$v_answer = HTMLSpecialChars($v_answer);
$v_address = $_POST['v_address'];
$v_address = HTMLSpecialChars($v_address);
$v_city = $_POST['v_city'];
$v_city = HTMLSpecialChars($v_city);
$v_state = $_POST['v_state'];
$v_state = HTMLSpecialChars($v_state);
$v_zipcode = $_POST['v_zipcode'];
$v_zipcode = HTMLSpecialChars($v_zipcode);
$v_picName = $_POST['pic_name'];
$v_picName = HTMLSpecialChars($v_picName);

echo $v_picName;

//Validating that all Important Data has been provided by the user
if(empty($v_userName))
{
	$Prompt='User Name Please<br>';
}
if(empty($v_password))
{
	$Prompt='Password Please<br>';
}
if(empty($v_firstName))
{
	$Prompt='First Name<br>';
}
if(empty($v_phoneNumber))
{
	$Prompt='Phone Number<br>';
}

//User Credentials into database 
$query = "INSERT INTO user_credentials (v_userName,v_password,v_firstName, v_middleName, v_lastName, v_phoneNumber, v_email, v_resetQuestion, v_resetAnswer, v_address, v_city, v_state, v_zipcode,v_picName,time_stamp) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())";
$stmt = mysqli_prepare($db, $query);
mysqli_stmt_bind_param($stmt,"ssssssssssssss",$v_userName,$v_password,$v_firstName,$v_middleName,$v_lastName,$v_phoneNumber,$v_email, $v_question, $v_answer,$v_address, $v_city, $v_state, $v_zipcode, $v_picName);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($db);

echo "Registration successful";
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