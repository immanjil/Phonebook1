<html>
<head>
<title> Home </title>
</head>
<body>

<!--Heading of application and links to other pages-->
<center>
    <h2 class="c1">Phone Book Application</h3>
</center>
<hr>

<?php

//Form to get the user input of First, Middle, Last Names, Phone Number and Email
echo '<table align="centre" cellspacing="5" cellpadding="10" >';
echo "<form action='user_validation.php' method='POST'>";

echo "<tr><td><b>User Name</b></td>";
echo "<td> <input type='text' name='v_userName' value='' maxlength=25></td></tr>";

echo "<tr><td><b>Password</b></td>";
echo "<td><input type='password' name='v_password' value='' maxlength=25></td></tr>";

echo "<td> <align='center'> <input type='submit' name='submit' value='Submit'>";
echo "<input type='reset' name='reset' value='Clear'></td></tr>";

echo "</form>";
echo "</table>";

?>
<left>
<p><h4><a href="http://localhost/registration.php">Sign Up</a></p>
<p><h4><a href="http://localhost/reset_password.php">Reset Password</a></p>
</left>

<hr>
<!--Footer-->
<center>
<p>Copyright 2016 Manjil Thapa Magar </p>
</h4>
</center>

</body>
</html>