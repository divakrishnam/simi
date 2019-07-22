  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			Kelola Pengguna
  			<small>Dosen</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Kelola Pengguna</a></li>
  			<li class="active">Dosen</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">

  		<!-- SELECT2 EXAMPLE -->
  		<div class="box box-default">
  			<div class="box-header with-border">
  				<h3 class="box-title">Tambah Dosen</h3>
  			</div>
  			<!-- /.box-header -->
  			<form action="<?php echo base_url('dosen/update_act/'.$user->nik);?>" method="post">
  				<div class="box-body">
  					<div class="row">
  						<div class="col-md-6">
  							<div class="form-group">
  								<label>NIK</label>
  								<input type="text" class="form-control" placeholder="Enter ..." name="nik"
  									value="<?php echo $user->nik; ?>" disabled>
  							</div>
  							<div class="form-group">
  								<label>Prodi</label>
  								<select class="form-control" name="prodi">
  									<option selected disabled>Pilih Program Studi</option>
  									<option <?php if($user->prodi == 'D3 Manajemen Informatika')echo'selected'; ?>
  										value="D3 Manajemen Informatika">D3 Manajemen Informatika</option>
  									<option <?php if($user->prodi == 'D3 Teknik Informatika')echo'selected'; ?>
  										value="D3 Teknik Informatika">D3 Teknik Informatika</option>
  									<option <?php if($user->prodi == 'D4 Teknik Informatika')echo'selected'; ?>
  										value="D4 Teknik Informatika">D4 Teknik Informatika</option>
  								</select>
  							</div>

  							<div class="form-group">
  								<label>Username</label>
  								<input type="text" class="form-control" placeholder="Enter ..." name="username"
  									value="<?php echo $user->username; ?>" disabled>
  							</div>
  						</div>
  						<!-- /.col -->
  						<div class="col-md-6">
  							<div class="form-group">
  								<label>Nama</label>
  								<input type="text" class="form-control" placeholder="Enter ..." name="nama"
  									value="<?php echo $user->nama; ?>">
  							</div>
  							<div class="form-group">
  								<label>Hak Akses</label>
  								<select class="form-control" name="hak_akses">
  									<option <?php if($user->hak_akses == 'dosen')echo'selected'; ?> value="dosen">Dosen</option>
  									<option <?php if($user->hak_akses == 'koordinator')echo'selected'; ?> value="koordinator">Koordinator</option>
  									<option <?php if($user->hak_akses == 'kaprodi')echo'selected'; ?> value="kaprodi">Kaprodi</option>
  								</select>
  							</div>

  							<div class="form-group">
  								<label>Password</label>
  								<input type="password" class="form-control" placeholder="Enter ..." name="password"
  									value="<?php echo $user->password; ?>">
  							</div>
  						</div>
  						<!-- /.col -->
  					</div>
  					<!-- /.row -->
  				</div>
  				<!-- /.box-body -->
  				<div class="box-footer">
  					<a href="javascript:window.history.go(-1);"
  						class="btn btn-default pull-right btn-flat ">Cancel</a>
  					<input type="submit" class="btn btn-info pull-right btn-flat" style="margin-right:3px"
  						value="Simpan">
  				</div>
  				<!-- /.box-footer -->
  			</form>
  		</div>
  		<div class="box">
  			<div class="box-header">
  				<h3 class="box-title">Data-Data Dosen</h3>
  			</div>
  			<!-- /.box-header -->
  			<div class="box-body">
  				<table id="example1" class="table table-bordered table-striped">
  					<thead>
  						<tr>
  							<th>No.</th>
  							<th>NIK</th>
  							<th>Nama</th>
  							<th>Prodi</th>
  							<th>Hak Akses</th>
  							<th>Aksi</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php 
                  $no = 1;
                  foreach($dosen as $dos){ ?>
  						<tr>
  							<td><?php echo $no++ ?></td>
  							<td><?php echo $dos->nik; ?></td>
  							<td><?php echo ucfirst($dos->nama); ?></td>
  							<td><?php echo ucfirst($dos->prodi); ?></td>
  							<td><?php echo ucfirst($dos->hak_akses); ?></td>
  							<td>
  								<a href="<?php echo base_url('dosen/update/'.$dos->nik);?>"
  									class="btn btn-warning  btn-flat">Ubah</a>
  								<a href="<?php echo base_url('dosen/delete_act/'.$dos->nik);?>"
  									class="btn btn-danger btn-flat">Hapus</a>
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
