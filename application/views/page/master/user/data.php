<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
	<meta charset="utf-8">
	<h2>Data User</h2>

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
		<a class="btn btnku fw-bold text-uppercase" href="datauser/add">Tambah User</a>
		<div class="table-responsive mt-3 ayam">
			<table class="table table-striped table-sm">
				<thead class="text-white" style="background-color:#2C324F;">
					<tr>
						<th scope="col">No.</th>
						<th scope="col">Username</th>
						<th scope="col">Nama User</th>
						<th scope="col">Level</th>
						<th style="text-align:right ; padding-right:10em" scope="col">#</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$bu = 0;
					$co = "";
					if (!empty($model['Data'])) :
						foreach ($model['Data'] as $vdata) :
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
								<td class="pt-2"><?= $vdata->username ?></td>
								<td class="pt-2"><?= $vdata->nama ?></td>
								<td class="pt-2">
									<?= ($vdata->level == 1) ? 'Administrator' : 'Kasir' ?></td>

								<td>
									<a class="<?= ($vdata->level == 1) ? 'd-none' : '' ?>  btn btn-danger pt-1 float-end btn-delete" href="<?= $base ?>datauser/delete/<?= $vdata->id ?>/<?= $vdata->nama ?>">
										Delete</a>
									<a style="margin-right:4px;" class="btn btn-edit pt-1 float-end" href="<?= $base ?>datauser/edit/<?= $vdata->id ?>">
										Edit</a>
									<!-- <a style="margin-right:4px;" class="btn btn-outline pt-1 float-end" href="databarang/edit/<?= $vdata->id ?>"> -->
									<!-- <a style="margin-right:4px; <?= $co ?>" class="btn btn-edit pt-1 float-end" href="databarang/edit/<?= $vdata->id ?>"> -->
								</td>
							</tr>
						<?php endforeach ?>
					<?php else : ?>
						<div style="padding: 10px;" class="container text-center card bg-opacity-10 bg-dark mt-2">
							<h3 class="text-uppercase">Data Barang Kosong</h3>
							<h4>Silahkan tambahkan dahulu..</h4>
						</div>
					<?php endif ?>
				</tbody>
			</table>
			<?php
			echo $model['pagination'];
			?>
		</div>
	</div>

</main>