<?php
$level = $_SESSION['level'];
if ($level != 1) {

    echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center><h3>Anda tidak memiliki akses untuk halaman ini</h3></center> <br>";
    return;
}
?>
<style type="text/css">
    .d-none {
        display: none;
    }
</style>
<main class="col-md-12 ms-sm-auto col-lg-10 px-md-4">

    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="./assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h2>Form Transaksi</h2>
    </div>

    <?php
    $tipe = "TR";
    $query = mysqli_query($conn, "SELECT IFNULL(CONCAT('$tipe',LPAD(MAX(RIGHT(id_trans,4))+1,4,'0')), CONCAT('$tipe',LPAD(1,4,'0'))) AS nomor FROM transaksi_h WHERE id_trans= (SELECT MAX(id_trans)  FROM transaksi_h ORDER BY id_trans DESC)");

    while ($d = mysqli_fetch_array($query)) {
    ?>
        <div class="row g-5">
            <div class="col-md-12 col-lg-12">
                <h4 class="mb-3">Form Transaksi</h4>
                <form action="" method="post">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="Kode Barang" class="form-label">Kode Transaksi</label>
                            <input type="text" readonly="readonly" class="form-control" value="<?php echo $d['nomor']; ?>" id="id_trans" name="id_trans" placeholder="Kode Transaksi" required>
                            <div class="invalid-feedback">
                                Valid Kode Customer is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="Nama Supplier" class="form-label">Jenis Transaksi</label>
                            <select id="jns_transaksi" name="jns_transaksi" class="form-control">
                                <option value="0">--Pilih--</option>
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
                                <option value="0">--Pilih--</option>
                                <?php
                                $query_supp = mysqli_query($conn, "SELECT * From supplier");

                                while ($supp = mysqli_fetch_array($query_supp)) { ?>
                                    <option value="<?php echo $supp['id']; ?>"><?php echo $supp['nm_supp']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-6 d-none cust_show">
                            <label for="Nama Supplier" class="form-label">Customer </label>
                            <select id="cust_id" name="cust_id" class="form-control">
                                <option value="0">--Pilih--</option>
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
    <?php } ?>
</main>
<?php
if (isset($_POST['submit'])) {
    $id_trans = $_POST['id_trans'];
    $jns_transaksi = $_POST['jns_transaksi'];
    $tgl_trans = $_POST['tgl_trans'];
    $supp_id = $_POST['supp_id'];
    $cust_id = $_POST['cust_id'];
    $ref_id = $_POST['ref_id'];
    mysqli_query($conn, "INSERT into transaksi_h (id_trans,jns_trans,tgl_trans,supplier_id,customer_id,ref_id) 
    values('$id_trans','$jns_transaksi','$tgl_trans','$supp_id','$cust_id','$ref_id')");

    echo "<script>window.location.href = '?mi=edit_transaksi&id=$id_trans&detail_id=0'</script>";
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
</script>