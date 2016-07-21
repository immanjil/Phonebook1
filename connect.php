<?php

$DB_USER ='root';
$DB_PASSWORD = '';
$DB_HOST = 'localhost';
$DB_NAME ='site';

$db= new mysqli($DB_HOST,$DB_USER, $DB_PASSWORD, $DB_NAME)
or die("Unable to Connect");

Echo "Great Job"

?>

/*function register($v_firstName,$v_middleName,$v_lastName,$v_phoneNumber,$v_email)
{
	$insert_query="insert into tables set"; 
	$insert_query .= "v_firstName = '".$v_firstName."',";
	$insert_query .= "v_middleName = '".$v_middleName."',";
	$insert_query .= "v_lastName = '".$v_lastName."',";
	$insert_query .= "v_phoneNumber = '".$v_phoneNumber."',";
	$insert_query .= "v_email = '".$v_email."',";
	$db->query($insert_query);

}*/
