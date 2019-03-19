<div class="content-wrapper">
	<div class="content-header sty-one">

	</div>

	<!-- Main content -->
	<div class="content">
		<?php echo form_open('Admin/save'); ?>
<?php if (isset($message)) { ?>       
   <div class="alert alert-success" role="alert">Operation is done Correctly</div>
         <?php } ?>
		<div class="row">

			<div class="col-lg-12">
				<div class="box box-primary">

					<div class="box-header with-border">
						<h3 class="box-title">Compose New Message</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body pad-10">
						<div class="form-group">
							<input class="form-control" placeholder="To:" name="destinataire" id="destinataire" required>
																					<?php echo form_error('destinataire'); ?> 

						</div>

						<div class="form-group">
							<input class="form-control" placeholder="Subject:" name="sujet" id="sujet" required>
														<?php echo form_error('sujet'); ?> 



						</div>

						<div class="form-group">
							<textarea id="compose-textarea" class="form-control" style="height: 300px" name="message" id="message" required></textarea>
							<?php echo form_error('message'); ?> 

						</div>
	
					</div>
					<?php echo form_close(); ?>
					<div id="fugo">

</div>
					<!-- /.box-body -->
					<div class="box-footer m-b-2">
						<div class="pull-right">
							<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o" id="submit"></i> Send</button>
						</div>
					</div>
					<!-- /.box-footer -->
				</div>
				<!-- /. box -->
			</div>
		</div>
		<!-- Main row -->
	</div>
	<!-- /.content -->
</div>

