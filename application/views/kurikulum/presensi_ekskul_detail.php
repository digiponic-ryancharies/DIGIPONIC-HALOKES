<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <a href="<?php echo site_url('presensi/ekstrakurikuler') ?>">
                            <i class="icon-arrow_back"></i>
                        </a>
                        <i class="icon-class"></i>
                        Presensi Eksktrakurikuler - 
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-3 mb-3 no-b">
                            <div class="card-body">
                                <div class="card-title">Presensi - </div>
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>T/J Selesai</th>
                                            <th>Pertemuan</th>
                                            <th>Kegiatan</th>
                                            <th>Daftar Hadir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>26 April 2019 / 09:00</td>
                                            <td>Ke-1</td>
                                            <td>Perkenalan diri dan pembentukan kelompok</td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-xs">Daftar Hadir</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>3 Mei 2019 / 09:00</td>
                                            <td>Ke-2</td>
                                            <td>Latihan untuk persiapan lomba tingkat Jawa Timur</td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-xs">Daftar Hadir</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $footer ?>