<div class="content-wrapper" style="min-height: 916px;">
	<section class="content-header">
		<h1>
			Dashboard
			<small>Dependent Dropdown</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dependent Dropdown</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<!-- general form elements disabled -->
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">General Elements</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<form role="form">
							<!-- select -->
							<div class="form-group col-sm-3">
								<label>Select Division</label>
								<select class="form-control" name="divisions" id="divisions" >
									<option disabled selected>Select Division</option>
                                    <?php foreach ($divisions as $key => $division) {?>

									<option value ="<?= $division['id']?>"><?= $division['bn_name']?></option>
                                        
                                    <?php }?>
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label>Select District</label>
								<select class="form-control" name="districts" id="districts">
									
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label>Select upazila</label>
								<select class="form-control" name="upazilas" id="upazilas">
                                    
								</select>
							</div>
							<div class="form-group col-sm-3">
								<label>Select Union</label>
								<select class="form-control" name="unions" id="unions">
                                   
								</select>
							</div>

						</form>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>

</div>

<script>

$(document).ready(function () {
    $("#dashboardDependentSelect").addClass('active');
    
    var divisions = $('#divisions');
    var districts = $('#districts');
    var upazilas = $('#upazilas');
    var unions = $('#unions');

    $(divisions).change(function (e) {
        districts.empty();
        upazilas.empty();
        unions.empty();
        var id = $('#divisions option:selected').val();
        // console.log(id);
        $.ajax({
            type: "GET",
            url: "<?= base_url('dependentdropdown/getDistricts')?>",
            data: {id:id},
            // dataType: "json",
            success: function (response) {
                // console.log(response);
                $(districts).append(response);
            }
        });
        e.preventDefault();
    });


    $(districts).change(function (e) { 
        upazilas.empty();
        unions.empty();
        var id = $('#districts option:selected').val();
        // console.log(id);
        $.ajax({
            type: "GET",
            url: "<?= base_url('dependentdropdown/getUpazilas')?>",
            data: {id:id},
            // dataType: "json",
            success: function (response) {
                // console.log(response);
                $(upazilas).append(response);
            }
        });
        e.preventDefault();
    });

    
    $(upazilas).change(function (e) { 
        unions.empty();
        var id = $('#upazilas option:selected').val();
        // console.log(id);
        $.ajax({
            type: "GET",
            url: "<?= base_url('dependentdropdown/getUnions')?>",
            data: {id:id},
            // dataType: "json",
            success: function (response) {
                // console.log(response);
                $(unions).append(response);
            }
        });
        e.preventDefault();
    });
        
});
</script>