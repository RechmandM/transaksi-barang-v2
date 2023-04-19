<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Data Transaksi</h2>
    <a class="btn btn-primary " href="?mi=form_transaksi">Tambah Transaksi</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode Transaksi</th>
                    <th scope="col">Jenis Transaksi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                <?php $row = mysqli_query($conn, "SELECT * from transaksi_h order by tgl_trans DESC");
                $no = 1;
                foreach ($row as $row_array) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row_array['id_trans']; ?></td>
                        <td><?php if ($row_array['jns_trans'] == 'in') {
                                echo "<span style='color:blue;'>
                                Transaksi Masuk</span>";
                            } else {
                                echo "<span style='color:red;'>
                                Transaksi Keluar</span>";
                            } ?></td>
                        <td><?= $row_array['tgl_trans']; ?></td>
                        <td>
                            <a href="?mi=edit_transaksi&id=<?php echo $row_array['id_trans']; ?>&detail_id=0">Edit</a>
                            <a href="?mi=hapus_transaksi&id=<?php echo $row_array['id_trans']; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php $no++;
                }  ?>
            </tbody>
        </table>
    </div>

</main>