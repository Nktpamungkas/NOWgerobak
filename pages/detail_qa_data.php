<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
    $wct=$_GET['wct'];
    $opt=$_GET['opt'];
?>
         
<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
            <div class="modal-header">
                    <h5 class="modal-title">Detail Quality Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">
                    <h5><strong>No Prod. Order : <?php echo $_GET['id'];?></strong></h5>
                    <h5><strong>Workcenter : <?php echo $_GET['wct'];?></strong></h5>
                    <h5><strong>Operation : <?php echo $_GET['opt'];?></strong></h5>
                    <table id="example10" class="table table-bordered table-hover table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="15%"><div align="center">Header Number ID</div></th>
                                <th width="15%"><div align="center">Operation Code</div></th>
                                <th width="15%"><div align="center">Workcenter Code</div></th>
                                <th width="15%"><div align="center">Header Code</div></th>
                                <th width="15%"><div align="center">Subgroup Code</div></th>
                                <th width="15%"><div align="center">Header Date Code</div></th>
                                <th width="15%"><div align="center">Item Code Code</div></th>
                                <th width="15%"><div align="center">SUBCODE01</div></th>
                                <th width="15%"><div align="center">SUBCODE02</div></th>
                                <th width="15%"><div align="center">SUBCODE03</div></th>
                                <th width="15%"><div align="center">SUBCODE04</div></th>
                                <th width="15%"><div align="center">SUBCODE05</div></th>
                                <th width="15%"><div align="center">SUBCODE06</div></th>
                                <th width="15%"><div align="center">Quality Prod. Order Code</div></th>
                                <th width="15%"><div align="center">Characteristic Code</div></th>
                                <th width="10%"><div align="center">Gerobak</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                            	$sqldtl="SELECT 
                                QUALITYDOCUMENT.HEADERNUMBERID,
                                QUALITYDOCUMENT.OPERATIONCODE,
                                QUALITYDOCUMENT.WORKCENTERCODE,
                                QUALITYDOCUMENT.HEADERCODE,
                                QUALITYDOCUMENT.HEADERSUBGROUPCODE,
                                QUALITYDOCUMENT.HEADERDATE, 
                                QUALITYDOCUMENT.ITEMTYPEAFICODE, 
                                QUALITYDOCUMENT.SUBCODE01, 
                                QUALITYDOCUMENT.SUBCODE02, 
                                QUALITYDOCUMENT.SUBCODE03, 
                                QUALITYDOCUMENT.SUBCODE04, 
                                QUALITYDOCUMENT.SUBCODE05,
                                QUALITYDOCUMENT.SUBCODE06,                                
                                QUALITYDOClINE.QUALITYDOCPRODUCTIONORDERCODE, 
                                QUALITYDOClINE.CHARACTERISTICCODE,
                                QUALITYDOClINE.VALUEQUANTITY 
                                FROM QUALITYDOCUMENT QUALITYDOCUMENT
                                LEFT JOIN QUALITYDOCLINE QUALITYDOCLINE ON QUALITYDOCUMENT.HEADERNUMBERID = QUALITYDOCLINE.QUALITYDOCUMENTHEADERNUMBERID AND 
                                QUALITYDOCUMENT.HEADERLINE = QUALITYDOCLINE.QUALITYDOCUMENTHEADERLINE AND QUALITYDOCUMENT.PRODUCTIONORDERCODE = QUALITYDOCLINE.QUALITYDOCPRODUCTIONORDERCODE 
                                WHERE QUALITYDOCUMENT.OPERATIONCODE='$opt' AND QUALITYDOCUMENT.WORKCENTERCODE ='$wct' AND 
                                QUALITYDOClINE.QUALITYDOCPRODUCTIONORDERCODE ='$modal_id' AND QUALITYDOCLINE.VALUEQUANTITY IS NOT NULL AND QUALITYDOCLINE.VALUEQUANTITY <> 0 AND LEFT(QUALITYDOCLINE.CHARACTERISTICCODE,3)='GRB'";
                                $stmt=db2_exec($conn1,$sqldtl, array('cursor'=>DB2_SCROLLABLE));
                            while($r=db2_fetch_assoc($stmt)){
                                $grb=explode(".",$r['VALUEQUANTITY']);
                            ?>
                            <tr>
                                <td align="center" width="15%"><?php echo $r['HEADERNUMBERID'];?></td>
                                <td align="center" width="15%"><?php echo $r['OPERATIONCODE'];?></td>
                                <td align="center" width="15%"><?php echo $r['WORKCENTERCODE'];?></td>
                                <td align="center" width="15%"><?php echo $r['HEADERCODE'];?></td>
                                <td align="center" width="15%"><?php echo $r['HEADERSUBGROUPCODE'];?></td>
                                <td align="center" width="15%"><?php echo $r['HEADERDATE'];?></td>
                                <td align="center" width="15%"><?php echo $r['ITEMTYPEAFICODE'];?></td>
                                <td align="center" width="15%"><?php echo $r['SUBCODE01'];?></td>
                                <td align="center" width="15%"><?php echo $r['SUBCODE02'];?></td>
                                <td align="center" width="15%"><?php echo $r['SUBCODE03'];?></td>
                                <td align="center" width="15%"><?php echo $r['SUBCODE04'];?></td>
                                <td align="center" width="15%"><?php echo $r['SUBCODE05'];?></td>
                                <td align="center" width="15%"><?php echo $r['SUBCODE06'];?></td>
                                <td align="center" width="15%"><?php echo $r['QUALITYDOCPRODUCTIONORDERCODE'];?></td>
                                <td align="center" width="15%"><?php echo $r['CHARACTERISTICCODE'];?></td>
                                <td align="center" width="10%"><?php echo $grb[0];?></td>
                            </tr>
                            <?php $no++;}?>
                        </tbody>
                    </table>
		        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-primary" <?php if($_SESSION['lvl_id']!="LEADERTQ"){echo "disabled"; } ?> >Save Changes</button> -->
                    <!--<?php if($_SESSION['lvl_id']!="ADMIN"){echo "disabled"; } ?>-->
                </div>
            </form>
        </div>
            <!-- /.modal-content -->
</div>
          <!-- /.modal-dialog -->
<script>
  $(function () {
    $('#example10').DataTable({
	  'paging': true,
	})
  });
</script>