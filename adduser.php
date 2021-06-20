<?php include('db_connect.php');?>
<?php
include('header.php');
include('topbar.php');
include('navbar.php');
 ?>
<div class="container-fluid">
<div class="col-lg-12">
<div class="row">
<div class="col-md-4">
<div class="card">
</div>
</form>
</div>
<div class="col-md-8">
<br><br><br><br>
<form action="addmember.php" id="manage-package" method="POST">
<div class="card">
<div class="card-header">
Add Member
</div>
<div class="card-body">
<input type="hidden" name="id">
<div class="form-group">
<input type="text" class="form-control" name="firstname"  placeholder="First Name" pattern="[a-zA-Z]+" autocomplete="off" required>
</div>
<div class="form-group">
<input type="text" class="form-control"  name="middlename"  placeholder="Middle name" pattern="[a-zA-Z]+"  autocomplete="off" required>
</div>
<div class="form-group">
<input type="text" class="form-control"  name="lastname"  placeholder="Last name" pattern="[a-zA-Z]+" autocomplete="off" required>
</div>
<div class="form-group">
<input type="email" class="form-control"  name="email" placeholder="Email" autocomplete="off" required>
</div>
<div class="form-group">
<select class="form-control"  name="gender"  required>
<option>Male</option>
<option>Female</option>
</select>
</div>
<div class="form-group">
<input type="text" class="form-control"  name="contact" autocomplete="off"  minlength="10" pattern="[0-9]+" maxlength="10"  placeholder="Contact Number" required>
</div>
<div class="form-group">
<input type="text" class="form-control"  name="address"  pattern="[a-zA-Z0-9 ]+"   placeholder="Address" autocomplete="off" required>
</div>
<div class="form-group">
<input type="password" class="form-control" name="pass"  placeholder="password"  autocomplete="off" required>
</div>
<div class="card-footer">
<div class="row">
<div class="col-md-12">
<button class="btn btn-md btn-success col-sm-3 offset-md-3" type="submit"> Submit</button>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
<style>

td{
	vertical-align: middle !important;
	}
</style>
