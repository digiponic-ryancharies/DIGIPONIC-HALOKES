<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-basketball"></i>
                        Siswa Baru
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#ekskul">
                            <i class="icon icon-home2"></i>Data Siswa Baru</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#tbh-ekskul"><i class="icon icon-plus-circle mb-3"></i>Tambah Siswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="ekskul">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card my-3 no-b">
                            <div class="card-body">
                                <div class="card-title">Data Siswa Baru</div>
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>ID Siswa</th>
                                            <th>Nama Siswa</th>
                                            <th>Alasan Mutasi</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Raham Sutan Iliyas</td>
                                            <td>Lorem ipsum dolor</td>
                                            <td>Lorem ipsum dolor</td>
                                            <td>
                                                <a href="<?php echo site_url('ekstrakurikuler/detail') ?>" class="btn btn-primary btn-xs">Detail</a>
                                                <a href="#" class="btn btn-green btn-xs">Edit</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane animated fadeInUpShort" id="tbh-ekskul">
                <div class="row my-3">
                    <div class="col-md-7 offset-md-2">
                        <form action="#">
                            <div class="card no-b o-r">
                                <div class="card-body">
                                    <h5 class="card-title">Tambah Siswa</h5>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">Nama Siswa</label>
                                                <input id="name" class="form-control r-0 light s-12 " type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">Tanggal Mutasi</label>
                                                <input id="name" class="form-control r-0 light s-12 " type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">Alasan Mutasi</label>
                                                <textarea id="desk" class="form-control r-0 light s-12"></textarea>
                                            </div>
                                            <!-- <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">Matematika</label>
                                                <input id="name" class="form-control r-0 light s-12 " type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="name" class="col-form-label s-12">Bhs Inggris</label>
                                                <input id="name" class="form-control r-0 light s-12 " type="text">
                                            </div> -->
                                            <!--<div class="form-row">
                                                <div class="form-group col-6 m-0">
                                                    <label for="desk" class="col-form-label s-12">Deskripsi</label>
                                                    <textarea id="desk" class="form-control r-0 light s-12"></textarea>
                                                </div>
                                                <div class="form-group col-6 m-0">
                                                    <label for="jadwal" class="col-form-label s-12">Jadwal</label>
                                                    <select class="select2" name="states[]" multiple="multiple">
                                                       <option value="senin">Senin</option>
                                                       <option value="selasa">Selasa</option>
                                                       <option value="rabu">Rabu</option>
                                                       <option value="kamis">Kamis</option>
                                                       <option value="jumat">Jum'at</option>
                                                       <option value="sabtu">Sabtu</option>
                                                       <option value="minggu">Minggu</option>
                                                    </select>
                                                </div>
                                            </div>-->
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