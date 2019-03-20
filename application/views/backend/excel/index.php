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
					<!-- /.box-header -->
					<div class="box-body">
						<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
							<div class="row">
								<div class="col-sm-12 table-responsive">
								    <table class="table table-borderd" id='postsList'>
                                        <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    
                                    <!-- Paginate -->
                                    <div id='pagination'></div>
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
    $("#dashboardExcelImport").addClass("active");

    $("#add").click(function (e) { 
        $("#addModal").modal("show");
        e.preventDefault();  
    });

    $('#import_form').on('submit', function(event){
		event.preventDefault();
		$.ajax({
			url:"<?php echo base_url(); ?>excelimport/import",
			method:"POST",
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data){
                clearFormData();
                $("#addModal").modal("hide");

			}
		})
	});



    $('#pagination').on('click','a',function(e){
       e.preventDefault(); 
       var pageno = $(this).attr('data-ci-pagination-page');
       loadPagination(pageno);
     });
 
     loadPagination(0);
 
     function loadPagination(pagno){
       $.ajax({
         url: '<?= base_url("excelimport/loadRecord/")?>'+ pagno,
         type: 'get',
         dataType: 'json',
         success: function(response){
            $('#pagination').html(response.pagination);
            createTable(response.result,response.row);
         }
       });
     }
 
     function createTable(result,sno){
       sno = Number(sno);
       $('#postsList tbody').empty();
       for(index in result){
          var id = result[index].id;
          var name = result[index].name;
          var phone = result[index].phone;
          var gender = result[index].gender;
          var address = result[index].address;
          sno+=1;
 
          var tr = "<tr>";
          tr += "<td>"+ sno +"</td>";
          tr += "<td>"+name+"</td>";
          tr += "<td>"+phone+"</td>";
          tr += "<td>"+gender+"</td>";
          tr += "<td>"+address+"</td>";
          tr += "<td><a id='delete_user' data-id='"+id+"' class='btn btn-sm btn-danger'>Delete</a></td>";
          tr += "</tr>";
          $('#postsList tbody').append(tr);
  
        }
      }


      // delete user
		$(document).on('click', '#delete_user', function(e){
			var id = 'id='+ $(this).data('id');
			var url = "<?= base_url('excelimport/delete')?>";
			SwalDelete(id,url);
			e.preventDefault();
		});


    function SwalDelete(id, posturl) {

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
    						loadPagination(0);
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
  $("#import_form")
    .find("input[type=file]")
       .val('')
       .end();
 }

</script>