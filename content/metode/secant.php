<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Metode Secant</h1>
    <!-- DataTales Example -->
    <?php
          if(isset($_POST['submit'])):
            $x_nol = floatval(getPost('x_nol'));
            $x_satu = floatval(getPost('x_satu'));
            $jumlah_iterasi = floatval(getPost('jumlah_iterasi'));
            $toleransi_error = (getPost('toleransi_error'));

            $index = 1;
    ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Hasil Perhitungan</h6>
                    </div>
                    <div class="card-body mb-4">
                        <table class="table table-bordered">
                            <tr>
                                <td width="200px">Nilai Awal (x0)</td>
                                <td width="10px">:</td>
                                <td><?= $x_nol; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Nilai Awal (x1)</td>
                                <td width="10px">:</td>
                                <td><?= $x_satu; ?></td>
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
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="bg-info text-center font-weight-bold text-white">
                                                Fungsi 1 : f(x) = x<sup>2</sup>-(x+1).e<sup>-x</sup>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>i</th>
                                            <th>x</th>
                                            <th>f(x)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $y_nol = f_secant($x_nol); //-0.168792135411, untuk range 0.8 dan 0.9
                                        $y_satu = f_secant($x_satu); //0.037517646492862, untuk range 0.8 dan 0.9

                                        for($i=0; $i < $jumlah_iterasi; $i++):
                                            if($i > 0) {
                                                $x_nol = $x;
                                                $y_nol = $y;
                                            }

                                            $x = $x_satu - ($y_satu*($x_satu-$x_nol) / ($y_satu - $y_nol));

                                            $y = f_secant($x);
                                        ?>
                                            <tr>
                                                <td><?= $index++; ?></td>
                                                <td><?= number_format($x, 5); ?></td>
                                                <td><?= number_format($y, 5); ?></td>
                                            </tr>

                                        <?php if($i+1 == $jumlah_iterasi || abs($x) < $jumlah_iterasi): ?>
                                            <tr class="bg-success text-white font-weight-bold">
                                                <td colspan="3">
                                                    Akar persamaan ditemukan pada nilai x = <?= number_format($x, 5); ?> dan nilai f(x) = <?= number_format($y, 5); ?>
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
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="bg-info text-center font-weight-bold text-white">
                                                Fungsi 2 : f(x) = e<sup>x</sup>-5x<sup>2</sup>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>i</th>
                                            <th>x</th>
                                            <th>f(x)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $index = 1;
                                        $y_nol = f_secant_2($x_nol); //-0.168792135411, untuk range 0.8 dan 0.9
                                        $y_satu = f_secant_2($x_satu); //0.037517646492862, untuk range 0.8 dan 0.9

                                        for($i=0; $i < $jumlah_iterasi; $i++):
                                            if($i > 0) {
                                                $x_nol = $x;
                                                $y_nol = $y;
                                            }

                                            $x = $x_satu - ($y_satu*($x_satu-$x_nol) / ($y_satu - $y_nol));

                                            $y = f_secant_2($x);
                                        ?>
                                            <tr>
                                                <td><?= $index++; ?></td>
                                                <td><?= number_format($x, 5); ?></td>
                                                <td><?= number_format($y, 5); ?></td>
                                            </tr>

                                        <?php if($i+1 == $jumlah_iterasi || abs($y) < $toleransi_error): ?>
                                            <tr class="bg-success text-white font-weight-bold">
                                                <td colspan="3">
                                                    Akar persamaan ditemukan pada nilai x = <?= number_format($x, 5); ?> dan nilai f(x) = <?= number_format($y, 5); ?>
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
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="bg-info text-center font-weight-bold text-white">
                                                Fungsi 3 : f(x) = x<sup>2</sup>-e<sup>x</sup>+2x
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>i</th>
                                            <th>x</th>
                                            <th>f(x)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $index = 1;
                                        $y_nol = f_secant_3($x_nol); //-0.168792135411, untuk range 0.8 dan 0.9
                                        $y_satu = f_secant_3($x_satu); //0.037517646492862, untuk range 0.8 dan 0.9

                                        for($i=0; $i < $jumlah_iterasi; $i++):
                                            if($i > 0) {
                                                $x_nol = $x;
                                                $y_nol = $y;
                                            }

                                            $x = $x_satu - ($y_satu*($x_satu-$x_nol) / ($y_satu - $y_nol));

                                            $y = f_secant_3($x);
                                        ?>
                                            <tr>
                                                <td><?= $index++; ?></td>
                                                <td><?= number_format($x, 5); ?></td>
                                                <td><?= number_format($y, 5); ?></td>
                                            </tr>

                                        <?php if($i+1 == $jumlah_iterasi || abs($y) < $toleransi_error): ?>
                                            <tr class="bg-success text-white font-weight-bold">
                                                <td colspan="3">
                                                    Akar persamaan ditemukan pada nilai x = <?= number_format($x, 5); ?> dan nilai f(x) = <?= number_format($y, 5); ?>
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
    <?php else: ?>
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
                    </div>
                    <div class="card-body mb-4">
                        <form action="<?php echo route_method("secant") ?>" method="POST">
                            <div class="row">
                                <div class="col-md-10 offset-1">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="" class="form-control-label">Nilai Awal (x0)</label>
                                            <input type="text" class="form-control" name="x_nol" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="" class="form-control-label">Nilai Awal (x1)</label>
                                            <input type="text" class="form-control" name="x_satu" required>
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
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Fungsi</h6>
                    </div>
                    <div class="card-body mb-5">
                        <table class="table table-bordered font-weight-bold">
                            <tbody>
                                <tr>
                                    <td style="width: 10px;">1)</td>
                                    <td>f(x) = x<sup>2</sup>-(x+1)*e<sup>-x</sup></td>
                                </tr>
                                <tr>
                                    <td>2)</td>
                                    <td>f(x) = e<sup>x</sup>-5x<sup>2</sup></td>
                                </tr>
                                <tr>
                                    <td>3)</td>
                                    <td>f(x) = x<sup>2</sup>-e<sup>x</sup>+2x</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>
<!-- /.container-fluid -->
