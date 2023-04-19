<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
	<meta charset="utf-8">
	<h2>Data Barang</h2>

	<style type="text/css">
		::selection {
			background-color: #E13300;
			color: white;
		}

		::-moz-selection {
			background-color: #E13300;
			color: white;
		}



		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
			text-decoration: none;
		}

		a:hover {
			color: #97310e;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
			min-height: 96px;
		}

		p {
			margin: 0 0 10px;
			padding: 0;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			/* margin: 10px; */
			/* border: 1px solid #D0D0D0; */
			box-shadow: 0 0 5px #D0D0D0;
			padding: 15px;
		}

		.btn-edit2 {
			border: 2px solid black;
			border-color: #077AC7;
		}

		.btn-edit {
			border: 2px solid black;
			background-color: white;
			padding: 4px 20px;
			cursor: pointer;
			border-color: #2C324F;
			color: #2C324F;
			border-radius: 90px;
		}

		.btn-edit:hover {
			background-color: #2C324F;
			border-color: white;
			color: white;
			/* color: green; */
		}

		.btn-delete {
			border-radius: 90px;
		}

		.btnku {
			background-color: #2C324F;
			border: 2px solid;
			/* border-color: #077AC7; */
			/* border: 1px; */
			padding: 8px 20px;
			cursor: pointer;
			color: white;
			border-radius: 90px;
		}

		.btnku:hover {
			background-color: white;
			/* border: 2px solid black; */
			border: 2px solid;
			border-color: #2C324F;
			color: #2C324F;
			/* color: green; */
		}

		.ayam {
			border-radius: 4px;
		}
	</style>

	<div id="container">
		<a class="btn btnku fw-bold text-uppercase" href="databarang/add">Tambah Barang</a>
		<div class="table-responsive mt-3 ayam">
			<?php if ($databarang) : ?>
				<table class="table table-striped table-sm">
					<thead class="text-white" style="background-color:#2C324F;">
						<tr>
							<th scope="col">No.</th>
							<th scope="col">Gambar</th>
							<th scope="col">Kode Barang</th>
							<th scope="col">Nama Barang</th>
							<th scope="col">Stock</th>
							<th style="text-align:right ; padding-right:10em" scope="col">#</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$bu = 0;
						$co = "";
						foreach ($databarang as $vdata) :
							if ($bu == 1) {
								$bu -= 1;
								$co = "background-color: #F3F3F3;";
							} else {
								$bu += 1;
								$co = "background-color: white;";
							}
						?>
							<tr>
								<td class="pt-2 fw-bold"><?= $no++ ?></td>
								<td class="pt-2">
									<img src="<?= $base ?>assets/img/upload/<?= ($vdata->file_gambar == null) ? 'default.png' : $vdata->file_gambar ?>" class="img-thumbnail" border="0" height="100" width="130" style="max-width: 130px;" alt="img">
								</td>
								<td class="pt-2"><?= $vdata->kdbarang ?></td>
								<td class="pt-2"><?= $vdata->nmbarang ?></td>
								<td class="pt-2"><?= $vdata->stok_mn ?></td>
								<!-- <td>
								<a href="<?= $base ?>databarang/edit/<?= $vdata->kdbarang ?>">
									<i class="nav-icon fas fa-pencil fw-bold">Edit</i></a>
								||
								<a href="<?= $base ?>databarang/delete/<?= $vdata->kdbarang ?>">
									<i class="nav-icon fas fa-erase fw-bold">Delete</i></a>
							</td> -->
								<td>
									<a class="btn btn-danger pt-1 float-end btn-delete" href="databarang/delete/<?= $vdata->kdbarang ?>/<?= $vdata->nmbarang ?>">
										Delete</a>
									<!-- <a style="margin-right:4px;" class="btn btn-outline pt-1 float-end" href="databarang/edit/<?= $vdata->kdbarang ?>"> -->
									<!-- <a style="margin-right:4px; <?= $co ?>" class="btn btn-edit pt-1 float-end" href="databarang/edit/<?= $vdata->kdbarang ?>"> -->
									<a style="margin-right:4px;" class="btn btn-edit pt-1 float-end" href="databarang/edit/<?= $vdata->kdbarang ?>">
										Edit</a>
								</td>
							</tr>
						<?php endforeach ?>

					</tbody>
				</table>
			<?php else : ?>
				<div style="padding: 10px;" class="container text-center card bg-opacity-10 bg-dark mt-2">
					<h3 class="text-uppercase">Data Barang Kosong</h3>
					<h4>Silahkan tambahkan dahulu..</h4>
				</div>
			<?php endif ?>
		</div>
	</div>

</main>