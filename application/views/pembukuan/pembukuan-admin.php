  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			Kelola Internship
  			<small>Pembukuan</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Kelola Internship</a></li>
  			<li class="active">Pembukuan</li>
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
  				<h3 class="box-title">Tambah Pembukuan</h3>
  			</div>
  			<!-- /.box-header -->
  			<form action="<?php echo base_url('pembukuan/create_act');?>" method="post">
  				<div class="box-body">
  					<div class="row">
  						<div class="col-md-6">
  							<div class="form-group">
  								<label>Mahasiswa</label>
  								<select class="form-control select2" style="width: 100%;" name="npm" id="npm">
  									<option selected disabled>Pilih Mahasiswa</option>
  									<?php foreach($mahasiswa as $mhs){ ?>
  									<option value="<?php echo $mhs->npm; ?>"><?php echo $mhs->npm; ?> -
										  <?php echo $mhs->nama; ?></option>
										  <input type="hidden" name="kd_sidang" value="<?php echo $mhs->kd_sidang; ?>">
										  <input type="hidden" name="kd_bimbingan" value="<?php echo $mhs->kd_bimbingan; ?>">
										  <input type="hidden" name="kd_pendaftaran" value="<?php echo $mhs->kd_pendaftaran; ?>">
  									<?php } ?>
  								</select>
  							</div>

  							<div class="form-group">
  								<label>Terlambat</label>
  								<div class="radio">
  									<label>
  										<input type="radio" name="terlambat" id="optionsRadios1" value="iya">
  										Iya
  									</label>
  									&nbsp;&nbsp;
  									<label>
  										<input type="radio" name="terlambat" id="optionsRadios2" value="tidak">
  										Tidak
  									</label>
  								</div>
  							</div>
  						</div>
  						<!-- /.col -->
  						<div class="col-lg-6">
  							<div class="form-group">
  								<label>Tanggal Pembukuan</label>
  								<input type="text" class="form-control pull-right" id="datepicker" name="tanggal_pembukuan">
  							</div>
  							<!-- /.col -->
  						</div>
  						<!-- /.row -->
  					</div>
  					<!-- /.box-body -->
  					<div class="box-footer">
  						<button type="cancel" class="btn btn-default pull-right btn-flat ">Cancel</button>
  						<input type="submit" class="btn btn-info pull-right  btn-flat" style="margin-right:3px"
  							value="Simpan">
  					</div>
  					<!-- /.box-footer -->
  			</form>
  		</div>
  		<div class="box">
  			<div class="box-header">
  				<h3 class="box-title">Data-Data Pembukuan</h3>
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
  							<th>Aksi</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php 
                            $no = 1;
                            foreach($pembukuan as $pbk){ 
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
  							<td>
  								<a href="#" class="btn btn-warning  btn-flat">Ubah</a>
  								<a href="#" class="btn btn-danger btn-flat">Hapus</a>
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
  							<th>Tanggal Sidang</th>
  							<th>Tanggal Pengumpulan</th>
  							<th>Terlambat</th>
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
