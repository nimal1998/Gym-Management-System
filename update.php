<?php
session_start();
require_once("db_connect.php");
if(isset($_POST)) {


	$id = mysqli_real_escape_string($conn, $_POST['member_id']);
	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);

	$middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
	$lastname= mysqli_real_escape_string($conn, $_POST['lastname']);

	$contact = mysqli_real_escape_string($conn, $_POST['contact']);

	$email= mysqli_real_escape_string($conn, $_POST['email']);

	$sql = "UPDATE members SET  firstname='$firstname', middlename ='$middlename',lastname ='$lastname',contact ='$contact',email ='$email'  WHERE member_id='$id'";

	if($conn->query($sql) === TRUE) {
		echo '<script type="text/javascript">alert("Member Updated");window.location=\'index.php?page=members\';</script>';


		exit();
	}
	else
	 {
		echo "Error ".$sql."<br>".$conn->error;
	}

	$conn->close();

} else {
	echo '<script type="text/javascript">alert("Try again");window.location=\'index.php?page=members\';</script>';

	exit();

}
?>
