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
								<form id="selectedItemDelete" method="post">

								<p><b>Selected rows data</b></p>
								<pre id="view-rows"></pre>
								<p><b>Form data as submitted to the server</b></p>
								<pre id="view-form"></pre>

								<p><button id="deleteAllBtn" class="btn btn-danger disabled">View Selected</button><br /></p>

								
									<table id="mytable" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th></th>
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

		var mytable = $("#mytable").DataTable({
			"processing": true,
			responsive: true,
			"ajax": {
				"url": "<?= base_url('api-test/user/getAllUser')?>",
				type: "GET",
				timeout: 30000,
				dataSrc: ''
			},
			columnDefs: [{
					'targets': 0,
					'checkboxes': {
						'selectRow': true,
						// 'selectCallback': function(nodes, selected){
            //       console.log("Hello");
            //    }
					}
				}],
				select:'multi',
				order: [
					[1, 'asc']
				],
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
				}]
		});

		// delete user
		$(document).on('click', '#delete_user', function(e){
			
			var id = $(this).data('id');
			SwalDelete(id);
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

		function SwalDelete(id) {

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
								url: '<?= base_url('api-test/user/delete')?>',
								type: 'POST',
								data: 'id=' + id,
								dataType: 'json'
							})
							.done(function (response) {
								Swal.fire('Deleted!', response.message, response.status);
								$('#mytable').DataTable().ajax.reload();
							})
							.fail(function () {
								Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
							});
					});
				},
				allowOutsideClick: false
			});

		}

		// slected item delete
		$(".dt-body-center").click(function (e) { 
			// alert("hello");
			$("#deleteAllBtn").removeClass("disabled");
			e.preventDefault();
			
		});

		$("#selectedItemDelete").on('submit', function (e) {
			var form = this;
			var rowsel = mytable.column(0).checkboxes.selected();
			$.each(rowsel, function (index, rowId) {
				$(form).append(
					$('<input>').attr('type', 'hidden').attr('name', 'id[]').val(rowId)
				)
			})
			$("#view-rows").text(rowsel.join(","))
			$("#view-form").text($(form).serialize())
			$('input[name="id\[\]"]', form).remove()
			e.preventDefault()
		})

		

	})(jQuery);


	
</script>