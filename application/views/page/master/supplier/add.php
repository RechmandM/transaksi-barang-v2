<main class="col-md-12 ms-sm-auto col-lg-10 px-md-4">

    <div class="py-5 text-center">
        <img type="img/png" class="d-block mx-auto mb-4" src="<?= $base ?>assets/brand/logo.png" alt="Lp3i Icon" height="100">
        <h2>Form Supplier</h2>
    </div>

    <style>
        .btn-data {
            padding: 8px 26px;
        }
    </style>

    <div class="row g-5">
        <div class="col-md-12 col-lg-12">
            <form action="<?= $url_post ?>" method="post">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="Kode Barang" class="form-label">Kode Supplier</label>
                        <input readonly type="text" class="form-control <?php if (strlen($kode) > 15) : echo 'fw-bold text-danger';
                                                                        endif ?>" id="kodesupp" name="kodesupp" value="<?= $kode ?>" placeholder="Kode Supplier" required>
                        <div class="invalid-feedback">
                            Valid Kode Customer is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="Nama Supplier" class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control" id="nm_supp" name="nm_supp" placeholder="Nama Supplier" required>
                        <div class="invalid-feedback">
                            Valid Nama Supplier is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="telp" class="form-label">No.Telp</label>
                        <input type="number" class="form-control" id="telp" name="telp" placeholder="Telp" required>
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

                <button <?php if (strlen($kode) > 15) : echo 'hidden';
                        endif ?> class="w-20 btn btn-primary btn-lg btn-data" name="submit" type="submit">Save</button>
                <a class="w-20 btn btn-danger btn-lg" href="<?= $base ?>datasupplier">Cancel</a>
            </form>
        </div>
    </div>
</main>