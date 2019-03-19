<div class="content-wrapper" style="min-height: 916px;">
	<section class="content-header">
		<h1>
			Dashboard
			<small>All Images</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">All Images</li>
		</ol>
	</section>
  <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">All Users <button class="btn btn-success" id="addImages">Add Images</button></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
							<div class="row">
								<div class="col-sm-12 table-responsive">
								<form id="selectedItemDelete" method="post" action="<?= base_url('api-test/user/deleteAllSelected')?>">
					
								<!-- <p><button type="submit" id="deleteAllBtn" style="display : none;" class="btn btn-danger btn-sm">Delete Selected</button><br /></p> -->
							
									<table id="mytable" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Sl</th>
												<th>Image</th>
												<th>Action</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
                        <th>Sl</th>
												<th>Image</th>
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
<!-- Add modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="addForm" method="POST" class="form-horizontal" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Add Images</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Images</label>
            <div class="col-sm-10">
                <input id="fileUpload" name="files[]" multiple type="file" accept="image/*" /> 
                <div id="image-holder" style="margin-top:10px;"></div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value="Add Images">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>


<script>
$(document).ready(function () {
    $("#dashboardGallery").addClass("active");

    // load image datatable data
    var table = $("#mytable").DataTable({
			"processing": true,
			responsive: true,
			"ajax": {
				"url": "<?= base_url('gallery/getAllImages')?>",
				type: "GET",
				timeout: 30000,
				dataSrc: 'data'
			},
			"columns": [{
					"data": "sl"
				}, {
					"data": "file"
				}, {
					"data": "action"
				}],
		});
    
    $("#addImages").click(function (e) { 
      $("#addModal").modal("show");
      e.preventDefault();
    });

    $('#fileUpload').change(function () {
    	var files = $('#fileUpload')[0].files;
      var error = '';
      var image_holder = $("#image-holder");
    	var form_data = new FormData();
    	for (var count = 0; count < files.length; count++) {
    		var name = files[count].name;
        var extension = name.split('.').pop().toLowerCase();
        
        // show preview image
        var reader = new FileReader();
        reader.onload = function(e) {
          $("<img />", {
            "src": e.target.result,
            "class": "thumb-image"
          }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL(files[count]);

        
    		if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
    			error += "Invalid " + count + " Image File"
    		} else {
    			form_data.append("files[]", files[count]);
    		}
    	}
    	if (error == '') {
    		$("#addForm").submit(function (e) { 
            $.ajax({
            	url: "<?php echo base_url(); ?>gallery/upload", //base_url() return http://localhost/tutorial/codeigniter/
            	method: "POST",
            	data: form_data,
            	contentType: false,
            	cache: false,
            	processData: false,
            	// beforeSend: function () {
            	// 	$('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
            	// },
            	success: function (data) {
                $("#addModal").modal("hide");
                $('#mytable').DataTable().ajax.reload();
                form_data = new FormData();
                clearFormData();
              },
              error: function() {
                alert('Error occurs!');
              }
            });

          e.preventDefault();
          
        });
    	} else {
    		alert(error);
    	}
    });

    // delete user
		$(document).on('click', '#delete_user', function(e){
			var id = 'id='+ $(this).data('id');
			var url = "<?= base_url('gallery/delete')?>";
			SwalDelete(id,url);
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


});

function clearFormData() { 
  $("#addForm")
    .find("input[type=file]")
       .val('')
       .end();
       $("#image-holder").empty();
 }

</script>
<style>
    .thumb-image{
        height: 100px;
        width :100px;
        margin-right :10px;
    }
</style>