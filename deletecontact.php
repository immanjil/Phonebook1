<html>
<head>
<title> Delete Contact </title>
</head>
<body>

<!--Heading of application and links to other pages-->
<center>
    <h2 class="c1">Phone Book Application</h3>
	<div class="c2">
	<a href="http://localhost/Phonebook1/addcontact.php">Add Contact</a> | <a href="http://localhost/Phonebook1/deletecontact.php">Delete Contact</a> | <a href="http://localhost/Phonebook1/updatecontact.php">Update Contact</a>
	</div>
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

// Echo session variables that were set on previous page
$id = $_SESSION["user_id"] ;
$table = 'contacts';

//Get the Contact List from Database
$query = "SELECT contact_id, v_firstName FROM $table where user_id=$id";
$response = @mysqli_query($db, $query);

//Form to get the user input of First, Middle, Last Names, Phone Number and Email
echo '<table align="centre" cellspacing="5" cellpadding="10" >';
echo "<form action='deletecontact_action.php' method='post'>";
echo "<tr>";

//Show checkbox for all the Contacts as option to delete
if ($response)
{
echo '<td align="left"><b>Choose the Phone Number to Delete</b></td>';

while($row = mysqli_fetch_array($response))
{
	echo '<tr><td align="left">'.
	$row['v_firstName'].'</td>';
	$row['contact_id'].'</td>';
	$v_first = $row['v_firstName'];
	$v_first = HTMLSpecialChars($v_first);
	$contact_id = $row['contact_id'];
	$contact_id = HTMLSpecialChars($contact_id);
	echo "<td><input type='checkbox' name='delete1' value=$contact_id>  <br>";
	echo '</tr>';
}


}
else{
	echo"No DATABASE";
	echo mysqli_error($db);
}
mysqli_close($db);

//Submit the chosen contacts to be deleted
echo "<td> <align='center'> <input type='submit' value='Submit'>";

echo "</form>";
echo "</table>";

?>

<hr>
<!--Footer-->
<center>
<h3><a href="http://localhost/Phonebook1/logout.php">Logout</a></p>
<h3><a href="http://localhost/Phonebook1/phonebook_index.php">Show My Contacts</a></p>
<p>Copyright 2016 Manjil Thapa Magar </p>
</h3>
</center>

</body>
</html>