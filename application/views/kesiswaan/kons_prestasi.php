<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-sticky-note"></i>
                        Catatan Prestasi
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#gkurikulum">
                            <i class="icon icon-home2"></i>Data Prestasi</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#tbh-gkurikulum">
                            <i class="icon icon-plus-circle mb-3"></i>Tambah Prestasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="gkurikulum">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card my-3 no-b">
                            <div class="card-body">
                                <div class="card-title">Data Prestasi</div>
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Prestasi</th>
                                            <th>Penyelenggara</th>
                                            <th>Tingkat</th>
                                            <th>Tanggal</th>
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
                                                <a href="#" class="btn btn-primary btn-xs">Detail</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane animated fadeInUpShort" id="tbh-gkurikulum">
                <div class="row my-3">
                    <div class="col-md-7 offset-md-2">
                        <form action="#" method="post">
                            <div class="card no-b o-r">
                                <div class="card-body">
                                    <h5 class="card-title">Tambah Prestasi</h5>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">NAMA PRESTASI</label>
                                                <input type="text" name="nama" class="form-control r-0 light s-12" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">LOKASI</label>
                                                <input type="text" name="lokasi" class="form-control r-0 light s-12" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">PENYELENGGARA</label>
                                                <input type="text" name="penyelenggara" class="form-control r-0 light s-12" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">TINGKAT</label>
                                                <select name="tingkat" class="form-control r-0 light s-12">
                                                    <option value="">-- Pilih Tingkat --</option>
                                                    <option value="regional">Regional</option>
                                                    <option value="provinsi">Provinsi</option>
                                                    <option value="nasional">Nasional</option>
                                                    <option value="internasional">Internasional</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">TANGGAL AWAL</label>
                                                <div class="input-group">
                                                    <input type="text" class="date-time-picker form-control r-0 light s-12"
                                                           data-options='{"timepicker":false, "format":"Y/m/d"}' value="2019/08/10"/>
                                                    <span class="input-group-append">
                                                        <span class="input-group-text add-on white">
                                                            <i class="icon-calendar"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">TANGGAL AKHIR</label>
                                                <div class="input-group">
                                                    <input type="text" class="date-time-picker form-control r-0 light s-12"
                                                           data-options='{"timepicker":false, "format":"Y/m/d"}' value="2019/08/10"/>
                                                    <span class="input-group-append">
                                                        <span class="input-group-text add-on white">
                                                            <i class="icon-calendar"></i>
                                                        </span>
                                                    </span>
                                                </div>
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