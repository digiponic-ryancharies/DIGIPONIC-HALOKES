<?php echo $header ?>
<style type="text/css">
    .absensi-bs {
        table-layout: fixed;
        width: 100%;
        white-space: nowrap;
    }   

    .absensi-bs td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    } 

    .absensi-bs tbody td {
        padding: .50rem;
    }

    .absensi-bs thead.semester-table-absen th {
        padding: .50rem;
    }

    .row-1 {
        width: 40%;
    }
</style>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-class"></i>
                        Presensi KBM
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#kelas">
                            <i class="icon icon-home2"></i>Presensi Kelas</a>
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
            <div class="tab-pane animated fadeInUpShort show active" id="kelas">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mt-3 no-b">
                                    <div class="card-body">
                                        <div class="card-title">Filter Presensi</div>
                                        <form class="form-inline">
                                            <label class="mr-2">Pilih Kelas</label>
                                            <select class="form-control" name="kelas">
                                                <option value="">-- Semua Kelas --</option>
                                                <option>VII A</option>
                                                <option>VII B</option>
                                                <option>VII C</option>
                                                <option>VII D</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card mt-3 mb-3 no-b">
                                    <div class="card-body">
                                        <div class="card-title">Presensi Hari Ini</div>
                                        <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Kelas</th>
                                                    <th>Keterangan</th>
                                                    <th>Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>John Doe</td>
                                                    <td>VII A</td>
                                                    <td>Sakit</td>
                                                    <td>
                                                        <button class="btn btn-xs btn-primary">Detail</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>John</td>
                                                    <td>VII A</td>
                                                    <td>Hadir</td>
                                                    <td>
                                                        <button class="btn btn-xs btn-primary">Detail</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Doe</td>
                                                    <td>VII A</td>
                                                    <td>Hadir</td>
                                                    <td>
                                                        <button class="btn btn-xs btn-primary">Detail</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row text-white no-gutters my-3 shadow">
                            <div class="col-lg-12">
                                <div class="green counter-box p-40">
                                    <div class="float-right">
                                        <span class="icon icon-check-circle-o s-48"></span>
                                    </div>
                                    <div class="sc-counter s-36">0</div>
                                    <h6 class="counter-title">Siswa Masuk</h6>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="blue1 counter-box p-40">
                                    <div class="float-right">
                                        <span class="icon icon-local_hospital s-48"></span>
                                    </div>
                                    <div class="sc-counter s-36">0</div>
                                    <h6 class="counter-title">Siswa Sakit</h6>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sunfollower counter-box p-40">
                                    <div class="float-right">
                                        <span class="icon icon-directions_run s-48"></span>
                                    </div>
                                    <div class="sc-counter s-36">0</div>
                                    <h6 class="counter-title">Siswa Izin</h6>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="strawberry counter-box p-40">
                                    <div class="float-right">
                                        <span class="icon icon-times-circle-o s-48"></span>
                                    </div>
                                    <div class="sc-counter s-36">0</div>
                                    <h6 class="counter-title">Siswa Absen</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane animated fadeInUpShort" id="rekap">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-3 no-b">
                            <div class="card-body">
                                <div class="card-title">Filter Presensi</div>
                                <form class="form-inline mb-3">
                                    <label class="mr-2">Pilih Kelas</label>
                                    <select class="form-control mr-4" name="kelas">
                                        <option>-- Kelas --</option>
                                        <option>7-A</option>
                                        <option>7-B</option>
                                        <option>7-C</option>
                                        <option>7-D</option>
                                    </select>

                                    <label class="mr-2">Rekap Berdasarkan</label>
                                    <select class="form-control mr-4" name="per" onchange="rekapAbsensi(this.value)">
                                        <option value="">-- Pilih --</option>
                                        <option value="hari">Hari</option>
                                        <option value="bulan">Bulan</option>
                                        <option value="semester">Semester</option>
                                    </select>
                                </form>
                                <form class="form-inline" id="perHari">
                                    <label class="mr-2">Tanggal</label>
                                    <div class="input-group mr-2">
                                        <input type="text" class="date-time-picker form-control"
                                               data-options='{"timepicker":false, "format":"d-m-Y"}' value="<?php echo $dateNow ?>"/>
                                        <span class="input-group-append">
                                            <span class="input-group-text add-on white">
                                                <i class="icon-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <label class="mr-2">s/d</label>
                                    <div class="input-group mr-2">
                                        <input type="text" class="date-time-picker form-control"
                                               data-options='{"timepicker":false, "format":"d-m-Y"}' value="<?php echo $dateNow ?>"/>
                                        <span class="input-group-append">
                                            <span class="input-group-text add-on white">
                                                <i class="icon-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <button onclick="filterPresensi('hari')" type="button" class="btn btn-primary">Filter</button>
                                </form>
                                <form class="form-inline" id="perBulan">
                                    <label class="mr-2">Bulan</label>
                                    <select class="form-control mr-4" name="bulan">
                                        <?php foreach($bulanIndo as $key=>$value) { ?>
                                            <option value="<?php echo $value ?>"><?php echo $key ?></option>
                                        <?php } ?>
                                    </select>
                                
                                    <label class="mr-2">Tahun</label>
                                    <select class="form-control mr-4" name="bulan">
                                        <option value="0">-- Tahun --</option>
                                        <?php for($i=$yearNow; $i>$yearNow-5; $i--) { ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                        <?php } ?>
                                    </select>
                                    <button onclick="filterPresensi('bulan')" type="button" class="btn btn-primary">Filter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" id="rekapBulan">
                        <div class="card mt-3 no-b">
                            <div class="card-body">
                                <div class="card-title">Filter Presensi - Versi Bulan</div>
                                    <table class="table table-bordered table-hover table-responsive absensi-bs">
                                        <thead class="semester-table-absen">
                                            <tr>
                                                <th>No</th>
                                                <th class="row-2">Nama Siswa</th>
                                                <?php 
                                                    for($i=1; $i<=31; $i++) {
                                                        echo "<th>".$i."</th>";
                                                    } 
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>MUHAMMAD BIMA INDRA KUSUMA</td>
                                                <?php 
                                                    for($j=1; $j<=31; $j++) {
                                                        echo "<td style='width: 50px'></td>";
                                                    } 
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>MUACHAMAD RIDLO A.</td>
                                                <?php 
                                                    for($j=1; $j<=31; $j++) {
                                                        echo "<td style='width: 50px'></td>";
                                                    } 
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" id="rekapHari">
                        <div class="card mt-3 no-b">
                            <div class="card-body">
                                <div class="card-title">Filter Presensi - Versi Hari</div>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th class="row-2">Nama Siswa</th>
                                                <th class="text-center">Sakit</th>
                                                <th class="text-center">Izin</th>
                                                <th class="text-center">Absen</th>
                                                <th class="text-center">Hadir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>0010239</td>
                                                <td>MUHAMMAD BIMA INDRA KUSUMA</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>0010240</td>
                                                <td>MUACHAMAD RIDLO A.</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" id="rekapSemester">
                        <?php  
                            $bulanGanjil = ['Januari','Februari','Maret','April','Mei','Juni'];
                            $bulanGenap = ['Juli','Agustus','September','Oktober','November','Desember'];
                        ?>
                        <div class="card mt-3 no-b">
                            <div class="card-body">
                                <div class="card-title">Filter Presensi - Versi Semester</div>
                                    <table class="table table-bordered table-hover table-responsive absensi-bs">
                                        <thead>
                                            <tr>
                                                <th rowspan="3" style="vertical-align: middle;">No</th>
                                                <th rowspan="3" style="vertical-align: middle;">NIS</th>
                                                <th rowspan="3" class="row-2" style="vertical-align: middle;">Nama Siswa</th>
                                                <th colspan="24" class="text-center">Bulan</th>
                                                
                                            </tr>
                                            <tr>
                                                <?php
                                                    for($i=0; $i<count($bulanGanjil); $i++) {
                                                        echo '<th class="text-center" colspan="4">'.$bulanGanjil[$i].'</th>';
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <?php
                                                    for($j=0; $j<count($bulanGanjil); $j++) {
                                                        echo '
                                                            <th class="text-center">H</th>
                                                            <th class="text-center">S</th>
                                                            <th class="text-center">I</th>
                                                            <th class="text-center">A</th>
                                                        ';
                                                    }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>0010239</td>
                                                <td>MUHAMMAD BIMA INDRA KUSUMA</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>0010240</td>
                                                <td>MUACHAMAD RIDLO A.</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
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
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#perHari').hide();
        $('#perBulan').hide();
        $('#rekapHari').hide();
        $('#rekapBulan').hide();
        $('#rekapSemester').hide();
    });

    function rekapAbsensi(val) {
        let filter = val;
        if(filter == "hari") {
            $('#perHari').show();
            $('#perBulan').hide();
            $('#rekapHari').show();
            $('#rekapBulan').hide();
            $('#rekapSemester').hide();
        } else if(filter == "bulan") {
            $('#perHari').hide();
            $('#perBulan').show();
            $('#rekapHari').hide();
            $('#rekapBulan').show();
            $('#rekapSemester').hide();
        } else if(filter == "semester") {
            $('#perHari').hide();
            $('#perBulan').hide();
            $('#rekapHari').hide();
            $('#rekapBulan').hide();
            $('#rekapSemester').show();
        } else {
            $('#perHari').hide();
            $('#perBulan').hide();
            $('#rekapHari').hide();
            $('#rekapBulan').hide();
            $('#rekapSemester').hide();
        }
    }
</script>

<?php echo $footer ?>