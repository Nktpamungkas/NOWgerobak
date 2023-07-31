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
                    <h5 class="modal-title">Data Waktu Selesai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5><strong>No Prod. Order : <?php echo $_GET['id'];?></strong></h5>
                    <h5><strong>Workcenter : <?php echo $_GET['wct'];?></strong></h5>
                    <h5><strong>Operation : <?php echo $_GET['opt'];?></strong></h5>
                    <table id="example10" class="table table-bordered table-hover table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="15%"><div align="center">Tanggal Selesai</div></th>
                                <th width="10%"><div align="center">Jam Selesai</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                            	$sqldtl2="SELECT 
                                PRODUCTIONPROGRESS.WORKCENTERCODE,
                                PRODUCTIONPROGRESS.OPERATIONCODE,
                                PRODUCTIONPROGRESS.PROGRESSENDDATE,
                                PRODUCTIONPROGRESS.PROGRESSENDTIME
                                FROM PRODUCTIONPROGRESS PRODUCTIONPROGRESS
                                WHERE PRODUCTIONPROGRESS.PRODUCTIONORDERCODE ='$modal_id'
                                AND WORKCENTERCODE ='$wct' AND OPERATIONCODE ='$opt' AND PRODUCTIONPROGRESS.PROGRESSENDDATE IS NOT NULL";
                                $stmt4   = db2_exec($conn1,$sqldtl2, array('cursor'=>DB2_SCROLLABLE));
                            while($rdtl2 = db2_fetch_assoc($stmt4)){
                            ?>
                            <tr>
                                <td align="center" width="15%"><?php echo $rdtl2['PROGRESSENDDATE'];?></td>
                                <td align="center" width="15%"><?php echo $rdtl2['PROGRESSENDTIME'];?></td>
                            </tr>
                            <?php $no++;}?>
                        </tbody>
                    </table>
		        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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