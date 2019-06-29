<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-basketball"></i>
                        Ekstrakurikuler
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#ekskul">
                            <i class="icon icon-home2"></i>Data Ekskul</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#tbh-ekskul"><i class="icon icon-plus-circle mb-3"></i>Tambah Ekskul</a>
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
                        <?php 
                            $do = $this->session->flashdata("do");
                            $stts = $this->session->flashdata("status");
                            $msg = $this->session->flashdata("msg");

                            if(isset($do)) {
                                if($do == "tambah_ekskul") {
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
                                <div class="card-title">Data Ekstrakurikuler</div>
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Ekskul</th>
                                            <th>Pembina</th>
                                            <th>Jadwal</th>
                                            <th>Status</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach($ekskul as $row) { ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $row->ekskul_nama ?></td>
                                            <td>-</td>
                                            <td><?php echo ucwords($row->ekskul_jadwal) ?></td>
                                            <td>Aktif</td>
                                            <td>
                                                <a href="<?php echo site_url('ekstrakurikuler/detail/'.$row->id_ekskul_url) ?>" class="btn btn-primary btn-xs">Detail</a>
                                                <a href="#" class="btn btn-danger btn-xs">Non-aktifkan</a>
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
            <div class="tab-pane animated fadeInUpShort" id="tbh-ekskul">
                <div class="row my-3">
                    <div class="col-md-7 offset-md-2">
                        <form action="<?php echo site_url('ekstrakurikuler/tambah_ekskul') ?>" method="post">
                            <div class="card no-b o-r">
                                <div class="card-body">
                                    <h5 class="card-title">Tambah Ekskul</h5>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">NAMA EKSTRAKURIKULER</label>
                                                <input id="name" class="form-control r-0 light s-12 " type="text" name="nama">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-6 m-0">
                                                    <label for="desk" class="col-form-label s-12">DESKRIPSI</label>
                                                    <textarea id="desk" class="form-control r-0 light s-12" name="deskripsi"></textarea>
                                                </div>
                                                <div class="form-group col-6 m-0">
                                                    <label for="jadwal" class="col-form-label s-12">JADWAL</label>
                                                    <select class="select2" name="jadwal[]" multiple="multiple">
                                                       <option value="senin">Senin</option>
                                                       <option value="selasa">Selasa</option>
                                                       <option value="rabu">Rabu</option>
                                                       <option value="kamis">Kamis</option>
                                                       <option value="jumat">Jum'at</option>
                                                       <option value="sabtu">Sabtu</option>
                                                       <option value="minggu">Minggu</option>
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