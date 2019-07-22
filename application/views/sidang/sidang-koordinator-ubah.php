  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Kelola Internship
              <small>Sidang</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Kelola Internship</a></li>
              <li class="active">Sidang</li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
              <div class="box-header with-border">
                  <h3 class="box-title">Tambah Sidang</h3>
              </div>
              <!-- /.box-header -->
              <form action="<?php echo base_url('sidang/update_act_sidang_koordinator/' . $sids->kd_sidang . '/' . $sids->kd_bimbingan); ?>" method="post">
                  <div class="box-body">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>Mahasiswa</label>
                                  <input type="text" class="form-control" placeholder="Enter ..." name="nama" value="<?php echo $sids->namaMhs; ?>" readonly>
                              </div>
                              <div class="form-group">
                                  <label>Tanggal Sidang</label>
                                  <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_sidang" value="<?php $date = date_create($sids->tgl_sidang);
                                                                                                                                    echo date_format($date, "m/d/Y"); ?>" required>
                              </div>
                              <div class="form-group">
                                  <label>Ruangan</label>
                                  <input type="text" class="form-control" placeholder="Enter ..." name="ruangan" value="<?php echo $sids->ruangan; ?>">
                              </div>

                          </div>
                          <!-- /.col -->
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>Dosen</label>
                                  <select class="form-control select2" style="width: 100%;" name="nik" id="nik">
                                      <option selected disabled>Pilih Dosen</option>
                                      <?php foreach ($dosen as $dos) { ?>
                                          <option value="<?php echo $dos->nik; ?>" <?php if ($sids->nik_penguji == $dos->nik) {
                                                                                        echo 'selected';
                                                                                    } ?>><?php echo $dos->nik; ?> - <?php echo $dos->nama; ?>
                                          </option>
                                      <?php } ?>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label>Waktu Sidang</label>
                                  <div class="input-group" style="width: 100%;">
                                      <input type="text" class="form-control timepicker" name="waktu_sidang" value="<?php $date = date_create($sids->waktu_sidang);
                                                                                                                    echo date_format($date, "'h:i A'"); ?>">
                                  </div>
                                  <!-- /.input group -->
                              </div>

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
                              <th>Penguji</th>
                              <th>Tanggal Sidang</th>
                              <th>Waktu Sidang</th>
                              <th>Ruangan</th>
                              <th>Aksi</th>
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
                                  <td>
                                      <a href="<?php echo base_url('sidang/update_sidang_koordinator/' . $sdg->kd_sidang . '/' . $sdg->kd_bimbingan . '/' . $sdg->npm); ?>" class="btn btn-warning  btn-flat">Ubah</a>
                                      <a href="<?php echo base_url('sidang/delete_act/' . $sdg->kd_sidang . '/' . $sdg->kd_bimbingan . '/' . $sdg->npm); ?>" class="btn btn-danger  btn-flat">Hapus</a>
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
                              <th>Penguji</th>
                              <th>Tanggal Sidang</th>
                              <th>Waktu Sidang</th>
                              <th>Ruangan</th>
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