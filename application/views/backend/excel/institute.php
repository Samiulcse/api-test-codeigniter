<div class="content-wrapper" style="min-height: 916px;">
	<section class="content-header">
		<h1>
			Dashboard
			<small>Excel Import</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Excel Import</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Excel Import <button id="add" class="btn btn-success btn-sm" style="display:inline-block;">Import</button> </h3>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>


<!-- Add modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="import_form" class="form-horizontal" action="<?= base_url('api-test/user/add')?>" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Update User</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Import File</label>
						<div class="col-sm-10">
							<input type="file" class="form-control" name="file" id="file" required accept=".xls, .xlsx">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value="Import">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>


<script>
$(document).ready(function () {
    $("#dashboardExcelImportInstitute").addClass("active");

    $("#add").click(function (e) { 
        $("#addModal").modal("show");
        e.preventDefault();  
    });

    $('#import_form').on('submit', function(event){
		event.preventDefault();
		$.ajax({
			url:"<?php echo base_url(); ?>excelimport/importInstituteInfo",
			method:"POST",
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data){
                $("#addModal").modal("hide");

			}
		})
	});

 

});

function clearFormData() { 
  $("#import_form")
    .find("input[type=file]")
       .val('')
       .end();
 }

</script>