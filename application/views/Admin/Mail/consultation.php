<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header sty-one">
		<h1>Mailbox</h1>

	</div>

	<!-- Main content -->
	<div class="content">
		<div class="row">
			<div class="col-lg-2"> <a href="<?php echo base_url('Admin/ajoutmail');?>" class="btn btn-danger btn-block margin-bottom">Compose</a>

				<!-- /. box -->

				<!-- /.box -->
			</div>
			<div class="col-lg-10">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Inbox : </h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body no-padding">
						<div class="mailbox-controls">
							<!-- Check all button -->
							<button type="button" class="btn btn-default btn-sm checkbox-toggle"  id="checkboxall"><i class="fa fa-square-o"></i> </button>
							<div class="btn-group">
								<button  class="btn btn-default btn-sm delete_all" data-url="/itemDelete" url="/itemDelete" ><i class="fa fa-trash-o"> </i></button>
								<button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
							</div>
							<!-- /.btn-group -->

							<!-- /.pull-right -->
						</div>
						<div class="table-responsive mailbox-messages">
							<table class="table table-hover no-wrap table-striped">
								<thead>
      <tr>
          <th width="50px"><input type="checkbox" id="master"></th>
          <th>Title</th>
          <th>Description</th>
      </tr>
  </thead>
								<tbody>
									<?php 
									
										foreach ($blogs as $blog) {
											# code...
										?>

								<tr>
									<td><input type="checkbox"  class="sub_chk" value="'.$blog->id.'"></td>
									<td class="mailbox-name"><?php echo $blog->recepteur; ?></td>
									<td class="mailbox-subject"><a href="apps-mailbox-detail.html"><b>Lo</b><?php echo $blog->message; ?>.</a></td>
									<td class="mailbox-date"><?php echo $blog->date; ?></td>
								</tr>
								<?php 
							}

								?>


								</tbody>
							</table> 
							<!-- /.table -->
						</div>
						<!-- /.mail-box-messages -->
					</div>
					<!-- /.box-body -->
					<div class="box-footer no-padding m-b-2">
						<div class="mailbox-controls">
							<!-- Check all button -->
							<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i> </button>
							<div class="btn-group">
								<button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
								<button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
							</div>
							<!-- /.btn-group -->

							<!-- /.pull-right -->
						</div>
					</div>
				</div>
				<!-- /. box -->
			</div>
		</div>
		<!-- Main row -->
	</div>
	<!-- /.content -->
</div>
<script type="text/javascript">
    
</script>