<?php
session_start();
require_once("db_connect.php");
if(isset($_POST)) {
	$package= mysqli_real_escape_string($conn, $_POST['package']);
	$description =  $_POST['description'];
	$amount = mysqli_real_escape_string($conn, $_POST['amount']);
	$sql = "INSERT INTO packages(package,description,amount) VALUES ('$package','$description', '$amount')";
	if($conn->query($sql)===TRUE) {
		$_SESSION['jobPostSuccess'] = true;
		echo '<script type="text/javascript">alert("Package Added");window.location=\'index.php?page=packages\';</script>';
	exit();
	} else {
		echo "Error " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
} else {
	echo '<script type="text/javascript">alert("Try again");window.location=\'index.php?page=packages\';</script>';
	exit();
}
?>
