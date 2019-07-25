  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			Kelola Laporan
  			<small>Bimbingan</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Kelola Laporan</a></li>
  			<li class="active">Bimbingan</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<div class="box">
  			<div class="box-header">
  				<div class="col-lg-8">
  					<h3 class="box-title">Data-Data Bimbingan</h3>
  				</div>
  				<div class="col-lg-4">
  					<form action="<?php echo base_url('bimbingan/search_bimbingan'); ?>" method="post">
  						<div class="col-lg-10">
  							<input type="text" class="form-control" placeholder="Cari bimbingan dosen.." name="bimbingan" required>
  						</div>
  						<div class="col-lg-2">
  							<input type="submit" class="btn btn-info pull-right  btn-flat" value="Cari">
  						</div>
  					</form>
  				</div>
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
  							<th>Tanggal Bimbingan</th>
  							<th>Topik Bimbingan</th>
  							<th>Status Bimbingan</th>
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
  								<td><?php echo $bim->tanggal_bimbingan; ?></td>
  								<td><?php echo $bim->topik_bimbingan; ?></td>
  								<td><?php if ($bim->status_bimbingan == null) {
											echo 'Disapprove';
										} else {
											echo 'Approve';
										} ?></td>
  								<td>
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
  							<th>Tanggal Bimbingan</th>
  							<th>Topik Bimbingan</th>
  							<th>Status Bimbingan</th>
  						</tr>
  					</tfoot>
  				</table>
  			</div>
  		</div>
  		<!-- /.box-body -->
  		<div class="box">
  			<div class="box-header">
  				<h3 class="box-title">Data-Data Bimbingan</h3>
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
  							<th>Jumlah Bimbingan</th>
  							<th>Rekomendasi</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php
							$no = 1;
							foreach ($rekomendasi as $rkm) {
								?>
  							<tr>
  								<td><?php echo $no++ ?></td>
  								<td><?php echo $rkm->npm; ?></td>
  								<td><?php echo $rkm->namaMhs; ?></td>
  								<td><?php echo $rkm->kelas; ?></td>
  								<td><?php echo $rkm->prodi; ?></td>
  								<td><?php echo $rkm->namaDos; ?></td>
  								<td><?php echo $rkm->jumlah_bimbingan; ?></td>
  								<form action="<?php echo base_url('bimbingan/update_act_rekomendasi/' . $rkm->kd_bimbingan . '/' . $rkm->npm); ?>" method="post">
  									<td><input type="submit" <?php if ($rkm->rekomendasi == null) {
																	echo 'class="btn btn-warning" value="Belum Rekomendasi"';
																} else {
																	echo 'class="btn btn-success" value="Rekomendasi"';
																}; ?> name="rekomendasi"></td>
  								</form>
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
  							<th>Tanggal Bimbingan</th>
  							<th>Topik Bimbingan</th>
  							<th>Status</th>
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