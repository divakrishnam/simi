  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			Kelola Laporan
  			<small>Draft Sidang</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Kelola Laporan</a></li>
  			<li class="active">Draft Sidang</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">
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
  							<th>CD</th>
  							<th>Laporan</th>
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
  								<td><?php echo ucfirst($ds->cd); ?></td>
  								<td><?php echo ucfirst($ds->laporan); ?></td>
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
  								<th>Pembimbing</th>
  								<th>Tanggal Pengumpulan</th>
  								<th>Terlambat</th>
  								<th>CD</th>
  								<th>Laporan</th>
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