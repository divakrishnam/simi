  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			Kelola Laporan
  			<small>Pembukuan</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Kelola Laporan</a></li>
  			<li class="active">Pembukuan</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<div class="box">
  			<div class="box-header">
  				<div class="col-lg-8">
  					<h3 class="box-title">Data-Data Pembukuan</h3>
  				</div>
  				<div class="col-lg-4">
  					<form action="<?php echo base_url('pembukuan/search_laporan'); ?>" method="post">
  						<div class="col-lg-10">
  							<input type="text" class="form-control" placeholder="Cari judul laporan.." name="judul_laporan" required>
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
  							<th>Tanggal Sidang</th>
  							<th>Tanggal Pengumpulan</th>
  							<th>Terlambat</th>
  							<th>Judul Laporan</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php
							$no = 1;
							foreach ($pembukuan as $pbk) {
								?>
  							<tr>
  								<td><?php echo $no++ ?></td>
  								<td><?php echo $pbk->npm; ?></td>
  								<td><?php echo $pbk->namaMhs; ?></td>
  								<td><?php echo $pbk->kelas; ?></td>
  								<td><?php echo $pbk->prodi; ?></td>
  								<td><?php echo $pbk->namaDos; ?></td>
  								<td><?php echo $pbk->tgl_sidang; ?></td>
  								<td><?php echo $pbk->tgl_pembukuan; ?></td>
  								<td><?php echo ucfirst($pbk->terlambat); ?></td>
  								<td><?php echo ucwords($pbk->judul_laporan); ?></td>
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
  							<th>Tanggal Pengumpulan</th>
  							<th>Terlambat</th>
  							<th>Judul Laporan</th>
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