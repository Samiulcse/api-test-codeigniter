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
									<table id="mytable" class="table table-bordered table-striped">
										<thead>
											<tr>
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
												<th>Sl</th>
												<th>Name</th>
												<th>Phone Number</th>
												<th>Gender</th>
												<th>Address</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>
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
							<input type="text" class="form-control" name="phone" id="addphone" placeholder="Phone">
						</div>
					</div>
					<div class="form-group">
						<label for="gender" class="col-sm-2 control-label">Gender</label>
						<div class="col-sm-10">
							<select name="gender" id="addgender" class="form-control">
								<option value="male">Male</option>
								<option value="male">Female</option>
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
							<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
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

		var mytable = $("#mytable").DataTable({
			"processing": true,
			responsive: true,
			"ajax": {
				"url": "<?= base_url('api-test/user/getAllUser')?>",
				type: "GET",
				timeout: 30000,
				dataSrc: ''
			},
			"columns": [{
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
				data: $('form').serialize(),
			}).done(function (response){
				$('#editModal').modal('hide');
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
			console.log(url);
			$.ajax({
				type: "POST",
				url: url,
				data: $('form').serialize(),
			}).done(function(response){
				alert("ok");
			}).fail(function(){
				alert("not ok");
			});
			e.preventDefault();
			
		});

		// $(document).on('submit','#addForm',function(e){
		// 	var url = $("#addForm").attr('action');
		// 	console.log(url);
		// 	$.ajax({
		// 		type: "POST",
		// 		url: url,
		// 		data: form.serialize(),
		// 	}).done(function(response){
				
		// 		e.preventDefault();
		// 	}).fail(function(){
		// 		e.preventDefault();
		// 	});
		// 	e.preventDefault();
		// });



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



	})(jQuery);


	
</script>