<?php
	include 'db_connect.php';					
if($_POST)
{
$id=$_POST['schid'];							
$sql="delete from  schedules  where id='$id'";
$result=$conn->query($sql);
echo '<script type="text/javascript">alert(" Deleted Successfully");window.location=\'index.php?page=schedule\';</script>';


}
?>