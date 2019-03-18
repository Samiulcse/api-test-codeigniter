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
			<div class="col-sm-12">
                <button class="btn btn-success" id="addImages">Add Images</button>
            </div>
		</div>
	</section>
</div>
<!-- Add modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="addForm" method="POST" class="form-horizontal" action="<?= base_url('gallery/add')?>" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Update User</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Images</label>
                        <div class="col-sm-10">
                            <input id="fileUpload" name="userImage[]" multiple="multiple" type="file" accept="image/*" /> 
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

    $("#addImages").click(function (e) { 
        $("#addModal").modal("show");
        e.preventDefault();
    });

    $("addForm").submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),	
            data:  new FormData(this),
            cache: false,
            processData:false,
        }).done(function (response){
				
			}).fail(function(){
                
			});
        
    });

    $("#fileUpload").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
        });

});



</script>
<style>
    .thumb-image{
        height: 100px;
        width :100px;
        margin-right :10px;
    }
</style>