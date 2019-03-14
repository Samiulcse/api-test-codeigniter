<div class="content-wrapper" style="min-height: 916px;">
	<section class="content-header">
		<h1>
			Dashboard
			<small>All Users</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">All Users</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">All Users <button id="add_user" class="btn btn-success btn-sm" style="display:inline-block;">Add New User</button> </h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

							<div class="row">
								<div class="col-sm-12 table-responsive">
								<form id="selectedItemDelete" method="post" action="<?= base_url('api-test/user/deleteAllSelected')?>">

								<p><button id="deleteAllBtn" style="display:none" class="btn btn-danger btn-sm">Delete Selected</button><br /></p>

								
									<table id="mytable" class="table table-bordered table-striped">
										<thead>
											<tr>
											<th><input name="select_all" value="1" type="checkbox"></th>
												<th>Sl</th>
												<th>Name</th>
												<th>Phone Number</th>
												<th>Gender</th>
												<th>Address</th>
												<th>Action</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th></th>
												<th>Sl</th>
												<th>Name</th>
												<th>Phone Number</th>
												<th>Gender</th>
												<th>Address</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>
									</form>
								</div>
							</div>

						</div>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>
	</section>

</div>



    
<!-- view modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">User Data</h4>
      </div>
      <div class="modal-body">
        <div id="user_data">
			
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Add modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="addForm" class="form-horizontal" action="<?= base_url('api-test/user/add')?>" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Update User</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="name" id="addname" placeholder="Name">
						</div>
					</div>
					<div class="form-group">
						<label for="phone" class="col-sm-2 control-label">Phone</label>
						<div class="col-sm-10">
							<input type="text" class="form-control phonebook_phone" maxlength="14" name="phone" id="addphone" placeholder="Phone">
						</div>
					</div>
					<div class="form-group">
						<label for="gender" class="col-sm-2 control-label">Gender</label>
						<div class="col-sm-10">
							<select name="gender" id="addgender" class="form-control">
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="address" class="col-sm-2 control-label">Address</label>
						<div class="col-sm-10">
							<textarea name="address" id="addaddress" class="form-control" style="resize: none;" cols="30" rows="10"></textarea>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value="Add New User">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="editForm" class="form-horizontal" action="<?= base_url('api-test/user/edit')?>" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" >Update User</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="name" id="name" placeholder="Name">
							<input type="hidden" name="id" id="id" >
						</div>
					</div>
					<div class="form-group">
						<label for="phone" class="col-sm-2 control-label">Phone</label>
						<div class="col-sm-10">
							<input type="text" class="form-control phonebook_phone" maxlength="14" name="phone" id="phone" placeholder="Phone">
						</div>
					</div>
					<div class="form-group">
						<label for="gender" class="col-sm-2 control-label">Gender</label>
						<div class="col-sm-10">
							<select name="gender" id="gender" class="form-control">
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="address" class="col-sm-2 control-label">Address</label>
						<div class="col-sm-10">
							<textarea name="address" id="address" class="form-control" style="resize: none;" cols="30" rows="10"></textarea>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value="Update">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>

	(function($){

		$("#dashboardUser").addClass('active');
		var rows_selected = [];

		var table = $("#mytable").DataTable({
			"processing": true,
			responsive: true,
			"ajax": {
				"url": "<?= base_url('api-test/user/getAllUser')?>",
				type: "GET",
				timeout: 30000,
				dataSrc: 'data'
			},
			"columns": [{
					"data" : "id"
				},{
					"data": "sl"
				}, {
					"data": "name"
				}, {
					"data": "phone"
				}, {
					"data": "gender"
				}, {
					"data": "address"
				}, {
					"data": "action"
				}],
			'columnDefs': [{
         'targets': 0,
         'searchable': false,
         'orderable': false,
         'width': '1%',
         'className': 'dt-body-center',
         'render': function (data, type, full, meta){
             return '<input type="checkbox">';
         }
      }],
				select:'multi',
				order: [
					[1, 'asc']
				],
				'rowCallback': function(row, data, dataIndex){
         // Get row ID
         var rowId = data.id;
					// console.log(rowId);
         // If row ID is in the list of selected row IDs
         if($.inArray(rowId, rows_selected) !== -1){
            $(row).find('input[type="checkbox"]').prop('checked', true);
            $(row).addClass('selected');
         }
      }
		});

		// Handle click on checkbox
		$('#mytable tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');

      // Get row data
      var data = table.row($row).data();

      // Get row ID
      var rowId = data.id;

      // Determine whether row ID is in the list of selected row IDs
      var index = $.inArray(rowId, rows_selected);

      // If checkbox is checked and row ID is not in list of selected row IDs
      if(this.checked && index === -1){
         rows_selected.push(rowId);
      // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
      } else if (!this.checked && index !== -1){
         rows_selected.splice(index, 1);
      }

      if(rows_selected.length > 0){
         $("#deleteAllBtn").show();
      } else {
				$("#deleteAllBtn").hide();
      }

      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle click on table cells with checkboxes
   $('#mytable').on('click', 'tbody td, thead th:first-child', function(e){
      $(this).parent().find('input[type="checkbox"]').trigger('click');
   });

   // Handle click on "Select all" control
   $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
      if(this.checked){
         $('#mytable tbody input[type="checkbox"]:not(:checked)').trigger('click');
      } else {
         $('#mytable tbody input[type="checkbox"]:checked').trigger('click');
      }

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle table draw event
   table.on('draw', function(){
      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);
   });

  //  Handle form submission event
   $('#selectedItemDelete').on('submit', function(e){
      var form = this;
			var url = $("#selectedItemDelete").attr('action');
			$.each(rows_selected, function(index, rowId){
         // Create a hidden element
         $(form).append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
         );
      });
			var id = $(form).serialize();
			SwalDelete(id,url);

			// $("#view-form").text($(form).serialize());
			e.preventDefault();
   });
	 
		// delete user
		$(document).on('click', '#delete_user', function(e){
			var id = 'id='+ $(this).data('id');
			var url = "<?= base_url('api-test/user/delete')?>";
			SwalDelete(id,url);
			e.preventDefault();
		});


		// view user
		$(document).on('click', '#view', function(e){
			
			var id = $(this).data('id');

			$.ajax({
					type: "GET",
					url: "<?= base_url('api-test/user/view')?>",
					data: {
						'id': id
					},
					dataType: "json"
				}).done(function (response) {
					$("#user_data").empty();

					$("#user_data").append('<table class="table table-striped"><tr><td><h2>Name:</h2></td><td><h3>'+response.name+'</h3></td></tr>'+
									'<tr><td><h2>Phone:</h2></td><td><h3>'+response.phone+'</h3></td></tr>'+
									'<tr><td><h2>Gender:</h2></td><td><h3 style="text-transform: capitalize">'+response.gender+'</h3></td></tr>'+
									'<tr><td><h2>Address:</h2></td><td><h3>'+response.name+'</h3></td></tr></table>');

					$('#viewModal').modal('show');
					
				})
				.fail(function () {
					alert("Fail");
				});

			e.preventDefault();

		});

		// edit user form data-fill
		$(document).on('click', '#edit', function(e){
			
			var id = $(this).data('id');

			$.ajax({
					type: "GET",
					url: "<?= base_url('api-test/user/view')?>",
					data: {
						'id': id
					},
					dataType: "json"
				}).done(function (response) {
					// console.log(response);
					$('#id').val(response.id);
					$('#name').val(response.name);
					$('#phone').val(response.phone);
					$("#gender").val(response.gender);
					$("#address").val(response.address);
					$('#editModal').modal('show');
					
				})
				.fail(function () {
					alert("Fail");
				});

			e.preventDefault();

		});

