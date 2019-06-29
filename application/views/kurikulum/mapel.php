<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-book3"></i>
                        Mata Pelajaran
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#mapel">
                            <i class="icon icon-home2"></i>Data Mata Pelajaran</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#tbh-mapel"><i class="icon icon-plus-circle mb-3"></i>Tambah Mata Pelajaran</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="mapel">
                <div class="row">
                    <div class="col-md-12">
                        <?php 
                            $do = $this->session->flashdata("do");
                            $stts = $this->session->flashdata("status");
                            $msg = $this->session->flashdata("msg");

                            if(isset($do)) {
                                if($do == "tambah_mapel") {
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
                                <div class="card-title">Data Mata Pelajaran</div>
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Kurikulum</th>
                                            <th>Grup</th>
                                            <th>Status</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach($mapel as $row) { ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row->nama_mapel ?></td>
                                                <td><?php echo $row->nama_kurikulum ?></td>
                                                <td><?php echo $row->nama_grup ?></td>
                                                <td><?php echo ($row->status == 1 ? "Aktif" : "Tidak Aktif") ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-xs">Detail</a>
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
            <div class="tab-pane animated fadeInUpShort" id="tbh-mapel">
                <div class="row my-3">
                    <div class="col-md-7 offset-md-2">
                        <form action="<?php echo site_url('mapel/tambah_mapel') ?>" method="post">
                            <div class="card no-b o-r">
                                <div class="card-body">
                                    <h5 class="card-title">Tambah Mata Pelajaran</h5>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-6 m-0">
                                                    <label for="name" class="col-form-label s-12">NAMA MATA PELAJARAN</label>
                                                    <input id="name" class="form-control r-0 light s-12 " type="text" name="nama" autocomplete="off">
                                                </div>
                                                <div class="form-group col-6 m-0">
                                                    <label for="kkm" class="col-form-label s-12">KKM</label>
                                                    <input id="kkm" class="form-control r-0 light s-12 " type="number" name="kkm">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-6 m-0">
                                                    <label for="jadwal" class="col-form-label s-12">KURIKULUM</label>
                                                    <select class="form-control" name="kurikulum">
                                                        <option value="">-- Kurikulum --</option>
                                                        <?php foreach($grupkur as $gk) { ?>
                                                            <option value="<?php echo $gk->id ?>"><?php echo $gk->nama ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-6 m-0">
                                                    <label for="jadwal" class="col-form-label s-12">GRUP MAPEL</label>
                                                    <select class="form-control" name="grupmapel"></select>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="kurikulum"]').on('change', function() {
            var id_kurikulum = $(this).val();
            if(id_kurikulum) {
                $.ajax({
                    url: "<?php echo site_url('mapel/get_gmapel_by_grupkur/') ?>"+id_kurikulum,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="grupmapel"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="grupmapel"]').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                        });
                    }
                });
            } else {
                $('select[name="grupmapel"]').empty();
            }
        });
    });
</script>

<?php echo $footer ?>