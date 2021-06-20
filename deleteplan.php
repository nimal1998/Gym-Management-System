<?php
	include 'db_connect.php';					
if($_POST)
{
$planid=$_POST['planid'];							
$sql="delete from  plans  where id='$planid'";
$result=$conn->query($sql);
echo '<script type="text/javascript">alert("Plan Deleted");window.location=\'index.php?page=plans\';</script>';


}
?>