  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Kelola Internship
              <small>Pendaftaran</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Kelola Internship</a></li>
              <li class="active">Pendaftaran</li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
              <div class="box-header with-border">
                  <h3 class="box-title">Ubah Pendaftaran</h3>
              </div>
              <!-- /.box-header -->
              <form action="<?php echo base_url('pendaftaran/update_act/'.$pdftr->kd_pendaftaran); ?>" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>NPM</label>
                                  <input type="text" class="form-control" placeholder="Enter ..." readonly id="nama" name="npm" readonly value="<?php echo $pdftr->npm; ?>" required>
                              </div>
                              <div class="form-group">
                                  <label>Tanggal Pendaftaran</label>
                                  <input type="text" value="<?php $date = date_create($pdftr->tgl_pendaftaran);
                                                            echo date_format($date, "m/d/Y"); ?>" class="form-control pull-right" id="datepicker" value"" name="tanggal_pendaftaran" required>
                              </div>

                              <div class="form-group">
                                  <label>Nama Perusahaan</label>
                                  <input type="text" class="form-control" placeholder="Enter ..." name="nama_perusahaan" value="<?php echo $pdftr->nama_perusahaan; ?>" required>
                              </div>

                              <div class="form-group">
                                  <label for="exampleInputFile">Upload DHS</label>
                                  <input type="file" id="exampleInputFile" name="dhs">
                                  <input type="hidden" name="ubah_dhs" value="<?php echo $pdftr->upload_dhs; ?>">
                                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                              </div>
                          </div>
                          <!-- /.col -->
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>Nama</label>
                                  <input type="text" class="form-control" placeholder="Enter ..." readonly id="nama" name="nama_mahasiswa" value="<?php echo $pdftr->nama; ?>" required>
                              </div>
                              <div class="form-group">
                                  <label>Alamat Perusahaan</label>
                                  <textarea class="form-control" rows="3" placeholder="Enter ..." name="alamat_perusahaan" required><?php echo $pdftr->alamat_perusahaan; ?></textarea>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputFile">Upload Balasan</label>
                                  <input type="file" id="exampleInputFile" name="balasan">
                                  <input type="hidden" name="ubah_balasan" value="<?php echo ($pdftr->upload_balasan != null)?$pdftr->upload_dhs:''; ?>">
                                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                              </div>
                              <!-- /.col -->
                          </div>
                          <!-- /.row -->
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                          <a href="javascript:window.history.go(-1);" class="btn btn-default pull-right btn-flat">Cancel</a>
                          <input type="submit" class="btn btn-info pull-right  btn-flat" style="margin-right:3px" value="Ubah">
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
                              <th>Tanggal Pendaftaran</th>
                              <th>Nama Perusahaan</th>
                              <th>Alamat Perusahaan</th>
                              <th>Aksi</th>
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
                                  <td><?php echo ucwords($pdft->nama); ?></td>
                                  <td><?php echo strtoupper($pdft->kelas); ?></td>
                                  <td><?php echo ucwords($pdft->prodi); ?></td>
                                  <td><?php echo date_format(date_create($pdft->tgl_pendaftaran), "d-m-Y"); ?></td>
                                  <td><?php echo ucwords($pdft->nama_perusahaan); ?></td>
                                  <td><?php echo ucwords($pdft->alamat_perusahaan); ?></td>
                                  <td>
                                  <a href="<?php echo base_url('pendaftaran/update/'.$pdft->kd_pendaftaran.'/'.$pdft->npm);?>" class="btn btn-warning  btn-flat">Ubah</a>
  									<a href="<?php echo base_url('pendaftaran/delete_act/'.$pdft->kd_pendaftaran.'/'.$pdft->npm);?>" class="btn btn-danger btn-flat">Hapus</a>/a>
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
                              <th>Tanggal Pendaftaran</th>
                              <th>Nama Perusahaan</th>
                              <th>Alamat Perusahaan</th>
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