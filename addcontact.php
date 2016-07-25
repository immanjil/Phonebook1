<html>
<head>
<title> Add Contact </title>
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

//Form to get the user input of First, Middle, Last Names, Phone Number and Email
echo '<table align="centre" cellspacing="5" cellpadding="10" width="100%">';
echo "<form action='addcontact_action.php' method='POST'>";


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
echo "<tr><td><b>Address</b></td>";
echo "<td><input type='text' name='v_address' value='' maxlength=50></td></tr>";
echo "<tr><td><b>City</b></td>";
echo "<td><input type='text' name='v_city' value='' maxlength=50></td></tr>";
echo "<tr><td><b>State</b></td>";
echo "<td><input type='text' name='v_state' value='' maxlength=50></td></tr>";
echo "<tr><td><b>Zip Code</b></td>";
echo "<td><input type='text' name='v_zipcode' value='' maxlength=50></td></tr>";

echo "<td> <align='center'> <input type='submit' name='submit' value='Submit'>";
echo "<input type='reset' name='reset' value='Clear'></td></tr>";
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
