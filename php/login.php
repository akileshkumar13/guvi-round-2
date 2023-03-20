<?php

require_once('db.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = 'SELECT firstname,lastname,username,emailid FROM users WHERE username=? and password=?'; 
$stmt = $conn->prepare($sql); 
$stmt->bind_param("ss", $username,$password);


$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$res = ["error" => 'Invalid credencials'];
if($user) {
  $res = ["success" => $user];
}
echo json_encode($res);

$conn->close();
