<?php
session_start();
require_once("db_connect.php");
$status=1;
if(isset($_POST)) {
	$id= mysqli_real_escape_string($conn, $_POST['id']);
	$memberid= mysqli_real_escape_string($conn, $_POST['memberid']);
$sq="SELECT * FROM members INNER JOIN user_packages ON members.id=user_packages.member_id WHERE user_packages.member_id ='$memberid'";
                $result = $conn->query($sq);
                if($result->num_rows > 0) {
				echo '<script type="text/javascript">alert("Package is already applied");window.location=\'user.php\';</script>';
				exit();
                 }

$querry = "INSERT INTO user_packages(id,member_id) VALUES('$id','$memberid')";

if($conn->query($querry)===TRUE)
{
$_SESSION['registerCompleted'] = true;
echo '<script type="text/javascript">alert("Package applied");window.location=\'user.php\';</script>';
exit();
}
else
{
echo "Error ".$querry."<br>".$conn->error;
}
}
else {
$_SESSION['registerError'] = true;
echo '<script type="text/javascript">alert("try again");window.location=\'user.php\';</script>';
exit();
}
$conn->close();
?>
