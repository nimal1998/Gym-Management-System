<?php include('db_connect.php');?>
<?php
$id=$_POST['trainer_id'];
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
<form action="updatetra.php" id="manage-package" method="POST">
<div class="card">
<?php
$sql="SELECT * FROM trainer where id='$id'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
<div class="card-header">
Update Trainer
</div>
<div class="card-body">
<input type="hidden" name="id">
<div class="form-group">
<label class="control-label">Name</label>
<input type="text" class="form-control" name="name" value="<?php echo $row['name']?>">
</div>
<div class="form-group">
<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']?>">
</div>
<div class="form-group">
<label class="control-label">Email </label>
<input type="email" class="form-control"  name="email" value="<?php echo $row['email']?>">
</div>
<div class="form-group">
<label class="control-label">Contact</label>
<input type="text" class="form-control"  name="contact" value="<?php echo $row['contact']?>">
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
