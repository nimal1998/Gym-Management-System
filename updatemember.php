<?php include('db_connect.php');?>
<?php
$member=$_POST['member_id'];
 include('header.php');
  include('topbar.php');
    include('navbar.php');
 // include('./auth.php');
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
<form action="update.php" id="manage-package" method="POST">
<div class="card">
<?php
$sql="SELECT * FROM members where member_id='$member'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
<div class="card-header">
Update Member
</div>
<div class="card-body">
<input type="hidden" name="id">
<div class="form-group">
<label class="control-label">First Name</label>
<input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname']?>">
</div>
<div class="form-group">
<input type="hidden" class="form-control" name="member_id" value="<?php echo $row['member_id']?>">
</div>
<div class="form-group">
<label class="control-label">Middle name</label>
<input type="text" class="form-control"  name="middlename" value="<?php echo $row['middlename']?>">
</div>
<div class="form-group">
<label class="control-label">Last name</label>
<input type="text" class="form-control"  name="lastname" value="<?php echo $row['lastname']?>">
</div>
<div class="form-group">
<label class="control-label">Email</label>
<input type="text" class="form-control"  name="email" value="<?php echo $row['contact']?>">
</div>
<div class="form-group">
<label class="control-label">Contact</label>
<input type="text" class="form-control"  name="contact" value="<?php echo $row['email']?>">
</div>
<div class="card-footer">
<div class="row">
<div class="col-md-12">
<button class="btn btn-md btn-success col-sm-3 offset-md-3"> Save</button>
<button class="btn btn-md btn-secondary col-sm-3" type="button" onclick="_reset()">Cancel</button>
</div>
</div>
</div>
</div>
<?php
}}
?>
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
