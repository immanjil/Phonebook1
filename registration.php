<html>
<head>
<title> Register New User </title>
</head>
<body>

<!--Heading of application and links to other pages-->
<center>
    <h2 class="c1">Phone Book Application</h3>
	</center>
<hr>

<?php

//Form to get the user input of First, Middle, Last Names, Phone Number and Email
echo '<table align="centre" cellspacing="5" cellpadding="10" width="100%">';
echo "<form action='registration_action.php' method='POST'>";

echo '<p><h4>Sign Up</h4></p>';
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

echo "<td> <align='center'> <input type='submit' name='submit' value='Submit'>";
echo "<input type='reset' name='reset' value='Clear'></td></tr>";
echo "</form>";
echo "</table>";

?>

<hr>
<!--Footer-->
<center>
<p><h3><a href="http://localhost/phoneBookApp_home.php">Login</a></p>
<p>Copyright 2016 Manjil Thapa Magar </p>
</h3>
</center>

</body>
</html>