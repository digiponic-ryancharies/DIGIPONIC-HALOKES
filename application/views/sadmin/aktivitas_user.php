<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-user-circle"></i>
                        Aktivitas User
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid relative">
        <div class="row">
            <div class="col-md-12">
                <div class="card my-3 no-b">
                    <div class="card-body">
                        <div class="card-title">Data Aktivitas User</div>
                        <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Role</th>
                                    <th>Aktivitas</th>
                                    <th>Deskripsi</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($au as $row) { ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row->date ?></td>
                                        <td><?php echo $row->role ?></td>
                                        <td><?php echo $row->act ?></td>
                                        <td><?php echo $row->desc ?></td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-xs">Hapus</a>
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

<?php echo $footer ?>