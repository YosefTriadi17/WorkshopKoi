<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $title; ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url(); ?>">Beranda</a></li>
						<li class="breadcrumb-item active"><?= $title; ?></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
		
		<!-- alert  -->
		<?php if(isset($_SESSION['hapus_sukses'])){ ?>
			<div class="alert alert-success" role="alert">
				Hapus Sukses
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
		<?php } ?>
		<?php if(isset($_SESSION['tambah_sukses'])){ ?>
			<div class="alert alert-success" role="alert">
				Data Berhasil Ditambahkan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
		<?php } ?>
		<!-- alert end  -->

	</section>
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header bg-dark">
						<h3 class="card-title text-bold float-left">Tabel <?= $title; ?></h3>
						<a href="#!" class="btn btn-primary text-bold float-right" data-target="#modalTambah" data-toggle="modal">
							<i class="fas fa-plus-circle"></i> <?= $title; ?>
						</a>
					</div>

					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr class="text-center">
									<th>No</th>
									<th>Suhu</th>
									<th>PH</th>
									<th>TDS</th>
									<th>Grade</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
									foreach ($rule as $ru):
								?>
								<tr>
									<td class="text-center"><?= $no++; ?></td>
									<td class="text-center"><?= $ru->suhu; ?></td>
									<td class="text-center"><?= $ru->fuzzy_set_ph; ?></td>
									<td class="text-center"><?= $ru->fuzzy_set_tds; ?></td>
									<td class="text-center"><?= $ru->grade; ?></td>
									
									<td class="text-center">
										<a href="#!" onclick="hapus('<?=$ru->id_rule?>')">
											<i class="fas fa-trash text-danger"></i>
										</a>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- modal tambah -->
	<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Tambah Data</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<form action="<?php echo base_url() . 'admin/C_rule/tambah_aksi' ?>" method="post">
		<div class="modal-body">
				<div class="form-group">
					<label for="suhu">Suhu</label>
					<select class="form-select form-control" aria-label="Default select example" id="suhu" name="suhu">
						<option selected>- Pilih salah satu -</option>
						<?php foreach($suhu as $s){ ?>
							<option value="<?=$s->id_suhu?>"><?=$s->suhu?>  (<?=$s->domain?>)</option>
						<?php } ?>
					</select>
					<?= form_error('suhu', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="ph">PH</label>
					<select class="form-select form-control" aria-label="Default select example" id="ph" name="ph">
						<option selected>- Pilih salah satu -</option>
						<?php foreach($ph as $p){ ?>
							<option value="<?=$p->id_ph?>"><?=$p->fuzzy_set?>  (<?=$p->domain?>)</option>
						<?php } ?>
					</select>
					<?= form_error('ph', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="tds">TDS</label>
					<select class="form-select form-control" aria-label="Default select example" id="tds" name="tds">
						<option selected>- Pilih salah satu -</option>
						<?php foreach($tds as $t){ ?>
							<option value="<?=$t->id_tds?>"><?=$t->fuzzy_set?>  (<?=$t->domain?>)</option>
						<?php } ?>
					</select>
					<?= form_error('tds', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="grade">Grade</label>
					<input type="text" class="form-control" id="grade" name="grade" placeholder="Grade">
					<?= form_error('grade', '<small class="text-danger">', '</small>'); ?>
				</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			<button type="submit" class="btn btn-primary">Tambah</button>
		</div>
	</form>
		</div>
	</div>
	</div>
<!-- modal tambah end -->

<!-- modal tambah -->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-body">
			Anda yakin ingin menghapus data ini ?
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			<a href="#" id="linkHapus" class="btn btn-danger">Hapus</a>
		</div>
		</div>
	</div>
	</div>
<!-- modal tambah end -->

<!-- script tampil modal hapus  -->
<script>
	function hapus(id){
		$('#linkHapus').attr('href', '<?=base_url('admin/C_rule/hapusAksi/')?>'+id);
		$('#modalHapus').modal('show');
	}
</script>
