<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Metode Regula Falsi</h1>
    <!-- DataTales Example -->
    <?php
          if(isset($_POST['submit'])):
            $batas_atas = floatval(getPost('batas_atas'));
            $batas_bawah = floatval(getPost('batas_bawah'));
            $jumlah_iterasi = floatval(getPost('jumlah_iterasi'));
            $toleransi_error = (getPost('toleransi_error'));

            $index = 1;
            $fx_fa = 0;
    ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Hasil Perhitungan</h6>
                    </div>
                    <div class="card-body mb-4">
                        <table class="table table-bordered">
                            <tr>
                                <td width="200px">Batas Bawah (a)</td>
                                <td width="10px">:</td>
                                <td><?= $batas_bawah; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Batas Atas (b)</td>
                                <td width="10px">:</td>
                                <td><?= $batas_atas; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Jumlah Iterasi (N)</td>
                                <td width="10px">:</td>
                                <td><?= $jumlah_iterasi; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Toleransi Error (e)</td>
                                <td width="10px">:</td>
                                <td><?= $toleransi_error; ?></td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive" style="border: 1px solid #333;padding:10px;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="8" class="bg-info text-center font-weight-bold text-white">
                                                    Fungsi : f(x) = 1+xe<sup>-x</sup>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>i</th>
                                                <th>a</th>
                                                <th>b</th>
                                                <th>x</th>
                                                <th>f(x)</th>
                                                <th>f(a)</th>
                                                <th>f(b)</th>
                                                <th>f(x)*f(a)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for($i=0; $i < $jumlah_iterasi; $i++):
                                                if ($i > 0) {
                                                    $batas_atas = ($fx_fa < 0) ? $x : $batas_atas;
                                                    $batas_bawah = ($fx_fa > 0) ? $x : $batas_bawah;
                                                }

                                                $fa = f($batas_bawah);
                                                $fb = f($batas_atas);
                                                $x = (($fb*$batas_bawah)-($fa*$batas_atas))/($fb-$fa);

                                                $fx = f($x);
                                                $fx_fa = ($fx*$fa);
                                            ?>
                                                <tr>
                                                    <td><?= $index++; ?></td>
                                                    <td><?= number_format($batas_bawah, 5); ?></td>
                                                    <td><?= number_format($batas_atas, 5); ?></td>
                                                    <td><?= number_format($x, 5); ?></td>
                                                    <td><?= number_format($fx, 5); ?></td>
                                                    <td><?= number_format($fa, 5); ?></td>
                                                    <td><?= number_format($fb, 5); ?></td>
                                                    <td><?= number_format($fx_fa, 5); ?></td>
                                                </tr>

                                            <?php if(abs($fx) < $toleransi_error || $i>$jumlah_iterasi): ?>
                                                <tr class="bg-success text-white font-weight-bold">
                                                    <td colspan="8">
                                                        Akar persamaan ditemukan pada nilai x = <?= number_format($x, 5); ?> dengan nilai f(x) = <?= number_format($fx, 5) ?>
                                                    </td>
                                                </tr>
                                            <?php
                                                    break;
                                                endif;
                                            ?>
                                            <?php endfor; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="table-responsive" style="border: 1px solid #333;padding:10px;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="8" class="bg-info text-center font-weight-bold text-white">
                                                    Fungsi : g(x) = x+e<sup>-x</sup>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>i</th>
                                                <th>a</th>
                                                <th>b</th>
                                                <th>x</th>
                                                <th>g(x)</th>
                                                <th>g(a)</th>
                                                <th>g(b)</th>
                                                <th>g(x)*g(a)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $index = 1;
                                            for($i=0; $i < $jumlah_iterasi; $i++):
                                                if ($i > 0) {
                                                    $batas_atas = ($gx_ga < 0) ? $x : $batas_atas;
                                                    $batas_bawah = ($gx_ga > 0) ? $x : $batas_bawah;
                                                }

                                                $ga = g($batas_bawah);
                                                $gb = g($batas_atas);
                                                $x = (($gb*$batas_bawah)-($ga*$batas_atas))/($gb-$ga);

                                                $gx = g($x);
                                                $gx_ga = ($gx*$ga);
                                            ?>
                                                <tr>
                                                    <td><?= $index++; ?></td>
                                                    <td><?= number_format($batas_bawah, 5); ?></td>
                                                    <td><?= number_format($batas_atas, 5); ?></td>
                                                    <td><?= number_format($x, 5); ?></td>
                                                    <td><?= number_format($gx, 5); ?></td>
                                                    <td><?= number_format($ga, 5); ?></td>
                                                    <td><?= number_format($gb, 5); ?></td>
                                                    <td><?= number_format($gx_ga, 5); ?></td>
                                                </tr>

                                            <?php if(abs($gx) < $toleransi_error || $i>$jumlah_iterasi): ?>
                                                <tr class="bg-success text-white font-weight-bold">
                                                    <td colspan="8">
                                                        Akar persamaan ditemukan pada nilai x = <?= number_format($x, 5); ?> dengan nilai g(x) = <?= number_format($gx, 5) ?>
                                                    </td>
                                                </tr>
                                            <?php
                                                    break;
                                                endif;
                                            ?>
                                            <?php endfor; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="table-responsive" style="border: 1px solid #333;padding:10px;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="8" class="bg-info text-center font-weight-bold text-white">
                                                    Fungsi : h(x) = x<sup>2</sup>-(x+1).e<sup>-x</sup>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>i</th>
                                                <th>a</th>
                                                <th>b</th>
                                                <th>x</th>
                                                <th>h(x)</th>
                                                <th>h(a)</th>
                                                <th>h(b)</th>
                                                <th>h(x)*h(a)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $index = 1;
                                            for($i=0; $i < $jumlah_iterasi; $i++):
                                                if ($i > 0) {
                                                    $batas_atas = ($hx_ha < 0) ? $x : $batas_atas;
                                                    $batas_bawah = ($hx_ha > 0) ? $x : $batas_bawah;
                                                }

                                                $ha = h($batas_bawah);
                                                $hb = h($batas_atas);
                                                $x = (($hb*$batas_bawah)-($ha*$batas_atas))/($hb-$ha);

                                                $hx = h($x);
                                                $hx_ha = ($hx*$ha);
                                            ?>
                                                <tr>
                                                    <td><?= $index++; ?></td>
                                                    <td><?= number_format($batas_bawah, 5); ?></td>
                                                    <td><?= number_format($batas_atas, 5); ?></td>
                                                    <td><?= number_format($x, 5); ?></td>
                                                    <td><?= number_format($hx, 5); ?></td>
                                                    <td><?= number_format($ha, 5); ?></td>
                                                    <td><?= number_format($hb, 5); ?></td>
                                                    <td><?= number_format($hx_ha, 5); ?></td>
                                                </tr>

                                            <?php if(abs($hx) < $toleransi_error || $i>$jumlah_iterasi): ?>
                                                <tr class="bg-success text-white font-weight-bold">
                                                    <td colspan="8">
                                                        Akar persamaan ditemukan pada nilai x = <?= number_format($x, 5); ?> dengan nilai h(x) = <?= number_format($hx, 5) ?>
                                                    </td>
                                                </tr>
                                            <?php
                                                    break;
                                                endif;
                                            ?>
                                            <?php endfor; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php else: ?>
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
                    </div>
                    <div class="card-body mb-4">
                        <form action="<?php echo route_method("regula-falsi") ?>" method="POST">
                            <div class="row">
                                <div class="col-md-10 offset-1">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="" class="form-control-label">Batas Bawah (a)</label>
                                            <input type="text" class="form-control" name="batas_bawah" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="" class="form-control-label">Batas Atas (b)</label>
                                            <input type="text" class="form-control" name="batas_atas" required>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <label for="" class="form-control-label">Jumlah iterasi (N)</label>
                                            <input type="text" name="jumlah_iterasi" class="form-control" required>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <label for="" class="form-control-label">Toleransi Error (e)</label>
                                            <input type="text" name="toleransi_error" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-sm-3">
                                            <button name="submit" class="btn btn-primary btn-block" type="submit">Submit</button>
                                        </div>
                                        <div class="col-sm-3">
                                            <button class="btn btn-secondary btn-block" type="reset">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php require_once("__fungsi.php"); ?>
        </div>
    <?php endif; ?>

</div>
<!-- /.container-fluid -->
