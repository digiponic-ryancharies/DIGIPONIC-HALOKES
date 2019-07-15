<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-cog"></i>
                        Atur Guru Pengajar
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    $do = $this->session->flashdata("do");
                    $stts = $this->session->flashdata("status");
                    $msg = $this->session->flashdata("msg");

                    if(isset($do)) {
                        if($do == "atur_guruajar") {
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="<?php echo site_url('distribusi/atur_guru_pengajar') ?>" method="post">
                    <div class="card no-b o-r">
                        <div class="card-body">
                            <h5 class="card-title">Atur Guru Pengajar</h5>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id_semester" value="<?php echo $id_semester ?>">
                                    <div class="form-group mb-1">
                                        <label for="name" class="col-form-label s-12">MAPEL</label>
                                        <select name="mapel" class="custom-select select2" required>
                                            <option value="">-- Pilih Mapel --</option>
                                            <?php foreach($mapel as $rowm) { ?>
                                                <option value="<?php echo $rowm->_id ?>"><?php echo $rowm->nama_mapel ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="name" class="col-form-label s-12">GURU</label>
                                        <select name="guru" class="custom-select select2" required>
                                            <option value="">-- Pilih Guru --</option>
                                            <?php foreach($guru as $rowg) { ?>
                                                <option value="<?php echo $rowg->_id ?>"><?php echo $rowg->nama_guru ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group m-0">
                                        <label for="name" class="col-form-label s-12">KELAS</label>
                                        <select name="kelas" class="custom-select select2" required>
                                            <option value="">-- Pilih Kelas --</option>
                                            <?php foreach($kelas as $rowk) { ?>
                                                <option value="<?php echo $rowk->_id ?>"><?php echo $rowk->nama_kelas ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="icon-save mr-2"></i>Save Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $footer ?>