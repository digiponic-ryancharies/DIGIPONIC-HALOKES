<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-class"></i>
                        Presensi Eksktrakurikuler
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#ekskul">
                            <i class="icon icon-home2"></i>Presensi Ekskul</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#rekap">
                            <i class="icon icon-plus-circle mb-3"></i>Rekap Presensi</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="ekskul">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-3 mb-3 no-b">
                            <div class="card-body">
                                <div class="card-title">Presensi Hari Ini</div>
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Ekskul</th>
                                            <th>Pembina</th>
                                            <th>Jadwal</th>
                                            <th>Pertemuan</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>0</td>
                                            <td>
                                                <a href="<?php echo site_url('presensi/ekskul/detail') ?>" class="btn btn-primary btn-xs">Detail</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane animated fadeInUpShort" id="rekap">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-3 mb-3 no-b">
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $footer ?>