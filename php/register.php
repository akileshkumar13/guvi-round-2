<?php



require_once('db.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$emailid = $_POST['emailid'];
$username = $_POST['username'];
$password = $_POST['password'];


$sql = 'SELECT * FROM users WHERE username=?'; 
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $username);

$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if($user) {
  echo json_encode(["error" => 'Username already registered']); exit;
}
else {

  $stmt = $conn->prepare("INSERT INTO `users`(`firstname`, `lastname`, `emailid`, `username`, `password`) VALUES (?,?,?,?,?)");
  $stmt->bind_param("sssss", $firstname, $lastname, $emailid,$username,$password);

  $stmt->execute();
  $stmt->get_result(); 
  echo json_encode(["success" => 'Registration completed']); exit;

}
  $conn->close();
