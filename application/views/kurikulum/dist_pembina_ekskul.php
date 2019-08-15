<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-cog"></i>
                        Atur Pembina Ekstrakurikuler
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#data">
                            <i class="icon icon-home2"></i>Data Pembina</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#tambah">
                            <i class="icon icon-plus-circle mb-3"></i>Atur Pembina</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="data">
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
                                <div class="card-title">Atur Pembina Ekskul</div>
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Ekskul</th>
                                            <th>Nama Pembina</th>
                                            <th>Tgl Mulai</th>
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
                                                <a href="#" class="btn btn-primary btn-xs" onclick="aturPembina()">Atur</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane animated fadeInUpShort" id="tambah">
                <div class="row my-3">
                    <div class="col-md-7 offset-md-2">
                        <form action="<?php echo site_url('distribusi/atur_pembina_ekskul') ?>" method="post">
                            <div class="card no-b o-r">
                                <div class="card-body">
                                    <h5 class="card-title">Atur Pembina Ekskul</h5>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">NAMA EKSKUL</label>
                                                <select name="ekskul" class="custom-select select2 r-0 light s-12" required>
                                                    <option value="">-- Pilih Ekskul --</option>
                                                    <?php foreach($ekskul as $rowk) { ?>
                                                    <option value="<?php echo $rowk->id_ekskul_url ?>"><?php echo $rowk->ekskul_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-row">
                                                <div class="form-group col-12 my-auto">
                                                    <label for="desk" class="col-form-label s-12">PILIH PEMBINA</label>
                                                    <br>
                                                    <input type="radio" name="pembina" value="guru">Guru &nbsp;&nbsp;
                                                    <input type="radio" name="pembina" value="lain_guru">Selain Guru
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="guru_pembina">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">GURU PEMBINA</label>
                                                <select name="nama_pembina" class="custom-select select2 r-0 light s-12" required>
                                                    <option value="">-- Pilih Guru --</option>
                                                    <?php foreach($guru as $rowg) { ?>
                                                    <option value="<?php echo $rowg->_id ?>"><?php echo $rowg->nama_guru ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="nama_pembina">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">NAMA PEMBINA</label>
                                                <input type="text" name="nama_pembina" class="form-control r-0 light s-12">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
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

<script type="text/javascript">
    $("#guru_pembina").hide();
    $("#nama_pembina").hide();

    $("input[name='pembina']").click(function() {
        if($(this).val() == "guru") {
            $("#guru_pembina").show();
            $("#nama_pembina").hide();
        } else if($(this).val() == "lain_guru") {
            $("#guru_pembina").hide();
            $("#nama_pembina").show();
        }
    });
</script>