<?php
ini_set("error_reporting", 0);
$Gerobak   = isset($_POST['gerobak']) ? $_POST['gerobak'] : '';
$Tgl      = isset($_POST['tgl']) ? $_POST['tgl'] : '';
$Tgl2      = isset($_POST['tgl2']) ? $_POST['tgl2'] : '';
$NoHanger  = isset($_POST['nohanger']) ? $_POST['nohanger'] : '';
$ProdOrder  = isset($_POST['prodorder']) ? $_POST['prodorder'] : '';
$NoDemand   = isset($_POST['nodemand']) ? $_POST['nodemand'] : '';

$ProdOrder = isset($_GET['prodorder']) ? $_GET['prodorder'] : $ProdOrder;
if (empty($ProdOrder)) {
    // Jika kosong, tampilkan input ProdOrder
    $ProdOrder = isset($_POST['prodorder']) ? $_POST['prodorder'] : '';
}
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
                            <input name="tgl" type="date" class="form-control pull-right" placeholder="Tanggal Awal" value="<?php echo $_POST['tgl']; ?>" autocomplete="off" />
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
                <div class="form-group row">
                    <label for="nohanger" class="col-sm-1 control-label">No Hanger</label>
                    <div class="col-sm-3">
                        <input name="nohanger" type="text" class="form-control pull-right" id="nohanger" placeholder="No Hanger" value="<?php echo $NoHanger;  ?>" autocomplete="off" />
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group row">
                    <label for="prodorder" class="col-sm-1 control-label">Prod. Order</label>
                    <div class="col-sm-3">
                        <input name="prodorder" type="text" class="form-control pull-right" id="prodorder" placeholder="Prod. Order" value="<?php echo $ProdOrder; ?>" autocomplete="off" />
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group row">
                    <label for="nodemand" class="col-sm-1 control-label">No Demand</label>
                    <div class="col-sm-3">
                        <input name="nodemand" type="text" class="form-control pull-right" id="nodemand" placeholder="No Demand" value="<?php echo $NoDemand;  ?>" autocomplete="off" />
                    </div>
                    <!-- /.input group -->
                </div>
                <button class="btn btn-info" type="submit">Cari Data</button>
            </div>
        </div>
    </div>

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Detail Data Gerobak <?php if ($Tgl != "") {
                                                            echo $Tgl . " s/d " . $Tgl2;
                                                        } ?></h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-sm table-bordered table-striped" style="font-size: 13px; text-align: center;">
                <thead>
                    <tr>
                        <th valign="middle" style="text-align: center">No Gerobak</th>
                        <th valign="middle" style="text-align: center">Prod. Order</th>
                        <th valign="middle" style="text-align: center">Prod. Demand</th>
                        <th valign="middle" style="text-align: center">No Hanger</th>
                        <th valign="middle" style="text-align: center">No Step</th>
                        <th valign="middle" style="text-align: center">Proses</th>
                        <th valign="middle" style="text-align: center">Ket.</th>
                        <th valign="middle" style="text-align: center">Jml Rol</th>
                        <?php if ($Gerobak != "") { ?>
                            <th valign="middle" style="text-align: center">Berat </th>
                            <th valign="middle" style="text-align: center">Berat Kosong</th>
                            <th valign="middle" style="text-align: center">Berat Kain</th>
                        <?php } else { ?>
                            <th valign="middle" style="text-align: center">Berat Kain</th>
                        <?php } ?>
                        <th valign="middle" style="text-align: center">Roll</th>
                        <th valign="middle" style="text-align: center">Bagi Kain</th>
                        <th valign="middle" style="text-align: center">Selisih</th>
                        <th valign="middle" style="text-align: center">Selisih Proses</th>
                        <th valign="middle" style="text-align: center">Loss Selisih %</th>
                        <th valign="middle" style="text-align: center">Loss Preset %</th>
                        <th valign="middle" style="text-align: center">Loss Inspek %</th>
                        <th valign="middle" style="text-align: center">Packing</th>
                        <th valign="middle" style="text-align: center">Loss RMP %</th>
                        <th valign="middle" style="text-align: center">Tgl Update</th>
                        <th valign="middle" style="text-align: center">UserID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $c = 0;

                    if ($Tgl != "") {
                        $where1 = " AND DATE_FORMAT(tgl_update, '%Y-%m-%d') BETWEEN '$Tgl' AND '$Tgl2' ";
                    } else {
                        $where1 = " ";
                    }

                    if ($NoHanger != "") {
                        $where2 = " AND no_hanger='$NoHanger' ";
                    } else {
                        $where2 = " ";
                    }

                    if ($ProdOrder != "") {
                        $where3 = " AND prod_order='$ProdOrder' ";
                    } else {
                        $where3 = " ";
                    }

                    if ($NoDemand != "") {
                        $where4 = " AND no_demand='$NoDemand' ";
                    } else {
                        $where4 = " ";
                    }

                    if ($Gerobak != "") {
                        $where5 = " AND no_gerobak='$Gerobak' ";
                    } else {
                        $where5 = " ";
                    }

                    if ($Tgl == "" and $NoHanger == "" and $ProdOrder == "" and $NoDemand == "" and $NoGerobak) {
                        $query = "SELECT
                                            *,
											sum(jml_rol) AS rol_tot,
                                            sum( berat ) AS berat_tot,
                                            sum( berat_kosong ) AS berat_kosong_tot,
                                            DATE_FORMAT( tgl_update, '%Y-%m-%d' ) AS tgl_timbang,
                                            group_concat( DISTINCT userid, ', ' ) AS user_gabung 
                                        FROM
                                            kain_proses 
                                        WHERE
                                            ( ket = 'before' OR ket = 'after' ) 
                                        GROUP BY
                                            proses,
                                            ket,
                                            prod_order,
                                            no_demand 
                                        ORDER BY
                                            id DESC 
                                            LIMIT 500";
                    } else if ($Gerobak != "") {
                        $query = " SELECT * FROM kain_proses WHERE (ket='before' or ket='after') $where1 $where2 $where3 $where4 $where5 ORDER BY id DESC";
                        } else if ($where1 != " " OR $where2 != " "  OR $where3 != " "  OR $where4 != " " ){
                        $query = "SELECT
                                        *,
										sum(jml_rol) AS rol_tot,
                                        sum( berat ) AS berat_tot,
                                        sum( berat_kosong ) AS berat_kosong_tot,
                                        DATE_FORMAT( tgl_update, '%Y-%m-%d' ) AS tgl_timbang,
                                        group_concat( DISTINCT userid, ', ' ) AS user_gabung 
                                    FROM
                                        kain_proses 
                                    WHERE
                                        ( ket = 'before' OR ket = 'after' ) $where1 $where2 $where3 $where4
                                    GROUP BY
                                        proses,
                                        ket,
                                        prod_order,
                                        no_demand,
                                        no_step 
                                    ORDER BY
                                        prod_order, no_step ASC";
                        }else{
                        $query = "SELECT
                                        *,
										sum(jml_rol) AS rol_tot,
                                        sum( berat ) AS berat_tot,
                                        sum( berat_kosong ) AS berat_kosong_tot,
                                        DATE_FORMAT( tgl_update, '%Y-%m-%d' ) AS tgl_timbang,
                                        group_concat( DISTINCT userid, ', ' ) AS user_gabung 
                                    FROM
                                        kain_proses 
                                    WHERE
                                        ( ket = 'before' OR ket = 'after' ) AND DATE_FORMAT( tgl_update, '%Y-%m-%d' ) = DATE_FORMAT(NOW(), '%Y-%m-%d' )
                                    GROUP BY
                                        proses,
                                        ket,
                                        prod_order,
                                        no_demand,
                                        no_step 
                                    ORDER BY
                                        prod_order, no_step ASC";
                    }

                    $sql = mysqli_query($conr, $query);
                    while ($r = mysqli_fetch_array($sql)) {
                        $sqlDB2 = "SELECT x.USEDUSERPRIMARYQUANTITY AS KG_BAGIKAIN, x.USERPRIMARYQUANTITY AS KG_BAGIKAIN1 FROM DB2ADMIN.PRODUCTIONRESERVATION x
									WHERE x.ORDERCODE ='".$r['no_demand']."'";
                        $stmt   = db2_exec($conn1, $sqlDB2, array('cursor' => DB2_SCROLLABLE));
                        $rowdb2 = db2_fetch_assoc($stmt);
                        //						$sqlDB21F = "SELECT
                        //										USERPRIMARYQUANTITY AS KG_BAGIKAIN1,
                        //										USEDBASEPRIMARYQUANTITY AS KG_BAGIKAIN
                        //									FROM
                        //										VIEWPRODUCTIONRESERVATION
                        //									WHERE
                        //										PRODUCTIONORDERCODE = '".$r['prod_order']."'
                        //										AND ITEMTYPEAFICODE = 'KFF'";
                        //          				$stmt1F   = db2_exec($conn1, $sqlDB21F, array('cursor' => DB2_SCROLLABLE));	
                        //						$rowdb21F = db2_fetch_assoc($stmt1F);	
                        //							
                        //						$sqlDB21 = "SELECT
                        //										USERPRIMARYQUANTITY AS KG_BAGIKAIN1,
                        //										USEDBASEPRIMARYQUANTITY AS KG_BAGIKAIN
                        //									FROM
                        //										VIEWPRODUCTIONRESERVATION
                        //									WHERE
                        //										PRODUCTIONORDERCODE = '".$r['prod_order']."'
                        //										AND ITEMTYPEAFICODE = 'KGF'";
                        //          				$stmt1   = db2_exec($conn1, $sqlDB21, array('cursor' => DB2_SCROLLABLE));	
                        //						$rowdb21 = db2_fetch_assoc($stmt1);
                        //							
                        //						if($rowdb21['KG_BAGIKAIN']>0){
                        //							$KGBAGI=$rowdb21['KG_BAGIKAIN'];
                        //						}else if($rowdb21['KG_BAGIKAIN1']>0){
                        //							$KGBAGI=$rowdb21['KG_BAGIKAIN1'];
                        //						}else if($rowdb21F['KG_BAGIKAIN']>0){
                        //							$KGBAGI=$rowdb21F['KG_BAGIKAIN'];
                        //						}else if($rowdb21F['KG_BAGIKAIN1']>0){
                        //							$KGBAGI=$rowdb21F['KG_BAGIKAIN1'];
                        //						}	
                        $queryMutasi = "
		select
			nodemand,
			sum(netto) as mutasi
		from
			tbl_lap_inspeksi
		where
			nodemand = '".$r['no_demand']."'
			and dept = 'PACKING'
		group by
			nodemand
	";

                        $resultMutasi = mysqli_query($conq, $queryMutasi);
	$rowMutasi	  = mysqli_fetch_assoc($resultMutasi);
                        $sqlDB21  = " SELECT DISTINCT 
										x.INITIALUSERPRIMARYQUANTITY AS KG_BAGIKAIN 
										FROM DB2ADMIN.ITXVIEW_RESERVATION x 
									WHERE x.PRODUCTIONORDERCODE='".$r['prod_order']."'";
                        $stmt1   = db2_exec($conn1, $sqlDB21, array('cursor' => DB2_SCROLLABLE));
                        $rowdb21 = db2_fetch_assoc($stmt1);

                        $sqlDB21S  = " SELECT 
                                            x.USEDUSERPRIMARYQUANTITY AS KG_BAGIKAIN,
	                                        x.USERPRIMARYQUANTITY AS KG_BAGIKAIN1  FROM DB2ADMIN.PRODUCTIONRESERVATION x
									    WHERE x.ORDERCODE = '".$r['no_demand']."' ";
                        $stmt1S   = db2_exec($conn1, $sqlDB21S, array('cursor' => DB2_SCROLLABLE));
                        $rowdb21S = db2_fetch_assoc($stmt1S);
                        // var_dump($sqlDB21S);
						if($rowdb21['KG_BAGIKAIN']>0){
							$KGBAGI=$rowdb21['KG_BAGIKAIN'];
						}else if($rowdb21S['KG_BAGIKAIN1']>0){
							$KGBAGI=$rowdb21S['KG_BAGIKAIN1'];
                        }
                    ?>
                        <tr>
                            <td><?php if ($Gerobak != "") {
                                    echo $r['no_gerobak'];
                                } else { ?><a href="#" class="btn btn-xs btn-danger show_detail" id="<?php echo $r['prod_order'] . ", " . $r['proses'] . ", " . $r['ket'] . ", " . $r['no_step'] . ", "; ?>">detail</a> <?php } ?></td>
                            <td><?php echo $r['prod_order']; ?></td>
                            <td><?php echo $r['no_demand']; ?></td>
                            <td><?php echo $r['no_hanger']; ?></td>
                            <td><?php echo $r['no_step']; ?></td>
                            <td><?php echo $r['proses']; ?></td>
                            <td><?php echo $r['ket']; ?></td>
                            <?php if ($Gerobak == "") { ?>
                                <td><?php echo $r['rol_tot']; ?></td>
                            <?php } ?>
                            <?php if ($Gerobak != "") { ?>
                                <td><a data-pk="<?php echo $r['id']; ?>" data-value="<?php echo $r['jml_rol']; ?>" class="jml_rol" href="javascipt:void(0)"><?php echo $r['jml_rol']; ?></a></td>
                                <td align="right"><?php echo $r['berat']; ?></td>
                                <td align="right"><?php echo $r['berat_kosong']; ?></td>
                                <td align="right"><?php echo number_format(round($r['berat'] - $r['berat_kosong'], 2), 2); ?></td>
                            <?php } else { ?>
                                <td align="right"><?php echo number_format(round($r['berat_tot'] - $r['berat_kosong_tot'], 2), 2); ?></td>
                            <?php } ?>
                            <td><?php echo $rowdb21['ROL_BAGI']//echo $r['rol_bagi']; ?></td>
                            <td><?php echo round($KGBAGI,2);//echo $r['bagi_kain']; ?></td>
                            <td align="right">&nbsp;</td>
                            <td align="right">&nbsp;</td>
                            <?php if ($Gerobak != "") { ?>
                                <td align="right"><?php echo number_format((round($KGBAGI,2) - round($r['berat'] - $r['berat_kosong'], 2)), 2); ?></td>
                            <?php } else { ?>
                                <td align="right"><?php echo number_format((round($KGBAGI,2) - round($r['berat_tot'] - $r['berat_kosong_tot'], 2)), 2); ?></td>
                            <?php } ?>
							<td><?php if($r['proses']=="PRE1" and $r['ket']=="after"){ echo round(((round($KGBAGI,2)-(round($r['berat'] - $r['berat_kosong'], 2)))/round($KGBAGI,2))*100,2);} ?></td>
                            <td><?php if($r['proses']=="INS3" and $r['ket']=="after"){ echo round(((round($KGBAGI,2)-(round($r['berat'] - $r['berat_kosong'], 2)))/round($KGBAGI,2))*100,2);} ?></td>
							<td><?php if($r['proses']=="INS3" and $r['ket']=="after"){ echo round($rowMutasi['mutasi'], 2);} ?></td>
							<td><?php if($r['proses']=="INS3" and $r['ket']=="after"){ echo round(((round($KGBAGI,2)-(round($rowMutasi['mutasi'], 2)))/round($KGBAGI,2))*100,2);} ?></td>
                            <td><?php if ($r['tgl_timbang'] != "") {
                                    echo $r['tgl_timbang'];
                                } else {
                                    echo $r['tgl_update'];
                                } ?></td>
                            <td align="left"><?php echo $r['user_gabung']; ?></td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</form>
</div>

<div id="DetailShow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
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