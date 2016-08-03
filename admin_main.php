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
// Start the session
session_start();

?>

<?php

//Connecting code to Database
$DB_USER ='root';
$DB_PASSWORD = '';
$DB_HOST = 'localhost';
$DB_NAME ='site';
$db= new mysqli($DB_HOST,$DB_USER, $DB_PASSWORD, $DB_NAME)
or die("Could not connect to MySQL");

//Check if Form has been Submitted
if(isset($_POST["DeleteUser"])){

//Receive & Validating the Data Provided by the User
$DeleteUser = $_POST['delete_user_id'];
$DeleteUser= HTMLSpecialChars($DeleteUser);

// Echo session variables that were set on previous page
$admin_id = $_SESSION["admin_id"] ;
$table = 'user_credentials';

//Delete the Contact chosen by User
$query = "DELETE FROM $table WHERE user_id='$DeleteUser'";
$stmt = mysqli_prepare($db,$query);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

//Check if the Contact was Deleted
if (mysqli_query($db, $query)) {
    echo "<colspan=2 class='main-text'><b>User deleted successfully";	
} else {
    echo "Error deleting record: " . mysqli_error($db);
} 
mysqli_close($db);
}
?>

<?php

//Connecting code to Database
$DB_USER ='root';
$DB_PASSWORD = '';
$DB_HOST = 'localhost';
$DB_NAME ='site';
$db= new mysqli($DB_HOST,$DB_USER, $DB_PASSWORD, $DB_NAME)
or die("Could not connect to MySQL");

//Checks if Session is still active
if(isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id'])) {

// Echo session variables that were set on previous page
$admin_id = $_SESSION["admin_id"] ;
$table = 'user_credentials';


if ($table)
{
//List the Contacts available on the Database
$query = "SELECT user_id, v_firstName, v_phoneNumber, time_stamp FROM $table ";
$response = @mysqli_query($db, $query);

//count the color$number
$number = 1;

if ($response)
{
echo '<table align="centre" cellspacing="2" cellpadding="5" width="70%">';
echo "<form action='admin_main.php' method='post'>";
echo '<tr><td align="left"><b>User ID</b></td>';
echo '<td align="left"><b>First Name</b></td>';
echo '<td align="left"><b>Phone Number</b></td>';
echo '<td align="left"><b>Time Stamp</b></td>';
echo '<td align="left"><b>Delete</b></td></tr>';
while($row = mysqli_fetch_array($response))
{
	if ($number % 2 == 0){
		echo '<tr bgcolor=#8AD3FC>';
		}
        else{
			echo '<tr bgcolor=#FFFFFF>' ;
			}
                echo "<td align='left'>".$row['user_id']."</td>
                      <td align='left'>".$row['v_firstName']."</td>
                      <td align='left'>".$row['v_phoneNumber']."</td>
                      <td align='left'>".$row['time_stamp']."</td>";
                $user_id= $row['user_id'];
				echo "<td align='left'><input type='checkbox' name='delete_user_id' value=$user_id> </td><br></tr>";
                $number++;
}
//Submit the chosen contacts to be deleted
echo "<td> <align='center'> <input type='submit' name='DeleteUser' value='Delete Selected User'>";
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
<h3><a href="http://localhost/Phonebook1/logout_admin.php">Logout</a></p>
<h3><a href="http://localhost/Phonebook1/admin.php">Take me to Admin Login</a></p>
<p>Copyright 2016 Manjil Thapa Magar </p>
</h3>
</center>

</body>
</html>