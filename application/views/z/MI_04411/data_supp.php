<?php
$level = $_SESSION['level'];
if ($level != 1) {

    echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center><h3>Anda tidak memiliki akses untuk halaman ini</h3></center> <br>";
    return;
}
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Data Supplier</h2>
    <a class="btn btn-primary " href="?mi=form_supp">Tambah Supplier</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode Supplier</th>
                    <th scope="col">Nama Supplier</th>
                    <th scope="col">Telp</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                <?php $row = mysqli_query($conn, "SELECT * from supplier");
                $no = 1;
                foreach ($row as $row_array) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row_array['id']; ?></td>
                        <td><?= $row_array['nm_supp']; ?></td>
                        <td><?= $row_array['telp']; ?></td>
                        <td>
                            <a href="?mi=edit_supp&id=<?php echo $row_array['id']; ?>">Edit</a>
                            <a href="?mi=hapus_supp&id=<?php echo $row_array['id']; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php $no++;
                }  ?>
            </tbody>
        </table>
    </div>

</main>