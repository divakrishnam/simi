  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			Kelola Internship
  			<small>Sidang</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Kelola Internship</a></li>
  			<li class="active">Sidang</li>
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
  				<h3 class="box-title">Tambah Sidang</h3>
  			</div>
  			<!-- /.box-header -->
  			<form action="<?php echo base_url('sidang/create_act_dosen'); ?>" method="post" enctype="multipart/form-data">
  				<div class="box-body">
  					<div class="row">
  						<div class="col-md-6">
  							<div class="form-group">
  								<label>Mahasiswa</label>
  								<select class="form-control select2" style="width: 100%;" name="kd_sidang" required>
  									<option selected disabled>Pilih Mahasiswa</option>
  									<?php foreach ($mahasiswa as $mhs) { ?>
  										<option value="<?php echo $mhs->kd_sidang; ?>"><?php echo $mhs->npm; ?> -
  											<?php echo $mhs->nama; ?></option>
  									<?php } ?>
  								</select>
  							</div>
  							<div class="form-group">
  								<label for="exampleInputFile">Upload Berita Acara</label>
  								<input type="file" id="exampleInputFile" name="berita_acara" required>
  								<!-- <p class="help-block">Example block-level help text here.</p> -->
  							</div>
  						</div>
  						<!-- /.col -->
  						<div class="col-md-6">
  							<div class="form-group">
  								<label>Nilai</label>
  								<input type="text" class="form-control" placeholder="Enter ..." name="nilai" required>
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
  				<h3 class="box-title">Data-Data Sidang</h3>
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
  							<th>Penguji</th>
  							<th>Tanggal Sidang</th>
  							<th>Nilai</th>
  							<th>Berita Acara</th>
  							<th>Aksi</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php
							$no = 1;
							foreach ($sidang as $sdg) {
								?>
  							<tr>
  								<td><?php echo $no++ ?></td>
  								<td><?php echo $sdg->npm; ?></td>
  								<td><?php echo $sdg->namaMhs; ?></td>
  								<td><?php echo $sdg->kelas; ?></td>
  								<td><?php echo $sdg->prodi; ?></td>
  								<td><?php echo $sdg->namaDos; ?></td>
  								<td><?php echo $sdg->tgl_sidang; ?></td>
  								<td><?php echo $sdg->nilai; ?></td>
  								<td><?php echo $sdg->upload_berita_acara; ?></td>
  								<td>
								  <a href="<?php echo base_url('sidang/update/' . $sdg->kd_sidang . '/' . $sdg->kd_bimbingan . '/' . $sdg->npm); ?>" class="btn btn-warning  btn-flat">Ubah</a>
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
  							<th>Penguji</th>
  							<th>Tanggal Sidang</th>
  							<th>Nilai</th>
  							<th>Berita Acara</th>
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