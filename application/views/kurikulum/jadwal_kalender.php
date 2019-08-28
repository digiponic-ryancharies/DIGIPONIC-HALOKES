<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-cog"></i>
                        Kalender Akademik
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
                        <div class="card-title">Kalender Akademik</div>
                        <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kalender Akademik</th>
                                    <th>Tapel - Semester</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($kalender as $row) { ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->kalender_nama ?></td>
                                    <td><?php echo $row->tapel." ".$row->semester ?></td>
                                    <td>Aktif</td>
                                    <td>
                                        <a href="<?php echo site_url('jadwal/kalender_ak_detail/'.$row->_id) ?>" class="btn btn-primary btn-xs">Detail</a>
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
</div>

<?php echo $footer ?>