<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-timelapse"></i>
                        Data Guru
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#guru">
                            <i class="icon icon-home2"></i>Data Guru</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#tbh-guru"><i class="icon icon-plus-circle mb-3"></i>Tambah Guru</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="guru">
                <div class="row">
                    <div class="col-md-12">
                        <?php 
                            $do = $this->session->flashdata("do");
                            $stts = $this->session->flashdata("status");
                            $msg = $this->session->flashdata("msg");

                            if(isset($do)) {
                                if($do == "tambah_grupmapel") {
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
                                <div class="card-title">Data Guru</div>
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mata Pelajaran</th>
                                            <th>Kurikulum</th>
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
                                            <td>
                                                <a href="#" class="btn btn-primary btn-xs">Detail</a>
                                                <a href="#" class="btn btn-danger btn-xs">Non-aktifkan</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane animated fadeInUpShort" id="tbh-guru">
                <div class="row my-3">
                    <div class="col-md-7 offset-md-2">
                        <form action="<?php echo site_url('guru/tambah_guru') ?>" method="post">
                            <div class="card no-b o-r">
                                <div class="card-body">
                                    <h5 class="card-title">Tambah Siswa Aktif</h5>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">NAMA GURU</label>
                                                <input id="name" class="form-control r-0 light s-12" type="text" name="nama">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-4 m-0">
                                                    <label for="nign" class="col-form-label s-12">NIGN</label>
                                                    <input id="nign" class="form-control r-0 light s-12" type="text" name="nign">
                                                </div>
                                                <div class="form-group col-4 m-0">
                                                    <label for="gd" class="col-form-label s-12">GELAR DEPAN</label>
                                                    <input id="gd" class="form-control r-0 light s-12" type="text" name="gd">
                                                </div>
                                                <div class="form-group col-4 m-0">
                                                    <label for="gb" class="col-form-label s-12">GELAR BELAKANG</label>
                                                    <input id="gb" class="form-control r-0 light s-12" type="text" name="gb">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-6 m-0">
                                                    <label for="nisn" class="col-form-label s-12">TEMPAT LAHIR</label>
                                                    <input id="nisn" class="form-control r-0 light s-12" type="text" name="tempat">
                                                </div>
                                                <div class="form-group col-6 m-0">
                                                    <label for="nis" class="col-form-label s-12">TANGGAL LAHIR</label>
                                                    <input id="nis" class="form-control r-0 light s-12" type="date" name="tanggal">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-6 m-0">
                                                    <label for="desk" class="col-form-label s-12">ALAMAT</label>
                                                    <textarea id="desk" class="form-control r-0 light s-12" name="alamat"></textarea>
                                                </div>
                                                <div class="form-group col-6 m-0">
                                                    <label for="nohp" class="col-form-label s-12">NO HP</label>
                                                    <input id="nohp" class="form-control r-0 light s-12" type="text" name="nohp">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-12 m-0">
                                                    <label for="email" class="col-form-label s-12">EMAIL</label>
                                                    <input id="email" class="form-control r-0 light s-12" type="email" name="email">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-6 m-0">
                                                    <label for="nisn" class="col-form-label s-12">JENIS KELAMIN</label>
                                                    <select class="form-control" name="jk">
                                                        <option value="">-- Jenis Kelamin --</option>
                                                        <option value="L">Laki-Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-6 m-0">
                                                    <label for="agama" class="col-form-label s-12">AGAMA</label>
                                                    <select class="form-control" name="agama">
                                                        <option value="">-- Agama --</option>
                                                        <option value="islam">Islam</option>
                                                        <option value="kristen_p">Kristen Protestan</option>
                                                        <option value="kristen_k">Kristen Katholik</option>
                                                        <option value="hindu">Hindu</option>
                                                        <option value="budha">Budha</option>
                                                        <option value="konghuchu">Konghuchu</option>
                                                    </select>
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