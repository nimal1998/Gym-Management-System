<?php
session_start();
require_once("db_connect.php");
if(isset($_POST)) {


	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$plan = mysqli_real_escape_string($conn, $_POST['plan']);

	$amount = mysqli_real_escape_string($conn, $_POST['amount']);
	
	$sql = "UPDATE plans SET  plan='$plan', amount ='$amount'  WHERE id='$id'";

	if($conn->query($sql) === TRUE) {
		echo '<script type="text/javascript">alert("plan Updated");window.location=\'index.php?page=plans\';</script>';


		exit();
	}
	else
	 {
		echo "Error ".$sql."<br>".$conn->error;
	}

	$conn->close();

} else {
	echo '<script type="text/javascript">alert("Try again");window.location=\'index.php?page=plans\';</script>';

	exit();

}
?>
