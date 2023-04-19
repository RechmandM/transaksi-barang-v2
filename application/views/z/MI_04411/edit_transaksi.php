<style type="text/css">
    .d-none {
        display: none;
    }
</style>
<main class="col-md-12 ms-sm-auto col-lg-10 px-md-4">
    <?php
    $id = $_GET['id'];
    $data = mysqli_query($conn, "SELECT h.*,c.nm_cust,s.nm_supp from transaksi_h h
                                LEFT JOIN customer c on c.id=h.customer_id
                                LEFT JOIN supplier s ON s.id=h.supplier_id
                                 where id_trans='$id'");
    while ($d = mysqli_fetch_array($data)) {


        if ($d['jns_trans'] == 'in') {
            $show = 1;
        } else {
            $show = 0;
        }
    ?>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="./assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h2>Form Transaksi</h2>
        </div>

        <div class="row g-5">
            <div class="col-md-12 col-lg-12">
                <h4 class="mb-3">Form Transaksi</h4>
                <form action="" method="post">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="Kode Barang" class="form-label">Kode Transaksi</label>
                            <input readonly type="text" class="form-control" value="<?php echo $d['id_trans']; ?>" id="id_trans" name="id_trans" placeholder="Kode Transaksi" required>
                            <div class="invalid-feedback">
                                Valid Kode Customer is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="Nama Supplier" class="form-label">Jenis Transaksi</label>
                            <select id="jns_transaksi" name="jns_transaksi" class="form-control">
                                <?php if ($d['jns_trans'] == 'in') {
                                    $jns = 'Transaksi Masuk';
                                } else {
                                    $jns = 'Transaksi Keluar';
                                }

                                ?>
                                <option selected="selected" value="<?= $d['jns_trans']; ?>"><?= $jns; ?></option>
                                <option value="in">Transaksi Masuk</option>
                                <option value="out">Transaksi Keluar</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="telp" class="form-label">Tgl Transaksi <?= $show; ?></label>
                            <input type="date" class="form-control" value="<?php echo $d['tgl_trans']; ?>" id="tgl_trans" name="tgl_trans" placeholder="Tanggal Transaksi" required>
                            <div class="invalid-feedback">
                                Valid No.Telp is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="telp" class="form-label">No. Referensi</label>
                            <input type="text" class="form-control" value="<?php echo $d['ref_id']; ?>" id="ref_id" name="ref_id" placeholder="No. Ref" required>
                            <div class="invalid-feedback">
                                Valid No.Telp is required.
                            </div>
                        </div>

                        
                        <div class="col-sm-6 <?php if ($show != 1) { ?> d-none <?php } ?> supplier_show">
                            <label for="Nama Supplier" class="form-label">Supplier </label>
                            <select id="supp_id" name="supp_id" class="form-control">
                                <option value="<?= $d['supplier_id']; ?>"><?= $d['nm_supp']; ?></option>
                                <?php
                                $query_supp = mysqli_query($conn, "SELECT * From supplier");

                                while ($supp = mysqli_fetch_array($query_supp)) { ?>
                                    <option value="<?php echo $supp['id']; ?>"><?php echo $supp['nm_supp']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-6 <?php if ($show != 0) { ?> d-none <?php } ?>  cust_show">
                            <label for="Nama Supplier" class="form-label">Customer </label>
                            <select id="cust_id" name="cust_id" class="form-control">
                                <option value="<?= $d['customer_id']; ?>"><?= $d['nm_cust']; ?></option>
                                <?php
                                $query_cust = mysqli_query($conn, "SELECT * From customer");

                                while ($cust = mysqli_fetch_array($query_cust)) { ?>
                                    <option value="<?php echo $cust['id']; ?>"><?php echo $cust['nm_cust']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>

                    <hr class="my-4">

                    <button class="w-20 btn btn-primary btn-lg" name="submit" type="submit">Save</button>
                    <a class="w-20 btn btn-primary btn-lg" href="?mi=transaksi">Cancel</a>
                </form>
            </div>
        </div>
        <hr style="border: 2px solid red;">
        <div class="row g-5">
            <div class="col-md-12 col-lg-6">
                <h4 class="mb-3">Data Detail</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
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
                            <?php $row = mysqli_query($conn, "SELECT d.*,b.nmbarang from transaksi_d d LEFT JOIN barang b on b.kdbarang=d.kdbarang  where header_id='$id' order by kdbarang DESC");
                            $no = 1;
                            foreach ($row as $row_array) { ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row_array['kdbarang']; ?></td>
                                    <td><?= $row_array['nmbarang']; ?></td>
                                    <td><?= $row_array['qty']; ?></td>
                                    <td><?= $row_array['harga']; ?></td>
                                    <td><?= $row_array['total']; ?></td>
                                    <td>
                                        <a href="?mi=edit_transaksi&id=<?php echo $id; ?>&detail_id=<?php echo $row_array['id']; ?>">Edit</a>
                                        <a href="?mi=hapus_transaksi_d&header_id=<?php echo $id; ?>&id=<?php echo $row_array['id']; ?>">Hapus</a>
                                    </td>
                                </tr>
                            <?php $no++;
                            }  ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <h4 class="mb-3">Form Detail</h4>
                <form action="" method="post">
                    <div class="row g-3">
                        <?php
                        $getdetail_id = $_GET['detail_id'];
                        if ($getdetail_id == 0) {
                            $detail_id = 0;
                            $qty = 0;
                            $harga = 0;
                            $kdbarang = 0;
                        } else {
                            $data_detail = mysqli_query($conn, "SELECT * from transaksi_d  where id='$getdetail_id'");
                            while ($get_detail = mysqli_fetch_array($data_detail)) {

                                $detail_id = $get_detail['id'];
                                $qty = $get_detail['qty'];
                                $harga = $get_detail['harga'];
                                $kdbarang = $get_detail['kdbarang'];
                            }
                        }

                        ?>
                        <div class="col-sm-6  ">
                            <label for="Nama Barang" class="form-label">Nama Barang </label>
                            <input type="hidden" class="form-control" value="<?= $detail_id; ?>" id="detail_id" name="detail_id" placeholder="detail_id" required>
                            <select id="kdbarang" name="kdbarang" class="form-control">
                                <option value="0">--Pilih--</option>
                                <?php
                                $query_barang = mysqli_query($conn, "SELECT * From barang");

                                while ($barang = mysqli_fetch_array($query_barang)) { ?>
                                    <option <?php if ($kdbarang === $barang['kdbarang']) {
                                                echo "selected";
                                            } ?> value="<?php echo $barang['kdbarang']; ?>"><?php echo  $barang['nmbarang']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="Kode Barang" class="form-label">Qty</label>
                            <input type="text" class="form-control" value="<?= $qty; ?>" id="qty" name="qty" placeholder="Qty" required>
                            <div class="invalid-feedback">
                                Valid Qty is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="Kode Barang" class="form-label">Harga</label>
                            <input type="text" class="form-control" value="<?= $harga; ?>" id="harga" name="harga" placeholder="Harga" required>
                            <div class="invalid-feedback">
                                Valid Harga is required.
                            </div>
                        </div>


                    </div>

                    <hr class="my-4">

                    <button class="w-20 btn btn-primary btn-lg" name="submit_detail" type="submit">Save Detil</button>
                    <a class="w-20 btn btn-primary btn-lg" href="?mi=transaksi">Cancel</a>
                </form>
            </div>
        </div>

</main>
<?php }


    if (isset($_POST['submit'])) {
        $id_trans = $_POST['id_trans'];
        $jns_transaksi = $_POST['jns_transaksi'];
        $tgl_trans = $_POST['tgl_trans'];
        $supp_id = $_POST['supp_id'];
        $cust_id = $_POST['cust_id'];
        $ref_id = $_POST['ref_id'];

        mysqli_query($conn, "UPDATE transaksi_h set jns_trans='$jns_transaksi',tgl_trans='$tgl_trans',supplier_id='$supp_id',customer_id='$cust_id',ref_id='$ref_id' where id_trans='$id_trans'");

        echo "<script>window.location.reload ='?mi=edit_transaksi&id=$id'&detail_id=0'</script>";
    }

    if (isset($_POST['submit_detail'])) {
        $detail_id = $_POST['detail_id'];
        $kdbarang = $_POST['kdbarang'];
        $qty = $_POST['qty'];
        $harga = $_POST['harga'];
        $total = $harga * $qty;
        if ($detail_id == 0) {
            mysqli_query($conn, "INSERT INTO  transaksi_d (header_id,qty,harga,total,kdbarang)
            values('$id','$qty','$harga','$total','$kdbarang')");
        } else {
            mysqli_query($conn, "UPDATE transaksi_d set qty='$qty',harga='$harga',total='$total',kdbarang='$kdbarang' where id='$detail_id'");
        }

        echo "<script>window.location.reload = '?mi=edit_transaksi&id=$id'&detail_id=0'</script>";
    }

?>
<script src="assets/js/jquery/jquery.min.js"></script>
<script>
    $('#jns_transaksi').on('change', function() {
        var selectedPackage = $('#jns_transaksi').val();
        if (selectedPackage == 'in') {
            $(".supplier_show").removeClass("d-none");
            $(".cust_show").addClass("d-none");
        } else if (selectedPackage == 'out') {
            $(".supplier_show").addClass("d-none");
            $(".cust_show").removeClass("d-none");
        }
    });


    function detail_id() {
        $(".tabledetil").addClass("active");
        $(".tabledetil").addClass("show");
        $(".tabtabledetil").addClass("active");
        $(".formeditdetil").removeClass("active");
        $(".formeditdetil").removeClass("show");
        $(".tabformeditdetil").removeClass("active");
    }
</script>