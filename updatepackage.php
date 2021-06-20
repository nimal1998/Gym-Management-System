<?php include('db_connect.php');?>
<?php
$id=$_POST['id'];
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
<form action="updat.php" id="manage-package" method="POST">
<div class="card">
<?php
$sql="SELECT * FROM packages where id='$id'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
 ?>
<div class="card-header">
Update Package
</div>
<div class="card-body">
<input type="hidden" name="id">
<div class="form-group">
<label class="control-label">Package Name</label>
<input type="text" class="form-control" name="name" value="<?php echo $row['package']?>">
</div>
<div class="form-group">
<label class="control-label">Description</label>
<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']?>">
<input type="text" class="form-control" name="des" value="<?php echo $row['description']?>">
</div>
<div class="form-group">
<label class="control-label">Amount</label>
<input type="text" class="form-control"  name="amount" value="<?php echo $row['amount']?>">
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
