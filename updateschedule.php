<?php include('db_connect.php');?>
<?php
$id=$_POST['id'];
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
<form action="updatesch.php" id="manage-package" method="POST">
<div class="card">
<?php
$sql="SELECT * FROM schedules where id='$id'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
<div class="card-header">
Update Schedule
</div>
<div class="card-body">
<input type="hidden" name="id">
<div class="form-group">
<label class="control-label">Date from</label>
<input type="text" class="form-control" name="datefrom" value="<?php echo $row['date_from']?>">
</div>
<div class="form-group">
<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']?>">
</div>
<div class="form-group">
<label class="control-label">Date to</label>
<input type="text" class="form-control"  name="dateto" value="<?php echo $row['date_to']?>">
</div>
<div class="form-group">
<label class="control-label">Time From</label>
<input type="text" class="form-control"  name="timefrom" value="<?php echo $row['time_from']?>">
</div>
<div class="form-group">
<label class="control-label">Time To</label>
<input type="text" class="form-control"  name="timeto" value="<?php echo $row['time_to']?>">
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
