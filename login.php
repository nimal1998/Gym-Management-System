<!DOCTYPE html>
<!-- login chayumbol olla image okk mattan login.php -->
<html lang="en">
<?php
session_start();
include('./db_connect.php');

?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gym Management System</title>


<?php include('./header.php'); ?>
<?php

?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white;
	}
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:#59b6ec61;
		display: flex;
		align-items: center;
		background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>);
	    background-repeat: no-repeat;
	    background-size: cover;
	}
	#login-right .card{
		margin: auto;
		z-index: 1
	}
	.logo {
    margin: auto;
    font-size: 8rem;
    background: white;
    padding: .5em 0.7em;
    border-radius: 50% 50%;
    color: #000000b3;
    z-index: 10;
}
div#login-right::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: calc(100%);
    height: calc(100%);
    background: #000000e0;
}

</style>

<body>


<main id="main" class=" bg-dark">
<div id="login-left">
<img src="assets/img/img.jpg" alt="..." width="100%" height="130%">
</div>
<div class="row">
<div id="login-right">
<div class="card col-md-8">
<div class="card-body">
<form id="login-form" method="POST" action="validator.php" >
<div class="form-group">
<center><b><label for="username" class="control-label"> Login</label></center></b>
</div>

<div class="form-group">
<label for="username" class="control-label">Username</label>
<input type="text" id="username"  autocomplete="off" name="username" class="form-control">
</div>
<div class="form-group">
<label for="password" class="control-label">Password</label>
<input type="password" id="password"  name="password" class="form-control">
</div>
<center><button class="btn-md btn-block btn-wave col-md-5 btn-primary" name="btnLogin">Login</button></center>
</form>
</div>
</div>
</div>
</div>

</main>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>

<script type="text/javascript">
window.history.forward();
function noBack() {
window.history.forward();
}
</script>


</html>
