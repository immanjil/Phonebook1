<html>
<head>
<title> Register New User </title>
</head>
<body style="background-color:#E6E6FA">

<!--Heading of application and links to other pages-->
<center>
    <h2 class="c1">Phone Book Application</h3>
	<a href="http://localhost/Phonebook1/addcontact.php">Add Contact</a> | <a href="http://localhost/Phonebook1/deletecontact.php">Delete Contact</a> | <a href="http://localhost/Phonebook1/updatecontact.php">Update Contact</a>
	</div>
	</center>
<hr>

<?php

/* <!--Form to Upload the Profile Picture-->
<form action="registration.php" method="post" enctype="multipart/form-data">
    Choose your Profile Picture:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="UploadImage">
</form>
 */
 
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

//For Image
$target_dir = "uploads/";
//$prefix = "_".$user_id."_";$prefix. 
$target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]);

	
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if($check !== false) {
	echo "File is an image - " . $check["mime"] . ".";
	$uploadOk = 1;
	} else {
	echo "File is not an image.";
	$uploadOk = 0;}
	
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
$pic_name = basename( $_FILES["fileToUpload"]["name"]);

//Validating that all Important Data has been provided by the user
if(empty($v_userName))
{	$Prompt='User Name Please<br>';}
if(empty($v_password)){
	$Prompt='Password Please<br>';}
if(empty($v_firstName)){
	$Prompt='First Name<br>';}
if(empty($v_phoneNumber)){
	$Prompt='Phone Number<br>';}

//User Credentials into database 
$query = "INSERT INTO user_credentials (v_userName,v_password,v_firstName, v_middleName, v_lastName, v_phoneNumber, v_email, v_resetQuestion, v_resetAnswer, v_address, v_city, v_state, v_zipcode,v_picName,time_stamp) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())";
$stmt = mysqli_prepare($db, $query);

mysqli_stmt_bind_param($stmt,"ssssssssssssss",$v_userName,$md5_password,$v_firstName,$v_middleName,$v_lastName,$v_phoneNumber,$v_email, $v_question, $v_answer,$v_address, $v_city, $v_state, $v_zipcode, $v_picName);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($db);

echo "Registration successful";

echo '<h3><a href="http://localhost/Phonebook1/index.php">Take me to Login</a></p>';
echo "<hr>";
echo "<center>";
echo '<h3><a href="http://localhost/Phonebook1/logout.php">Logout</a></p>';
echo '<h3><a href="http://localhost/Phonebook1/index.php">Go Back to Home</a></p>';
echo "<p>Copyright 2016 Manjil Thapa Magar </p>";
echo "</h3>";
echo "</center>";
exit();
}
?>

<?php
//Check if Image has been uploaded   
if(isset($_POST["UploadImage"])){ //check if form was submitted
	
}

?>

<p><h2>Sign Up</h2></p>


<?php

//Form to get the user input of First, Middle, Last Names, Phone Number and Email
echo '<table align="centre" cellspacing="5" cellpadding="10" width="100%">';
echo "<form action='registration.php' method='POST' enctype='multipart/form-data'>";

echo "Choose your Profile Picture:";
echo "<input type='file' name='fileToUpload' id='fileToUpload'>";
echo "<tr><td><b>User Name</b></td>";
echo "<td><input type='text' name='v_userName' value='' maxlength=50></td></tr>";
echo "<tr><td><b>Password</b></td>";
echo "<td><input type='password' name='v_password' value='' maxlength=50></td></tr>";
echo "<tr><td><b>First Name</b></td>";
echo "<td><input type='text' name='v_firstName' value='' maxlength=50></td></tr>";
echo "<tr><td><b>Middle Name</b></td>";
echo "<td><input type='text' name='v_middleName' value='' maxlength=50></td></tr>";
echo "<tr><td><b>Last Name</b></td>";
echo "<td><input type='text' name='v_lastName' value='' maxlength=50></td></tr>";
echo "<tr><td><b>Phone Number</b></td>";
echo "<td><input type='text' name='v_phoneNumber' value='' maxlength=50></td></tr>";
echo "<tr><td><b>Email</b></td>";
echo "<td><input type='text' name='v_email' value='' maxlength=50></td></tr>";
echo "<tr><td><b>Security Question</b></td>";
echo "<td><input type='text' name='v_question' value='' maxlength=50></td></tr>";
echo "<tr><td><b>Answer</b></td>";
echo "<td><input type='text' name='v_answer' value='' maxlength=50></td></tr>";
echo "<tr><td><b>Address</b></td>";
echo "<td><input type='text' name='v_address' value='' maxlength=50></td></tr>";
echo "<tr><td><b>City</b></td>";
echo "<td><input type='text' name='v_city' value='' maxlength=50></td></tr>";
echo "<tr><td><b>State</b></td>";
echo "<td><input type='text' name='v_state' value='' maxlength=50></td></tr>";
echo "<tr><td><b>Zip Code</b></td>";
echo "<td><input type='text' name='v_zipcode' value='' maxlength=50></td></tr>";
if (isset($pic_name)) {
	echo "<tr><td><input type='hidden' name='pic_name' value='$pic_name'</td></tr>";
}else{
	echo "<tr><td><input type='hidden' name='pic_name' value='noPic'</td></tr>";
}
echo "<td> <align='center'> <input type='submit' name='Register' value='Submit'>";
echo "<input type='reset' name='reset' value='Clear'></td></tr>";
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