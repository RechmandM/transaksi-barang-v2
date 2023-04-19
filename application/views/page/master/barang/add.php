<main class="col-md-12 ms-sm-auto col-lg-10 px-md-4">
    <div class="py-5 text-center">
        <img type="img/png" class="d-block mx-auto mb-4" src="<?= $base ?>assets/brand/logo.png" alt="Lp3i Icon" height="100">
        <h2>Form Barang</h2>
    </div>

    <style>
        .btn-data {
            padding: 8px 26px;
        }
    </style>

    <div class="row g-5">
        <div class="col-md-12 col-lg-12">
            <form action="<?= $url_post ?>" method="post" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Kode Barang</label>
                        <!-- <input readonly type="text" class="form-control" id="kodebarang" name="kodebarang" placeholder="Kode Barang" value="<?= substr($kode, 0, 2) ?>" required> -->
                        <input readonly type="text" class="form-control <?php if (strlen($kode) > 14) : echo 'fw-bold text-danger';
                                                                        endif ?>" id="kodebarang" name="kodebarang" placeholder="Kode Barang" value="<?= $kode ?>" required>
                        <div class="invalid-feedback">
                            Valid Kode Barang is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nm_barang" name="nm_barang" placeholder="Nama Barang" required>
                        <div class="invalid-feedback">
                            Valid Nama Barang is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock_mn" name="stock_mn" placeholder="Stock" required>
                        <div class="invalid-feedback">
                            Valid stock is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Upload Gambar</label>
                        <img id="displaying" src="<?= $base ?>/assets/img/upload/default.png" class="img-thumbnail" border="0" height="100" width="130" style="max-width: 130px;" alt="img">
                        <input onchange="ubahGambar(this)" type="file" class="form-control" id="fileupload" name="fileupload">
                        <div class="invalid-feedback">
                            Valid stock is required.
                        </div>
                    </div>

                </div>

                <hr class="my-4">
                <!-- <a class="w-20 btn btn-primary btn-lg" href="<?= $url_post ?>">Save</a> -->
                <button <?php if (strlen($kode) > 15) : echo 'hidden';
                        endif ?> class="w-20 btn btn-primary btn-lg btn-data" name="submit" type="submit">Save</button>
                <a class="w-20 btn btn-danger btn-lg" href="../databarang">Cancel</a>
            </form>
        </div>
    </div>
</main>


<script src="<?= $base ?>assets/js/jquery/jquery.min.js"></script>
<script>
    function ubahGambar(elementku) {

        var img = elementku.files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            $('#displaying').attr('src', reader.result);
        }
        reader.readAsDataURL(img);
    }

    $('#jns_transaksi').on('change', function() {
        var selectedPackage = $('#jns_transaksi').val();
        if (selectedPackage == 'in') {
            $("#cust_id").val('0');
            $(".supplier_show").removeClass("d-none");
            $(".cust_show").addClass("d-none");
        } else if (selectedPackage == 'out') {
            $("#supp_id").val('0');
            $(".supplier_show").addClass("d-none");
            $(".cust_show").removeClass("d-none");
        }
    });
</script>