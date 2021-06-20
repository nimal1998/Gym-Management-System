<?php
session_start();
require_once("db_connect.php");
$status=1;
if(isset($_POST)) {
	$name= mysqli_real_escape_string($conn, $_POST['name']);

$contact= mysqli_real_escape_string($conn, $_POST['contact']);
$email= mysqli_real_escape_string($conn, $_POST['email']);
$id= mysqli_real_escape_string($conn, $_POST['id']);


$sql = "update trainer set name='$name', email='$email',contact='$contact' where id='$id'";
if($conn->query($sql)===TRUE)
{
$_SESSION['registerCompleted'] = true;
echo '<script type="text/javascript">alert("Trainer Updated");window.location=\'index.php?page=trainer\';</script>';
exit();
}
else
{
echo "Error ".$sql."<br>".$conn->error;
}
}
else {
$_SESSION['registerError'] = true;
echo '<script type="text/javascript">alert("Trainer not Updated");window.location=\'index.php?page=trainer\';</script>';
exit();
}
$conn->close();
?>
