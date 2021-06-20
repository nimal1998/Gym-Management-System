<?php
include 'db_connect.php';					
if($_POST)
{
$id=$_POST['delete'];	
echo "$id";						

$sql="delete from  packages  where id='$id'";
$result=$conn->query($sql);
echo '<script type="text/javascript">alert("Package deleted");window.location=\'index.php?page=packages\';</script>';



}
?>