<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-cog"></i>
                        Kalender Akademik {nama_kalender}
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    $do = $this->session->flashdata("do");
                    $stts = $this->session->flashdata("status");
                    $msg = $this->session->flashdata("msg");

                    if(isset($do)) {
                        if($do == "atur_jadwal") {
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
                        <div class="card-title">Kalender Akademik {nama_kalender}</div>
                        <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tgl Aw</th>
                                    <th>Tgl Ak</th>
                                    <th>Kegiatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($kalender as $row) { ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $row->tgl_awal ?></td>
                                    <td><?php echo $row->tgl_akhir ?></td>
                                    <td><?php echo $row->kegiatan ?></td>
                                    <td>
                                        <button class="btn btn-info">Edit</button>
                                        <button class="btn btn-danger">Hapus</button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $footer ?>