<?php include('db_connect.php');?>

<div class="container-fluid">

	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="addplan.php" id="manage-plan" method="POST">
				<div class="card">
					<div class="card-header">
						    Plan Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Plan (months)</label>
								<input type="number" class="form-control" min="1" name="plan" >
							</div>
							<div class="form-group">
								<label class="control-label">Amount</label>
								<input type="number" class="form-control" step="any" name="amount">
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
						<b>Plan List</b>
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
									<th class="text-center">Plan</th>
									<th class="text-center">Amount</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$plan = $conn->query("SELECT * FROM plans order by id asc");
								while($row=$plan->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p><b><?php echo $row['plan'] ?></b> month/s</p>
									</td>
									<td class="text-right">
										<b><?php echo number_format($row['amount'],2) ?></b>
									</td>
									<td class="text-center">
									<form method="POST" action="updateplan.php">
	<input type="hidden" name="id" value=" <?PHP echo $row['id'] ?>">
	<button class="btn btn-sm btn-outline-primary edit_member" type="submit" name="edit">Edit</button>
	</form>


										<form method="POST" action="deleteplan.php">
  <input type="hidden" name="planid" value=" <?PHP echo $row['id'] ?>">
	<button class="btn btn-sm btn-outline-danger delete_member" type="submit" name="delete">Delete</button>
	</td>	</form>
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
