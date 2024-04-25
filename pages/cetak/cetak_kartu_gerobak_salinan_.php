<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
//--
$Demand = $_GET['demand'];
//-
$sqlDB2 ="SELECT 
PRODUCTIONDEMAND.CODE,
A.PRODUCTIONORDERCODE,
PRODUCTIONDEMAND.ITEMTYPEAFICODE,
TRIM(PRODUCTIONDEMAND.SUBCODE01) AS SUBCODE01,
TRIM(PRODUCTIONDEMAND.SUBCODE02) AS SUBCODE02,
TRIM(PRODUCTIONDEMAND.SUBCODE03) AS SUBCODE03,
TRIM(PRODUCTIONDEMAND.SUBCODE04) AS SUBCODE04,
TRIM(PRODUCTIONDEMAND.SUBCODE05) AS SUBCODE05,
TRIM(PRODUCTIONDEMAND.SUBCODE06) AS SUBCODE06,
TRIM(PRODUCTIONDEMAND.SUBCODE07) AS SUBCODE07,
TRIM(PRODUCTIONDEMAND.SUBCODE08) AS SUBCODE08,
TRIM(PRODUCTIONDEMAND.SUBCODE09) AS SUBCODE09,
TRIM(PRODUCTIONDEMAND.SUBCODE10) AS SUBCODE10,
PRODUCT.LONGDESCRIPTION AS JENIS_KAIN,
PRODUCTIONDEMAND.PROJECTCODE,
PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE,
PRODUCTIONDEMAND.ORIGDLVSALORDERLINEORDERLINE, 
PRODUCTIONDEMAND.DLVSALORDERLINESALESORDERCODE,
PRODUCTIONDEMAND.DLVSALESORDERLINEORDERLINE,
PRODUCTIONDEMAND.FINALPLANNEDDATE,
PRODUCTIONDEMAND.EXTERNALREFERENCE,
PRODUCTIONDEMAND.INTERNALREFERENCE,
PRODUCTIONDEMAND.USERPRIMARYQUANTITY,
PRODUCTIONDEMAND.USERPRIMARYUOMCODE,
PRODUCTIONDEMAND.USERSECONDARYQUANTITY,
PRODUCTIONDEMAND.USERSECONDARYUOMCODE,
ITXVIEWCOLOR.WARNA, 
SALESORDERDELIVERY.DELIVERYDATE,
BUSINESSPARTNER.LEGALNAME1 AS LANGGANAN,
ORDERPARTNERBRAND.LONGDESCRIPTION AS BUYER
FROM PRODUCTIONDEMAND PRODUCTIONDEMAND
LEFT JOIN ITXVIEWCOLOR ITXVIEWCOLOR
ON PRODUCTIONDEMAND.ITEMTYPEAFICODE = ITXVIEWCOLOR.ITEMTYPECODE AND 
PRODUCTIONDEMAND.SUBCODE01 = ITXVIEWCOLOR.SUBCODE01 AND 
PRODUCTIONDEMAND.SUBCODE02 = ITXVIEWCOLOR.SUBCODE02 AND 
PRODUCTIONDEMAND.SUBCODE03 = ITXVIEWCOLOR.SUBCODE03 AND 
PRODUCTIONDEMAND.SUBCODE04 = ITXVIEWCOLOR.SUBCODE04 AND 
PRODUCTIONDEMAND.SUBCODE05 = ITXVIEWCOLOR.SUBCODE05 AND 
PRODUCTIONDEMAND.SUBCODE06 = ITXVIEWCOLOR.SUBCODE06 AND 
PRODUCTIONDEMAND.SUBCODE07 = ITXVIEWCOLOR.SUBCODE07 AND 
PRODUCTIONDEMAND.SUBCODE08 = ITXVIEWCOLOR.SUBCODE08 AND 
PRODUCTIONDEMAND.SUBCODE09 = ITXVIEWCOLOR.SUBCODE09 AND 
PRODUCTIONDEMAND.SUBCODE10 = ITXVIEWCOLOR.SUBCODE10
LEFT JOIN PRODUCT PRODUCT 
ON PRODUCTIONDEMAND.ITEMTYPEAFICODE = PRODUCT.ITEMTYPECODE AND 
PRODUCTIONDEMAND.SUBCODE01 = PRODUCT.SUBCODE01 AND 
PRODUCTIONDEMAND.SUBCODE02 = PRODUCT.SUBCODE02 AND 
PRODUCTIONDEMAND.SUBCODE03 = PRODUCT.SUBCODE03 AND 
PRODUCTIONDEMAND.SUBCODE04 = PRODUCT.SUBCODE04 AND 
PRODUCTIONDEMAND.SUBCODE05 = PRODUCT.SUBCODE05 AND 
PRODUCTIONDEMAND.SUBCODE06 = PRODUCT.SUBCODE06 AND 
PRODUCTIONDEMAND.SUBCODE07 = PRODUCT.SUBCODE07 AND 
PRODUCTIONDEMAND.SUBCODE08 = PRODUCT.SUBCODE08 AND 
PRODUCTIONDEMAND.SUBCODE09 = PRODUCT.SUBCODE09 AND 
PRODUCTIONDEMAND.SUBCODE10 = PRODUCT.SUBCODE10
LEFT JOIN (
  SELECT PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
  PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE
  FROM PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
  GROUP BY PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
  PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE
) A ON PRODUCTIONDEMAND.CODE = A.PRODUCTIONDEMANDCODE 
LEFT JOIN SALESORDERDELIVERY SALESORDERDELIVERY ON PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE = SALESORDERDELIVERY.SALESORDERLINESALESORDERCODE AND 
PRODUCTIONDEMAND.ORIGDLVSALORDERLINEORDERLINE = SALESORDERDELIVERY.SALESORDERLINEORDERLINE
LEFT JOIN ORDERPARTNER ORDERPARTNER 
ON PRODUCTIONDEMAND.CUSTOMERCODE = ORDERPARTNER.CUSTOMERSUPPLIERCODE 
LEFT JOIN BUSINESSPARTNER BUSINESSPARTNER 
ON ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID = BUSINESSPARTNER.NUMBERID 
LEFT JOIN SALESORDER SALESORDER ON 
PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE = SALESORDER.CODE 
LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND ON 
SALESORDER.ORDERPARTNERBRANDCODE = ORDERPARTNERBRAND.CODE AND SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE
WHERE PRODUCTIONDEMAND.CODE='$Demand'
ORDER BY PRODUCTIONDEMAND.CODE ASC";	
	$stmt   = db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
  $rowdb2 = db2_fetch_assoc($stmt);

  $sqlQTY="SELECT
  PRODUCTIONDEMAND.CODE,
  PRODUCTIONDEMAND.USERPRIMARYQUANTITY,
  PRODUCTIONDEMAND.USERPRIMARYUOMCODE,
  PRODUCTIONDEMAND.USERSECONDARYQUANTITY,
  PRODUCTIONDEMAND.USERSECONDARYUOMCODE
  FROM PRODUCTIONDEMAND PRODUCTIONDEMAND
  WHERE PRODUCTIONDEMAND.CODE='$Demand'";	
      $stmt1   = db2_exec($conn1,$sqlQTY, array('cursor'=>DB2_SCROLLABLE));	
      $rowQTY = db2_fetch_assoc($stmt1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="styles_cetak.css" rel="stylesheet" type="text/css">
  <title>Cetak Kartu Gerobak</title>
  <script>

  </script>
  <style>
    .table-list td {
      color: #333;
      font-size: 12px;
      border-color: #fff;
      border-collapse: collapse;
      vertical-align: center;
      padding: 3px 5px;
      border-bottom: 1px #000000 solid;
      border-left: 1px #000000 solid;
      border-right: 1px #000000 solid;


    }

    .table-list1 {
      clear: both;
      text-align: left;
      border-collapse: collapse;
      margin: 0px 0px 5px 0px;
      background: #fff;
    }

    .table-list1 td {
      color: #333;
      font-size: 14px;
      border-color: #fff;
      border-collapse: collapse;
      vertical-align: center;
      padding: 1px 3px;
      border-bottom: 0px #000000 solid;
      border-top: 0px #000000 solid;
      border-left: 0px #000000 solid;
      border-right: 0px #000000 solid;


    }
  </style>
</head>

<body>
  <table width="100%" border="" class="table-list1" style="border-bottom:1px #000000 solid;
	border-top:1px #000000 solid;
	border-left:1px #000000 solid;
	border-right:1px #000000 solid;">
    <tr>
      <td width="10%" align="center"><img src="ITTI_Logo 2021BW.png" width="50" height="50
		" alt="" /></td>
      <td width="58%" align="center" style="border-bottom:0px #000000 solid;
	border-top:0px #000000 solid;
	border-left:1px #000000 solid;
	border-right:1px #000000 solid;"><strong>
          <font size="+2">KARTU GEROBAK</font>
        </strong></td>
      <td width="32%" align="center">
        <table width="100%">
          <tbody>
            <tr>
              <td width="36%" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">No. Form</td>
              <td width="5%" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">:</td>
              <td width="59%" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;"></td>
            </tr>
            <tr>
              <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">No Revisi</td>
              <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">:</td>
              <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;"></td>
            </tr>
            <tr>
              <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">Tgl. Terbit</td>
              <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">:</td>
              <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;"></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </table>
  <table width="100%" border="" class="table-list1">
    <tbody>
      <tr>
        <td width="10%" scope="col" style="border-bottom:0px #000000 solid;
	border-top:0px #000000 solid;
	border-left:0px #000000 solid;
	border-right:0px #000000 solid;">
          <table width="83" border="" class="table-list1">
            <tbody>
              <tr>
                <td align="center" valign="middle"><strong>FORM A</strong></td>
              </tr>
            </tbody>
          </table>
        </td>
        <td width="40%" scope="col" align="center" >
          <h3>Production Demand</h3>
        </td>
        <td width="50%" scope="col" align="center" >
          <h3>&nbsp;</h3>
        </td>
      </tr>
      <tr>
      <td width="10%" scope="col" style="border-bottom:0px #000000 solid;
	border-top:0px #000000 solid;
	border-left:0px #000000 solid;
	border-right:0px #000000 solid;">
          <table width="83" border="0">
            <tbody>
              <tr>
                <td align="left" valign="middle"><strong>&nbsp;</strong></td>
              </tr>
            </tbody>
          </table>
        </td>
        <td align="center" valign="top"><?php if($Demand!='') echo '<img src="../../php-barcode-master/barcode.php?text=' . $Demand . '&print=true&size=40" />'; ?></td>
        <td width="50%" scope="col" align="center" >
          <h3>&nbsp;</h3>
        </td>
      </tr>
      <tr>
          <td colspan="3"><table width="100%" border="0">
            <tbody>
              <tr>
                <td width="20%" align="right">DELIVERY DATE</td>
                <td width="5%" align="left">:</td>
                <td width="70%" align="left"><?php echo date("d F Y", strtotime($rowdb2['DELIVERYDATE']));?></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
          <td colspan="3"><table width="100%" border="0">
            <tbody>
              <tr>
                <td width="20%" align="right">FULL ITEM</td>
                <td width="5%" align="left">:</td>
                <td width="70%" align="left"><?php echo $rowdb2['SUBCODE01']."-".$rowdb2['SUBCODE02']."-".$rowdb2['SUBCODE03']."-".$rowdb2['SUBCODE04']."-".$rowdb2['SUBCODE05']."-".$rowdb2['SUBCODE06']."-".$rowdb2['SUBCODE07']."-".$rowdb2['SUBCODE08']."-".$rowdb2['SUBCODE09']."-".$rowdb2['SUBCODE10'];?></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
          <td colspan="3"><table width="100%" border="0">
            <tbody>
              <tr>
                <td width="20%" align="right">DESCRIPTION</td>
                <td width="5%" align="left">:</td>
                <td width="70%" align="left"><?php echo $rowdb2['JENIS_KAIN'];?></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
          <td colspan="3"><table width="100%" border="0">
            <tbody>
              <tr>
                <td width="20%" align="right">COLOR NAME</td>
                <td width="5%" align="left">:</td>
                <td width="70%" align="left"><?php echo $rowdb2['WARNA'];?></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
          <td colspan="3"><table width="100%" border="0">
            <tbody>
              <tr>
                <td width="20%" align="right">PROJECT CODE</td>
                <td width="5%" align="left">:</td>
                <td width="70%" align="left"><?php echo $rowdb2['ORIGDLVSALORDLINESALORDERCODE'];?></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
          <td colspan="3"><table width="100%" border="0">
            <tbody>
              <tr>
                <td width="20%" align="right">CUSTOMER</td>
                <td width="5%" align="left">:</td>
                <td width="70%" align="left"><?php echo $rowdb2['LANGGANAN'];?></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
          <td colspan="3"><table width="100%" border="0">
            <tbody>
              <tr>
                <td width="20%" align="right">QTY</td>
                <td width="5%" align="left">:</td>
                <td width="70%" align="left"><?php echo number_format($rowQTY['USERPRIMARYQUANTITY'],2)." ".$rowQTY['USERPRIMARYUOMCODE']; ?></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
          <td colspan="3"><table width="100%" border="0">
            <tbody>
              <tr>
                <td width="20%" align="right">&nbsp;</td>
                <td width="5%" align="left">&nbsp;</td>
                <td width="70%" align="left"><?php echo number_format($rowQTY['USERSECONDARYQUANTITY'],2)." ".$rowQTY['USERSECONDARYUOMCODE']; ?></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
          <td colspan="3"><table width="100%" border="0">
            <tbody>
              <tr>
                <td width="20%" align="right">KETERANGAN</td>
                <td width="5%" align="left">:</td>
                <td width="70%" align="left">Saat kain berpindah gerobak, "Identitas Product" ini</td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
          <td colspan="3"><table width="100%" border="0">
            <tbody>
              <tr>
                <td width="20%" align="right">&nbsp;</td>
                <td width="5%" align="left">&nbsp;</td>
                <td width="70%" align="left">wajib ikut disertakan</td>
              </tr>
            </tbody>
          </table></td>
      </tr>
      <tr>
          <td colspan="3" width="100%" align="right"><?php
                  include "../../phpqrcode/qrlib.php"; 
                  $tempdir1 = "../../temp/"; //Nama folder tempat menyimpan file qrcode
                  if (!file_exists($tempdir1)) //Buat folder bername temp
                  mkdir($tempdir1);

                  //isi qrcode jika di scan
                  $codeContents1 = "https://online.indotaichen.com/nowgerobak/CetakKartuGerobak-".$Demand;
                  //nama file qrcode yang akan disimpan
                  $namaFile1=$Demand.".png";
                  //ECC Level
                  $level1=QR_ECLEVEL_H;
                  //Ukuran pixel
                  $UkuranPixel1=2; //10
                  //Ukuran frame
                  $UkuranFrame1=2; //4

                  QRcode::png($codeContents1, $tempdir1.$namaFile1, $level1, $UkuranPixel1, $UkuranFrame1); 

                  echo '<img src="'.$tempdir1.$namaFile1.'" />';  

              ?></td>
      </tr>
      <tr>
          <td colspan="3" width="100%" align="right"><?php echo date("d F Y");?></td>
      </tr>
    </tbody>
  </table>
  <br />


</body>

</html>