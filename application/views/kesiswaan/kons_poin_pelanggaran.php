<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-sticky-note"></i>
                        Poin Pelanggaran
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#gkurikulum">
                            <i class="icon icon-home2"></i>Data Poin</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#tbh-gkurikulum">
                            <i class="icon icon-plus-circle mb-3"></i>Tambah Poin</a>
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
                                <div class="card-title">Data Poin</div>
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggaran</th>
                                            <th>Kategori</th>
                                            <th>Poin</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td width="200">
                                                <a href="#" class="btn btn-primary btn-xs">Detail</a>
                                                <a href="#" class="btn btn-danger btn-xs">Non-aktifkan</a>
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
                                    <h5 class="card-title">Tambah Poin</h5>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">NAMA PELANGGARAN</label>
                                                <textarea id="desk" class="form-control r-0 light s-12" name="pelanggaran"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">KATEGORI</label>
                                                <select name="kategori" class="form-control r-0 light s-12">
                                                    <option value="">-- Pilih Kategori --</option>
                                                    <option value="ringan">Ringan</option>
                                                    <option value="sedang">Sedang</option>
                                                    <option value="berat">Berat</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">POIN PELANGGARAN</label>
                                                <input type="number" name="poin" class="form-control r-0 light s-12">
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