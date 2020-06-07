<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Metode Tabel</h1>
    <!-- DataTales Example -->
    <?php
          if(isset($_POST['submit'])):
            $batas_atas = floatval(getPost('batas_atas'));
            $batas_bawah = floatval(getPost('batas_bawah'));
            $jumlah_iterasi = floatval(getPost('jumlah_iterasi'));

            $step_pembagi = ($batas_atas-$batas_bawah) / $jumlah_iterasi;
            $index = 1;
    ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Hasil Perhitungan</h6>
                    </div>
                    <div class="card-body mb-4">
                        <table class="table table-bordered">
                            <tr>
                                <td width="200px">Batas Atas (a)</td>
                                <td width="10px">:</td>
                                <td><?= $batas_atas; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Batas Bawah (b)</td>
                                <td width="10px">:</td>
                                <td><?= $batas_bawah; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Jumlah Iterasi (N)</td>
                                <td width="10px">:</td>
                                <td><?= $jumlah_iterasi; ?></td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="bg-info text-center font-weight-bold text-white">
                                                Fungsi : f(x) = 1+xe<sup>-x</sup>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>iterasi</th>
                                            <th>x</th>
                                            <th>f(x)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for($i=0; $i <= $jumlah_iterasi; $i++):
                                            $x = $batas_bawah+$i*$step_pembagi;
                                            $fx = f($x);

                                            //f(Xk+1)
                                            $x2 = $batas_bawah+($i+1)*$step_pembagi;
                                            $fx2 = f($x2);
                                        ?>
                                            <tr>
                                                <td><?= $index++; ?></td>
                                                <td><?= number_format($x, 1); ?></td>
                                                <td><?= number_format($fx,4); ?></td>
                                            </tr>

                                        <?php if(f($x) == 0): ?>
                                            <tr class="bg-success text-white font-weight-bold">
                                                <td colspan="3">
                                                    Akar persamaan ditemukan pada nilai x = <?= number_format($x, 5); ?> dengan nilai f(x) = <?= number_format($fx, 5) ?>
                                                </td>
                                            </tr>
                                        <?php
                                                break;
                                            elseif(($fx*$fx2) < 0):
                                                if(abs($fx) < abs($fx2)):
                                        ?>
                                                    <tr class="bg-success text-white font-weight-bold">
                                                        <td colspan="3">
                                                            Akar persamaan x mendekati nilai x = <?= number_format($x, 5); ?> dengan nilai f(x) = <?= number_format($fx, 5) ?>
                                                        </td>
                                                    </tr>
                                        <?php
                                                    break;
                                                else:?>
                                                    <tr class="bg-success text-white font-weight-bold">
                                                        <td colspan="3">
                                                            Akar persamaan x mendekati nilai x = <?= number_format($x2, 5); ?> dengan nilai f(x) = <?= number_format($fx2, 5); ?>
                                                        </td>
                                                    </tr>
                                        <?php
                                                    break;
                                                endif;
                                            endif;
                                        ?>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="bg-info text-center font-weight-bold text-white">
                                                Fungsi : g(x) = x+e<sup>-x</sup>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>iterasi</th>
                                            <th>x</th>
                                            <th>f(x)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $index = 1;
                                        for($j=0; $j <= $jumlah_iterasi; $j++):
                                            $x = $batas_bawah+$j*$step_pembagi;
                                            $gx = g($x);

                                            //f(Xk+1)
                                            $x2 = $batas_bawah+($j+1)*$step_pembagi;
                                            $gx2 = g($x2);
                                        ?>
                                            <tr>
                                                <td><?= $index++; ?></td>
                                                <td><?= number_format($x, 1); ?></td>
                                                <td><?= number_format($gx,4); ?></td>
                                            </tr>

                                        <?php if($gx == 0): ?>
                                            <tr class="bg-success text-white font-weight-bold">
                                                <td colspan="3">
                                                    Akar persamaan ditemukan pada nilai x = <?= number_format($x, 5); ?> dengan nilai g(x) = <?= number_format($gx, 5) ?>
                                                </td>
                                            </tr>
                                        <?php
                                                break;
                                            elseif(($gx*$gx2) < 0):
                                                if(abs($gx) < abs($gx2)):
                                        ?>
                                                    <tr class="bg-success text-white font-weight-bold">
                                                        <td colspan="3">
                                                            Akar persamaan x mendekati nilai x = <?= number_format($x, 5); ?> dengan nilai g(x) = <?= number_format($gx, 5) ?>
                                                        </td>
                                                    </tr>
                                        <?php
                                                    break;
                                                else:?>
                                                    <tr class="bg-success text-white font-weight-bold">
                                                        <td colspan="3">
                                                            Akar persamaan x mendekati nilai x = <?= number_format($x2, 5); ?> dengan nilai g(x) = <?= number_format($gx2, 5); ?>
                                                        </td>
                                                    </tr>
                                        <?php
                                                    break;
                                                endif;
                                            endif;
                                        ?>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="bg-info text-center font-weight-bold text-white">
                                                Fungsi : h(x) = x<sup>2</sup>-(x+1).e<sup>-x</sup>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>iterasi</th>
                                            <th>x</th>
                                            <th>f(x)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $index = 1;
                                        for($j=0; $j <= $jumlah_iterasi; $j++):
                                            $x = $batas_bawah+$j*$step_pembagi;
                                            $hx = h($x);

                                            //f(Xk+1)
                                            $x2 = $batas_bawah+($j+1)*$step_pembagi;
                                            $hx2 = h($x2);
                                        ?>
                                            <tr>
                                                <td><?= $index++; ?></td>
                                                <td><?= number_format($x, 1); ?></td>
                                                <td><?= number_format($hx,4); ?></td>
                                            </tr>

                                        <?php if($hx == 0): ?>
                                            <tr class="bg-success text-white font-weight-bold">
                                                <td colspan="3">
                                                    Akar persamaan ditemukan pada nilai x = <?= number_format($x, 5); ?> dengan nilai h(x) = <?= number_format($hx, 5) ?>
                                                </td>
                                            </tr>
                                        <?php
                                                break;
                                            elseif(($hx*$hx2) < 0):
                                                if(abs($hx) < abs($hx2)):
                                        ?>
                                                    <tr class="bg-success text-white font-weight-bold">
                                                        <td colspan="3">
                                                            Akar persamaan x mendekati nilai x = <?= number_format($x, 5); ?> dengan nilai h(x) = <?= number_format($hx, 5) ?>
                                                        </td>
                                                    </tr>
                                        <?php
                                                    break;
                                                else:?>
                                                    <tr class="bg-success text-white font-weight-bold">
                                                        <td colspan="3">
                                                            Akar persamaan x mendekati nilai x = <?= number_format($x2, 5); ?> dengan nilai h(x) = <?= number_format($hx2, 5); ?>
                                                        </td>
                                                    </tr>
                                        <?php
                                                    break;
                                                endif;
                                            endif;
                                        ?>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
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
                        <form action="<?php echo route_method("tabel") ?>" method="POST">
                            <div class="row">
                                <div class="col-md-10 offset-1">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="" class="form-control-label">Batas Atas (a)</label>
                                            <input type="text" class="form-control" name="batas_atas" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="" class="form-control-label">Batas Bawah (b)</label>
                                            <input type="text" class="form-control" name="batas_bawah" required>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <label for="" class="form-control-label">Jumlah iterasi (N)</label>
                                            <input type="text" name="jumlah_iterasi" class="form-control" required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="" class="form-control-label">&nbsp;</label>
                                            <button name="submit" class="btn btn-primary btn-block" type="submit">Submit</button>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="" class="form-control-label">&nbsp;</label>
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
