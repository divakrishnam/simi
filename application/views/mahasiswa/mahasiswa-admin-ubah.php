  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1>
  			Kelola Pengguna
  			<small>Mahasiswa</small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Kelola Pengguna</a></li>
  			<li class="active">Mahasiswa</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">

  		<!-- SELECT2 EXAMPLE -->
  		<div class="box box-default">
  			<div class="box-header with-border">
  				<h3 class="box-title">Ubah Mahasiswa</h3>
  			</div>
  			<!-- /.box-header -->
  			<form action="<?php echo base_url('mahasiswa/update_act/'.$user->npm);?>" method="post">
  				<div class="box-body">
  					<div class="row">
  						<div class="col-md-6">
  							<div class="form-group">
  								<label>NPM</label>
  								<input type="text" class="form-control" placeholder="Enter ..." name="npm"
  									value="<?php echo $user->npm; ?>" disabled>
  							</div>
  							<div class="form-group">
  								<label>Kelas</label>
  								<select class="form-control" name="kelas">
  									<option <?php if($user->kelas == '1A')echo'selected'; ?> value="1A">1A</option>
  									<option <?php if($user->kelas == '1B')echo'selected'; ?> value="1B">1B</option>
  									<option <?php if($user->kelas == '2A')echo'selected'; ?> value="2A">2A</option>
  									<option <?php if($user->kelas == '2B')echo'selected'; ?> value="2B">2B</option>
  									<option <?php if($user->kelas == '3A')echo'selected'; ?> value="3A">3A</option>
  									<option <?php if($user->kelas == '3B')echo'selected'; ?> value="3B">3B</option>
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
  								<label>Prodi</label>
  								<select class="form-control" name="prodi">
  									<option <?php if($user->prodi == 'D3 Manajemen Informatika')echo'selected'; ?>
  										value="D3 Manajemen Informatika">D3 Manajemen Informatika</option>
  									<option <?php if($user->prodi == 'D3 Teknik Informatika')echo'selected'; ?>
  										value="D3 Teknik Informatika">D3 Teknik Informatika</option>
  									<option <?php if($user->prodi == 'D4 Teknik Informatika')echo'selected'; ?>
  										value="D4 Teknik Informatika">D4 Teknik Informatika</option>
  								</select>
  							</div>

  							<div class="form-group">
  								<label>Password</label>
  								<input type="password" class="form-control" placeholder="Enter ..." name="password"
  									value="<?php echo $user->nama; ?>">
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
  					<input type="submit" class="btn btn-info pull-right  btn-flat" style="margin-right:3px"
  						value="Ubah">
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
  							<th>NPM</th>
  							<th>Nama</th>
  							<th>Kelas</th>
  							<th>Prodi</th>
  							<th>Aksi</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php 
                            $no = 1;
                            foreach($mahasiswa as $mhs){ 
                        ?>
  						<tr>
  							<td><?php echo $no++ ?></td>
  							<td><?php echo $mhs->npm; ?></td>
  							<td><?php echo ucfirst($mhs->nama); ?></td>
  							<td><?php echo $mhs->kelas; ?></td>
  							<td><?php echo ucfirst($mhs->prodi); ?></td>
  							<td>
  								<a href="<?php echo base_url('mahasiswa/update/'.$mhs->npm);?>"
  									class="btn btn-warning  btn-flat">Ubah</a>
  								<a href="<?php echo base_url('mahasiswa/delete_act/'.$mhs->npm);?>"
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
