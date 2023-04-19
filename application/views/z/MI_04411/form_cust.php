<main class="col-md-12 ms-sm-auto col-lg-10 px-md-4">

    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="./assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h2>Form Customer</h2>
    </div>

    <div class="row g-5">
        <div class="col-md-12 col-lg-12">
            <h4 class="mb-3">Form Customer</h4>
            <form action="" method="post">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="Kode Barang" class="form-label">Kode Customer</label>
                            <input type="text"   class="form-control" id="kodecust" name="kodecust"   placeholder="Kode Customer" required>
                            <div class="invalid-feedback">
                                Valid Kode Customer is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="Nama Barang" class="form-label">Nama Customer</label>
                            <input type="text" class="form-control" id="nm_cust" name="nm_cust" placeholder="Nama Customer" required>
                            <div class="invalid-feedback">
                                Valid Nama Customer is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="telp" class="form-label">No.Telp</label>
                            <input type="text" class="form-control" id="telp" name="telp" placeholder="Telp" required>
                            <div class="invalid-feedback">
                                Valid No.Telp is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="telp" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat"></textarea> 
                            <div class="invalid-feedback">
                                Valid Alamat is required.
                            </div>
                        </div>

                    </div>

                <hr class="my-4">

                <button class="w-20 btn btn-primary btn-lg" name="submit" type="submit">Save</button>
                <a class="w-20 btn btn-primary btn-lg" href="?mi=cust">Cancel</a>
            </form>
        </div>
    </div>
</main> 
<?php
if (isset($_POST['submit'])) {
     $kodecust = $_POST['kodecust'];
    $nm_cust = $_POST['nm_cust'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    mysqli_query($conn, "INSERT into customer (id,nm_cust,telp,alamat) 
    values('$kodecust','$nm_cust','$telp','$alamat')");

    echo "<script>history.back(1);</script>";
}

?>