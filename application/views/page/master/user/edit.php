<main class="col-md-12 ms-sm-auto col-lg-10 px-md-4">

    <div class="py-5 text-center">
        <img type="img/png" class="d-block mx-auto mb-4" src="<?= $base ?>assets/brand/logo.png" alt="Lp3i Icon" height="100">
        <h2>Edit User</h2>
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
                        <label for="firstName" class="form-label">Username</label>
                        <input readonly type="text" class="form-control" id="username" name="username" placeholder="username" value="<?= $username ?>" required>
                        <div class="invalid-feedback">
                            Valid Kode Barang is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Nama User</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama User" value="<?= $nama ?>" required>
                        <div class="invalid-feedback">
                            Valid Nama Barang is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="" required>
                        <div class="invalid-feedback">
                            Valid Nama Barang is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Level</label>
                        <select class="form-control" name="level" id="level">

                            <!-- <?php
                                    if ($level == 1) { ?>
                                <option hidden value="1">Administrator</option>
                            <?php } else { ?>
                                <option hidden value="2">Kasir</option>
                            <?php } ?> -->

                            <option value="1"><?= $levelname  ?></option>
                            <option value="1">Administrator</option>
                            <option value="2">Kasir</option>

                        </select>

                        <div class="invalid-feedback">
                            Valid stock is required.
                        </div>
                    </div>

                </div>

                <hr class="my-4">

                <button class="w-20 btn btn-primary btn-lg btn-data" name="submit" type="submit">Save</button>
                <a class="w-20 btn btn-danger btn-lg" href="<?= $base ?>databarang">Cancel</a>
            </form>
        </div>
    </div>
</main>