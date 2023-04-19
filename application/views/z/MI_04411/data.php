<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Data Barang</h2>
     <a class="btn btn-primary " href="?mi=form_barang">Tambah Barang</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Stock</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                <?php $row = mysqli_query($conn, "SELECT * from barang");
                $no = 1;
                foreach ($row as $row_array) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row_array['kdbarang']; ?></td>
                        <td><?= $row_array['nmbarang']; ?></td>
                        <td><?= $row_array['stok_mn']; ?></td>
                        <td>
                            <a href="?mi=edit_barang&id=<?php echo $row_array['kdbarang']; ?>">Edit</a>
                            <a href="?mi=hapus_barang&id=<?php echo $row_array['kdbarang']; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php $no++;
                }  ?>
            </tbody>
        </table>
    </div>

</main>