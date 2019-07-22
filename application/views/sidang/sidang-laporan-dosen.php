  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			Kelola Laporan
  			<small>Sidang</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Kelola Laporan</a></li>
  			<li class="active">Sidang</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">
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
  							<th>Pembimbing</th>
  							<th>Tanggal Sidang</th>
  							<th>Waktu Sidang</th>
  							<th>Ruangan</th>
  							<th>Nilai</th>
  							<th>Berita Acara</th>
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
  								<td><?php echo $sdg->waktu_sidang; ?></td>
  								<td><?php echo $sdg->ruangan; ?></td>
  								<td><?php echo $sdg->nilai; ?></td>
  								<td><?php echo $sdg->upload_berita_acara; ?></td>
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
  							<th>Tanggal Sidang</th>
  							<th>Waktu Sidang</th>
  							<th>Ruangan</th>
  							<th>Nilai</th>
  							<th>Berita Acara</th>
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
