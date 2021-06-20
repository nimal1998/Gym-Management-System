<?php
session_start();
require_once("db_connect.php");
$status=1;
if(isset($_POST)) {
	$firstname= mysqli_real_escape_string($conn, $_POST['firstname']);
$middlename= mysqli_real_escape_string($conn, $_POST['middlename']);
$lastname= mysqli_real_escape_string($conn, $_POST['lastname']);
$contact= mysqli_real_escape_string($conn, $_POST['contact']);
$email= mysqli_real_escape_string($conn, $_POST['email']);
$address= mysqli_real_escape_string($conn, $_POST['address']);
$gender= mysqli_real_escape_string($conn, $_POST['gender']);
$pass= mysqli_real_escape_string($conn, $_POST['pass']);
$password = MD5($pass);

$querry = "INSERT INTO users(name, username, password, type) VALUES('$firstname','$firstname', '$password',3 )";
mysqli_query($conn, $querry);
$n = mysqli_insert_id($conn);
$sql = "INSERT INTO members(firstname, middlename,lastname,gender,email,contact,address,Status,id) VALUES ('$firstname','$middlename', '$lastname','$gender','$email', '$contact','$address','$status','$n')";
if($conn->query($sql)===TRUE)
{
$_SESSION['registerCompleted'] = true;
echo '<script type="text/javascript">alert("Member added");window.location=\'adduser.php\';</script>';
exit();
}
else
{
echo "Error ".$sql."<br>".$conn->error;
}
}
else {
$_SESSION['registerError'] = true;
echo '<script type="text/javascript">alert("Member added");window.location=\'adduser.php\';</script>';
exit();
}
$conn->close();
?>
