<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Print</title>
  <link rel="stylesheet" href="style.css">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
  <!-- link for dashboard -->
  <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" /> -->
  <!-- link for dashboard -->

  <!-- Bootstrap core CSS -->
  <!-- <link href="<?= $base ?>assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<!-- <style>
  @font-face {
    font-family: SourceSansPro;
    src: url(SourceSansPro-Regular.ttf);
  }

  .clearfix:after {
    content: "";
    display: table;
    clear: both;
  }

  a {
    color: #0087C3;
    text-decoration: none;
  }

  body {
    position: relative;
    width: 21cm;
    height: 29.7cm;
    margin: 0 auto;
    color: #555555;
    background: #FFFFFF;
    font-family: Arial, sans-serif;
    font-size: 14px;
    font-family: SourceSansPro;
  }

  header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #AAAAAA;
  }

  #logo {
    float: left;
    margin-top: 8px;
  }

  #logo img {
    height: 70px;
  }

  #company {
    float: right;
    text-align: right;
  }


  #details {
    margin-bottom: 50px;
  }

  #client {
    padding-left: 6px;
    border-left: 6px solid #0087C3;
    float: left;
  }

  #client .to {
    color: #777777;
  }

  h2.name {
    font-size: 1.4em;
    font-weight: normal;
    margin: 0;
  }

  #invoice {
    float: right;
    text-align: right;
  }

  #invoice h1 {
    color: #0087C3;
    font-size: 2.4em;
    line-height: 1em;
    font-weight: normal;
    margin: 0 0 10px 0;
  }

  #invoice .date {
    font-size: 1.1em;
    color: #777777;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
  }

  table th,
  table td {
    padding: 20px;
    background: #EEEEEE;
    text-align: center;
    border-bottom: 1px solid #FFFFFF;
  }

  table th {
    white-space: nowrap;
    font-weight: normal;
  }

  table td {
    text-align: right;
  }

  table td h3 {
    color: #57B223;
    font-size: 1.2em;
    font-weight: normal;
    margin: 0 0 0.2em 0;
  }

  table .no {
    color: #FFFFFF;
    font-size: 1.6em;
    background: #57B223;
  }

  table .desc {
    text-align: left;
  }

  table .unit {
    background: #DDDDDD;
  }

  table .qty {}

  table .total {
    background: #57B223;
    color: #FFFFFF;
  }

  table td.unit,
  table td.qty,
  table td.total {
    font-size: 1.2em;
  }

  table tbody tr:last-child td {
    border: none;
  }

  table tfoot td {
    padding: 10px 20px;
    background: #FFFFFF;
    border-bottom: none;
    font-size: 1.2em;
    white-space: nowrap;
    border-top: 1px solid #AAAAAA;
  }

  table tfoot tr:first-child td {
    border-top: none;
  }

  table tfoot tr:last-child td {
    color: #57B223;
    font-size: 1.4em;
    border-top: 1px solid #57B223;

  }

  table tfoot tr td:first-child {
    border: none;
  }

  #thanks {
    font-size: 2em;
    margin-bottom: 50px;
  }

  #notices {
    padding-left: 6px;
    border-left: 6px solid #0087C3;
  }

  #notices .notice {
    font-size: 1.2em;
  }

  footer {
    color: #777777;
    width: 100%;
    height: 30px;
    position: absolute;
    bottom: 0;
    border-top: 1px solid #AAAAAA;
    padding: 8px 0;
    text-align: center;
  }

  /* .imgs {
    background-image:url('p/logo.png') ;
  } */
</style> -->
<style>
  .imgs {
    background-image: url('logo.png');
  }
</style>

<body>
  <header class="clearfix">
    <div class="text-danger">
    </div>
    <div id="company">
      <hr>
      <h1 class="name" style="text-align: center; color:navy ;">PT Rechmand Technology</h1>
      <hr>
      <div>Invoice : <?= $id ?></div>
      <div>Tanggal : <?= $header->tgl_trans ?></div>
      <div>No. Referensi : <?= $header->ref_id ?></div>
