<html>
<head>
<title> Activities Page </title>
</head>
<body style="background-color:#E6E6FA">

<!--Heading of application and links to other pages-->
<center>
    <h2 class="c1">Phone Book Application</h3>
	<div class="c2">
	<a href="http://localhost/Phonebook1/addcontact.php">Add Contact</a> | <a href="http://localhost/Phonebook1/deletecontact.php">Delete Contact</a> | <a href="http://localhost/Phonebook1/updatecontact.php">Update Contact</a>
	</div>
</center>
<hr>

<?php
$contactId = $_GET['id'];

// Start the session
session_start();

//Connecting code to Database
$DB_USER ='root';
$DB_PASSWORD = '';
$DB_HOST = 'localhost';
$DB_NAME ='site';
$db= new mysqli($DB_HOST,$DB_USER, $DB_PASSWORD, $DB_NAME)
or die("Could not connect to MySQL");

// Echo session variables that were set on previous page
$id = $_SESSION['user_id'] ;
$table = 'contacts';

//Dissplaying the Profile Picture$query
$query = "SELECT v_firstName, v_middleName, v_lastName, v_phoneNumber, v_email, v_address, v_city, v_state, v_zipcode FROM $table where user_id='$id' And contact_id='$contactId'";
$response = @mysqli_query($db, $query);
$row = mysqli_fetch_array($response);

$firstName= $row['v_firstName'];
$middleName= $row['v_middleName'];
$lastName= $row['v_lastName'];
$phoneNumber= $row['v_phoneNumber'];
$email= $row['v_email'];
$address= $row['v_address'];
$city= $row['v_city'];
$state= $row['v_state'];
$zipcode= $row['v_zipcode'];

//Displaying the Contact Picture
$query = "SELECT v_picName FROM $table where user_id='$id' And contact_id='$contactId'";
$response = @mysqli_query($db, $query);
$row = mysqli_fetch_array($response);

//$picName = $row['v_picName'];
$picName = "panda.JPG";
$target_dir = "uploads/";
$target_file = $target_dir . $picName;
echo '<center><img src="'.$target_file.'" alt="Profile Picture" height="100" width="100"></center><br>';

//Contact Detail of the User Desired contactt
echo "<table align='center' cellspacing='5' cellpadding='10' width='50%'>";

echo "<tr><td align='center'><b>First Name</b></td>";
echo "<td align='left'>$firstName</td></tr>";
echo "<tr><td align='center'><b>Middle Name</b></td>";
echo "<td align='left'>$middleName</td></tr>";
echo "<tr><td align='center'><b>Last Name</b></td>";
echo "<td align='left'>$lastName</td></tr>";
echo "<tr><td align='center'><b>Phone Number</b></td>";
echo "<td align='left'>$phoneNumber</td></tr>";
echo "<tr><td align='center'><b>Email</b></td>";
echo "<td align='left'>$email</td></tr>";
echo "<tr><td align='center'><b>Address</b></td>";
echo "<td align='left'>$address</td></tr>";
echo "<tr><td align='center'><b>City</b></td>";
echo "<td align='left'>$city</td></tr>";
echo "<tr><td align='center'><b>State</b></td>";
echo "<td align='left'>$state</td></tr>";
echo "<tr><td align='center'><b>Zip Code</b></td>";
echo "<td align='left'>$zipcode</td></tr>";

echo "</table>";
echo '<h3 align="center"><a href="http://localhost/Phonebook1/phonebook_index.php">Take me to Contact List</a></p>';
?>

<hr>
<!--Footer-->
<center>
<h3><a href="http://localhost/Phonebook1/logout.php">Logout</a></p>
<h3><a href="http://localhost/Phonebook1/index.php">Take me to Login</a></p>
<p>Copyright 2016 Manjil Thapa Magar </p>
</h3>
</center>

</body>
</html>