<div class="content-wrapper">
	<div class="content-header sty-one">


	</div>

	<!-- Main content -->
	<div class="content">
		<div class="card">
			<div class="card-body">

				<div class="table-responsive">
					<table id="example2" class="table table-bordered table-hover" data-name="cool-table">
						<thead>
						<tr>
							<th>ID </th>
							<th>Customer Name</th>
							<th>Reference</th>
							<th>Amount</th>
							<th>Status</th>
							<th>Action</th>



						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($bs as $b) {
							# code...
							?>

						<tr>
							<td><?php echo $b->id; ?></td>
							<td><?php echo $b->benificitaire; ?></td>
							<td><?php echo $b->reference; ?></td>
							<td><?php echo $b->montant; ?></td>
							<td><span class="label label-warning">New</span></td>
							<td><a href="<?php echo base_url('Admin/detail');?>">Plus de detail</a></td>
						</tr>
							<!--<td><span class="label label-primary">Pending</span></td>
							<td><span class="label label-success">Complete</span></td>-->

							<?php
						}

						?>


						</tbody>

					</table>
				</div>
			</div></div>



	</div>

</div>
