<html>
<head>
<title> Logout Admin </title>
</head>
<body>

<?php

//Start the previously set session_cache_expiresession_start();
//End the previously opened Session
session_start();
// remove all session variables
session_unset();

// destroy the session
session_destroy(); 
 
header("Location: http://localhost/Phonebook1/admin.php");

?>

</body>
</html>