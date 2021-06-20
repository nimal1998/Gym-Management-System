<?php
session_start();
require_once("db_connect.php");
if(isset($_POST)) {
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$des = mysqli_real_escape_string($conn, $_POST['des']);
	$amount= mysqli_real_escape_string($conn, $_POST['amount']);
	$sql = "UPDATE packages SET  package='$name', description ='$des',amount ='$amount'  WHERE id='$id'";
	if($conn->query($sql) === TRUE) {
		echo '<script type="text/javascript">alert("Package Updated");window.location=\'index.php?page=packages\';</script>';
		exit();
	}
	else
	 {
		echo "Error ".$sql."<br>".$conn->error;
	}
	$conn->close();
} else {
	echo '<script type="text/javascript">alert("Try again");window.location=\'index.php?page=packages\';</script>';
	exit();
}
?>
