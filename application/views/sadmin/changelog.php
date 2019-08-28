<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-user-circle"></i>
                        Changelog
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#changelog">
                            <i class="icon icon-home2"></i>Data Changelog</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#tbh-changelog"><i class="icon icon-plus-circle mb-3"></i>Tambah Changelog</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="changelog">
                <div class="row">
                    <div class="col-md-12">
                        <?php 
                            $do = $this->session->flashdata("do");
                            $stts = $this->session->flashdata("status");
                            $msg = $this->session->flashdata("msg");

                            if(isset($do)) {
                                if($do == "tambah_changelog") {
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
                                <div class="card-title">Data Changelog</div>
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Jenis</th>
                                            <th>Keterangan</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach($clog as $row) { ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row->tanggal ?></td>
                                                <td><?php echo $row->jenis ?></td>
                                                <td><?php echo $row->keterangan ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-danger btn-xs">Hapus</a>
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
            <div class="tab-pane animated fadeInUpShort" id="tbh-changelog">
                <div class="row my-3">
                    <div class="col-md-7 offset-md-2">
                        <form action="<?php echo site_url('changelog/tambah_changelog') ?>" method="post">
                            <div class="card no-b o-r">
                                <div class="card-body">
                                    <h5 class="card-title">Tambah Changelog</h5>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-6 m-0">
                                                    <label for="tanggal" class="col-form-label s-12">TANGGAL</label>
                                                    <input id="tanggal" class="form-control r-0 light s-12" type="date" name="tanggal">
                                                </div>
                                                <div class="form-group col-6 m-0">
                                                    <label for="jenis" class="col-form-label s-12">JENIS</label>
                                                    <select class="form-control r-0 light s-12" name="jenis">
                                                        <option value="">-- Pilih --</option>
                                                        <option value="api">API</option>
                                                        <option value="layout">Layout</option>
                                                        <option value="sistem">Sistem</option>
                                                        <option value="lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-12 m-0">
                                                    <label for="ket" class="col-form-label s-12">KETERANGAN</label>
                                                    <textarea id="ket" class="form-control r-0 light s-12" name="keterangan"></textarea>
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