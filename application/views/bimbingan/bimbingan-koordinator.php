  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			Kelola Internship
  			<small>Bimbingan</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Kelola Internship</a></li>
  			<li class="active">Bimbingan</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<?php if ($this->session->flashdata('message')) { ?>
  			<?php if ($this->session->flashdata('message') == 'simpan') { ?>
  				<div class="alert alert-success alert-dismissible">
  					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  					<h4><i class="icon fa fa-warning"></i> Sukses!</h4>
  					Data berhasil disimpan.
  				</div>
  			<?php } else if ($this->session->flashdata('message') == 'ubah') { ?>
  				<div class="alert alert-success alert-dismissible">
  					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  					<h4><i class="icon fa fa-warning"></i> Sukses!</h4>
  					Data berhasil diubah.
  				</div>
  			<?php } else if ($this->session->flashdata('message') == 'hapus') { ?>
  				<div class="alert alert-success alert-dismissible">
  					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  					<h4><i class="icon fa fa-warning"></i> Sukses!</h4>
  					Data berhasil dihapus.
  				</div>
  			<?php } ?>
  		<?php } ?>
  		<!-- SELECT2 EXAMPLE -->
  		<div class="box box-default">
  			<div class="box-header with-border">
  				<h3 class="box-title">Tambah Bimbingan</h3>
  			</div>
  			<!-- /.box-header -->
  			<form action="<?php echo base_url('bimbingan/create_act_bimbingan'); ?>" method="post">
  				<div class="box-body">
  					<div class="row">
  						<div class="col-md-6">
  							<div class="form-group">
  								<label>Mahasiswa</label>
  								<select class="form-control select2" style="width: 100%;" name="npm" required>
  									<option selected disabled>Pilih Mahasiswa</option>
  									<?php foreach ($mahasiswa as $mhs) { ?>
  										<option value="<?php echo $mhs->npm; ?>"><?php echo $mhs->npm; ?> -
  											<?php echo $mhs->nama; ?></option>
  									<?php } ?>
  								</select>
  							</div>

  						</div>
  						<!-- /.col -->
  						<div class="col-md-6">
  							<div class="form-group">
  								<label>Dosen</label>
  								<select class="form-control select2" style="width: 100%;" name="nik" required>
  									<option selected disabled>Pilih Dosen</option>
  									<?php foreach ($dosen as $dos) { ?>
  										<option value="<?php echo $dos->nik; ?>"><?php echo $dos->nik; ?> - <?php echo $dos->nama; ?>
  										</option>
  									<?php } ?>
  								</select>
  							</div>

  						</div>
  						<!-- /.row -->
  					</div>
  					<!-- /.box-body -->
  					<div class="box-footer">
  						<button type="reset" class="btn btn-default pull-right btn-flat ">Cancel</button>
  						<input type="submit" class="btn btn-info pull-right  btn-flat" style="margin-right:3px" value="Simpan">
  					</div>
  					<!-- /.box-footer -->
  			</form>
  		</div>
  		<div class="box">
  			<div class="box-header">
  				<h3 class="box-title">Data-Data Mahasiswa</h3>
  			</div>
  			<!-- /.box-header -->
  			<div class="box-body">
  				<table id="example1" class="table table-bordered table-striped">
  					<thead>
  						<tr>
  							<th>No.</th>
  							<th>NPM</th>
  							<th>Nama</th>
  							<th>Kelas</th>
  							<th>Prodi</th>
  							<th>Pembimbing</th>
  							<th>Aksi</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php
							$no = 1;
							foreach ($bimbingan as $bim) {
								?>
  							<tr>
  								<td><?php echo $no++ ?></td>
  								<td><?php echo $bim->npm; ?></td>
  								<td><?php echo $bim->namaMhs; ?></td>
  								<td><?php echo $bim->kelas; ?></td>
  								<td><?php echo $bim->prodi; ?></td>
  								<td><?php echo $bim->namaDos; ?></td>
  								<td>
  									<a href="<?php echo base_url('bimbingan/update_bimbingan/' . $bim->kd_bimbingan . '/' . $bim->npm); ?>" class="btn btn-warning  btn-flat">Ubah</a>
  									<a href="<?php echo base_url('bimbingan/delete_act_bimbingan/' . $bim->kd_bimbingan . '/' . $bim->npm); ?>" class="btn btn-danger  btn-flat">Hapus</a>
  								</td>
  							</tr>
  						<?php } ?>
  					</tbody>
  					<tfoot>
  						<tr>
  							<th>No.</th>
  							<th>NPM</th>
  							<th>Nama</th>
  							<th>Kelas</th>
  							<th>Prodi</th>
  							<th>Pembimbing</th>
  							<th>Aksi</th>
  						</tr>
  					</tfoot>
  				</table>
  			</div>
  			<!-- /.box-body -->
  		</div>
  	</section>
  	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
  	// function getNamaMhs() {
  	// 	var nama = document.getElementById("npm").value;
  	// 	document.getElementById("namaMhs").value = nama;
  	// }

  	// function getNamaDos() {
  	// 	var i = document.getElementById("nik");
  	// 	var nama = i.options[i.selectedIndex].text;
  	// 	document.getElementById("namaDos").value = nama;
  	// }
  </script>