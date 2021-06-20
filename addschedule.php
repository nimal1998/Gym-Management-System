<?php
session_start();
require_once("db_connect.php");
$status=1;
if(isset($_POST)) {
	$datefrom= mysqli_real_escape_string($conn, $_POST['datefrom']);
$dateto= mysqli_real_escape_string($conn, $_POST['dateto']);
	$timefrom= mysqli_real_escape_string($conn, $_POST['timefrom']);
$timeto= mysqli_real_escape_string($conn, $_POST['timeto']);

$querry = "INSERT INTO schedules(date_from,date_to,time_from,time_to) VALUES('$datefrom','$dateto','$timefrom','$timeto')";

if($conn->query($querry)===TRUE)
{
$_SESSION['registerCompleted'] = true;
echo '<script type="text/javascript">alert("Schedule  added");window.location=\'index.php?page=schedule\';</script>';
exit();
}
else
{
echo "Error ".$querry."<br>".$conn->error;
}
}
else {
$_SESSION['registerError'] = true;
echo '<script type="text/javascript">alert("Try again");window.location=\'index.php?page=schedule\';</script>';
exit();
}
$conn->close();
?>
