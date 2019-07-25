  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kelola Internship
        <small>Bimbingan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Kelola Internship</a></li>
        <li class="active">Bimbingan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
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
                <th>Tanggal Bimbingan</th>
                <th>Topik Bimbingan</th>
                <th>Status</th>
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
                  <td><?php echo $bim->nama; ?></td>
                  <td><?php echo $bim->kelas; ?></td>
                  <td><?php echo $bim->prodi; ?></td>
                  <td><?php echo $bim->tanggal_bimbingan; ?></td>
                  <td><?php echo $bim->topik_bimbingan; ?></td>
                  <form action="<?php echo base_url('bimbingan/update_act_approve/' . $bim->kd_detail_bimbingan . '/' . $bim->kd_bimbingan . '/' . $bim->npm); ?>" method="post">
                    <td><input type="submit" <?php if ($bim->status_bimbingan == null) {
                                                echo 'class="btn btn-warning" value="Disapprove"';
                                              } else {
                                                echo 'class="btn btn-success" value="Approve"';
                                              }; ?> name="persetujuan"></td>
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
  </div>
  <!-- /.content-wrapper -->