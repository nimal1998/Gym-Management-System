<?php
	include 'db_connect.php';					
if($_POST)
{
$memberid=$_POST['trainerid'];							
$sql="update trainer set status='0'  where id='$memberid'";
$result=$conn->query($sql);
echo '<script type="text/javascript">alert("Member Deleted");window.location=\'index.php?page=trainer\';</script>';


}
?>