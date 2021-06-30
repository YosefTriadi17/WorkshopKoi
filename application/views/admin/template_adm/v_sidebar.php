		

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url() ?>" class="brand-link">
		<img src="<?= base_url() ?>assets/dist/img/ikankoi.png" alt="Gambar Ikan Koi"
			class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Sistem Cerdas</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="info">
				<div class="container">
				<div class="row">
					<div class="col-sm">
						<img src="<?= base_url() ?>assets/dist/img/userwhite.png" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="col-sm">
						<a href="#" class="d-block mt-1"><?=$_SESSION['nama_admin']?></a>
					</div>
					<div class="col-sm text-right mt-2">
						<a href="#!" class="text-secondary ml-5" data-target="#modalKeluar" data-toggle="modal">
							logout
						</a>
					</div>
				</div>
				</div>
			</div>
		</div>

		<!-- untuk membaca link  -->
		<?php $link = $this->uri->segment(2); ?>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class 
						with font-awesome or any other icon font library -->
				<li class="nav-item menu-open">
					<a href="<?=base_url()?>" class="nav-link <?php if($link === null){echo 'active';} ?> ">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dasbor
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Master
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<?php if($_SESSION['role'] == 1){ //jika status superadmin = 1 ?>
						<li class="nav-item">
							<a href="<?= base_url('admin/C_admin') ?>" class="nav-link 
								<?php if($link === 'C_admin'){echo 'active';} ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Admin</p>
							</a>
						</li>
						<?php } ?>

						<li class="nav-item">
							<a href="<?= base_url('admin/C_fuzzyset') ?>" class="nav-link 
								<?php if($link === 'C_fuzzyset'){echo 'active';} ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Fuzzy Set</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/C_parameter') ?>" class="nav-link 
								<?php if($link === 'C_parameter'){echo 'active';} ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Parameter</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/C_grade') ?>" class="nav-link 
								<?php if($link === 'C_grade'){echo 'active';} ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Grade</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('admin/C_rule') ?>" class="nav-link 
								<?php if($link === 'C_rule'){echo 'active';} ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Rule</p>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</aside>

<!-- modal keluar? -->
<div class="modal fade" id="modalKeluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Anda yakin ingin keluar?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="<?=base_url('admin/C_auth/logout')?>" class="btn btn-danger">Keluar</a>
      </div>
    </div>
  </div>
</div>
<!-- modal keluar? end -->

