<?php
session_start();
require_once("db_connect.php");
$status=1;
if(isset($_POST)) {
	$plan= mysqli_real_escape_string($conn, $_POST['plan']);
$amount= mysqli_real_escape_string($conn, $_POST['amount']);


$querry = "INSERT INTO plans(plan,amount,status) VALUES('$plan','$amount','$status')";

if($conn->query($querry)===TRUE)
{
$_SESSION['registerCompleted'] = true;
echo '<script type="text/javascript">alert("Plan added");window.location=\'index.php?page=plans\';</script>';
exit();
}
else
{
echo "Error ".$querry."<br>".$conn->error;
}
}
else {
$_SESSION['registerError'] = true;
echo '<script type="text/javascript">alert("try again");window.location=\'index.php?page=plans\';</script>';
exit();
}
$conn->close();
?>
