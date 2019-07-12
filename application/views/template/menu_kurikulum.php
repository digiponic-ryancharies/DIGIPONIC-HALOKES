<li class="header light mt-3"><strong>MENU KURIKULUM</strong></li>
<li>
    <a href="#">
    <i class="icon icon-school blue-text s-18"></i> 
        <span>Kegiatan Belajar Mengajar</span>
    </a>
</li>
<li>
    <a href="<?php echo site_url('ekstrakurikuler') ?>">
    <i class="icon icon-basketball blue-text s-18"></i> 
        <span>Ekstrakurikuler</span>
    </a>
</li>
<li class="treeview">
    <a href="#">
        <i class="icon icon-class blue-text s-18"></i>
        <span>Presensi</span>
        <i class="icon icon-angle-left s-18 pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="<?php echo site_url('presensi/kbm') ?>"><i class="icon icon-circle-o"></i>Presensi KBM</a></li>
        <li><a href="#"><i class="icon icon-circle-o"></i>Presensi Ekstrakurikuler</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="icon icon-user-circle-o  blue-text s-18"></i>
        <span>Pengajar (Guru)</span>
        <i class="icon icon-angle-left s-18 pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="<?php echo site_url('guru/pengajar') ?>"><i class="icon icon-circle-o"></i>Data Pengajar</a></li>
        <li><a href="#"><i class="icon icon-circle-o"></i>Silabus / RPP</a></li>
        <li><a href="#"><i class="icon icon-circle-o"></i>Program Semester</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="icon icon-note blue-text s-18"></i>
        <span>Penilaian</span>
        <i class="icon icon-angle-left s-18 pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="<?php echo site_url('penilaian/kbm') ?>"><i class="icon icon-circle-o"></i>Penilaian KBM</a></li>
        <li><a href="<?php echo site_url('penilaian/ekskul') ?>"><i class="icon icon-circle-o"></i>Penilaian Ekstrakurikuler</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="<?php echo site_url('raport/siswa') ?>">
    <i class="icon icon-notebook blue-text s-18"></i> 
        <span>Raport Siswa</span>
    </a>
</li>
<li class="treeview">
    <a href="#">
        <i class="icon icon-timelapse blue-text s-18"></i>
        <span>Kurikulum</span>
        <i class="icon icon-angle-left s-18 pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="<?php echo site_url('kurikulum/grup_kurikulum') ?>"><i class="icon icon-circle-o"></i>Grup Kurikulum</a></li>
        <li><a href="<?php echo site_url('kurikulum/grup_mapel') ?>"><i class="icon icon-circle-o"></i>Grup Mata Pelajaran</a></li>
        <li><a href="<?php echo site_url('mapel') ?>"><i class="icon icon-circle-o"></i>Data Mata Pelajaran</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="icon icon-cog blue-text s-18"></i>
        <span>Distribusi</span>
        <i class="icon icon-angle-left s-18 pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="<?php echo site_url('distribusi/wali_kelas') ?>"><i class="icon icon-circle-o"></i>Atur Wali Kelas</a></li>
        <li><a href="<?php echo site_url('distribusi/guru_pengajar') ?>"><i class="icon icon-circle-o"></i>Atur Guru Pengajar</a></li>
        <li><a href="#"><i class="icon icon-circle-o"></i>Atur Pembina Ekstrakurikuler</a></li>
        <li><a href="#"><i class="icon icon-circle-o"></i>Atur Anggota Ekstrakurikuler</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="icon icon-calendar blue-text s-18"></i>
        <span>Penjadwalan</span>
        <i class="icon icon-angle-left s-18 pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="<?php echo site_url('jadwal/mapel') ?>"><i class="icon icon-circle-o"></i>Jadwal Pelajaran</a></li>
        <li><a href="<?php echo site_url('jadwal/ekskul') ?>"><i class="icon icon-circle-o"></i>Jadwal Ekstrakurikuler</a></li>
        <li><a href="<?php echo site_url('jadwal/ujian') ?>"><i class="icon icon-circle-o"></i>Jadwal Ujian</a></li>
        <li><a href="<?php echo site_url('jadwal/kalender_ak') ?>"><i class="icon icon-circle-o"></i>Kalender Akademik</a></li>
    </ul>
</li>