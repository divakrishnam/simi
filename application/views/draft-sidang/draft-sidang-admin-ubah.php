  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			Kelola Internship
  			<small>Draft Sidang</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Kelola Internship</a></li>
  			<li class="active">Draft Sidang</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">

  		<!-- SELECT2 EXAMPLE -->
  		<div class="box box-default">
  			<div class="box-header with-border">
  				<h3 class="box-title">Tambah Draft Sidang</h3>
  			</div>
  			<!-- /.box-header -->
  			<form action="<?php echo base_url('draftsidang/update_act/' . $drfs->kd_bimbingan . '/' . $drfs->npm); ?>" method="post">
  				<div class="box-body">
  					<div class="row">
  						<div class="col-md-6">
  							<div class="form-group">
  								<label>Mahasiswa</label>
  								<input type="text" class="form-control" placeholder="Enter ..." value="<?php echo $drfs->npm . ' - ' . $drfs->namaMhs; ?>" name="npm" required readonly>
  							</div>
  							<div class="form-group">
  								<label>Terlambat</label>
  								<div class="radio">
  									<label>
  										<input type="radio" name="terlambat" <?php echo ($drfs->terlambat == 'iya') ?  "checked" : "";  ?> id="optionsRadios1" value="iya">
  										Iya
  									</label>
  									&nbsp;&nbsp;
  									<label>
  										<input type="radio" name="terlambat" <?php echo ($drfs->terlambat == 'tidak') ?  "checked" : "";  ?> id="optionsRadios2" value="tidak">
  										Tidak
  									</label>
  								</div>
  							</div>
  						</div>
  						<!-- /.col -->
  						<div class="col-lg-6">
  							<div class="form-group">
  								<label>Tanggal Pengumpulan</label>
  								<input type="text" class="form-control pull-right" id="datepicker" value="<?php $date = date_create($drfs->tgl_pengumpulan);
																											echo date_format($date, "m/d/Y"); ?>" required name="tanggal_pengumpulan">
  							</div>
  							<div class="form-group">
  								<label>Judul Laporan</label>
  								<input type="text" class="form-control" placeholder="Enter ..." name="judul_laporan" required value="<?php echo $drfs->judul_laporan; ?>">
  							</div>
  							<!-- /.col -->
  						</div>
  						<!-- /.row -->
  					</div>
  					<!-- /.box-body -->
  					<div class="box-footer">
  						<button type="cancel" class="btn btn-default pull-right btn-flat ">Cancel</button>
  						<input type="submit" class="btn btn-info pull-right  btn-flat" style="margin-right:3px" value="Ubah">
  					</div>
  					<!-- /.box-footer -->
  			</form>
  		</div>
  		<div class="box">
  			<div class="box-header">
  				<h3 class="box-title">Data-Data Draft Sidang</h3>
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
  							<th>Tanggal Pengumpulan</th>
  							<th>Terlambat</th>
  							<th>Judul Laporan</th>
  							<th>Aksi</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php
							$no = 1;
							foreach ($draftsidang as $ds) {
								?>
  							<tr>
  								<td><?php echo $no++ ?></td>
  								<td><?php echo $ds->npm; ?></td>
  								<td><?php echo $ds->namaMhs; ?></td>
  								<td><?php echo $ds->kelas; ?></td>
  								<td><?php echo $ds->prodi; ?></td>
  								<td><?php echo $ds->namaDos; ?></td>
  								<td><?php echo $ds->tgl_pengumpulan; ?></td>
  								<td><?php echo ucfirst($ds->terlambat); ?></td>
  								<td><?php echo ucwords($ds->judul_laporan); ?></td>
  								<td>
  									<a href="<?php echo base_url('draftsidang/update/' . $ds->kd_bimbingan . '/' . $ds->npm); ?>" class="btn btn-warning  btn-flat">Ubah</a>
  									<a href="<?php echo base_url('draftsidang/delete_act/' . $ds->kd_bimbingan . '/' . $ds->npm); ?>" class="btn btn-danger btn-flat">Hapus</a>
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
  							<th>Tanggal Pengumpulan</th>
  							<th>Terlambat</th>
  							<th>Judul Laporan</th>
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