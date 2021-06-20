<?php
	include 'db_connect.php';					
if($_POST)
{
$memberid=$_POST['memberid'];							
$sql="delete from  members  where member_id='$memberid'";
$result=$conn->query($sql);
echo '<script type="text/javascript">alert("Member Deleted");window.location=\'index.php?page=members\';</script>';


}
?>