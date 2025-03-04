<?php
    $Prod_order = isset($_GET['prod_order']) ? $_GET['prod_order'] : '';
?>
<head>
    <style>
        .button-container {
            position: relative;
            display: inline-block;
        }

        .new-label {
            background-color: yellow; /* Warna latar belakang label */
            color: black; /* Warna teks label */
            padding: 5px 10px; /* Padding untuk label */
            border-radius: 5px; /* Sudut melengkung */
            position: absolute; /* Posisi absolut untuk label */
            top: -15px; /* Atur posisi vertikal */
            right: -80px; /* Atur posisi horizontal */
            font-weight: bold; /* Tebal */
            font-size: 12px; /* Ukuran font */
        }
        
        .new-label-tabel {
            background-color: yellow; /* Warna latar belakang label */
            color: black; /* Warna teks label */
            padding: 5px 10px; /* Padding untuk label */
            border-radius: 5px; /* Sudut melengkung */
            position: absolute; /* Posisi absolut untuk label */
            top: -10px; /* Atur posisi vertikal */
            right: -40px; /* Atur posisi horizontal */
            font-weight: bold; /* Tebal */
            font-size: 12px; /* Ukuran font */
        }
    </style>
</head>
<!-- Main content -->
<div class="container-fluid">
    <form role="form" method="post" enctype="multipart/form-data" name="form1">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Filter Data Production Order</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group row">
                    <label for="demand" class="col-md-1 col-form-label">Prod. Order</label>
                    <div class="col-sm-2">
                        <div class="button-container">
                            <input class="form-control form-control-sm" onchange="window.location = 'CetakKartuGerobak-'+this.value" value="<?= $Prod_order; ?>" type="text" name="prod_order" id="prod_order" placeholder="" required>
                            <span class="new-label">Perubahan Fitur Pencarian</span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-12">*Note : Setelah memasukan Prod. Order, silahkan di <b>TAB</b> saja. Tidak perlu di <b>ENTER</b>. Terimakasih</label>
                </div>
                <!-- <button class="btn btn-info" type="submit">Cari Data</button> -->
            </div>

        </div>
        <!-- /.card-body -->
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Detail Data Production Order</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-sm table-bordered table-striped" style="font-size: 13px; text-align: center;">
            <thead>
                <tr>
                    <th rowspan="2" valign="middle" style="text-align: center">No</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Aksi</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Status</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Prod. Demand</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Prod. Order</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Delivery Date</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Customer</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Full Item</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Description</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Color Name</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Project</th>
                    <th colspan="2" valign="middle" style="text-align: center">Qty Bagi Kain</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Status Terakhir</th>
                    <th rowspan="2" valign="middle" style="text-align: center">External Reference</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Internal Reference</th>
                </tr>
                <tr>
                    <th valign="middle" style="text-align: center">KG</th>
                    <th valign="middle" style="text-align: center">Yard</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $no = 1;
                $c = 0;
                $dataMain = "SELECT * FROM ITXVIEW_MEMOPENTINGPPC WHERE NO_KK = '$Prod_order'";
                $resultMain   = db2_exec($conn1, $dataMain);
                while ($dataMain = db2_fetch_assoc($resultMain)) {
                    $resultStatusTerakhir = db2_exec($conn1, "SELECT
                                                                    *
                                                                FROM
                                                                    ITXVIEW_POSISI_KARTU_KERJA ipkk
                                                                WHERE
                                                                    PRODUCTIONORDERCODE = '$dataMain[NO_KK]'
                                                                    AND PRODUCTIONDEMANDCODE = '$dataMain[DEMAND]'
                                                                    AND (STATUS_OPERATION = 'Entered' OR STATUS_OPERATION = 'Progress')
                                                                ORDER BY
                                                                    STEPNUMBER ASC LIMIT 1");
                    $dataStatusTerakhir = db2_fetch_assoc($resultStatusTerakhir);

                    $resultDemand = db2_exec($conn1, "SELECT INTERNALREFERENCE, EXTERNALREFERENCE FROM PRODUCTIONDEMAND p WHERE CODE = '$dataMain[DEMAND]'");
                    $dataDemand = db2_fetch_assoc($resultDemand);
            ?>
                <tr>
                    <td style="text-align: center"><?= $no++; ?></td>
                    <td style="text-align: center">
                        <div class="btn-group">
                            <a href="pages/cetak/cetak_kartu_gerobak_salinan.php?demand=<?= $dataMain['DEMAND'] ?>&nokk=<?= $Prod_order; ?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-print" data-toggle="tooltip" data-placement="top"></i></a>
                        </div>
                    </td>
                    <td style="text-align: center">
                        <div class="button-container">
                            <a href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=<?= TRIM($dataMain['DEMAND']); ?>&prod_order=<?= TRIM($Prod_order); ?>" class="btn btn-sm btn-success" target="_blank">
                                <i class="fa fa-lightbulb"></i>
                            </a>
                            <span class="new-label-tabel">Baru</span>
                        </div>
                    </td>
                    <td style="text-align: center"><?= $dataMain['DEMAND']; ?></td>
                    <td style="text-align: center"><?= $dataMain['NO_KK']; ?></td>
                    <td style="text-align: center"><?= $dataMain['DELIVERY']; ?></td>
                    <td style="text-align: left"><?= $dataMain['LANGGANAN']; ?> / <?= $dataMain['BUYER']; ?></td>
                    <td style="text-align: left"><?= $dataMain['KETERANGAN_PRODUCT']; ?></td>
                    <td style="text-align: left"><?= $dataMain['JENIS_KAIN']; ?></td>
                    <td style="text-align: center"><?= $dataMain['WARNA']; ?></td>
                    <td style="text-align: center"><?= $dataMain['NO_ORDER']; ?></td>
                    <td style="text-align: center"><?= $dataMain['QTY_BAGIKAIN']; ?></td>
                    <td style="text-align: center"><?= $dataMain['QTY_BAGIKAIN_YD_MTR']; ?></td>
                    <td style="text-align: center"><?= !empty($dataStatusTerakhir['LONGDESCRIPTION']) ? $dataStatusTerakhir['LONGDESCRIPTION'] : 'KK OKE'; ?></td>
                    <td style="text-align: center"><?= $dataDemand['EXTERNALREFERENCE'] ?></td>
                    <td style="text-align: center"><?= $dataDemand['INTERNALREFERENCE'] ?></td>
                </tr>
            <?php $no++; } ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
</form>
</div><!-- /.container-fluid -->
<!-- /.content -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
    $(function() {
        //Datepicker
        $('#datepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#datepicker1').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#datepicker2').datetimepicker({
            format: 'YYYY-MM-DD'
        });

    });
</script>
<script type="text/javascript">
    function checkAll(form1) {
        for (var i = 0; i < document.forms['form1'].elements.length; i++) {
            var e = document.forms['form1'].elements[i];
            if ((e.name != 'allbox') && (e.type == 'checkbox')) {
                e.checked = document.forms['form1'].allbox.checked;

            }
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>