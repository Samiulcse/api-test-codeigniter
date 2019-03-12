<div class="content-wrapper" style="min-height: 916px;">
	<section class="content-header">
		<h1>
			Dashboard
			<small>Role</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Role</li>
		</ol>
	</section>

	<section class="content">

		<div class="col-md-offset-2 col-md-8">
			<!-- Horizontal Form -->
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Add Roles</h3>
				</div>
				<!-- /.box-header -->
				
				<!-- form start -->
				<form id="updaterole" class="form-horizontal" action="<?= base_url('admin/saverole')?>" method="POST">
					<div class="box-body">
						<div class="form-group">
							<label for="role_name" class="col-sm-5 control-label">Role Name</label>
							<div class="col-sm-7">
								<input type="text" name="role_name"  value="<?= $response['role_name']?>" class="form-control" id="role_name" placeholder="Role Name">
								<input type="hidden" name="id"  value="<?= $response['id']?>" >
							</div>
						</div>
						<div class="input_fields_wrap">
						<?php foreach ($role_type as $key => $role) {?>
							<div class="extra">
								<div class="form-group">
									<label for="role_type" class="col-sm-5 control-label">Role Type</label>
									<div class="col-sm-7">
										<input type="text" name="role_type[]" value="<?= $role?>"  class="form-control" id="role_type" placeholder="Role Type">
									</div>
								</div>
								<?php print_r($permissions)?>
								<div class="form-group">
									<label class="col-sm-5 control-label">Select Permissions</label>
									<div class="col-sm-7">
										<select name="permissions[]" class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
											<option value="create">Create</option>
											<option value="create">Read</option>
											<option value="create">Update</option>
											<option value="create">Delete</option>
										</select>
									</div>
								</div>
								<a href="#" style="position:relative; left:44%" class="remove_field btn btn-danger btn-sm">Remove</a>
							</div>
						<?php }?>
                        </div>
                        <button class="add_field_button btn btn-primary pull-right">Add More Fields</button>

					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-info pull-right">Add Role</button>
					</div>
			</div>
			<!-- /.box-body -->
			<!-- /.box-footer -->
			</form>
		</div>
		<!-- /.box -->
</div>


</section>

</div>

<script>
	$(document).ready(function () {
		$('.select2').select2();
		var max_fields = 100; //maximum input boxes allowed
		var wrapper = $(".input_fields_wrap"); //Fields wrapper
		var add_button = $(".add_field_button"); //Add button ID

		var x = 1; //initlal text box count
		$(add_button).click(function (e) { //on add input button click
			e.preventDefault();
			if (x < max_fields) { //max input box allowed
				x++; //text box increment
				$(wrapper).append(
                    '<div class="extra"><div class="form-group"><label for="role_type" class="col-sm-5 control-label">Role Type</label><div class="col-sm-7"><input type="text" name="role_type[]"  class="form-control" id="role_type" placeholder="Role Type"></div></div><div class="form-group"><label class="col-sm-5 control-label">Select Permissions</label><div class="col-sm-7"><select name="permissions[]" class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;"><option value="create">Create</option><option value="create">Read</option><option value="create">Update</option><option value="create">Delete</option></select></div></div><a href="#" style="position:relative; left:44%" class="remove_field btn btn-danger btn-sm">Remove</a></div>'); //add input box
                $('.select2').select2();
                $('.content-wrapper').height($(".content-wrapper").height()+150);
            }
		});
        
		$(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
			e.preventDefault();
			$(this).parent('.extra').remove();
			x--;
		})

        $('#saverole').submit(function (e) { 
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                dataType: "json",
                success: function (response) {
                    
                }
            });
            
        });
	});
</script>