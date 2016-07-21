<html>
<head>
<title> Delete Contact Confirmation </title>
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

//Receive & Validating the Data Provided by the User
$delete1 = $_POST['delete1'];
$delete1= HTMLSpecialChars($delete1);

// Echo session variables that were set on previous page
$id = $_SESSION["user_id"] ;
$table = 'contacts';

//Delete the Contact chosen by User
$query = "DELETE FROM $table WHERE contact_id='$delete1' and user_id='$id'";
$stmt = mysqli_prepare($db,$query);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

//Check if the Contact was Deleted
if (mysqli_query($db, $query)) {
    echo "<colspan=2 class='main-text'><b>Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($db);
} 
mysqli_close($db);

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