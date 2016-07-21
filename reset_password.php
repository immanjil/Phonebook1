<html>
<head>
<title> Reset Password </title>
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
echo "<form action='reset_password_question.php' method='post'>";
echo "<tr>";

echo "<tr><td><b>User Name</b></td>";
echo "<td><input type='text' name='v_userName' value='' maxlength=50></td></tr>";

//Submit the chosen contacts to be deleted
echo "<td> <input type='submit' value='Submit'>";

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