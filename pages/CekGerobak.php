<?php 
ini_set("error_reporting", 0);
$Gerobak  = isset($_POST['gerobak']) ? $_POST['gerobak'] : '';
$Tgl  = isset($_POST['tgl']) ? $_POST['tgl'] : '';
?>
<!-- <center><h1 style="color: red;">MAINTENANCE PROGRAM</h1></center> -->
<form role="form" method="post" enctype="multipart/form-data" name="form1">
<div class="container-fluid">
  
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Filter Data Gerobak</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label for="tgl" class="col-sm-1 control-label">Tanggal Awal</label>
          <div class="col-sm-2">
            <div class="input-group date">
              <input name="tgl" type="date" class="form-control pull-right" placeholder="Tanggal Awal" value="<?php echo $Tgl; ?>" autocomplete="off" />
            </div>
          </div>
          <label for="tgl" class="col-sm-1 control-label">Tanggal Akhir</label>
          <div class="col-sm-2">
            <div class="input-group date">
              <input name="tgl2" type="date" class="form-control pull-right" placeholder="Tanggal Akhir" value="<?php echo $_POST['tgl2']; ?>" autocomplete="off" />
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="gerobak" class="col-sm-1 control-label">No Gerobak</label>
          <div class="col-sm-3">
            <input name="gerobak" type="text" class="form-control pull-right" id="gerobak" placeholder="No Gerobak" value="<?php echo $Gerobak;  ?>" autocomplete="off" />
          </div>
          <!-- /.input group -->
        </div>
        <button class="btn btn-info" type="submit">Cari Data</button>
      </div>
    </div>
</div>

