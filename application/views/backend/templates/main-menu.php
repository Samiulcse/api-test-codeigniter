<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar" style="height: auto;">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?= base_url()?>assets/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>Alexander Pierce</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu tree " data-widget="tree">
			<li id="dashboardMainMenu">
				<a href="<?= base_url()?>">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>


			<!-- <li class=" treeview <?= current_url()== base_url('/admin/roles') || current_url()== base_url('/admin/allroles')? 'active': ''?>">
				<a href="#">
					<i class="fa fa-dashboard"></i> <span>Users</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="<?= current_url()== base_url('/admin/roles')? 'active': ''?>">
						<a href="<?= base_url('/admin/roles')?>"><i class="fa fa-circle-o"></i>Add Role</a>
					</li>
					<li class="<?= current_url()== base_url('/admin/allroles')? 'active': ''?>">
						<a href="<?= base_url('/admin/allroles')?>"><i class="fa fa-circle-o"></i>All Role</a>
					</li>
					<li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
				</ul>
			</li> -->

			<li id="dashboardUser">
				<a href="<?= base_url('/api-test/user')?>">
					<i class="fa fa-user"></i> <span>All User</span>
				</a>>
			</li>
			

			<!-- <li class=" treeview">
				<a href="#">
					<i class="fa fa-dashboard"></i> <span>Users</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="">
						<a href="<?= base_url('/api-test/user')?>"><i class="fa fa-circle-o"></i>All User</a>
					</li>
					<li class="">
						<a href=""><i class="fa fa-circle-o"></i>Edit User</a>
					</li>
					
				</ul>
			</li> -->


		</ul>
	</section>
	<!-- /.sidebar -->
</aside>