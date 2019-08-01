<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-user-circle"></i>
                        Siswa Baru
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#siswaa">
                            <i class="icon icon-home2"></i>Data Siswa Baru</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#tbh-siswaa"><i class="icon icon-plus-circle mb-3"></i>Tambah Siswa Baru</a>
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
                                <div class="card-title">Data Siswa Baru</div>
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>Nama Siswa</th>
                                            <th>Asal Sekolah</th>
                                            <th>RUN</th>
                                            <th>JUN</th>
                                            <th>Status</th>
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
                    <div class="col-md-8 offset-md-2">
                        <div class="stepper sw-main" data-options='{ "transitionEffect":"fade" }'>
                            <ul class="nav step-anchor">
                                <li><a href="#diri">Langkah 1<br><small>Data Diri</small></a></li>
                                <li><a href="#ortu">Langkah 2<br><small>Data Orang Tua</small></a></li>
                                <li><a href="#nilai">Langkah 3<br><small>Data Nilai dan Sekolah</small></a></li>
                            </ul>
                            <div class="card no-b shadow">
                                <div id="diri" class="card-body p-5">
                                    <form class="form-material" id="formDataDiri">
                                        <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float form-group-sm">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="nama"/>
                                                            <label class="form-label">Nama Lengkap</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float form-group-sm">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="nisn"/>
                                                            <label class="form-label">NISN</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float form-group-sm">
                                                        <div class="form-line">
                                                            <input type="input" class="form-control" name="tgl_lahir" onfocus="(this.type='date')" onblur="(this.type='text')"/>
                                                            <label class="form-label">Tanggal Lahir</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float form-group-sm">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="tempat_lahir"/>
                                                            <label class="form-label">Tempat Lahir</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-sm">
                                                        <label class="form-label">Tanggal Lahir</label>
                                                        <br>
                                                        <input type="radio" name="jk" value="L">Laki-Laki &nbsp;&nbsp;
                                                        <input type="radio" name="jk" value="P">Perempuan
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-sm">
                                                        <label class="form-label">Agama</label>
                                                        <br>
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
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-4">
                                                    <div class="form-group form-float form-group-sm">
                                                        <div class="form-line">
                                                            <textarea class="form-control" name="alamat" rows="1"></textarea>
                                                            <label class="form-label">Alamat</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-float form-group-sm">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="no_hp"/>
                                                            <label class="form-label">No HP</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-float form-group-sm">
                                                        <div class="form-line">
                                                            <input type="email" class="form-control" name="email"/>
                                                            <label class="form-label">Email</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="ortu" class="card-body text-center p-5">
                                    <form class="form-material" id="formDataOrtu">
                                        <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float form-group-sm">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="nama_ayah"/>
                                                            <label class="form-label">Nama Ayah</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float form-group-sm">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="nohp_ayah"/>
                                                            <label class="form-label">No HP Ayah</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float form-group-sm">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="nama_ibu"/>
                                                            <label class="form-label">Nama Ibu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float form-group-sm">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="nohp_ibu"/>
                                                            <label class="form-label">No HP Ibu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float form-group-sm">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="nama_wali"/>
                                                            <label class="form-label">Nama Wali</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float form-group-sm">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="nohp_wali"/>
                                                            <label class="form-label">No HP Wali</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="nilai" class="card-body p-5">
                                    <form class="form-material" id="formDataNilai">
                                        <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-float form-group-sm">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="asal_skl"/>
                                                            <label class="form-label">Asal Sekolah</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6>Nilai Ujian Nasional</h6>
                                            <div class="row clearfix">
                                                <div class="col-sm-4">
                                                    <div class="form-group form-float form-group-sm">
                                                        <div class="form-line">
                                                            <input type="number" class="form-control" name="un_bind"/>
                                                            <label class="form-label">Bahasa Indonesia</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-float form-group-sm">
                                                        <div class="form-line">
                                                            <input type="number" class="form-control" name="un_mat"/>
                                                            <label class="form-label">Matematika</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-float form-group-sm">
                                                        <div class="form-line">
                                                            <input type="number" class="form-control" name="un_ipa"/>
                                                            <label class="form-label">Ilmu Pengetahuan Alam</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-sm">
                                                        <label class="form-label">Scan Ijazah</label><br>
                                                        <input type="file" class="form-control-xs" name="ijazah"/>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-sm">
                                                        <label class="form-label">Scan SKHUN</label><br>
                                                        <input type="file" class="form-control-xs" name="skhun"/>
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
        </div>
    </div>
</div>

<?php echo $footer ?>