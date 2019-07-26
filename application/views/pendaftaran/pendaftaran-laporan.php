  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			Kelola Laporan
  			<small>Pendaftaran</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Kelola Laporan</a></li>
  			<li class="active">Pendaftaran</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<div class="box">
  			<div class="box-header">
  				<div class="col-lg-8">
  					<h3 class="box-title">Data-Data Pendaftaran</h3>
  				</div>
  				<div class="col-lg-4">
  					<form action="<?php echo base_url('pendaftaran/search_tahun'); ?>" method="post">
  						<div class="col-lg-10">
  							<input type="text" class="form-control" placeholder="Cari tahun pendaftaran.." name="tahun_pendaftaran" required>
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
  							<th>Tanggal Pendaftaran</th>
  							<th>Nama Perusahaan</th>
  							<th>Alamat Perusahaan</th>
  							<th>Status</th>
  							<th>DHS</th>
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
  								<td><?php echo $pdft->nama; ?></td>
  								<td><?php echo $pdft->kelas; ?></td>
  								<td><?php echo $pdft->prodi; ?></td>
  								<td><?php echo date_format(date_create($pdft->tgl_pendaftaran), "d-m-Y"); ?></td>
  								<td><?php echo $pdft->nama_perusahaan; ?></td>
  								<td><?php echo $pdft->alamat_perusahaan; ?></td>
  								<td>
  									<?php if ($pdft->diterima == null) {
											echo 'Belum Diterima';
										} else {
											echo 'Diterima';
										}; ?>
  								</td>
  								<td>
  									<a href="<?php echo base_url('/uploads/pendaftaran/' . $pdft->upload_dhs); ?>" target='_blank' class="btn btn-info  btn-flat">View</a>
  									<a href="<?php echo base_url('/pendaftaran/download/' . $pdft->upload_dhs); ?>" class="btn btn-primary  btn-flat">Download</a>
  								</td>
  							</tr>
  						<?php }
							?>
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
  							<th>DHS</th>
  						</tr>
  						<tr>
  							<th colspan="8"><span style="float:right;">Jumlah Pendaftaran :</span></th>
  							<th><?php echo $jumlah; ?></th>
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