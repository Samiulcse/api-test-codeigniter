<div class="content-wrapper" style="min-height: 916px;">
	<section class="content-header">
		<h1>
			Dashboard
			<small>All Roles</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">All Roles</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">All Roles</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

							<div class="row">
								<div class="col-sm-12">
									<table id="example1" class="table table-bordered table-striped">
										
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


<script>
	$(function () {

		var myTable = $('#example1').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": true,
			"data": [],
			"columns": [ {
				"title": "Id",
				"data": "id"

			}, {
				"title": "Role Name",
				"data": "role_name"

			}, {
				"title": "Action",
				"data": "action"
			}]
		});

		$.ajax({
			url: '<?= base_url('admin/getallroles')?>',
			type: "GET",
			timeout: 30000,
			dataType: "json", // "xml", "json"
			success: function (response) {
					// console.log(response);
					myTable.clear();
					$.each(response, function (index, value) {
						myTable.row.add(value);
					});
					myTable.row.add(response);
					myTable.draw();
			},
			error: function (jqXHR, textStatus, ex) {
				alert(textStatus + "," + ex + "," + jqXHR.responseText);
			}
		});

	})
</script>