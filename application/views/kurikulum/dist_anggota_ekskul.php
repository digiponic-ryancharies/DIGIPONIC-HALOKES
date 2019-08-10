<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-cog"></i>
                        Atur Anggota Ekstrakurikuler
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-7">
                <div class="card no-b">
                    <div class="card-body">
                        <div class="card-title">Siswa</div>
                        <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                            <thead>
                                <tr>
                                    <th width="20"></th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="satu">
                                    <td>
                                        <input type="checkbox" name="id_siswa" class="id_siswa" value="satu">
                                    </td>
                                    <td>Test Nama 1</td>
                                    <td>-</td>
                                </tr>
                                <tr id="dua">
                                    <td>
                                        <input type="checkbox" name="id_siswa" class="id_siswa" value="dua">
                                    </td>
                                    <td>Test Nama 2</td>
                                    <td>-</td>
                                </tr>
                                <tr id="tiga">
                                    <td>
                                        <input type="checkbox" name="id_siswa" class="id_siswa" value="tiga">
                                    </td>
                                    <td>Test Nama 3</td>
                                    <td>-</td>
                                </tr>
                                <tr id="empat">
                                    <td>
                                        <input type="checkbox" name="id_siswa" class="id_siswa" value="empat">
                                    </td>
                                    <td>Test Nama 4</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary my-2" id="pilih">Pilih</button>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card no-b">
                    <div class="card-body">
                        <div class="card-title">Eksktrakurikuler</div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ekskul</th>
                                    <th>Jumlah Siswa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($ekskul as $row) { ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $row->ekskul_nama ?></td>
                                    <td>0</td>
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

<div class="modal fade" id="atursiswa" tabindex="-1" role="dialog" aria-labelledby="aturjadwal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Atur Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group mt-2">
                                <label for="name" class="col-form-label s-12">EKSTRAKURIKULER</label>
                                <select name="hari" class="form-control">
                                    <option value="">-- Pilih Ekskul --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover" id="tblSiswa">
                                <tbody id="siswa_hasil"></tbody>
                            </table>
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
    Array.prototype.remove = function() {
        var what, a = arguments, L = a.length, ax;
        while (L && this.length) {
            what = a[--L];
            while ((ax = this.indexOf(what)) !== -1) {
                this.splice(ax, 1);
            }
        }
        return this;
    };

    let siswa = new Array();
    $('.id_siswa').click(function(){
        if($(this).is(':checked')){
            siswa.push($(this).val());
        } else {
            siswa.remove($(this).val());
        }
    });

    $("button#pilih").on('click', function() {
        var table = document.getElementById("siswa_hasil");
        table.parentNode.removeChild(table);

        $("#tblSiswa").append('<tbody id="siswa_hasil"></tbody>');

        $('#atursiswa').modal('show');

        for(let i=0; i<siswa.length; i++) {
            let no = i+1;
            let namas = $("#"+siswa[i]).find("td:eq(1)").html();
            let row = '<tr><td>'+no+'</td><td>'+namas+'</td></tr>';
            $("#siswa_hasil").append(row);
        }
    });
</script>