<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-user-circle"></i>
                        Siswa Mutasi
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#siswaa">
                            <i class="icon icon-home2"></i>Data Siswa Mutasi</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#tbh-siswaa"><i class="icon icon-plus-circle mb-3"></i>Tambah Siswa Mutasi</a>
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
                                <div class="card-title">Data Siswa Mutasi</div>
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>Nama Siswa</th>
                                            <th>Tgl Mutasi</th>
                                            <th>Alasan</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane animated fadeInUpShort" id="tbh-siswaa">
                <div class="row my-3">
                    <div class="col-md-6">
                        <form action="<?php echo site_url('distribusi/atur_guru_pengajar') ?>" method="post">
                            <div class="card no-b o-r">
                                <div class="card-body">
                                    <h5 class="card-title">Cari Siswa (NISN)</h5>
                                    <div class="form-row">
                                        <div class="col-md-10">
                                            <div class="form-group mb-1">
                                                <input type="text" name="nisn" class="form-control" placeholder="NISN"/>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="btn btn-primary">
                                                <i class="icon-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-1">
                                                 <label for="name" class="col-form-label s-12">ALASAN</label>
                                                <select class="form-control" name="alasan" disabled>
                                                    <option value="">-- Pilih Alasan --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-1">
                                                 <label for="name" class="col-form-label s-12">KETERANGAN</label>
                                                <textarea class="form-control" name="keterangan" disabled></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-success">Data berhasil ditemukan!</p>
                                <p class="text-danger">Data tidak ditemukan!</p>
                                <figure class="avatar avatar-xl mt-1">
                                    <img src="<?php echo base_url() ?>assets/img/dummy/u5.png" alt=""> 
                                </figure>
                                <table class="table table-bordered table-hover mt-3">
                                    <tr>
                                        <td width="125">NISN</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td width="125">Nama Siswa</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td width="125">Tahun Masuk</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td width="125">Kelas Saat Ini</td>
                                        <td></td>
                                    </tr>
                                </table>
                                <button class="btn btn-danger">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $footer ?>