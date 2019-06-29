<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-user-circle"></i>
                        Siswa Aktif
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#siswaa">
                            <i class="icon icon-home2"></i>Data Siswa Aktif</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#tbh-siswaa"><i class="icon icon-plus-circle mb-3"></i>Tambah Siswa Aktif</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="siswaa">
                <div class="row">
                    <div class="col-md-12">
                        <?php 
                            $do = $this->session->flashdata("do");
                            $stts = $this->session->flashdata("status");
                            $msg = $this->session->flashdata("msg");

                            if(isset($do)) {
                                if($do == "tambah_siswa") {
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
                                <div class="card-title">Data Siswa Aktif</div>
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Angkatan</th>
                                            <th>Status</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach($siswa as $row) { ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row->nis ?></td>
                                                <td><?php echo $row->nama ?></td>
                                                <td>-</td>
                                                <td><?php echo $row->angkatan ?></td>
                                                <td><?php echo ($row->status == 1 ? "Aktif" : "Tidak Aktif"); ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-xs">Detail</a>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane animated fadeInUpShort" id="tbh-siswaa">
                <div class="row my-3">
                    <div class="col-md-7 offset-md-2">
                        <form action="<?php echo site_url('siswa/tambah_siswa_aktif') ?>" method="post">
                            <div class="card no-b o-r">
                                <div class="card-body">
                                    <h5 class="card-title">Tambah Siswa Aktif</h5>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">NAMA SISWA</label>
                                                <input id="name" class="form-control r-0 light s-12" type="text" name="nama">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-6 m-0">
                                                    <label for="nisn" class="col-form-label s-12">NISN</label>
                                                    <input id="nisn" class="form-control r-0 light s-12" type="text" name="nisn">
                                                </div>
                                                <div class="form-group col-6 m-0">
                                                    <label for="nis" class="col-form-label s-12">NIS</label>
                                                    <input id="nis" class="form-control r-0 light s-12" type="text" name="nis">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-12 m-0">
                                                    <label for="nisn" class="col-form-label s-12">TAHUN ANGKATAN</label>
                                                    <select class="form-control" name="tahun">
                                                        <option value="">-- Tahun --</option>
                                                        <option value="USWG1tuGJ7">2017</option>
                                                        <option value="VQ0nnIBiwH">2018</option>
                                                        <option value="3SM8ccRfEN">2019</option>
                                                    </select>
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

<?php echo $footer ?>