<?php include('db_connect.php');?>

<div class="container-fluid">
<style>
	input[type=checkbox]
{

  -ms-transform: scale(1.5);
	-moz-transform: scale(1.5);
  -webkit-transform: scale(1.5);
  -o-transform: scale(1.5);
  transform: scale(1.5);
  padding: 10px;
}
</style>
	<div class="col-lg-12">
	<div class="row mb-4 mt-4">
	<div class="col-md-12">
	</div>
	</div>
	<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
	<div class="col-md-12">
	<div class="card">
	<div class="card-header">
	<b>Trainers List</b>
	<span class="">

 <form action="addtrainer.php" method="post">
 <button class="btn btn-success btn-block btn-sm col-sm-2 float-right" type="submit" id="new_member">
 <i class="fa fa-plus"></i> New</button></form>
 </span>
	</div>
	<div class="card-body">
	<table class="table table-bordered table-condensed table-hover">
	<colgroup>
	<col width="5%">
	<col width="15%">
	<col width="20%">
	<col width="20%">
	<col width="20%">
	</colgroup>
	<thead>
	<tr>
	<th class="text-center">Sl.NO</th>
 <th class="">Name</th>
	<th class="">Email</th>
	<th class="">Contact</th>
	<th class="text-center">Action</th>
	</tr>
	</thead>
	<tbody>
	<?php
		$i = 1;
		$member =  $conn->query("SELECT * from trainer where status='1' order by name asc ");
		while($row=$member->fetch_assoc()):
	?>
		<tr>
		<td class="text-center"><?php echo $i++ ?></td>
		<td class="">
	 <p><b><?php echo $row['name'] ?></b></p>
		</td>
		<td class="">
	  <p><b><?php echo $row['email'] ?></b></p>
		</td>
		<td class="">
	 <p><b><?php echo $row['contact'] ?></b></p>
	 </td>
	<td class="text-center">
	<form method="POST" action="updatetrainer.php">
	<input type="hidden" name="trainer_id" value=" <?PHP echo $row['id'] ?>">
	<button class="btn btn-sm btn-outline-primary edit_member" type="submit" name="edit">Edit</button>
	</form>
	<form method="POST" action="deletetrainer.php">
  <input type="hidden" name="trainerid" value=" <?PHP echo $row['id'] ?>">
	<button class="btn btn-sm btn-outline-danger delete_member" type="submit" name="delete">Delete</button>
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
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
