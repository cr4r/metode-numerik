<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Metode Selisih Mundur</h1>
    <!-- DataTales Example -->
    <?php
          if(isset($_POST['submit'])):
            $batas_bawah = floatval(getPost('batas_bawah'));
            $batas_atas = floatval(getPost('batas_atas'));
            $jarak = floatval(getPost('jarak'));

            $index = 1;
    ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Hasil Perhitungan</h6>
                    </div>
                    <div class="card-body mb-4">
                        <table class="table table-bordered">
                            <tr>
                                <td width="200px">Batas Atas (x0)</td>
                                <td width="10px">:</td>
                                <td><?= $batas_bawah; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Batas Bawah (x1)</td>
                                <td width="10px">:</td>
                                <td><?= $batas_atas; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Jarak (h)</td>
                                <td width="10px">:</td>
                                <td><?= $jarak; ?></td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="5" class="bg-info text-center font-weight-bold text-white">
                                                Fungsi : f(x) = x<sup>2</sup>+2x+1
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>x</th>
                                            <th>f(x)</th>
                                            <th>f'(x)</th>
                                            <th>f<sup>'</sup>x - eksak</th>
                                            <th>error</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $x = 0;
                                            $index = 0;
                                            $h = $jarak;
                                            $jum_error = 0;
                                            while ($x <= $batas_atas + $h):
                                                $index++;

                                                $x1 = $x + $h;
                                                $x0 = $x - $h;


                                                $fx = pow($x, 2)+(2*$x)+1;
                                                $fx1 = pow($x1, 2)+(2*$x1)+1;
                                                $fx0 = pow($x0, 2)+(2*$x0)+1;
                                                
                                                $hasil = ($fx-$fx0)/$h;
                                                $feks = (2*$x+2);
                                                $error = abs($feks-$hasil);
                                                $jum_error = $jum_error + $error;
                                        ?>
                                        <tr>
                                            <td><?= number_format($x, 5); ?></td>
                                            <td><?= number_format($fx, 5); ?></td>
                                            <td><?= number_format($feks, 5); ?></td>
                                            <td><?= number_format($hasil, 5); ?></td>
                                            <td><?= number_format($error, 5); ?></td>
                                        </tr>
                                        <?php
                                            $x = $x1;
                                            endwhile; ?>
                                        <tr>
                                            <th colspan="5" class="bg-success text-center font-weight-bold text-white">
                                                Rata-rata error : <?= number_format($jum_error/$index, 6); ?>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    <?php else: ?>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
                    </div>
                    <div class="card-body mb-4">
                        <form action="<?php echo route_method("selisih-mundur") ?>" method="POST">
                            <div class="row">
                                <div class="col-md-10 offset-1">
                                    <div class="row form-group">
                                        <label for="" class="col-sm-4 pt-2 form-control-label">Fungsi</label>
                                        <div class="col-sm-8">
                                            <div class="form-control font-italic" style="background: #ddd;">
                                                f(x) = x<sup>2</sup>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="" class="col-sm-4 pt-2 form-control-label">Batas Bawah (a)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="batas_bawah" required>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="" class="col-sm-4 pt-2 form-control-label">Batas Atas (b)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="batas_atas" required>
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <label for="" class="col-sm-4 pt-2 form-control-label">Jarak (h)</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="jarak" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-sm-4 offset-4">
                                            <button name="submit" class="btn btn-primary btn-block" type="submit">Submit</button>
                                        </div>
                                        <div class="col-sm-4">
                                            <button class="btn btn-secondary btn-block" type="reset">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>
<!-- /.container-fluid -->
