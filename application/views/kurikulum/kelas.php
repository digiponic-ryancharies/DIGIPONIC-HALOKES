<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-book3"></i>
                        Data Kelas
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#kelas">
                            <i class="icon icon-home2"></i>Data Kelas</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#tbh-kelas"><i class="icon icon-plus-circle mb-3"></i>Tambah Kelas</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="kelas">
                <div class="row">
                    <div class="col-md-12">
                        <?php 
                            $do = $this->session->flashdata("do");
                            $stts = $this->session->flashdata("status");
                            $msg = $this->session->flashdata("msg");

                            if(isset($do)) {
                                if($do == "tambah_kelas") {
                                    if($stts == true) {
                                        echo '
                                            <div class="alert alert-info alert-dismissible mt-3" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                '.$msg.'
                                            </div>
                                        ';
                                    } else {
                                        echo '
                                            <div class="alert alert-danger alert-dismissible mt-3" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                '.$msg.'
                                            </div>
                                        ';
                                    }
                                }
                            }
                        ?>

                        <div class="card my-3 no-b">
                            <div class="card-body">
                                <div class="card-title">Data Kelas</div>
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Jumlah Siswa</th>
                                            <th>Ruang</th>
                                            <th>Status</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-xs">Detail</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane animated fadeInUpShort" id="tbh-kelas">
                <div class="row my-3">
                    <div class="col-md-7 offset-md-2">
                        <form action="<?php echo site_url('kelas/tambah_kelas') ?>" method="post">
                            <div class="card no-b o-r">
                                <div class="card-body">
                                    <h5 class="card-title">Tambah Kelas</h5>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-6 m-0">
                                                    <label for="tapel" class="col-form-label s-12">TAHUN PELAJARAN</label>
                                                    <input id="tapel" class="form-control r-0 light s-12 " type="text" readonly>
                                                </div>
                                                <div class="form-group col-6 m-0">
                                                    <label for="smt" class="col-form-label s-12">SEMESTER</label>
                                                    <input id="smt" class="form-control r-0 light s-12 " type="text" readonly>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-6 m-0">
                                                    <label for="jadwal" class="col-form-label s-12">TINGKAT</label>
                                                    <select class="form-control" name="tingkat">
                                                        <option value="">-- Tingkat --</option>
                                                        <option value="7">VII</option>
                                                        <option value="8">VIII</option>
                                                        <option value="9">IX</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-6 m-0">
                                                    <label for="abjad" class="col-form-label s-12">ABJAD</label>
                                                    <input id="abjad" class="form-control r-0 light s-12 " type="text" name="abjad">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-12 m-0">
                                                    <label for="ruang" class="col-form-label s-12">RUANG</label>
                                                    <input id="ruang" class="form-control r-0 light s-12 " type="text" name="ruang">
                                                </div>
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="icon-save mr-2"></i>Save Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>