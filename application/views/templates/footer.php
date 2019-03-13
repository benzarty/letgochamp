<footer class="main-footer">
	Copyright © 2019. All rights reserved.</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Tab panes -->
	<div class="tab-content">
		<!-- Home tab content -->
		<div class="tab-pane" id="control-sidebar-home-tab"></div>
		<!-- /.tab-pane -->
	</div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/dashboard/dist/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/dashboard/dist/plugins/jquery-ui/jquery-ui.min.js')?>"></script>

<script src="<?php echo base_url('assets/dashboard/dist/plugins/popper/popper.min.js');?>"></script>
<script src="<?php echo base_url('assets/dashboard/dist/bootstrap/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>

<!-- template -->
<script src="<?php echo base_url('assets/dashboard/dist/js/bizadmin.js');?>"></script>

<!-- for demo purposes -->
<script src="<?php echo base_url('assets/dashboard/dist/js/demo.js');?>"></script>

<!-- jsgrid Tables -->
<script src="<?php echo base_url('assets/dashboard/dist/plugins/jsgrid/db.js');?>"></script>
<script src="<?php echo base_url('assets/dashboard/dist/plugins/jsgrid/jsgrid.min.js');?>"></script>
<script src="<?php echo base_url('assets/dashboard/dist/plugins/jsgrid/jsgrid.int.js');?>"></script>

<script src="<?php echo base_url('assets/dashboard/dist/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/dashboard/dist/plugins/datatables/dataTables.bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/datatables/datatables/js/jquery.dataTables.min.js')?>"></script>

<script>
	$(function () {
		$('#example1').DataTable()
		$('#example2').DataTable({
			'paging'      : true,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : false
		})
	})
</script>

<!-- iCheck -->
<script src="<?php echo base_url('assets/dashboard/dist/plugins/iCheck/icheck.min.js');?>"></script>

