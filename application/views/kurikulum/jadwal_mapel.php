<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-cog"></i>
                        Jadwal Pelajaran
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#dist">
                            <i class="icon icon-home2"></i>Data</a>
                    </li>
                    <!-- <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#tbh-wk"><i class="icon icon-plus-circle mb-3"></i>Atur Jadwal Pelajaran</a>
                    </li> -->
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
                                <div class="card-title">Jadwal Pelajaran</div>
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Hari</th>
                                            <th>Kelas</th>
                                            <th>Mapel</th>
                                            <th>Guru</th>
                                            <th>Jam</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach($jadwal as $row) { ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo ucfirst($row->hari) ?></td>
                                                <td><?php echo $row->kelas ?></td>
                                                <td><?php echo $row->mapel ?></td>
                                                <td><?php echo $row->guru ?></td>
                                                <td><?php echo $row->awal." - ".$row->akhir ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-xs" onclick="detailJadwal('<?php echo $row->_id ?>')">Atur</a>
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
    </div>
</div>

<div class="modal fade" id="aturjadwal" tabindex="-1" role="dialog" aria-labelledby="aturjadwal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title jadwal" id="exampleModalLabel">Atur Jadwal - </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url('jadwal/atur_mapel') ?>" method="post">
                <div class="modal-body">
                    <div class="form-row">
                        <input type="hidden" name="id" id="idjadwal">
                        <div class="col-md-6">
                            <div class="form-group mb-1">
                                <label for="name" class="col-form-label s-12">KELAS</label>
                                <select name="hari" class="form-control">
                                    <option value="">-- Pilih Hari --</option>
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name" class="col-form-label s-12">JAM AWAL</label>
                                <select name="jam_awal" class="form-control">
                                    <?php for($i=1; $i<11; $i++) { 
                                        echo "<option value='".$i."'>".$i."</option>";
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name" class="col-form-label s-12">JAM AKHIR</label>
                                <select name="jam_akhir" class="form-control">
                                    <?php for($i=1; $i<11; $i++) { 
                                        echo "<option value='".$i."'>".$i."</option>";
                                    } ?>
                                </select>
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
    function detailJadwal(kode) {
        $.ajax({
            url : '<?php echo site_url("jadwal/get_jadwal_by_id/") ?>' + kode,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('.jadwal').text("Atur Jadwal - " + data.mapel + " " + data.kelas);
                $('#idjadwal').val(data._id);
                $('#aturjadwal').modal('show');
            },

            error: function (jqXHR, textStatus, errorThrown) {
                alert('Gagal mengambil data');
            }
        });
    }
</script>