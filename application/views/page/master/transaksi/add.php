<style type="text/css">
    .btn-data {
        padding: 8px 26px;
    }
</style>

<main class="col-md-12 ms-sm-auto col-lg-10 px-md-4">

    <div class="py-5 text-center">
        <img type="img/png" class="d-block mx-auto mb-4" src="<?= $base ?>assets/brand/logo.png" alt="Lp3i Icon" height="100">
        <h2>Form Transaksi</h2>
    </div>
    <div class="row g-5">
        <div class="col-md-12 col-lg-12">
            <!-- <h4 class="mb-3">Form Transaksi</h4> -->
            <form action="<?= $url_post['url_post'] ?>" method="post">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="Kode Barang" class="form-label">Kode Transaksi</label>
                        <input type="text" readonly="readonly" class="form-control" value="<?= $kode; ?>" id="id_trans" name="id_trans" placeholder="Kode Transaksi" required>
                        <div class="invalid-feedback">
                            Valid Kode Customer is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="Nama Supplier" class="form-label">Jenis Transaksi</label>
                        <select id="jns_transaksi" name="jns_transaksi" class="form-control">
                            <option hidden value="0">--Pilih--</option>
                            <option value="in">Transaksi Masuk</option>
                            <option value="out">Transaksi Keluar</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="telp" class="form-label">Tgl Transaksi</label>
                        <input type="date" class="form-control" id="tgl_trans" name="tgl_trans" placeholder="Tanggal Transaksi" required>
                        <div class="invalid-feedback">
                            Valid No.Telp is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="telp" class="form-label">No. Referensi</label>
                        <input type="text" class="form-control" id="ref_id" name="ref_id" placeholder="No. Ref" required>
                        <div class="invalid-feedback">
                            Valid No.Telp is required.
                        </div>
                    </div>
                    <div class="col-sm-6 d-none supplier_show">
                        <label for="Nama Supplier" class="form-label">Supplier </label>
                        <select id="supp_id" name="supp_id" class="form-control">
                            <option hidden value="0">--Pilih--</option>
                            <!-- ============== pribadi ========= -->
                            <!-- <?php
                                    foreach ($datasupplier as $vdata) : ?>
                                <option value="<?= $vdata->id; ?>"><?= $vdata->nm_supp; ?></option>
                            <?php endforeach ?> -->
                            <!-- ============== pribadi ========= -->
                            <!-- untuk debugging di inspect
                            print_r($default['supplier']);  -->
                            <?php print_r($default['supplier']);
                            foreach ($default['supplier'] as $row) { ?>
                                <option value="<?php echo (isset($row['value'])) ? $row['value'] : ''; ?>" <?php echo (isset($row['selected'])) ? $row['selected'] : ''; ?>>
                                    <?php echo (isset($row['display'])) ? $row['display'] : ''; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-6 d-none cust_show">
                        <label for="Nama Supplier" class="form-label">Customer </label>
                        <select id="cust_id" name="cust_id" class="form-control">
                            <option hidden value="0">--Pilih--</option>
                            <!-- untuk debugging di inspect
                            print_r($default['supplier']);  -->
                            <?php print_r($default['supplier']);
                            foreach ($default['customer'] as $row) { ?>
                                <option value="<?php echo (isset($row['value'])) ? $row['value'] : ''; ?>" <?php echo (isset($row['selected'])) ? $row['selected'] : ''; ?>>
                                    <?php echo (isset($row['display'])) ? $row['display'] : ''; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>

                <hr class="my-4">

                <button class="w-20 btn btn-primary btn-lg btn-data" name="submit" type="submit">Save</button>
                <a class="w-20 btn btn-danger btn-lg" href="<?= $base ?>datatransaksi">Cancel</a>
            </form>
        </div>
    </div>
</main>


<script src="<?= $base ?>assets/js/jquery/jquery.min.js"></script>
<script>
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