<html>
<head>
<title> Users Log </title>
</head>
<body style="background-color:#E6E6FA">

<!--Heading of application and links to other pages-->
<center>
    <h2 class="c1">Manage Users</h3>
	<div class="c2">
	<a href="http://localhost/Phonebook1/addcontact.php">Add More Admin</a> | <a href="http://localhost/Phonebook1/deletecontact.php">Delete Admin</a>
	</div>
</center>
<hr>

<?php

// Start the session
session_start();
//Checks if Session is still active
if(isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id'])) {
 
//Connecting code to Database
$DB_USER ='root';
$DB_PASSWORD = '';
$DB_HOST = 'localhost';
$DB_NAME ='site';
$db= new mysqli($DB_HOST,$DB_USER, $DB_PASSWORD, $DB_NAME)
or die("Could not connect to MySQL");

// Echo session variables that were set on previous page
$admin_id = $_SESSION["admin_id"] ;
$table = 'user_credentials';

if ($table)
{
//List the Contacts available on the Database
$query = "SELECT user_id, v_firstName, v_phoneNumber, time_stamp FROM $table where user_id='$admin_id'";
$response = @mysqli_query($db, $query);

//count the color$number
$number = 1;

echo "<form action='interaction.php' method='post'>";

if ($response)
{
echo '<table align="centre" cellspacing="2" cellpadding="5" width="100%">';
echo '<td align="left"><b>User ID</b></td>';
echo '<td align="left"><b>First Name</b></td>';
echo '<td align="left"><b>Phone Number</b></td>';
echo '<td align="left"><b>Time Stamp</b></td>';



while($row = mysqli_fetch_array($response))
{
                if ($number % 2 == 0){
                                echo '<tr bgcolor=#8AD3FC>' ;
                }
                else{
                                echo '<tr bgcolor=#FFFFFF>' ;
                }
               
                echo "          <td align='left'>".$row['user_id']."</td>
                                <td align='left'><a href='contact_details.php?id=".$row['contact_id']."'>".$row['v_firstName']."</a></td>
                                <td align='left'>".$row['v_phoneNumber']."</td>
                                <td align='left'>".$row['time_stamp']."</td>
                                ";
                echo '</tr>';
                                               
                $number++;
}

echo '</table>';
}
else{
	echo"No DATABASE";
	//echo mysqli_error($db);
}
}
	else{
		echo "Please Enter your Login Info";
		echo '<h3><a href="http://localhost/Phonebook1/admin.php">Admin Login</a></h3>';
	}
mysqli_close($db);
}else {
	echo 'Session Complete! Please Login!';
}

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