// submit edit data
		$(document).on('submit', '#editForm', function(e){
			var url = $("#editForm").attr('action');
			// console.log(url);
			$.ajax({
				type: "POST",
				url: url,
				data: $(this).serialize(),
			}).done(function (response){
				$('#editModal').modal('hide');

				var data = JSON.parse(response);
				toasterCall(data.type,data.message);
				$('#mytable').DataTable().ajax.reload();
			}).fail(function(){
				alert('Fail');
			});

			e.preventDefault();
		});

		// add new user
		$(document).on('click','#add_user',function(e){
			$("#addModal").modal('show');
		});

		$("#addForm").submit(function (e) {

			var url = $("#addForm").attr('action');
			// console.log(url);
			$.ajax({
				type: "POST",
				url: url,
				data: $(this).serialize(),
			}).done(function (response) {
				// console.log(response);
				$('#mytable').DataTable().ajax.reload();
				$("#addModal").modal('hide');
				$("#addForm").trigger('reset');
				var data = JSON.parse(response);
				// console.log(data);
				// alert(data.type);
				toasterCall(data.type,data.message);

			}).fail(function () {
				alert("not ok");
			});
			e.preventDefault();

		});

		function SwalDelete(id,posturl) {

			Swal.fire({
				title: 'Are you sure?',
				text: "It will be deleted permanently!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!',
				showLoaderOnConfirm: true,

				preConfirm: function () {
					return new Promise(function (resolve) {

						$.ajax({
								url: posturl,
								type: 'POST',
								data: id,
								dataType: 'json'
							})
							.done(function (response) {
								Swal.fire('Deleted!', response.message, response.status);
								$('#mytable').DataTable().ajax.reload();
								$("#deleteAllBtn").hide();
							})
							.fail(function () {
								// console.log(posturl);
								Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
							});
					});
				},
				allowOutsideClick: false
			});

		}


	})(jQuery);

//
// Updates "Select all" control in a data table
//
function updateDataTableSelectAllCtrl(table){
   var $table             = table.table().node();
   var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
   var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
   var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

   // If none of the checkboxes are checked
   if($chkbox_checked.length === 0){
      chkbox_select_all.checked = false;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If all of the checkboxes are checked
   } else if ($chkbox_checked.length === $chkbox_all.length){
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If some of the checkboxes are checked
   } else {
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = true;
      }
   }
}
	
</script>