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
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#dist">
                            <i class="icon icon-home2"></i>Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="dist">
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
        </div>
    </div>
</div>

<div class="modal fade" id="aturPembina" tabindex="-1" role="dialog" aria-labelledby="aturPembina" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title pembina" id="exampleModalLabel">Atur Pembina - </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post">
                <div class="modal-body">
                    <div class="form-row">
                        <input type="hidden" name="id" id="idekskul">
                        <div class="col-md-12">
                            <div class="form-group mb-1">
                                <label for="name" class="col-form-label s-12">GURU</label>
                                <select name="guru" id="guru" class="form-control">
                                    <option value="">-- Pilih Guru --</option>
                                </select>
                                <input type="checkbox" name="nm_guru" id="nm_guru" class="mt-2"> Pembina Luar Sekolah
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="col-form-label s-12">NAMA PEMBINA</label>
                                <input type="text" name="nm_pembina" id="nm_pembina" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php echo $footer ?>

<script type="text/javascript">
    $('#nm_guru').click(function() {
        if($(this).is(':checked')) {
            $("#guru").prop("disabled", true);
            $("#nm_pembina").prop("disabled", false);
        } else {
            $("#guru").prop("disabled", false);
            $("#nm_pembina").attr("disabled", true);
        }
    });

    function aturPembina() {
        $('#aturPembina').modal('show');
    }
</script>