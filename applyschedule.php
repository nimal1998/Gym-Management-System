<?php
session_start();
require_once("db_connect.php");
$status=1;
if(isset($_POST)) {
	$id= mysqli_real_escape_string($conn, $_POST['id']);
	$memberid= mysqli_real_escape_string($conn, $_POST['memberid']);
$sq="SELECT * FROM members INNER JOIN user_schedules ON members.id=user_schedules.member_id WHERE user_schedules.member_id ='$memberid'";
                $result = $conn->query($sq);
                if($result->num_rows > 0) {
				echo '<script type="text/javascript">alert("Schedule already taken");window.location=\'userschedule.php\';</script>';
				exit();
                 }

$querry = "INSERT INTO user_schedules(id,member_id) VALUES('$id','$memberid')";

if($conn->query($querry)===TRUE)
{
$_SESSION['registerCompleted'] = true;
echo '<script type="text/javascript">alert("Schedule Saved");window.location=\'userschedule.php\';</script>';
exit();
}
else
{
echo "Error ".$querry."<br>".$conn->error;
}
}
else {
$_SESSION['registerError'] = true;
echo '<script type="text/javascript">alert("try again");window.location=\'userschedule.php\';</script>';
exit();
}
$conn->close();
?>
