<?php
// $level = $_SESSION['level'];
// if ($level != 1) {

//     echo "<link href='style.css' rel='stylesheet' type='text/css'>
//  <center><h3>Anda tidak memiliki akses untuk halaman ini</h3></center> <br>";
//     return;
// }
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
    <h2>Data Supplier</h2>

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
        <a class="btn btnku btn-primary fw-bold text-uppercase" href="<?= $base ?>datasupplier/add">Tambah Supplier</a>
        <div class="table-responsive mt-3 ayam">
            <table class="table table-striped table-sm">
                <thead class="text-white" style="background-color:#2C324F;">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Kode Supplier</th>
                        <th scope="col">Nama Supplier</th>
                        <th scope="col">Telp</th>
                        <th scope="col">Alamat</th>
                        <th style="text-align:right ; padding-right:10em" scope="col">#</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    if (!empty($model['Data'])) :
                        foreach ($model['Data'] as $vdata) : ?>
                            <tr>
                                <td class="pt-2"><?= $no++ ?></td>
                                <td class="pt-2"><?= $vdata->id ?></td>
                                <td class="pt-2"><?= $vdata->nm_supp ?></td>
                                <td class="pt-2"><?= $vdata->telp ?></td>
                                <td class="pt-2"><?= $vdata->alamat ?></td>
                                <td>
                                    <a class="btn btn-danger pt-1 float-end btn-delete" href="<?= $base ?>datasupplier/delete/<?= $vdata->id ?>/<?= $vdata->nm_supp ?>">
                                        Delete</a>
                                    <a style="margin-right:4px;" class="btn btn-edit pt-1 btn-outline-primary pt-1 float-end" href="<?= $base ?>datasupplier/edit/<?= $vdata->id ?>">
                                        Edit</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <div style="padding: 10px;" class="container text-center card bg-opacity-10 bg-dark mt-2">
                            <h3 class="text-uppercase">Data Supplier Kosong</h3>
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