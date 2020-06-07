<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Metode Newton Raphson</h1>
    <!-- DataTales Example -->
    <?php
          if(isset($_POST['submit'])):
            $x_nol = floatval(getPost('x_nol'));
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
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="8" class="bg-info text-center font-weight-bold text-white">
                                                Fungsi 1 : f(x) = x-e<sup>-x</sup> dengan nilai f<sup>'</sup>(x) = 1+e<sup>-x</sup>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>i</th>
                                            <th>x</th>
                                            <th>f(x)</th>
                                            <th>f<sup>'</sup>(x)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $fx = f_nr($x_nol);
                                        $f_aksen_x = f_aksen_nr($x_nol);

                                        for($i=0; $i < $jumlah_iterasi; $i++):
                                            if($i > 0) {
                                                $x_nol = $x;
                                            }
                                            
                                            $x = $x_nol - ($fx/$f_aksen_x);
                                            $fx = f_nr($x);
                                            $f_aksen_x = f_aksen_nr($x);
                                        ?>
                                            <tr>
                                                <td><?= $index++; ?></td>
                                                <td><?= number_format($x, 5); ?></td>
                                                <td><?= number_format($fx, 5); ?></td>
                                                <td><?= number_format($f_aksen_x, 5); ?></td>
                                            </tr>

                                        <?php if($i+1 == $jumlah_iterasi || (abs($fx) < $toleransi_error)): ?>
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
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="8" class="bg-info text-center font-weight-bold text-white">
                                                Fungsi 2 : f(x) = 4x<sup>3</sup>-15x<sup>2</sup>-17x-6 dengan nilai f<sup>'</sup>(x) = 12x<sup>2</sup>-30x+17
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>i</th>
                                            <th>x</th>
                                            <th>f(x)</th>
                                            <th>f<sup>'</sup>(x)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $x_nol = floatval(getPost('x_nol'));
                                        $index = 1;

                                        $fx = f_nr_2($x_nol);
                                        $f_aksen_x = f_aksen_nr_2($x_nol);

                                        for($i=0; $i < $jumlah_iterasi; $i++):
                                            if($i > 0) {
                                                $x_nol = $x;
                                            }
                                            
                                            $x = $x_nol - ($fx/$f_aksen_x);
                                            $fx = f_nr_2($x);
                                            $f_aksen_x = f_aksen_nr_2($x);
                                        ?>
                                            <tr>
                                                <td><?= $index++; ?></td>
                                                <td><?= number_format($x, 5); ?></td>
                                                <td><?= number_format($fx, 5); ?></td>
                                                <td><?= number_format($f_aksen_x, 5); ?></td>
                                            </tr>

                                        <?php if($i+1 == $jumlah_iterasi || (abs($fx) < $toleransi_error)): ?>
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
                        <form action="<?php echo route_method("newton-raphson") ?>" method="POST">
                            <div class="row">
                                <div class="col-md-10 offset-1">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="" class="form-control-label">Nilai Awal (x0)</label>
                                            <input type="text" class="form-control" name="x_nol" required>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="" class="form-control-label">Jumlah iterasi (N)</label>
                                            <input type="text" name="jumlah_iterasi" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <label for="" class="form-control-label">Toleransi Error (e)</label>
                                            <input type="text" name="toleransi_error" class="form-control" required>
                                        </div>
                                        <div class="col-sm-3 mt-4">
                                            <button name="submit" class="btn btn-primary btn-block" type="submit">Submit</button>
                                        </div>
                                        <div class="col-sm-3 mt-4">
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
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td style="width: 15px;">f(x)</td>
                                    <td style="width: 20px;">=</td>
                                    <td>x-e<sup>-x</sup></td>
                                </tr>
                                <tr>
                                    <td>f<sup>'</sup>(x)</td>
                                    <td>=</td>
                                    <td>1+e<sup>-x</sup></td>
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
