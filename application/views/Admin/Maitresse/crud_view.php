<div class="content-wrapper">
	<!-- Content Header (Page header) -->


	<!-- Main content -->
	<div class="content">
		<div class="card">
			<div class="card-body">


		<h3>Teachers List :</h3><div class="text-right"> <button  onclick="add_person()" class="btn btn-rounded btn-danger"><i class="icon-plus"> Add Teacher Hir</i></button></div>



		<table id="table" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
			<thead>
			<tr>
				<th style="width:20px">Picture</th>
				<th>First Name</th>
				<th style="width:15px">Last Name</th>
				<th style="width:15px">Gender</th>
				<th>Address</th>
				<th>Date of Birth</th>
				<th>Phone Number</th>


				<th>Action</th>
			</tr>
			</thead>
			<tbody>

			</tbody>


		</table>
	</div>






	<!-- Bootstrap modal -->
	<div class="modal fade" id="modal_form" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title">Person Form</h3>
					<ol class="breadcrumb bc-colored bg-primary m-b-3">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Library</li>
					</ol>
				</div>
				<div class="modal-body form">
					<form action="#" id="form" class= enctype="multipart/form-data" >
						<input type="hidden" value="" name="id"/>
						<div class="form-body">
							<div class="form-group">

								<input type="file" name="image_file" id="image_file" />
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">First Name</label>
								<div class="col-md-9">
									<input name="firstName" placeholder="First Name" class="form-control" type="text">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Last Name</label>
								<div class="col-md-9">
									<input name="lastName" placeholder="Last Name" class="form-control" type="text">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Gender</label>
								<div class="col-md-9">
									<select name="gender" class="form-control">
										entries				<option value="">--Select Gender--</option>
										<option value="male">Male</option>
										<option value="female">Female</option>
									</select>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Address</label>
								<div class="col-md-9">
									<textarea name="address" placeholder="Address" class="form-control"></textarea>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Phone Number</label>
								<div class="col-md-9">
									<input type="number" name="telephone" placeholder="Phone Number" class="form-control"></input>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Date of Birth</label>
								<div class="col-md-9">
									<input name="dob" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
									<span class="help-block"></span>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>

		<!--	<div class="modal fade" id="modal_form" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
			<div class="row m-t-3">
				<div class="col-lg-12">
					<div class="card ">
						<div class="card-header bg-blue">
							<h5 class="text-white m-b-0">User Profile</h5>
						</div>
						<div class="card-body">

							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group has-feedback">
											<label class="control-label">First Name</label>
											<input class="form-control" placeholder="First Name" type="text">
											<span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
									</div>
									<div class="col-md-6">
										<div class="form-group has-feedback">
											<label class="control-label">Last Name</label>
											<input class="form-control" placeholder="Last Name" type="text">
											<span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
									</div>
									<div class="col-md-6">
										<div class="form-group has-feedback">
											<label class="control-label">E-mail</label>
											<input class="form-control" placeholder="E-mail" type="text">
											<span class="fa fa-envelope-o form-control-feedback" aria-hidden="true"></span> </div>
									</div>
									<div class="col-md-6">
										<div class="form-group has-feedback">
											<label class="control-label">Contact Number</label>
											<input class="form-control" placeholder="Contact Number" type="text">
											<span class="fa fa-phone form-control-feedback" aria-hidden="true"></span> </div>
									</div>
									<div class="col-md-6">
										<div class="form-group has-feedback">
											<label class="control-label">Company</label>
											<input class="form-control" placeholder="Company" type="text">
											<span class="fa fa-briefcase form-control-feedback" aria-hidden="true"></span> </div>
									</div>
									<div class="col-md-6">
										<div class="form-group has-feedback">
											<label class="control-label">Website</label>
											<input class="form-control" placeholder="https://" type="text">
											<span class="fa fa-globe form-control-feedback" aria-hidden="true"></span> </div>
									</div>
									<div class="col-md-12">
										<div class="form-group has-feedback">
											<label class="control-label">Bio</label>
											<textarea class="form-control" id="placeTextarea" rows="3" placeholder="Bio"></textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group has-feedback">
											<label class="custom-file center-block block">
												<input id="file" class="custom-file-input" type="file">
												<span class="custom-file-control"></span> </label>
										</div>
									</div>
									<div class="col-md-12">
										<button type="submit" class="btn btn-success">Submit</button>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div></div></div></div>-->





		</div></div>

</div>
<script type="text/javascript">

	var save_method; //for save method string
	var table;


	function add_person()
	{
		save_method = 'add';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form').modal('show'); // show bootstrap modal
		$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
	}

	function edit_person(id)
	{
		save_method = 'update';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string


		//Ajax Load data from ajax
		$.ajax({
			url : "<?php echo site_url('Admin/ajax_edit/')?>/" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
				//console.log("".data.firstName);
				$('[name="id"]').val(data.id);
				$('[name="picture"]').val(data.picture);
				$('[name="firstName"]').val(data.firstName);
				$('[name="lastName"]').val(data.lastName);
				$('[name="gender"]').val(data.gender);
				$('[name="address"]').val(data.address);
				$('[name="telephone"]').val(data.address);

				$('[name="dob"]').datepicker('update',data.dob);
				$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});
	}

	function reload_table()
	{
		table.ajax.reload(null,false); //reload datatable ajax
	}

	function save()
	{
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled',true); //set button disable
		var url;

		if(save_method == 'add') {
			url = "<?php echo site_url('Admin/ajax_add')?>";
		} else {
			url = "<?php echo site_url('Admin/ajax_update')?>";
		}

		// ajax adding data to database
		$.ajax({
			url : url,
			type: "POST",
			data: $('#form').serialize(),
			dataType: "JSON",
			success: function(data)
			{

				if(data.status) //if success close modal and reload ajax table
				{
					$('#modal_form').modal('hide');
					reload_table();
				}
				else
				{
					for (var i = 0; i < data.inputerror.length; i++)
					{
						$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
						$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
					}
				}
				$('#btnSave').text('save'); //change button text
				$('#btnSave').attr('disabled',false); //set button enable


			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error adding / update data');
				$('#btnSave').text('save'); //change button text
				$('#btnSave').attr('disabled',false); //set button enable

			}
		});
	}

	function delete_person(id)
	{
		if(confirm('Are you sure delete this data?'))
		{
			// ajax delete data to database
			$.ajax({
				url : "<?php echo site_url('Admin/ajax_delete')?>/"+id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					//if success reload ajax table
					$('#modal_form').modal('hide');
					reload_table();
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error deleting data');
				}
			});

		}
	}
	$(document).ready(function(){
		$('#form').on('submit', function(e){
			e.preventDefault();
			console.log("traiter");
			if($('#image_file').val() == '')
			{
				alert("Please Select the File");
			}
			else
			{
				console.log("ok");
				$.ajax({
                                    url:"<?php echo base_url(); ?>Admin/ajax_upload",
					//base_url() = http://localhost/tutorial/codeigniter
					method:"POST",
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function(data)
					{
						//$('#uploaded_image').html(data);
						console.Log(data);
					}
				});
			}
		});
	});

</script>