<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">Detail Data Gerobak</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
  <table id="cekGerobakTable" class="table table-sm table-bordered table-striped" style="font-size: 13px; text-align: center;">
    <thead>
      <tr>
        <th valign="middle" style="text-align: center">Prod. Order</th>
        <th valign="middle" style="text-align: center">Prod. Demand</th>
        <th valign="middle" style="text-align: center">Project</th>
        <th valign="middle" style="text-align: center">Buyer</th>
        <th valign="middle" style="text-align: center">Tgl Import</th>
        <th valign="middle" style="text-align: center">Tgl In</th>
        <th valign="middle" style="text-align: center">Tgl Out</th>
        <th valign="middle" style="text-align: center">Full Item</th>
        <th valign="middle" style="text-align: center">Jenis Kain</th>
        <th valign="middle" style="text-align: center">Warna</th>
        <th valign="middle" style="text-align: center">Work Center</th>
        <th valign="middle" style="text-align: center">Operation Code</th>
        <th valign="middle" style="text-align: center">Characteristic Code</th>
        <th valign="middle" style="text-align: center">Gerobak</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no = 1;
        $c = 0;
        $tgl2 = $_POST['tgl2'];

        if ($Tgl != '') {
          $tanggal = " AND VARCHAR_FORMAT(QUALITYDOCUMENTBEAN.IMPORTDATETIME,'YYYY-MM-DD') BETWEEN '$Tgl' AND '$tgl2'";
        } else {
          $tanggal = "";
        }
        if ($Tgl != '' or $Gerobak != '') {
          $sqlDB2 = "SELECT 
                        QUALITYDOCUMENT.PRODUCTIONORDERCODE,
                        QUALITYDOCUMENT.ITEMTYPEAFICODE,
                        QUALITYDOCUMENT.SUBCODE01,
                        QUALITYDOCUMENT.SUBCODE02,
                        QUALITYDOCUMENT.SUBCODE03,
                        QUALITYDOCUMENT.SUBCODE04,
                        QUALITYDOCUMENT.SUBCODE05,
                        QUALITYDOCUMENT.SUBCODE06,
                        QUALITYDOCUMENT.SUBCODE07,
                        QUALITYDOCUMENT.SUBCODE08,
                        QUALITYDOCUMENT.SUBCODE09,
                        QUALITYDOCUMENT.SUBCODE10,
                        QUALITYDOCUMENT.WORKCENTERCODE,
                        QUALITYDOCUMENT.OPERATIONCODE,
                        QUALITYDOCLINE.CHARACTERISTICCODE,
                        QUALITYDOCLINE.VALUEQUANTITY,
                        QUALITYDOCUMENTBEAN.IMPORTDATETIME
                      FROM QUALITYDOCUMENT QUALITYDOCUMENT 
                      LEFT JOIN QUALITYDOCLINE QUALITYDOCLINE ON QUALITYDOCUMENT.PRODUCTIONORDERCODE = QUALITYDOCLINE.QUALITYDOCPRODUCTIONORDERCODE AND 
                                          QUALITYDOCUMENT.HEADERLINE = QUALITYDOCLINE.QUALITYDOCUMENTHEADERLINE
                      LEFT JOIN QUALITYDOCUMENTBEAN QUALITYDOCUMENTBEAN ON QUALITYDOCUMENT.PRODUCTIONORDERCODE = QUALITYDOCUMENTBEAN.PRODUCTIONORDERCODE AND 
                                                                              QUALITYDOCUMENT.HEADERNUMBERID = QUALITYDOCUMENTBEAN.HEADERNUMBERID AND 
                                                                              QUALITYDOCUMENT.HEADERLINE = QUALITYDOCUMENTBEAN.HEADERLINE
                      WHERE 
                        QUALITYDOCLINE.CHARACTERISTICCODE LIKE 'GRB%' AND 
                        QUALITYDOCLINE.VALUEQUANTITY IS NOT NULL AND 
                        QUALITYDOCLINE.VALUEQUANTITY <> 0 
                        $tanggal AND QUALITYDOCLINE.VALUEQUANTITY = '$Gerobak' AND QUALITYDOCUMENTBEAN.IMPORTDATETIME IS NOT NULL
                      GROUP BY 
                        QUALITYDOCUMENT.PRODUCTIONORDERCODE,
                        QUALITYDOCUMENT.ITEMTYPEAFICODE,
                        QUALITYDOCUMENT.SUBCODE01,
                        QUALITYDOCUMENT.SUBCODE02,
                        QUALITYDOCUMENT.SUBCODE03,
                        QUALITYDOCUMENT.SUBCODE04,
                        QUALITYDOCUMENT.SUBCODE05,
                        QUALITYDOCUMENT.SUBCODE06,
                        QUALITYDOCUMENT.SUBCODE07,
                        QUALITYDOCUMENT.SUBCODE08,
                        QUALITYDOCUMENT.SUBCODE09,
                        QUALITYDOCUMENT.SUBCODE10,
                        QUALITYDOCUMENT.WORKCENTERCODE,
                        QUALITYDOCUMENT.OPERATIONCODE,
                        QUALITYDOCLINE.CHARACTERISTICCODE,
                        QUALITYDOCLINE.VALUEQUANTITY,
                        QUALITYDOCUMENTBEAN.IMPORTDATETIME
                      ORDER BY 
                        QUALITYDOCUMENTBEAN.IMPORTDATETIME DESC";
          $stmt   = db2_exec($conn1, $sqlDB2, array('cursor' => DB2_SCROLLABLE));
        } else {
          $sqlDB2 = "SELECT 
                        QUALITYDOCUMENT.PRODUCTIONORDERCODE,
                        QUALITYDOCUMENT.ITEMTYPEAFICODE,
                        QUALITYDOCUMENT.SUBCODE01,
                        QUALITYDOCUMENT.SUBCODE02,
                        QUALITYDOCUMENT.SUBCODE03,
                        QUALITYDOCUMENT.SUBCODE04,
                        QUALITYDOCUMENT.SUBCODE05,
                        QUALITYDOCUMENT.SUBCODE06,
                        QUALITYDOCUMENT.SUBCODE07,
                        QUALITYDOCUMENT.SUBCODE08,
                        QUALITYDOCUMENT.SUBCODE09,
                        QUALITYDOCUMENT.SUBCODE10,
                        QUALITYDOCUMENT.WORKCENTERCODE,
                        QUALITYDOCUMENT.OPERATIONCODE,
                        QUALITYDOCLINE.CHARACTERISTICCODE,
                        QUALITYDOCLINE.VALUEQUANTITY,
                        PRODUCT.LONGDESCRIPTION AS JENIS_KAIN,
                        ITXVIEWCOLOR.WARNA,
                        A.PROJECTCODE, 
                        ORDERPARTNERBRAND.LONGDESCRIPTION AS BUYER,
                        QUALITYDOCUMENTBEAN.IMPORTDATETIME
                      FROM QUALITYDOCUMENT QUALITYDOCUMENT 
                      LEFT JOIN QUALITYDOCLINE QUALITYDOCLINE ON QUALITYDOCUMENT.PRODUCTIONORDERCODE = QUALITYDOCLINE.QUALITYDOCPRODUCTIONORDERCODE AND QUALITYDOCUMENT.HEADERLINE = QUALITYDOCLINE.QUALITYDOCUMENTHEADERLINE
                      -- LEFT JOIN PRODUCT PRODUCT ON 
                      --                 QUALITYDOCUMENT.ITEMTYPEAFICODE = PRODUCT.ITEMTYPECODE AND 
                      --                 QUALITYDOCUMENT.SUBCODE01 = PRODUCT.SUBCODE01 AND 
                      --                 QUALITYDOCUMENT.SUBCODE02 = PRODUCT.SUBCODE02 AND 
                      --                 QUALITYDOCUMENT.SUBCODE03 = PRODUCT.SUBCODE03 AND 
                      --                 QUALITYDOCUMENT.SUBCODE04 = PRODUCT.SUBCODE04 AND 
                      --                 QUALITYDOCUMENT.SUBCODE05 = PRODUCT.SUBCODE05 AND 
                      --                 QUALITYDOCUMENT.SUBCODE06 = PRODUCT.SUBCODE06 AND 
                      --                 QUALITYDOCUMENT.SUBCODE07 = PRODUCT.SUBCODE07 AND 
                      --                 QUALITYDOCUMENT.SUBCODE08 = PRODUCT.SUBCODE08 AND 
                      --                 QUALITYDOCUMENT.SUBCODE09 = PRODUCT.SUBCODE09 AND 
                      --                 QUALITYDOCUMENT.SUBCODE10 = PRODUCT.SUBCODE10
                      -- LEFT JOIN ITXVIEWCOLOR ITXVIEWCOLOR ON 
                      --                 QUALITYDOCUMENT.ITEMTYPEAFICODE = ITXVIEWCOLOR.ITEMTYPECODE AND 
                      --                 QUALITYDOCUMENT.SUBCODE01 = ITXVIEWCOLOR.SUBCODE01 AND 
                      --                 QUALITYDOCUMENT.SUBCODE02 = ITXVIEWCOLOR.SUBCODE02 AND 
                      --                 QUALITYDOCUMENT.SUBCODE03 = ITXVIEWCOLOR.SUBCODE03 AND 
                      --                 QUALITYDOCUMENT.SUBCODE04 = ITXVIEWCOLOR.SUBCODE04 AND 
                      --                 QUALITYDOCUMENT.SUBCODE05 = ITXVIEWCOLOR.SUBCODE05 AND 
                      --                 QUALITYDOCUMENT.SUBCODE06 = ITXVIEWCOLOR.SUBCODE06 AND 
                      --                 QUALITYDOCUMENT.SUBCODE07 = ITXVIEWCOLOR.SUBCODE07 AND 
                      --                 QUALITYDOCUMENT.SUBCODE08 = ITXVIEWCOLOR.SUBCODE08 AND 
                      --                 QUALITYDOCUMENT.SUBCODE09 = ITXVIEWCOLOR.SUBCODE09 AND 
                      --                 QUALITYDOCUMENT.SUBCODE10 = ITXVIEWCOLOR.SUBCODE10
                      -- LEFT JOIN ITXVIEWKK A ON A.PRODUCTIONORDERCODE = QUALITYDOCUMENT.PRODUCTIONORDERCODE
                      -- LEFT JOIN SALESORDER SALESORDER ON A.PROJECTCODE = SALESORDER.CODE 
                      -- LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE 
                                                                    -- AND SALESORDER.ORDERPARTNERBRANDCODE = ORDERPARTNERBRAND.CODE 
                      LEFT JOIN QUALITYDOCUMENTBEAN QUALITYDOCUMENTBEAN ON QUALITYDOCUMENT.PRODUCTIONORDERCODE = QUALITYDOCUMENTBEAN.PRODUCTIONORDERCODE 
                                                                    AND QUALITYDOCUMENT.HEADERNUMBERID = QUALITYDOCUMENTBEAN.HEADERNUMBERID 
                                                                    AND QUALITYDOCUMENT.HEADERLINE = QUALITYDOCUMENTBEAN.HEADERLINE
                      WHERE 
                        QUALITYDOCLINE.CHARACTERISTICCODE LIKE 'GRB%' AND 
                        QUALITYDOCLINE.VALUEQUANTITY IS NOT NULL AND 
                        QUALITYDOCLINE.VALUEQUANTITY <> 0 
                        $tanggal AND 
                        QUALITYDOCLINE.VALUEQUANTITY = '$Gerobak' AND 
                        QUALITYDOCUMENTBEAN.IMPORTDATETIME IS NOT NULL
                      GROUP BY 
                        QUALITYDOCUMENT.PRODUCTIONORDERCODE,
                        QUALITYDOCUMENT.ITEMTYPEAFICODE,
                        QUALITYDOCUMENT.SUBCODE01,
                        QUALITYDOCUMENT.SUBCODE02,
                        QUALITYDOCUMENT.SUBCODE03,
                        QUALITYDOCUMENT.SUBCODE04,
                        QUALITYDOCUMENT.SUBCODE05,
                        QUALITYDOCUMENT.SUBCODE06,
                        QUALITYDOCUMENT.SUBCODE07,
                        QUALITYDOCUMENT.SUBCODE08,
                        QUALITYDOCUMENT.SUBCODE09,
                        QUALITYDOCUMENT.SUBCODE10,
                        QUALITYDOCUMENT.WORKCENTERCODE,
                        QUALITYDOCUMENT.OPERATIONCODE,
                        QUALITYDOCLINE.CHARACTERISTICCODE,
                        QUALITYDOCLINE.VALUEQUANTITY,
                        PRODUCT.LONGDESCRIPTION,
                        ITXVIEWCOLOR.WARNA,
                        A.PROJECTCODE, 
                        ORDERPARTNERBRAND.LONGDESCRIPTION,
                        QUALITYDOCUMENTBEAN.IMPORTDATETIME
                      ORDER BY 
                        QUALITYDOCUMENTBEAN.IMPORTDATETIME DESC";
          $stmt   = db2_exec($conn1, $sqlDB2, array('cursor' => DB2_SCROLLABLE));
        }
        while ($rowdb2 = db2_fetch_assoc($stmt)) {
          $grb = explode(".", $rowdb2['VALUEQUANTITY']);

          $ITXVIEWKK  = db2_exec($conn1, "SELECT * FROM ITXVIEWKK WHERE PRODUCTIONORDERCODE = '$rowdb2[PRODUCTIONORDERCODE]'");
          $dt_ITXVIEWKK  = db2_fetch_assoc($ITXVIEWKK);

          $sql_pelanggan_buyer 	= db2_exec($conn1, "SELECT TRIM(LANGGANAN) AS PELANGGAN, TRIM(BUYER) AS BUYER FROM ITXVIEW_PELANGGAN 
                                            WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$dt_ITXVIEWKK[ORDPRNCUSTOMERSUPPLIERCODE]' AND CODE = '$dt_ITXVIEWKK[PROJECTCODE]'");
          $dt_pelanggan_buyer		= db2_fetch_assoc($sql_pelanggan_buyer);

          $sql_warna		= db2_exec($conn1, "SELECT DISTINCT TRIM(WARNA) AS WARNA FROM ITXVIEWCOLOR 
                                                              WHERE ITEMTYPECODE = '$dt_ITXVIEWKK[ITEMTYPEAFICODE]' 
                                                              AND SUBCODE01 = '$dt_ITXVIEWKK[SUBCODE01]' 
                                                              AND SUBCODE02 = '$dt_ITXVIEWKK[SUBCODE02]'
                                                              AND SUBCODE03 = '$dt_ITXVIEWKK[SUBCODE03]' 
                                                              AND SUBCODE04 = '$dt_ITXVIEWKK[SUBCODE04]'
                                                              AND SUBCODE05 = '$dt_ITXVIEWKK[SUBCODE05]' 
                                                              AND SUBCODE06 = '$dt_ITXVIEWKK[SUBCODE06]'
                                                              AND SUBCODE07 = '$dt_ITXVIEWKK[SUBCODE07]' 
                                                              AND SUBCODE08 = '$dt_ITXVIEWKK[SUBCODE08]'
                                                              AND SUBCODE09 = '$dt_ITXVIEWKK[SUBCODE09]' 
                                                              AND SUBCODE10 = '$dt_ITXVIEWKK[SUBCODE10]'");
          $dt_warna		= db2_fetch_assoc($sql_warna);

          $q_posisikk   = db2_exec($conn1, "SELECT * FROM ITXVIEW_POSISI_KARTU_KERJA ipkk 
                                                WHERE PRODUCTIONORDERCODE = '$rowdb2[PRODUCTIONORDERCODE]' AND OPERATIONCODE = '$rowdb2[OPERATIONCODE]'");
          $dt_posisikk  = db2_fetch_assoc($q_posisikk);
      ?>
      <tr>
        <td style="text-align: center"><?php echo $rowdb2['PRODUCTIONORDERCODE']; ?></td>
        <td style="text-align: center"><a target="_BLANK" href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=<?= $dt_posisikk['PRODUCTIONDEMANDCODE']; ?>&prod_order=<?= $rowdb2['PRODUCTIONORDERCODE']; ?>"><?= $dt_posisikk['PRODUCTIONDEMANDCODE']; ?></a></td>
        <td style="text-align: center"><?= $dt_ITXVIEWKK['PROJECTCODE']; ?></td>
        <td style="text-align: center"><?= $dt_pelanggan_buyer['PELANGGAN'].'('.$dt_pelanggan_buyer['BUYER'].')'; ?></td>
        <td style="text-align: center"><?= SUBSTR($rowdb2['IMPORTDATETIME'], 0, 10); ?></td>
        <td style="text-align: center"><?= SUBSTR($dt_posisikk['MULAI'], 0, 16); ?></td>
        <td style="text-align: center"><?= SUBSTR($dt_posisikk['SELESAI'], 0, 16); ?></td>
        <td style="text-align: center"><?php echo trim($rowdb2['ITEMTYPEAFICODE']) . " " . trim($rowdb2['SUBCODE01']) . "-" . trim($rowdb2['SUBCODE02']) . "-" . trim($rowdb2['SUBCODE03']) . "-" . trim($rowdb2['SUBCODE04']) . "-" . trim($rowdb2['SUBCODE05']) . "-" . trim($rowdb2['SUBCODE06']) . "-" . trim($rowdb2['SUBCODE07']) . "-" . trim($rowdb2['SUBCODE08']) . "-" . trim($rowdb2['SUBCODE09']) . "-" . trim($rowdb2['SUBCODE10']); ?></td>
        <td style="text-align: left"><?= $dt_ITXVIEWKK['ITEMDESCRIPTION']; ?></td>
        <td style="text-align: center"><?= $dt_warna['WARNA']; ?></td>
        <td style="text-align: center"><?php echo $rowdb2['WORKCENTERCODE']; ?></td>
        <td style="text-align: center"><?php echo $rowdb2['OPERATIONCODE']; ?></td>
        <td style="text-align: center"><?php echo $rowdb2['CHARACTERISTICCODE']; ?></td>
        <td style="text-align: center"><?php echo $grb[0]; ?></td>
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