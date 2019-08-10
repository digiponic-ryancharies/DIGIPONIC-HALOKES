<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-cog"></i>
                        Jam Pelajaran Sekolah
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">
                <div role="alert" class="alert alert-info">
                    <strong>Silahkan klik atur untuk mengatur jadwal di masing masing hari</strong>
                </div>    
            </div>
            <div class="col-md-4">
                <div class="card border-info mb-3">
                    <div class="card-header text-center">Senin</div>
                    <div class="card-body text-info">
                        <table class="table table-bordered mb-3">
                            <tr>
                                <td>1</td> <td>07.00 - 08.00</td>
                            </tr>
                        </table>
                        <button class="btn btn-block btn-primary" onclick="setJampel('senin')">Atur Jam</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-info mb-3">
                    <div class="card-header text-center">Selasa</div>
                    <div class="card-body text-info">
                        <table class="table table-bordered mb-3">
                            <tr>
                                <td>1</td> <td>07.00 - 08.00</td>
                            </tr>
                        </table>
                        <button class="btn btn-block btn-primary" onclick="setJampel('selasa')">Atur Jam</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-info mb-3">
                    <div class="card-header text-center">Rabu</div>
                    <div class="card-body text-info">
                        <table class="table table-bordered mb-3">
                            <tr>
                                <td>1</td> <td>07.00 - 08.00</td>
                            </tr>
                        </table>
                        <button class="btn btn-block btn-primary" onclick="setJampel('rabu')">Atur Jam</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-info mb-3">
                    <div class="card-header text-center">Kamis</div>
                    <div class="card-body text-info">
                        <table class="table table-bordered mb-3">
                            <tr>
                                <td>1</td> <td>07.00 - 08.00</td>
                            </tr>
                        </table>
                        <button class="btn btn-block btn-primary" onclick="setJampel('kamis')">Atur Jam</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-info mb-3">
                    <div class="card-header text-center">Jumat</div>
                    <div class="card-body text-info">
                        <table class="table table-bordered mb-3">
                            <tr>
                                <td>1</td> <td>07.00 - 08.00</td>
                            </tr>
                        </table>
                        <button class="btn btn-block btn-primary" onclick="setJampel('jumat')">Atur Jam</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-info mb-3">
                    <div class="card-header text-center">Sabtu</div>
                    <div class="card-body text-info">
                        <table class="table table-bordered mb-3">
                            <tr>
                                <td>1</td> <td>07.00 - 08.00</td>
                            </tr>
                        </table>
                        <button class="btn btn-block btn-primary" onclick="setJampel('sabtu')">Atur Jam</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="aturjampel" tabindex="-1" role="dialog" aria-labelledby="aturjampel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title jadwal" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post">
                <div class="modal-body">
                    <div class="form-row">
                        <input type="hidden" name="hari" value="">
                        <div class="col-md-2">
                            <div class="form-group mb-1">
                                <input type="number" name="jampel" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-1">
                                <select class="form-control" name="jenis[]">
                                    <option value="JP">JP</option>
                                    <option value="PK">PK</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-1">
                                <div class="input-group">
                                    <input type="text" name="awal[]" class="date-time-picker form-control" value="07:00"
                                           data-options='{"datepicker":false, "format":"H:i"}'/>
                                    <span class="input-group-append">
                                        <span class="input-group-text add-on white">
                                            <i class="icon-timer"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-1">
                                <div class="input-group">
                                    <input type="text" name="akhir[]" class="date-time-picker form-control" value="15:00"
                                           data-options='{"datepicker":false, "format":"H:i"}'/>
                                    <span class="input-group-append">
                                        <span class="input-group-text add-on white">
                                            <i class="icon-timer"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-primary mt-3">Tambah</button>
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
    function setJampel(hari) {
        let firstCharCap = hari.charAt(0).toUpperCase();
        let ucFirst = firstCharCap + hari.slice(1);

        $("#aturjampel").modal("show");
        $(".modal-title.jadwal").text("Atur Jam Pelajaran - " + ucFirst);
        $("input[name='hari']").val(hari);
    }
</script>