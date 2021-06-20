<?php
session_start();
require_once "db_connect.php";
$role="";
if(isset($_POST["btnLogin"]))
{
$username=$_POST["username"];
$password=$_POST["password"];
$pass=md5($password);
$query = "SELECT * FROM users WHERE username='$username' AND password='$pass'";
$result= $conn->query($query);
if(mysqli_num_rows($result)>0)
{
while($row=mysqli_fetch_assoc($result))
{
if( $row["name"] == "Admin")
{
$_SESSION['Adminuser']	= $row["username"];
header('Location:index.php') ;
}
elseif($row["type"] == "3")
{
$_SESSION['user'] = $row["username"];
header('Location:user.php') ;
}
}
}
else
{
echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'login.php\';</script>';
}
}
?>
