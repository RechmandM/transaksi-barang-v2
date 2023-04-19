<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Print</title>
  <link rel="stylesheet" href="p/style.css">
</head>

<style>
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
</style>

<body>
  <header class="clearfix">
    <div id="logo">
      <img src="logo.png" alt="" srcset="">
      
    </div>
    <div id="company">
      <h2 class="name">PT Maju Mundur</h2>
      <div>Invoice :
        <!-- <?= $id ?> -->
      </div>
      <div>Tgl :
        <!-- <?= $header->tgl_trans ?> -->
      </div>
      <div>No. Referensi :
        <!-- <?= $header->ref_id ?> -->
      </div>
      <!-- 
      <?php if ($header->jns_trans == 'out') { ?>
      <div>Customer :
        <?= $header->nm_cust ?>
      </div>
      <?php } else { ?>
      <div>Supplier :
        <?= $header->nm_supp ?>
      </div>
      <?php } ?> -->

      <div>(602) 519-0450</div>
      <div><a href="mailto:company@example.com">company@example.com</a></div>
    </div>
    </div>
  </header>
  <!-- <main >
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
            <td class="desc"><h3>Website Design</h3></td>
            <td class="unit">$40.00</td>
            <td class="qty">30</td>
            <td class="total">$1,200.00</td>
            <td class="total">$1,200.00</td>
          </tr>
          <tr>
            <td class="no">02</td>
            <td class="desc"><h3>Website Development</h3></td>
            <td class="unit">$40.00</td>
            <td class="qty">80</td>
            <td class="total">$3,200.00</td>
            <td class="total">$3,200.00</td>
          </tr>
          <tr>
            <td class="no">03</td>
            <td class="desc"><h3>Search Engines Optimization</h3></td>
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
      <h4 class="mb-3">Data Detail</h4>
      <div class="table-responsive">
        <!-- <?php if ($bayar) : ?> -->
        <table class="table table-striped table-sm">
          <thead class="text-white" style="background-color:#2C324F;">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Kode Barang</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Qty</th>
              <th scope="col">Harga</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <!-- <tbody>
            <?php
                $no = 1;
                foreach ($bayar as $vdata) : ?>
            <tr>
              <td>
                <?= $no++; ?>
              </td>
              <td>
                <?= $vdata->kdbarang ?>
              </td>
              <td>
                <?= $vdata->nmbarang ?>
              </td>
              <td>
                <?= $vdata->qty ?>
              </td>
              <td>
                <?= $vdata->hargaunit ?>
              </td>
              <td>
                <?= $vdata->totalharga ?>
              </td>

            </tr>
            <?php endforeach  ?>
          </tbody> -->
          <tr>
            <th colspan="3" style="color: black;">Total</th>
            <th style="color: black;">
              <?= $total->qtytotal  ?>
            </th>
            <th style="color: black;"></th>
            <th style="color: black;">
              <?= $total->sumtotal  ?>
            </th>
          </tr>
        </table>
        <!-- <?php endif ?> -->
      </div>
    </div>

  </div>

</body>


</html>