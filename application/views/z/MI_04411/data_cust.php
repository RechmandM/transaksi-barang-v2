<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Data Customer</h2>
     <a class="btn btn-primary " href="?mi=form_cust">Tambah Customer</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode Customer</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Telp</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                <?php $row = mysqli_query($conn, "SELECT * from customer");
                $no = 1;
                foreach ($row as $row_array) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row_array['id']; ?></td>
                        <td><?= $row_array['nm_cust']; ?></td>
                        <td><?= $row_array['telp']; ?></td>
                        <td>
                            <a href="?mi=edit_cust&id=<?php echo $row_array['id']; ?>">Edit</a>
                            <a href="?mi=hapus_cust&id=<?php echo $row_array['id']; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php $no++;
                }  ?>
            </tbody>
        </table>
    </div>

</main>