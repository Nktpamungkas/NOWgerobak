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
                            <input class="form-control form-control-sm" onchange="window.location = 'CetakKartuGerobak-'+this.value" value="<?php echo $Prod_order;?>" type="text" name="prod_order" id="prod_order" placeholder="" required>
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
                $c  = 0;
                // $dataMain = "SELECT * FROM ITXVIEW_MEMOPENTINGPPC WHERE NO_KK = '$Prod_order'";
                $dataMain = "SELECT
                                    LISTAGG(TRIM(DEMAND),', ') AS DEMAND,
                                    NO_KK,
                                    LISTAGG((DELIVERY||' - '||TRIM(DEMAND)),', ') AS DELIVERY,
                                    LISTAGG(DISTINCT(LANGGANAN||' / '||BUYER),', ') AS LANGGANAN,
                                    SUM(QTY_BAGIKAIN) AS QTY_BAGIKAIN,
                                    SUM(QTY_BAGIKAIN_YD_MTR) AS QTY_BAGIKAIN_YD_MTR,
                                    SUM(NETTO) AS NETTO,
                                    MAX(KETERANGAN_PRODUCT) AS KETERANGAN_PRODUCT,
                                    MAX(JENIS_KAIN) AS JENIS_KAIN,
                                    MAX(WARNA) AS WARNA,
                                    LISTAGG(DISTINCT(TRIM(NO_ORDER) ||' - '||TRIM(DEMAND)),', ') AS NO_ORDER,
                                    LISTAGG(DISTINCT(TRIM(d.EXTERNALREFERENCE) ||' - '||TRIM(DEMAND)),', ') AS EXTERNALREFERENCE,
                                    LISTAGG(DISTINCT(TRIM(d.INTERNALREFERENCE) ||' - '||TRIM(DEMAND)),', ') AS INTERNALREFERENCE
                                --	*
                                FROM
                                    ITXVIEW_MEMOPENTINGPPC
                                LEFT JOIN PRODUCTIONDEMAND d ON d.CODE = DEMAND
                                WHERE
                                    NO_KK = '$Prod_order'
                                GROUP BY
                                    NO_KK
                                ";
                $resultMain = db2_exec($conn1, $dataMain);
                while ($dataMain = db2_fetch_assoc($resultMain)) {
                    $resultStatusTerakhir = db2_exec($conn1, "SELECT
                                                                STEPNUMBER,
                                                                LISTAGG((LONGDESCRIPTION||' - '||TRIM(PRODUCTIONDEMANDCODE)),', ') AS LONGDESCRIPTION
                                                                FROM
                                                                    ITXVIEW_POSISI_KARTU_KERJA ipkk
                                                                WHERE
                                                                    PRODUCTIONORDERCODE = '$dataMain[NO_KK]'
                                                                    AND (STATUS_OPERATION = 'Entered' OR STATUS_OPERATION = 'Progress')
                                                                    GROUP BY
                                                                    PRODUCTIONORDERCODE,
                                                                    STEPNUMBER
                                                                ORDER BY
                                                                    STEPNUMBER ASC
                                                                    LIMIT 1");
                    // Old Query
                    // $resultStatusTerakhir = db2_exec($conn1, "SELECT
                    //                                                 *
                    //                                             FROM
                    //                                                 ITXVIEW_POSISI_KARTU_KERJA ipkk
                    //                                             WHERE
                    //                                                 PRODUCTIONORDERCODE = '$dataMain[NO_KK]'
                    //                                                 AND PRODUCTIONDEMANDCODE = '$dataMain[DEMAND]'
                    //                                                 AND (STATUS_OPERATION = 'Entered' OR STATUS_OPERATION = 'Progress')
                    //                                             ORDER BY
                    //                                                 STEPNUMBER ASC LIMIT 1");
                    // End

                    $dataStatusTerakhir = db2_fetch_assoc($resultStatusTerakhir);

                    $resultDemand = db2_exec($conn1, "SELECT INTERNALREFERENCE, EXTERNALREFERENCE FROM PRODUCTIONDEMAND p WHERE CODE = '$dataMain[DEMAND]'");
                    $dataDemand   = db2_fetch_assoc($resultDemand);
                ?>
                <tr>
                    <td style="text-align: center"><?php echo $no++;?></td>
                    <td style="text-align: center">
                        <div class="btn-group">
                            <a href="pages/cetak/cetak_kartu_gerobak_salinan.php?demand=<?php echo $dataMain['DEMAND']?>&nokk=<?php echo $Prod_order;?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-print" data-toggle="tooltip" data-placement="top"></i></a>
                        </div>
                    </td>
                    <td style="text-align: center">
                        <div class="button-container">
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#demandModal">
                                <i class="fa fa-lightbulb"></i>
                            </button>
                            <span class="new-label-tabel">Baru</span>
                        </div>
                    </td>

                    <!-- Modal -->
                        <div class="modal fade" id="demandModal" tabindex="-1" role="dialog" aria-labelledby="demandModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="demandModalLabel">List Demands</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul id="demandList">
                                            <?php
                                                    $demands = explode(',', $dataMain['DEMAND']); 
                                                    foreach ($demands as $demand) {
                                                        $demand = trim($demand); 
                                                        echo '<li><a href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=' . $demand . '&prod_order=' . TRIM($Prod_order) . '" target="_blank">' . $demand . '</a></li>';
                                                    }
                                                ?>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- End Modal -->
                    <td style="text-align: center"><?php echo $dataMain['DEMAND'];?></td>
                    <td style="text-align: center"><?php echo $dataMain['NO_KK'];?></td>
                    <td style="text-align: center"><?php echo $dataMain['DELIVERY'];?></td>
                    <td style="text-align: left"><?php echo $dataMain['LANGGANAN'];?> / <?php echo $dataMain['BUYER'];?></td>
                    <td style="text-align: left"><?php echo $dataMain['KETERANGAN_PRODUCT'];?></td>
                    <td style="text-align: left"><?php echo $dataMain['JENIS_KAIN'];?></td>
                    <td style="text-align: center"><?php echo $dataMain['WARNA'];?></td>
                    <td style="text-align: center"><?php echo $dataMain['NO_ORDER'];?></td>
                    <td style="text-align: center"><?php echo $dataMain['QTY_BAGIKAIN'];?></td>
                    <td style="text-align: center"><?php echo $dataMain['QTY_BAGIKAIN_YD_MTR'];?></td>
                    <td style="text-align: center"><?php echo ! empty($dataStatusTerakhir['LONGDESCRIPTION']) ? $dataStatusTerakhir['LONGDESCRIPTION'] : 'KK OKE';?></td>
                    <td style="text-align: center"><?php echo $dataDemand['EXTERNALREFERENCE']?></td>
                    <td style="text-align: center"><?php echo $dataDemand['INTERNALREFERENCE']?></td>
                </tr>
            <?php $no++;
            }?>
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