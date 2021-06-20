

<?php include('db_connect.php');?>
<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="addschedule.php" id="manage-plan" method="POST">
				<div class="card">
					<div class="card-header">
						    Add schedule
				  	</div>
					<div class="card-body">
<input type="hidden" name="id">
<div class="form-group">
<input type="date" class="form-control" name="datefrom"  placeholder="Date From"  autocomplete="off" required>
</div>
<div class="form-group">
<input type="date" class="form-control"  name="dateto"  placeholder="Date To"   autocomplete="off" required>
</div>
<div class="form-group">
<input type="time" class="form-control"  name="timefrom"  placeholder="Time From" autocomplete="off" required>
</div>
<div class="form-group">
<input type="time" class="form-control"  name="timeto" placeholder="Time To" autocomplete="off" required>
</div>
</div>

							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-md btn-success col-sm-3 offset-md-3" type="submit"> Save</button>
								<button class="btn btn-md btn-secondary col-sm-3" type="reset"> Reset</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>


			
			
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<b>Schedule List</b>
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
									<th class="text-center">Date from</th>
									<th class="text-center">Date to</th>
									<th class="text-center">Time from</th>
									<th class="text-center">Time to</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$plan = $conn->query("SELECT * FROM schedules order by id asc");
								while($row=$plan->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p><b><?php echo $row['date_from'] ?></b></p>
									</td>
									<td class="">
										<p><b><?php echo $row['date_to'] ?></b></p>
									</td>
									<td class="">
										<p><b><?php echo $row['time_from'] ?></b></p>
									</td>
									<td class="">
										<p><b><?php echo $row['time_to'] ?></b></p>
									</td>
									
									<td class="text-center">
										<form method="POST" action="updateschedule.php">
	<input type="hidden" name="id" value=" <?PHP echo $row['id'] ?>">
	<button class="btn btn-sm btn-outline-primary edit_member" type="submit" name="edit">Edit</button>
	</form>
	<form method="POST" action="deleteschedule.php">
  <input type="hidden" name="schid" value=" <?PHP echo $row['id'] ?>">
	<button class="btn btn-sm btn-outline-danger delete_member" type="submit" name="delete">Delete</button>
	</td>	</form>
	</tr>

									
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
</style>
