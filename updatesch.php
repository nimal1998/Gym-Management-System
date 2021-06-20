<?php
session_start();
require_once("db_connect.php");
if(isset($_POST)) {


	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$datefrom = mysqli_real_escape_string($conn, $_POST['datefrom']);

	$dateto = mysqli_real_escape_string($conn, $_POST['dateto']);
	$timefrom= mysqli_real_escape_string($conn, $_POST['timefrom']);
	$timeto = mysqli_real_escape_string($conn, $_POST['timeto']);
	
	$sql = "UPDATE schedules SET  date_from='$datefrom', date_to ='$dateto',time_from='$timefrom', time_to ='$timeto'  WHERE id='$id'";

	if($conn->query($sql) === TRUE) {
		echo '<script type="text/javascript">alert("schedule Updated");window.location=\'index.php?page=schedule\';</script>';


		exit();
	}
	else
	 {
		echo "Error ".$sql."<br>".$conn->error;
	}

	$conn->close();

} else {
	echo '<script type="text/javascript">alert("Try again");window.location=\'index.php?page=schedule\';</script>';

	exit();

}
?>
