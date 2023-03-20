<?php
  
  $m = new MongoClient("mongodb://localhost:27017");
  echo "Connection to database successfully";
  $db = $m->mydb;
  echo "Database mydb selected";
  $collection = $db->createCollection("profile");


  
$age = $_POST['age'];
$dob  = $_POST['dob'];
$mobile = $_POST['mobile'];
$username = $_POST['username'];
$address = $_POST['address'];


  $document = array( 
    "username" => $username, 
    "age" => $age,
    "dob" => $dob,
    "mobileno" => $mobile,
    "address" => $address
 );

 $collection->Update($document);

 echo json_encode(["success" => 'Profile Update completed']); exit;


