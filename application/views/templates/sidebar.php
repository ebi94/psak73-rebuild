<aside class="main-sidebar elevation-4 sidebar-light-orange">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(''); ?>" class="brand-link" style="background-color: #FFFFFF;">
	    <img src="<?php echo base_url('assets/'); ?>/image/Logo.png" alt="company logo" class="brand-image" style="opacity: .8">
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="<?php echo base_url(''); ?>" class="nav-link <?php if($title == 'Dashboard'): ?> active <?php endif; ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('aset'); ?>" class="nav-link <?php if($title == 'List Aset'): ?> active <?php endif; ?>">
						<i class="nav-icon fas fa-list-alt"></i>
						<p>List Aset</p>
					</a>
				</li>
				<?php if($this->session->userdata('level') == 0) { ?>
				  <li class="nav-item has-treeview">
				  	<a href="#" class="nav-link <?php if($title == 'Config'): ?> active <?php endif; ?>">
				  		<i class="nav-icon fas fa-cog"></i>
				  		<p>Config<i class="right fas fa-angle-left"></i></p>
				  	</a>
				  	<ul class="nav nav-treeview" style="display: none;">
				  		<li class="nav-item">
				  			<a href="#" class="nav-link">
				  				<i class="nav-icon far fa-building"></i>
				  				<p>Perusahaan</p>
				  			</a>
				  		</li>
				  		<li class="nav-item">
				  			<a href="#" class="nav-link">
				  				<i class="nav-icon fas fa-calnedar-week"></i>
				  				<p>Term of Payment (TOP)</p>
				  			</a>
				  		</li>
				  	</ul>
				  </li>
				<?php } ?>
			</ul>
		</nav>
		<!--/ .Sidebar Menu -->
	</div>
	<!--/ .Sidebar -->
</aside>