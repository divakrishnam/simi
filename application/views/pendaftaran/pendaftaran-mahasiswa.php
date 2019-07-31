  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			Kelola Internship
  			<small>Pendaftaran</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Kelola Internship</a></li>
  			<li class="active">Pendaftaran</li>
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
  				<h3 class="box-title">Tambah Pendaftaran</h3>
  			</div>
  			<!-- /.box-header -->
  			<form action="<?php echo base_url('pendaftaran/create_act_mahasiswa'); ?>" method="post" enctype="multipart/form-data">
  				<div class="box-body">
  					<div class="row">
  						<div class="col-md-6">
  							<div class="form-group">
  								<label>NPM</label>
  								<input type="text" class="form-control" placeholder="Enter ..." disabled id="nama" name="npm" readonly value="<?php echo $this->session->userdata('id'); ?>" required>
  							</div>
  							<div class="form-group">
  								<label>Tanggal Pendaftaran</label>
  								<input type="text" class="form-control pull-right" id="datepicker" name="tanggal_pendaftaran" required>
  							</div>

  							<div class="form-group">
  								<label>Nama Perusahaan</label>
  								<input type="text" class="form-control" placeholder="Enter ..." name="nama_perusahaan" required>
  							</div>

  							<div class="form-group">
  								<label for="exampleInputFile">Upload DHS</label>
  								<input type="file" id="exampleInputFile" name="dhs" required>
  								<!-- <p class="help-block">Example block-level help text here.</p> -->
  							</div>
  						</div>
  						<!-- /.col -->
  						<div class="col-md-6">
  							<div class="form-group">
  								<label>Nama</label>
  								<input type="text" class="form-control" placeholder="Enter ..." readonly id="nama" name="nama_mahasiswa" value="<?php echo $this->session->userdata('nama'); ?>" required>
  							</div>
  							<div class="form-group">
  								<label>Alamat Perusahaan</label>
  								<textarea class="form-control" rows="6" placeholder="Enter ..." name="alamat_perusahaan" required></textarea>
  							</div>
  							<!-- /.col -->
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
  							<th>Tanggal Pendaftaran</th>
  							<th>Nama Perusahaan</th>
  							<th>Alamat Perusahaan</th>
  							<th>Status</th>
  							<th>Aksi</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php
							$no = 1;
							foreach ($pendaftaran as $pdft) {
								?>
  							<tr>
  								<td><?php echo $no++ ?></td>
  								<td><?php echo $pdft->npm; ?></td>
  								<td><?php echo ucwords($pdft->nama); ?></td>
  								<td><?php echo strtoupper($pdft->kelas); ?></td>
  								<td><?php echo ucwords($pdft->prodi); ?></td>
  								<td><?php echo date_format(date_create($pdft->tgl_pendaftaran), "d-m-Y"); ?></td>
  								<td><?php echo ucwords($pdft->nama_perusahaan); ?></td>
  								<td><?php echo ucwords($pdft->alamat_perusahaan); ?></td>
  								<form action="<?php echo base_url('pendaftaran/update_act_diterima/' . $pdft->kd_pendaftaran . '/' . $pdft->npm); ?>" method="post">
  									<td>
										  <input type="submit" <?php 
										 if($pdft->diterima == null && $pdft->upload_balasan == null) {
											echo 'class="btn btn-warning" value="Belum Diterima" disabled';
										 }
										  elseif ($pdft->diterima == null) {
																	echo 'class="btn btn-warning" value="Belum Diterima"';
																} else {
																	echo 'class="btn btn-success" value="Diterima"';
																} ?> name="diterima">
  									</td>
  								</form>
  								<td>
  									<a href="<?php echo base_url('pendaftaran/update/' . $pdft->kd_pendaftaran . '/' . $pdft->npm); ?>" class="btn btn-warning  btn-flat">Ubah</a>
  									<a href="<?php echo base_url('pendaftaran/delete_act/' . $pdft->kd_pendaftaran . '/' . $pdft->npm); ?>" class="btn btn-danger btn-flat">Hapus</a>
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
  							<th>Tanggal Pendaftaran</th>
  							<th>Nama Perusahaan</th>
  							<th>Alamat Perusahaan</th>
  							<th>Status</th>
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