<br>
      <?php if ($header->jns_trans == 'out') { ?>
        <div>Customer : <?= $header->nm_cust ?></div>
      <?php } else { ?>
        <div>Supplier : <?= $header->nm_supp ?></div>
      <?php } ?>

      <div>No. Telepon : <?= isset($header->s_telp) ? $header->s_telp : $header->c_telp ?></div>
      <div>Alamat : <?= isset($header->s_alamat) ? $header->s_alamat : $header->c_alamat ?></a></div>
    </div>
    </div>
  </header>

  <!-- <main>
    <div id="details" class="clearfix">
      <div id="client">
        <div class="to">JENIS TRANSAKSI:</div>
        <h2 class="name">Transaksi Masuk</h2>
        <div class="address">Supplier</div>
        <div class="address">796 Silver Harbour, TX 79273, US</div>
      </div>
      <div id="invoice">
        <h1>KODE TRANSAKSI</h1>
        <div class="date">Tanggal Transaksi: 30/06/2014</div>
        <div class="date">No. Invoice: 34534534</div>
      </div>
    </div>
    <table border="0" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th class="no">No.</th>
          <th class="desc">KODE BARANG</th>
          <th class="unit">NAMA BARANG</th>
          <th class="qty">QUANTITY</th>
          <th class="total">HARGA</th>
          <th class="total">TOTAL</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="no">01</td>
          <td class="desc">
            <h3>Website Design</h3>
          </td>
          <td class="unit">$40.00</td>
          <td class="qty">30</td>
          <td class="total">$1,200.00</td>
          <td class="total">$1,200.00</td>
        </tr>
        <tr>
          <td class="no">02</td>
          <td class="desc">
            <h3>Website Development</h3>
          </td>
          <td class="unit">$40.00</td>
          <td class="qty">80</td>
          <td class="total">$3,200.00</td>
          <td class="total">$3,200.00</td>
        </tr>
        <tr>
          <td class="no">03</td>
          <td class="desc">
            <h3>Search Engines Optimization</h3>
          </td>
          <td class="unit">$40.00</td>
          <td class="qty">20</td>
          <td class="total">$800.00</td>
          <td class="total">$800.00</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"></td>
          <td colspan="2">SUBTOTAL</td>
          <td>$5,200.00</td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td colspan="2">TAX 25%</td>
          <td>$1,300.00</td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td colspan="2">GRAND TOTAL</td>
          <td>$6,500.00</td>
        </tr>
      </tfoot>
    </table>
    <div id="thanks">Thank you!</div>
    <div id="notices">
      <div>NOTICE:</div>
      <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
    </div>
  </main>
  <footer>
    Invoice was created on a computer and is valid without the signature and seal.
  </footer> -->

  <div class="row">
    <div class="col-md-12 col-lg-6 pt-1">
      <h3 style="margin-bottom:1px ;" class="mb-3">Data Detail</h3>
      <hr>
      <div class="table-responsive">

        <table class="table table-striped table-sm" style="width:fit-content; border-style:solid ;" border="1">
          <thead style="background-color:navy; color:white">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Kode Barang</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Qty</th>
              <th scope="col">Harga</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <?php if ($bayar) : ?>
            <tbody>
              <?php
              $no = 1;
              foreach ($bayar as $vdata) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $vdata->kdbarang ?></td>
                  <td><?= $vdata->nmbarang ?></td>
                  <td><?= $vdata->qty ?> Pcs</td>
                  <td>Rp.<?= $vdata->hargaunit ?></td>
                  <td>Rp.<?= $vdata->totalharga ?></td>

                </tr>
              <?php endforeach  ?>
            </tbody>
            <tr>
              <th colspan="3" style="color: black;">Total</th>
              <th style="color: black;"><?= $total->qtytotal  ?></th>
              <th style="color: black;"></th>
              <th style="color: black;">Rp.<?= number_format($total->sumtotal, 0)  ?></th>
            </tr>
        </table>
      <?php else : ?>
        <hr>
        <h1 class="name" style="text-align: center; color:brown ;">Data Kosong</h1>
        <hr>
      <?php endif ?>
      <hr>
      </div>
    </div>

  </div>

</body>


</html>