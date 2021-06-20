<?php include('db_connect.php');?>

<div class="container-fluid">

<div class="col-lg-12">
<div class="row">
<div class="col-md-4">
<form action="package.php" id="manage-package" method="POST">
<div class="card">
<div class="card-header">
  Package Form
	</div>
	<div class="card-body">
  <input type="hidden" name="id">
	<div class="form-group">
	<label class="control-label">Package Name</label>
	<input type="text" class="form-control" name="package">
	</div>
	<div class="form-group">
	<label class="control-label">Description</label>
	<textarea class="form-control" cols="30" rows='3' name="description"></textarea>
	</div>
	<div class="form-group">
	<label class="control-label">Amount</label>
	<input type="number" class="form-control" step="any" name="amount">
	</div>
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
	</form>
	</div>
	<div class="col-md-8">
	<div class="card">
	<div class="card-header">
	<b>Package List</b>
	</div>
	<div class="card-body">
	<table class="table table-bordered table-hover">
	<colgroup>
	<col width="5%">
	<col width="55%">
	<col width="20%">
	<col width="20%">
	</colgroup>
	<thead>
	<tr>
	<th class="text-center">#</th>
	<th class="text-center">package</th>
	<th class="text-center">Amount</th>
	<th class="text-center">Action</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i = 1;
	$package = $conn->query("SELECT * FROM packages order by id asc");
	while($row=$package->fetch_assoc()):
	?>
	<tr>
	<td class="text-center"><?php echo $i++ ?></td>
	<td class="">
	<p>package: <b><?php echo $row['package'] ?></b></p>
	<p>Description: <small><b><?php echo $row['description'] ?></b></small></p>

  </td>
	<td class="text-right">
  <b><?php echo number_format($row['amount'],2) ?></b>
	</td>
	<td class="text-center">
	<form method="POST" action="updatepackage.php">
	<input type="hidden" name="id" value=" <?PHP echo $row['id'] ?>">
	<button class="btn btn-sm btn-outline-primary edit_member" type="submit" name="edit">Edit</button>
	</form>
	<form method="POST" action="deletepack.php">
	<input type="hidden" name="delete" value=" <?PHP echo $row['id'] ?>">
	<button class="btn btn-sm btn-outline-danger delete_member" type="submit">Delete</button>
	</td>	</form>

  </tr>
	<?php endwhile; ?>
	</tbody>
	</table>
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
