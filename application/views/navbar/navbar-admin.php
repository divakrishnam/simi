<li class="treeview">
	<a href="#">
		<i class="fa fa-users"></i> <span> Kelola Pengguna</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="<?php echo base_url('mahasiswa/');?>"><i class="fa fa-circle-o"></i>
				Mahasiswa</a></li>
		<li><a href="<?php echo base_url('dosen/');?>"><i class="fa fa-circle-o"></i> Dosen</a></li>
	</ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-industry"></i> <span> Kelola PKL</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="<?php echo base_url('pendaftaran/admin');?>"><i class="fa fa-circle-o"></i>
				Pendaftaran</a></li>
		<!-- <li><a href="<?php //echo base_url('bimbingan/');?>"><i class="fa fa-circle-o"></i>
				Bimbingan</a></li> -->
        <!-- <li><a href="<?php //echo base_url('sidang/');?>"><i class="fa fa-circle-o"></i> Sidang</a></li> -->
        <li><a href="<?php echo base_url('draftsidang/');?>"><i class="fa fa-circle-o"></i> Draft Sidang</a></li>
        <li><a href="<?php echo base_url('pembukuan/');?>"><i class="fa fa-circle-o"></i> Pembukuan</a></li>
		</li>
	</ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-files-o"></i> <span> Kelola Laporan</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="<?php echo base_url('pendaftaran/laporan');?>"><i class="fa fa-circle-o"></i> Pendaftaran</a></li>
		<li><a href="<?php echo base_url('bimbingan/laporan');?>"><i class="fa fa-circle-o"></i> Bimbingan</a></li>
		<li><a href="<?php echo base_url('sidang/laporan');?>"><i class="fa fa-circle-o"></i> Sidang</a></li>
		<li><a href="<?php echo base_url('draftsidang/laporan');?>"><i class="fa fa-circle-o"></i> Draft Sidang</a></li>
		<li><a href="<?php echo base_url('pembukuan/laporan');?>"><i class="fa fa-circle-o"></i> Pembukuan</a></li>
	</ul>
</li>
