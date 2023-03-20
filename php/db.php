<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "sirius09*^";
 $db = "interview3";
 $conn = new mysqli($dbhost, $dbuser, $dbpass) ;
 
try {
 $conn->select_db($db);
}
catch(Exception $e) {
  $conn->query("CREATE DATABASE IF NOT EXISTS $db");
  $conn->select_db($db);
  $sql = "CREATE TABLE IF NOT EXISTS `users` (
  `USERID` int(11) NOT NULL AUTO_INCREMENT,
  `FIRSTNAME` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LASTNAME` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAILID` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `USERNAME` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `PASSWORD` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CREATEDON` datetime DEFAULT NULL,
  `UPDATEDON` datetime DEFAULT NULL,
  `ISACTIVE` int(11) DEFAULT NULL,
  PRIMARY KEY (`USERID`,`USERNAME`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

$retval = mysqli_query( $conn, $sql );
   
if(! $retval ) {
   die('Could not create table: ' . mysql_error());
}
echo "Table user created successfully\n";
}
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) ;
 if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 
?>
