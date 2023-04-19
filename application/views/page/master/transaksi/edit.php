<style type="text/css">
    .btn-data {
        padding: 8px 26px;
    }
</style>
<main class="col-md-12 ms-sm-auto col-lg-10 px-md-4 mb-3">

    <div class="py-5 text-center">
        <img type="img/png" class="d-block mx-auto mb-4" src="<?= $base ?>assets/brand/logo.png" alt="Lp3i Icon" height="100">
        <h2>Form Transaksi</h2>
    </div>
    <div class="row g-5">
        <div class="col-md-12 col-lg-12">
            <!-- <h4 class="mb-3">Form Transaksi</h4> -->
            <form action="<?= $url_post ?>" method="post">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="Kode Barang" class="form-label">Kode Transaksi</label>
                        <input type="text" readonly="readonly" class="form-control" value="<?= $id_trans; ?>" id="id_trans" name="id_trans" placeholder="Kode Transaksi" required>
                        <div class="invalid-feedback">
                            Valid Kode Customer is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="Nama Supplier" class="form-label">Jenis Transaksi</label>
                        <select id="jns_transaksi" name="jns_transaksi" class="form-control">
                            <?php if ($jns_transaksi == 'in') {
                                $jns = 'Transaksi Masuk';
                                $show = 1;
                            } else {
                                $jns = 'Transaksi Keluar';
                                $show = 0;
                            }

                            ?>
                            <option hidden selected="selected" value="<?= $jns_transaksi ?>"><?= $jns ?></option>
                            <option value="in">Transaksi Masuk</option>
                            <option value="out">Transaksi Keluar</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="telp" class="form-label">Tgl Transaksi</label>
                        <input type="date" class="form-control" id="tgl_trans" name="tgl_trans" value="<?= $tgl_trans ?>" placeholder="Tanggal Transaksi" required>
                        <div class="invalid-feedback">
                            Valid No.Telp is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="telp" class="form-label">No. Referensi</label>
                        <input type="text" class="form-control" id="ref_id" name="ref_id" value="<?= $ref_id ?>" placeholder="No. Ref" required>
                        <div class="invalid-feedback">
                            Valid No.Telp is required.
                        </div>
                    </div>
                    <div class="col-sm-6 <?php if ($show != 1) { ?> d-none <?php } ?> supplier_show">
                        <label for="Nama Supplier" class="form-label">Supplier </label>
                        <select id="supp_id" name="supp_id" class="form-control">
                            <option hidden value="0">--Pilih--</option>

                            <?php print_r($default['supplier']);
                            foreach ($default['supplier'] as $row) { ?>
                                <option value="<?php echo (isset($row['value'])) ? $row['value'] : ''; ?>" <?php echo (isset($row['selected'])) ? $row['selected'] : ''; ?>>
                                    <?php echo (isset($row['display'])) ? $row['display'] : ''; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-6 <?php if ($show != 0) { ?> d-none <?php } ?> cust_show">
                        <label for="Nama Supplier" class="form-label">Customer </label>
                        <select id="cust_id" name="cust_id" class="form-control">
                            <option hidden value="0">--Pilih--</option>
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
    <hr style="border: 2px solid #2C324F;" class="my-3">
    <!-- =============================== DATA DETAIl ============================= -->
    <!-- =============================== DATA DETAIl ============================= -->
    <!-- =============================== DATA DETAIl ============================= -->
    <div class="row g-5">
        <div class="col-md-12 col-lg-6 pt-1">
            <h4 class="mb-3">Data Detail</h4>
            <div class="table-responsive">
                <?php if ($datadetail) : ?>
                    <table class="table table-striped table-sm">
                        <thead class="text-white" style="background-color:#2C324F;">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Total</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($datadetail as $vdata) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $vdata->kdbarang ?></td>
                                    <td><?= $vdata->nmbarang ?></td>
                                    <td><?= $vdata->qty ?></td>
                                    <td><?= number_format($vdata->harga, 0, ',', '.') ?></td>
                                    <td><?= number_format($vdata->total, 0, ',', '.') ?></td>
                                    <td>
                                        <button onclick="ParamFunc.editdata(<?= $vdata->id ?>)" class="btn btn-outline-warning btn-sm" data-toggle='tooltip' data-placement='bottom' title='Edit Data' type="button"><i class="fa fa-edit"></i>
                                            Edit</button>
                                        <a class="btn btn-outline-danger btn-sm" href="<?= $base ?>datatransaksi/delete_d/<?= $vdata->header_id ?>/<?= $vdata->id ?>">
                                            <i class="nav-icon fas fa-erase">Hapus</i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach  ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div style="padding: 10px;" class="container text-center card bg-opacity-10 bg-dark mt-2">
                        <h3 class="text-uppercase">Data Kosong</h3>
                        <h4>Silahkan tambahkan dahulu..</h4>
                    </div>
                <?php endif ?>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 pt-1">
            <h4 class="mb-3">Form Detail</h4>
            <form action="<?= $url_post_detil ?>" method="post">
                <div class="row g-3">
                    <div class="col-sm-6  ">
                        <label for="Nama Barang" class="form-label">Nama Barang </label>
                        <input type="hidden" class="form-control" value="<?= $id_trans; ?>" id="header_id" name="header_id" placeholder="header_id" required>
                        <input type="hidden" class="form-control" value="" id="detail_id" name="detail_id" placeholder="detail_id" required>
                        <select id="kdbarang" name="kdbarang" class="form-control">

                            <option hidden value="0">--Pilih--</option>

                            <!-- <?php print_r($default['kdbarang']);
                                    foreach ($default['kdbarang'] as $row) { ?>
                                <option value="<?php echo (isset($row['value'])) ? $row['value'] : ''; ?>" <?php echo (isset($row['selected'])) ? $row['selected'] : ''; ?>>
                                    <?php echo (isset($row['display'])) ? $row['display'] : ''; ?></option>
                            <?php } ?> -->

                            <!-- tanpa selected -->
                            <?php print_r($default['kdbarang']);
                            foreach ($default['kdbarang'] as $row) { ?>
                                <option value="<?php echo (isset($row['value'])) ? $row['value'] : ''; ?>">
                                    <?php echo (isset($row['display'])) ? $row['display'] : ''; ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="Kode Barang" class="form-label">Qty</label>
                        <input type="text" class="form-control" value="" id="qty" name="qty" placeholder="Qty" required>
                        <div class="invalid-feedback">
                            Valid Qty is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="Kode Barang" class="form-label">Harga</label>
                        <input type="text" class="form-control" value="" id="harga" name="harga" placeholder="Harga" required>
                        <div class="invalid-feedback">
                            Valid Harga is required.
                        </div>
                    </div>

                </div>
                <hr class="my-4">

                <button class="w-20 btn btn-primary btn-lg" name="submit_detail" type="submit">Save Detail</button>
                <a class="w-20 btn btn-danger btn-lg" href="<?= $base ?>/datatransaksi">Cancel</a>
            </form>
        </div>
    </div>

    <!-- <hr> -->
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
    })
</script>
<script>
    var ParamFunc = {
        editdata: function(id_nya) {
            $.ajax({
                type: "POST",
                url: '<?= $url_getdetail ?>',
                dataType: "json",
                data: {
                    idinput: id_nya,
                },
                cache: false,
                success: function(data_nya, text) {
                    console.log(data_nya.harga)
                    if (data_nya.hasil == 'true') {
                        var qty = data_nya.qty;
                        var harga = data_nya.harga;
                        var kdbarang = data_nya.kdbarang;
                        var detail_id = data_nya.detail_id;
                        $("#qty").val(qty);
                        $("#harga").val(harga);
                        $("#kdbarang").val(kdbarang).change();
                        $("#detail_id").val(detail_id);
                    } else {
                        alert('Gagal dapat detail');
                    }
                }
            });
        }
    }
</script>
<script>
    function simpan() {
        alert('Data Detail Berhasil Disimpan');
    }
</script>