<!-- Page Script -->
<script>
	$(function () {
		//Enable iCheck plugin for checkboxes
		//iCheck for checkbox and radio inputs
		$('.mailbox-messages input[type="checkbox"]').iCheck({
			checkboxClass: 'icheckbox_flat-blue',
			radioClass: 'iradio_flat-blue'
		});

		//Enable check and uncheck all functionality
		$(".checkbox-toggle").click(function () {
			var clicks = $(this).data('clicks');
			if (clicks) {
				//Uncheck all checkboxes
				$(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
				$(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
			} else {
				//Check all checkboxes
				$(".mailbox-messages input[type='checkbox']").iCheck("check");
				$(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
			}
			$(this).data("clicks", !clicks);
		});

		//Handle starring for glyphicon and font awesome
		$(".mailbox-star").click(function (e) {
			e.preventDefault();
			//detect type
			var $this = $(this).find("a > i");
			var glyph = $this.hasClass("glyphicon");
			var fa = $this.hasClass("fa");

			//Switch states
			if (glyph) {
				$this.toggleClass("glyphicon-star");
				$this.toggleClass("glyphicon-star-empty");
			}

			if (fa) {
				$this.toggleClass("fa-star");
				$this.toggleClass("fa-star-o");
			}
		});
	});
</script>
<script src="<?php echo base_url('assets/dashboard/dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>

<!-- Dropzone -->
<script src="<?php echo base_url('assets/dashboard/dist/plugins/dropzone-master/dropzone.js');?>"></script>
<script src="<?php echo base_url('assets/dashboard/dist/plugins/formwizard/jquery-steps.js');?>"></script>
<script src=""<?php echo base_url('assets/dashboard/dist/jquery.validate.min.js');?>"></script>
<script>
	var frmRes = $('#frmRes');
	var frmResValidator = frmRes.validate();

	var frmInfo = $('#frmInfo');
	var frmInfoValidator = frmInfo.validate();

	var frmLogin = $('#frmLogin');
	var frmLoginValidator = frmLogin.validate();

	var frmMobile = $('#frmMobile');
	var frmMobileValidator = frmMobile.validate();

	$('#demo1').steps({
		onChange: function (currentIndex, newIndex, stepDirection) {
			console.log('onChange', currentIndex, newIndex, stepDirection);
			// tab1
			if (currentIndex === 0) {
				if (stepDirection === 'forward') {
					var valid = frmRes.valid();
					return valid;
				}
				if (stepDirection === 'backward') {
					frmResValidator.resetForm();
				}
			}

			// tab2
			if (currentIndex === 1) {
				if (stepDirection === 'forward') {
					var valid = frmInfo.valid();
					return valid;
				}
				if (stepDirection === 'backward') {
					frmInfoValidator.resetForm();
				}
			}

			// tab3
			if (currentIndex === 2) {
				if (stepDirection === 'forward') {
					var valid = frmLogin.valid();
					return valid;
				}
				if (stepDirection === 'backward') {
					frmLoginValidator.resetForm();
				}
			}

			// tab4


			return true;

		},
		onFinish: function () {
			alert('Wizard Completed');
		}
	});
</script>
<script>
	$('#demo').steps({
		onFinish: function () {
			alert('Wizard Completed');
		}
	});

</script>
<script src="<?php echo base_url('assets/dashboard/dist/plugins/dropify/dropify.min.js');?>"></script>
<script>
	$(document).ready(function(){
		// Basic
		$('.dropify').dropify();

		// Translated
		$('.dropify-fr').dropify({
			messages: {
				default: 'Glissez-déposez un fichier ici ou cliquez',
				replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
				remove:  'Supprimer',
				error:   'Désolé, le fichier trop volumineux'
			}
		});



			//datatables
		table = $('#table').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.

			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('Admin/ajax_list')?>",
				"type": "POST"
			},

			//Set column definition initialisation properties.
			"columnDefs": [
				{
					"targets": [ -1 ], //last column
					"orderable": false, //set not orderable
				},
			],

		});

		// Used events
		var drEvent = $('#input-file-events').dropify();

		drEvent.on('dropify.beforeClear', function(event, element){
			return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
		});

		drEvent.on('dropify.afterClear', function(event, element){
			alert('File deleted');
		});

		drEvent.on('dropify.errors', function(event, element){
			console.log('Has Errors');
		});

		var drDestroy = $('#input-file-to-destroy').dropify();
		drDestroy = drDestroy.data('dropify')
		$('#toggleDropify').on('click', function(e){
			e.preventDefault();
			if (drDestroy.isDropified()) {
				drDestroy.destroy();
			} else {
				drDestroy.init();
			}
		})
	}




	);
	$(document).ready(function() {


		//datepicker
		$('.datepicker').datepicker({
			autoclose: true,
			format: "yyyy-mm-dd",
			todayHighlight: true,
			orientation: "top auto",
			todayBtn: true,
			todayHighlight: true,
		});

		//set input/textarea/select event when change value, remove class error and remove text help block
		$("input").change(function(){
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
		$("textarea").change(function(){
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
		$("select").change(function(){
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});

	});

</script>
<script type="text/javascript">
	var popupDiv = document.getElementById("popup_bg");
	function openpopupMenu() {
		popupDiv.style.display ="block";

		
	}
	function closePopupMenu() {

		popupDiv.style.display="none";
	}

</script>
<script src="<?php echo base_url('assets/dashboard/dist/plugins/table-expo/filesaver.min.js');?>"></script>
<script src="<?php echo base_url('assets/dashboard/dist/plugins/table-expo/xls.core.min.js');?>"></script>
<script src="dist/plugins/table-expo/tableexport.js"></script>

<!--Start of Tawk.to Script-->

<!--Start of Tawk.to Script-->

<!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->
</body>

<!-- Mirrored from uxliner.com/bizadmin/demo/main/table-jsgrid.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 09:33:59 GMT -->
</html>



