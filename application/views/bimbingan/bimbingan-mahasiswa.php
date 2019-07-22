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
  			<form action="<?php echo base_url('bimbingan/create_act_bimbingan_mahasiswa'); ?>" method="post">
  				<div class="box-body">
  					<div class="row">
  						<div class="col-md-6">
  							<div class="form-group">
  								<label>Nama Dosen</label>
  								<input type="text" class="form-control" placeholder="Enter ..." disabled value="<?php echo $dosen->nama; ?>">
  								<input type="hidden" value="<?php echo $dosen->kd_bimbingan; ?>" name="kd_bimbingan" required>
  							</div>

  							<div class="form-group">
  								<label>Tanggal Bimbingan</label>
  								<input type="text" class="form-control pull-right" id="datepicker" name="tanggal_bimbingan" required>
  							</div>
  						</div>
  						<!-- /.col -->
  						<div class="col-md-6">
  							<div class="form-group">
  								<label>Topik Bimbingan</label>
  								<textarea class="form-control" rows="4" placeholder="Enter ..." name="topik_bimbingan" required></textarea>
  							</div>
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
  							<th>Pembimbing</th>
  							<th>Tanggal Bimbingan</th>
  							<th>Topik Bimbingan</th>
  							<th>Status Bimbingan</th>
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
  								<td><?php echo $bim->namaDos; ?></td>
  								<td><?php echo $bim->tanggal_bimbingan; ?></td>
  								<td><?php echo $bim->topik_bimbingan; ?></td>
  								<td><?php if ($bim->status_bimbingan == null) {
											echo 'Disapprove';
										} else {
											echo 'Approve';
										} ?></td>
  								<td>
  									<?php
										if ($bim->status_bimbingan == null) {
											?>
  										<a href="<?php echo base_url('bimbingan/update/' . $bim->kd_detail_bimbingan . '/' . $bim->kd_bimbingan . '/' . $bim->npm); ?>" class="btn btn-warning  btn-flat">Ubah</a>
  										<a href="<?php echo base_url('bimbingan/delete_act/' . $bim->kd_detail_bimbingan . '/' . $bim->kd_bimbingan . '/' . $bim->npm); ?>" class="btn btn-danger btn-flat">Hapus</a>
  									<?php
										} else {
											?>
  										<button class="btn btn-warning  btn-flat" disabled>Ubah</button>
  										<button class="btn btn-danger btn-flat" disabled>Hapus</button>
  									<?php
										}
										?>

  								</td>
  							</tr>
  						<?php } ?>
  					</tbody>
  					<tfoot>
  						<tr>
  							<th>No.</th>
  							<th>Pembimbing</th>
  							<th>Tanggal Bimbingan</th>
  							<th>Topik Bimbingan</th>
  							<th>Status Bimbingan</th>
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