<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
//--
// $Demand = $_GET['demand'];
$Demand = $_GET['nokk'];
//-
$sqlDB2 = "	SELECT 
LISTAGG(TRIM(PRODUCTIONDEMAND.CODE),', ') AS CODE,
A.PRODUCTIONORDERCODE,
MAX(PRODUCTIONDEMAND.ITEMTYPEAFICODE) AS ITEMTYPEAFICODE,
LISTAGG(DISTINCT(PRODUCTIONDEMAND.DESCRIPTION),', ') AS DESCRIPTION,
MAX(TRIM(PRODUCTIONDEMAND.SUBCODE01)) AS SUBCODE01,
MAX(TRIM(PRODUCTIONDEMAND.SUBCODE02)) AS SUBCODE02,
MAX(TRIM(PRODUCTIONDEMAND.SUBCODE03)) AS SUBCODE03,
MAX(TRIM(PRODUCTIONDEMAND.SUBCODE04)) AS SUBCODE04,
MAX(TRIM(PRODUCTIONDEMAND.SUBCODE05)) AS SUBCODE05,
MAX(TRIM(PRODUCTIONDEMAND.SUBCODE06)) AS SUBCODE06,
MAX(TRIM(PRODUCTIONDEMAND.SUBCODE07)) AS SUBCODE07,
MAX(TRIM(PRODUCTIONDEMAND.SUBCODE08)) AS SUBCODE08,
MAX(TRIM(PRODUCTIONDEMAND.SUBCODE09)) AS SUBCODE09,
MAX(TRIM(PRODUCTIONDEMAND.SUBCODE10)) AS SUBCODE10,
MAX(PRODUCT.LONGDESCRIPTION) AS JENIS_KAIN,
LISTAGG(DISTINCT(PRODUCTIONDEMAND.PROJECTCODE),',') AS PROJECTCODE,
LISTAGG(DISTINCT(PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE),',') AS ORIGDLVSALORDLINESALORDERCODE,
LISTAGG(PRODUCTIONDEMAND.ORIGDLVSALORDERLINEORDERLINE,',') AS ORIGDLVSALORDERLINEORDERLINE, 
LISTAGG(PRODUCTIONDEMAND.DLVSALORDERLINESALESORDERCODE,',') AS DLVSALORDERLINESALESORDERCODE,
LISTAGG(PRODUCTIONDEMAND.DLVSALESORDERLINEORDERLINE,',') AS DLVSALESORDERLINEORDERLINE,
LISTAGG(PRODUCTIONDEMAND.FINALPLANNEDDATE,',')AS FINALPLANNEDDATE,
LISTAGG(PRODUCTIONDEMAND.EXTERNALREFERENCE,',')AS EXTERNALREFERENCE,
LISTAGG(PRODUCTIONDEMAND.INTERNALREFERENCE,',')AS INTERNALREFERENCE,
SUM(PRODUCTIONDEMAND.USERPRIMARYQUANTITY) AS USERPRIMARYQUANTITY,
MAX(PRODUCTIONDEMAND.USERPRIMARYUOMCODE) AS USERPRIMARYUOMCODE,
SUM(PRODUCTIONDEMAND.USERSECONDARYQUANTITY) AS USERSECONDARYQUANTITY,
MAX(PRODUCTIONDEMAND.USERSECONDARYUOMCODE) AS USERSECONDARYUOMCODE,
MAX(ITXVIEWCOLOR.WARNA) AS WARNA, 
LISTAGG(DISTINCT(SALESORDERDELIVERY.DELIVERYDATE),',') AS DELIVERYDATE,
LISTAGG(DISTINCT(BUSINESSPARTNER.LEGALNAME1),',') AS LANGGANAN,
LISTAGG(DISTINCT(ORDERPARTNERBRAND.LONGDESCRIPTION),',') AS BUYER
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
WHERE
A.PRODUCTIONORDERCODE ='$Demand'
--PRODUCTIONDEMAND.CODE='00328540'
GROUP BY 
A.PRODUCTIONORDERCODE";
// Old Berdasarkan Demand
		// $sqlDB2 = "SELECT 
		// PRODUCTIONDEMAND.CODE,
		// A.PRODUCTIONORDERCODE,
		// PRODUCTIONDEMAND.ITEMTYPEAFICODE,
		// PRODUCTIONDEMAND.DESCRIPTION,
		// TRIM(PRODUCTIONDEMAND.SUBCODE01) AS SUBCODE01,
		// TRIM(PRODUCTIONDEMAND.SUBCODE02) AS SUBCODE02,
		// TRIM(PRODUCTIONDEMAND.SUBCODE03) AS SUBCODE03,
		// TRIM(PRODUCTIONDEMAND.SUBCODE04) AS SUBCODE04,
		// TRIM(PRODUCTIONDEMAND.SUBCODE05) AS SUBCODE05,
		// TRIM(PRODUCTIONDEMAND.SUBCODE06) AS SUBCODE06,
		// TRIM(PRODUCTIONDEMAND.SUBCODE07) AS SUBCODE07,
		// TRIM(PRODUCTIONDEMAND.SUBCODE08) AS SUBCODE08,
		// TRIM(PRODUCTIONDEMAND.SUBCODE09) AS SUBCODE09,
		// TRIM(PRODUCTIONDEMAND.SUBCODE10) AS SUBCODE10,
		// PRODUCT.LONGDESCRIPTION AS JENIS_KAIN,
		// PRODUCTIONDEMAND.PROJECTCODE,
		// PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE,
		// PRODUCTIONDEMAND.ORIGDLVSALORDERLINEORDERLINE, 
		// PRODUCTIONDEMAND.DLVSALORDERLINESALESORDERCODE,
		// PRODUCTIONDEMAND.DLVSALESORDERLINEORDERLINE,
		// PRODUCTIONDEMAND.FINALPLANNEDDATE,
		// PRODUCTIONDEMAND.EXTERNALREFERENCE,
		// PRODUCTIONDEMAND.INTERNALREFERENCE,
		// PRODUCTIONDEMAND.USERPRIMARYQUANTITY,
		// PRODUCTIONDEMAND.USERPRIMARYUOMCODE,
		// PRODUCTIONDEMAND.USERSECONDARYQUANTITY,
		// PRODUCTIONDEMAND.USERSECONDARYUOMCODE,
		// ITXVIEWCOLOR.WARNA, 
		// SALESORDERDELIVERY.DELIVERYDATE,
		// BUSINESSPARTNER.LEGALNAME1 AS LANGGANAN,
		// ORDERPARTNERBRAND.LONGDESCRIPTION AS BUYER
		// FROM PRODUCTIONDEMAND PRODUCTIONDEMAND
		// LEFT JOIN ITXVIEWCOLOR ITXVIEWCOLOR
		// ON PRODUCTIONDEMAND.ITEMTYPEAFICODE = ITXVIEWCOLOR.ITEMTYPECODE AND 
		// PRODUCTIONDEMAND.SUBCODE01 = ITXVIEWCOLOR.SUBCODE01 AND 
		// PRODUCTIONDEMAND.SUBCODE02 = ITXVIEWCOLOR.SUBCODE02 AND 
		// PRODUCTIONDEMAND.SUBCODE03 = ITXVIEWCOLOR.SUBCODE03 AND 
		// PRODUCTIONDEMAND.SUBCODE04 = ITXVIEWCOLOR.SUBCODE04 AND 
		// PRODUCTIONDEMAND.SUBCODE05 = ITXVIEWCOLOR.SUBCODE05 AND 
		// PRODUCTIONDEMAND.SUBCODE06 = ITXVIEWCOLOR.SUBCODE06 AND 
		// PRODUCTIONDEMAND.SUBCODE07 = ITXVIEWCOLOR.SUBCODE07 AND 
		// PRODUCTIONDEMAND.SUBCODE08 = ITXVIEWCOLOR.SUBCODE08 AND 
		// PRODUCTIONDEMAND.SUBCODE09 = ITXVIEWCOLOR.SUBCODE09 AND 
		// PRODUCTIONDEMAND.SUBCODE10 = ITXVIEWCOLOR.SUBCODE10
		// LEFT JOIN PRODUCT PRODUCT 
		// ON PRODUCTIONDEMAND.ITEMTYPEAFICODE = PRODUCT.ITEMTYPECODE AND 
		// PRODUCTIONDEMAND.SUBCODE01 = PRODUCT.SUBCODE01 AND 
		// PRODUCTIONDEMAND.SUBCODE02 = PRODUCT.SUBCODE02 AND 
		// PRODUCTIONDEMAND.SUBCODE03 = PRODUCT.SUBCODE03 AND 
		// PRODUCTIONDEMAND.SUBCODE04 = PRODUCT.SUBCODE04 AND 
		// PRODUCTIONDEMAND.SUBCODE05 = PRODUCT.SUBCODE05 AND 
		// PRODUCTIONDEMAND.SUBCODE06 = PRODUCT.SUBCODE06 AND 
		// PRODUCTIONDEMAND.SUBCODE07 = PRODUCT.SUBCODE07 AND 
		// PRODUCTIONDEMAND.SUBCODE08 = PRODUCT.SUBCODE08 AND 
		// PRODUCTIONDEMAND.SUBCODE09 = PRODUCT.SUBCODE09 AND 
		// PRODUCTIONDEMAND.SUBCODE10 = PRODUCT.SUBCODE10
		// LEFT JOIN (
		//   SELECT PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
		//   PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE
		//   FROM PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
		//   GROUP BY PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
		//   PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE
		// ) A ON PRODUCTIONDEMAND.CODE = A.PRODUCTIONDEMANDCODE 
		// LEFT JOIN SALESORDERDELIVERY SALESORDERDELIVERY ON PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE = SALESORDERDELIVERY.SALESORDERLINESALESORDERCODE AND 
		// PRODUCTIONDEMAND.ORIGDLVSALORDERLINEORDERLINE = SALESORDERDELIVERY.SALESORDERLINEORDERLINE
		// LEFT JOIN ORDERPARTNER ORDERPARTNER 
		// ON PRODUCTIONDEMAND.CUSTOMERCODE = ORDERPARTNER.CUSTOMERSUPPLIERCODE 
		// LEFT JOIN BUSINESSPARTNER BUSINESSPARTNER 
		// ON ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID = BUSINESSPARTNER.NUMBERID 
		// LEFT JOIN SALESORDER SALESORDER ON 
		// PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE = SALESORDER.CODE 
		// LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND ON 
		// SALESORDER.ORDERPARTNERBRANDCODE = ORDERPARTNERBRAND.CODE AND SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE
		// WHERE PRODUCTIONDEMAND.CODE='$Demand'
		// ORDER BY PRODUCTIONDEMAND.CODE ASC";
// End Query
$stmt = db2_exec($conn1, $sqlDB2, array('cursor' => DB2_SCROLLABLE));
$rowdb2 = db2_fetch_assoc($stmt);

// OLD Query
	// $sqlQTY = "SELECT 
	//   ORDERCODE,
	//   PRODUCTIONORDERCODE,
	//   USERPRIMARYQUANTITY,
	//   USERPRIMARYUOMCODE,
	//   USERSECONDARYQUANTITY, 
	//   USERSECONDARYUOMCODE
	//   FROM
	//   ITXVIEW_RESERVATION_KK 
	//   WHERE ORDERCODE = '$Demand'";
// End 
$sqlQTY = "SELECT 
  LISTAGG(TRIM(ORDERCODE),',') AS ORDERCODE,
  PRODUCTIONORDERCODE,
  SUM(USERPRIMARYQUANTITY) AS USERPRIMARYQUANTITY,
  LISTAGG(DISTINCT(USERPRIMARYUOMCODE),',') AS USERPRIMARYUOMCODE,
  SUM(USERSECONDARYQUANTITY) AS USERSECONDARYQUANTITY, 
  LISTAGG(DISTINCT(USERSECONDARYUOMCODE),',') AS USERSECONDARYUOMCODE
  FROM
  ITXVIEW_RESERVATION_KK 
  WHERE PRODUCTIONORDERCODE = '$Demand'
  GROUP BY 
  PRODUCTIONORDERCODE";
$stmt1 = db2_exec($conn1, $sqlQTY, array('cursor' => DB2_SCROLLABLE));
$rowQTY = db2_fetch_assoc($stmt1);



// Old query
	// $sql2 = "SELECT
	// 	a.* 
	// FROM
	// 	PRODUCTIONDEMAND p
	// 	LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID 
	// WHERE
	// 	p.CODE = '$Demand' 
	// 	AND a.FIELDNAME = 'DefectNote' ";
// End Old q
$sql2 = "SELECT
	LISTAGG((a.VALUESTRING||'-' ||TRIM(p.CODE)),', ') AS VALUESTRING
FROM
	PRODUCTIONDEMAND p
	LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID 
	LEFT JOIN ( SELECT
            DISTINCT p2.PRODUCTIONDEMANDCODE,
            p2.PRODUCTIONORDERCODE
        FROM
            PRODUCTIONDEMANDSTEP p2)p2 ON p2.PRODUCTIONDEMANDCODE = p.CODE
WHERE
	p2.PRODUCTIONORDERCODE = '$Demand' 
	AND a.FIELDNAME = 'DefectNote' ";

$stmt2 = db2_exec($conn1, $sql2, array('cursor' => DB2_SCROLLABLE));
$rowket = db2_fetch_assoc($stmt2);

// Old Query
	// $sql3 = "SELECT
	//             a.*,
	//             u.LONGDESCRIPTION
	//          FROM
	//             PRODUCTIONDEMAND p
	//             LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID
	//             LEFT JOIN USERGENERICGROUP u ON u.CODE = a.VALUESTRING
	// WHERE
	// 	p.CODE = '$Demand' 
	// 	AND a.FIELDNAME = 'DefectTypeCode'";
// End
$sql3 = "SELECT
            LISTAGG((a.VALUESTRING || '-' ||u.LONGDESCRIPTION ||'-' || TRIM(p.CODE)),', ') AS VALUESTRING,
            p2.PRODUCTIONORDERCODE
         FROM
            PRODUCTIONDEMAND p
            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID
            LEFT JOIN USERGENERICGROUP u ON u.CODE = a.VALUESTRING
            LEFT JOIN (SELECT PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
  PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE
  FROM PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
  GROUP BY PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
  PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE) p2 ON p2.PRODUCTIONDEMANDCODE = p.CODE
WHERE PRODUCTIONORDERCODE = '$Demand' AND a.FIELDNAME = 'DefectTypeCode'
GROUP BY 
p2.PRODUCTIONORDERCODE";
$stmt3 = db2_exec($conn1, $sql3, array('cursor' => DB2_SCROLLABLE));
$rowket2 = db2_fetch_assoc($stmt3);

// Old query
	// $sql4 = "SELECT
	// 	a.* 
	// FROM
	// 	PRODUCTIONDEMAND p
	// 	LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID 
	// WHERE
	// 	p.CODE = '$Demand' 
	// 	AND a.FIELDNAME = 'OriginalPDCode'";
// End 

$sql4 = "SELECT
	LISTAGG((a.VALUESTRING || '-' || TRIM(p.CODE)),', ') AS VALUESTRING
FROM
	PRODUCTIONDEMAND p
	LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID 
	LEFT JOIN (SELECT PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
  PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE
  FROM PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
  GROUP BY PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
  PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE) p2 ON p2.PRODUCTIONDEMANDCODE = p.CODE
WHERE
	p2.PRODUCTIONORDERCODE = '$Demand'
	AND a.FIELDNAME = 'OriginalPDCode'";

$stmt4 = db2_exec($conn1, $sql4, array('cursor' => DB2_SCROLLABLE));
$rowket4 = db2_fetch_assoc($stmt4);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="styles_cetak.css" rel="stylesheet" type="text/css">
	<title>Cetak Kartu Gerobak</title>


	<style>
		/* Gaya umum untuk layar */
		.table-list1 td,
		.table-list1 th {
			padding: 0;
			font-size: 14px;
			border-bottom: 0px #000000 solid;
			border-top: 0px #000000 solid;
			border-left: 0px #000000 solid;
			border-right: 0px #000000 solid;
			/* Ukuran font standar untuk tampilan layar */
		}

		/* Gaya untuk cetakan */
		@media print {


			/* Mencegah elemen mengecil */
			td,
			th {
				padding: 0;
				/* Mencegah teks untuk membungkus dan mengecil */
			}

			.tabelbawah {

				white-space: nowrap;
			}
		}
	</style>
</head>

<body>
	<table width="100%" border="" class="table-list1" style="border-bottom:1px #000000 solid; border-top:1px #000000 solid; border-left:1px #000000 solid; border-right:1px #000000 solid;">
		<tr>
			<td width="10%" align="center">
				<img src="ITTI_Logo 2021BW.png" width="50" height="50" alt="" />
			</td>
			<td width="58%" align="center" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-left:1px #000000 solid; border-right:1px #000000 solid;">
				<strong>
					<font size="+2">KARTU GEROBAK</font>
				</strong>
			</td>
			<td width="32%" align="center">
				<table width="100%">
					<tbody>
						<tr>
							<td width="36%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">
								No. Form
							</td>
							<td width="5%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">
								:
							</td>
							<td width="59%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">
								20-03
							</td>
						</tr>
						<tr>
							<td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">
								No Revisi
							</td>
							<td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">
								:
							</td>
							<td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">
								04
							</td>
						</tr>
						<tr>
							<td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">
								Tgl. Terbit
							</td>
							<td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">
								:
							</td>
							<td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">
								<!-- Dikosongin Dulu Nunggu Form Dari QA -->
									<!-- 26 July 2024 -->
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</table>

	<table width="100%" border="" class="table-list1">
		<tbody>
			<tr>
				<td width="10%" scope="col" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">

				</td>
				<td width="45%" scope="col" align="center">
					<h3>Production Order</h3>
				</td>
				<td width="50%" scope="col" align="right">
					<?php
					include "../../phpqrcode/qrlib.php";
					$tempdir1 = "../../temp/"; //Nama folder tempat menyimpan file qrcode
					if (!file_exists($tempdir1)) //Buat folder bername temp
						mkdir($tempdir1);

					//isi qrcode jika di scan
					$codeContents1 = "https://online.indotaichen.com/nowgerobak/CetakKartuGerobak-" . $Demand;
					//nama file qrcode yang akan disimpan
					$namaFile1 = $Order . ".png";
					//ECC Level
					$level1 = QR_ECLEVEL_H;
					//Ukuran pixel
					$UkuranPixel1 = 2; //10
					//Ukuran frame
					$UkuranFrame1 = 2; //4

					QRcode::png($codeContents1, $tempdir1 . $namaFile1, $level1, $UkuranPixel1, $UkuranFrame1);

					echo '<img src="' . $tempdir1 . $namaFile1 . '" />';

					?>
					<br>
					<?php echo date("d F Y"); ?>
				</td>
			</tr>
			<tr>
				<td width="10%" scope="col" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">
					<table width="83" border="0">
						<tbody>
							<tr>
								<td align="left" valign="middle"><strong>&nbsp;</strong></td>
							</tr>
						</tbody>
					</table>
				</td>
				<td align="center" valign="top">
					<?php if ($Demand != '')
						echo '<img src="../../php-barcode-master/barcode.php?text=' . $Demand . '&print=true&size=50&sizefactor=2" />'; ?>
				</td>
				<td width="50%" scope="col" align="center">
					<h3>&nbsp;</h3>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td width="20%" align="right">P. DEMAND</td>
								<td width="5%" align="left">:</td>
								<td width="70%" align="left">
									<strong><?php echo $rowdb2['CODE']; ?></strong>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td width="20%" align="right">P. DEMAND DESCRIPTION</td>
								<td width="5%" align="left">:</td>
								<td width="70%" align="left"><?php echo $rowdb2['DESCRIPTION']; ?></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td width="20%" align="right">DELIVERY DATE</td>
								<td width="5%" align="left">:</td>
								<td width="70%" align="left">
								<?php 
									// Mengambil array tanggal dari $rowdb2['DELIVERYDATE']
									$dates = explode(',', $rowdb2['DELIVERYDATE']); 
									
									// Format tanggal dan gabungkan dengan koma
									$formatted_dates = array_map(function($date) {
										return date("d F Y", strtotime(trim($date)));
									}, $dates);

									// Gabungkan tanggal yang sudah diformat
									echo implode(', ', $formatted_dates); 
								?>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td width="20%" align="right">FULL ITEM</td>
								<td width="5%" align="left">:</td>
								<td width="70%" align="left">
									<?php echo $rowdb2['SUBCODE01'] . "-" . $rowdb2['SUBCODE02'] . "-" . $rowdb2['SUBCODE03'] . "-" . $rowdb2['SUBCODE04'] . "-" . $rowdb2['SUBCODE05'] . "-" . $rowdb2['SUBCODE06'] . "-" . $rowdb2['SUBCODE07'] . "-" . $rowdb2['SUBCODE08'] . "-" . $rowdb2['SUBCODE09'] . "-" . $rowdb2['SUBCODE10']; ?>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td width="20%" align="right">DESCRIPTION</td>
								<td width="5%" align="left">:</td>
								<td width="70%" align="left"><?php echo $rowdb2['JENIS_KAIN']; ?></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td width="20%" align="right">COLOR NAME</td>
								<td width="5%" align="left">:</td>
								<td width="70%" align="left"><?php echo $rowdb2['WARNA']; ?></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td width="20%" align="right">PROJECT CODE</td>
								<td width="5%" align="left">:</td>
								<td width="70%" align="left"><?php echo $rowdb2['ORIGDLVSALORDLINESALORDERCODE']; ?>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td width="20%" align="right">CUSTOMER</td>
								<td width="5%" align="left">:</td>
								<td width="70%" align="left"><?php echo $rowdb2['LANGGANAN']; ?></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td width="20%" align="right">QTY</td>
								<td width="5%" align="left">:</td>
								<td width="70%" align="left">
									<?php echo number_format($rowQTY['USERPRIMARYQUANTITY'], 2) . " " . $rowQTY['USERPRIMARYUOMCODE']; ?>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td width="20%" align="right">&nbsp;</td>
								<td width="5%" align="left">&nbsp;</td>
								<td width="70%" align="left">
									<?php echo number_format($rowQTY['USERSECONDARYQUANTITY'], 2) . " " . $rowQTY['USERSECONDARYUOMCODE']; ?>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td width="20%" align="right">KETERANGAN</td>
								<td width="5%" align="left">:</td>
								<td width="70%" align="left">Saat kain berpindah gerobak, "Kartu Gerobak" ini</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td width="20%" align="right">&nbsp;</td>
								<td width="5%" align="left">&nbsp;</td>
								<td width="70%" align="left">wajib ikut disertakan</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td width="20%" align="right">DEFECT NOTE</td>
								<td width="5%" align="left">:</td>
								<td width="70%" align="left"><?php echo $rowket['VALUESTRING'] ?></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td width="20%" align="right">DEFECT TYPE CODE</td>
								<td width="5%" align="left">:</td>
								<td width="70%" align="left">
									<?php echo $rowket2['VALUESTRING']; ?>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td width="20%" align="right">ORIGINAL PD CODE</td>
								<td width="5%" align="left">:</td>
								<td width="70%" align="left"><?php echo $rowket4['VALUESTRING']; ?></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
	<tbody>
		<table border="1" cellpadding="1" cellspacing="0" width="100%" class="tabelbawah">
			<!--<caption>Tabel 11x12</caption>-->
			<thead>
				<tr>

					<th width="10%">Alur Proses</th>
					<th width="8%">TGL</th>
					<th colspan="16">No.Gerobak</th>

				</tr>
			</thead>
			<tbody>
				<?php
				if($_GET['nokk']){
					$where		= "PRODUCTIONORDERCODE = '$_GET[nokk]'";
				}else{
					$where		= "PRODUCTIONORDERCODE = '$rowdb2[PRODUCTIONORDERCODE]'";
				}
				// Old Query
					// $sqlOPERATIONCODE = "SELECT
					// 						OPERATIONCODE
					// 					FROM
					// 						ITXVIEW_POSISI_KARTU_KERJA
					// 					WHERE
					// 						PRODUCTIONORDERCODE = '$rowdb2[PRODUCTIONORDERCODE]'
					// 						AND PRODUCTIONDEMANDCODE = '$rowdb2[CODE]'";
				// End 
					
				$sqlOPERATIONCODE = "SELECT DISTINCT 
											OPERATIONCODE,
											STEPNUMBER 
										FROM 
											ITXVIEW_POSISI_KARTU_KERJA
										WHERE 
											PRODUCTIONORDERCODE = '$rowdb2[PRODUCTIONORDERCODE]'
										ORDER BY 
											STEPNUMBER ASC;";
				$stmtlOPERATIONCODE = db2_exec($conn1, $sqlOPERATIONCODE);
				$operationCodes = [];

				while ($row = db2_fetch_assoc($stmtlOPERATIONCODE)) {
					$operationCodes[] = $row['OPERATIONCODE'];
				}
				// Old Query
					// $sqlDB3 = "SELECT 
					// 			*
					// 			FROM
					// 				ITXVIEW_POSISI_KARTU_KERJA
					// 			WHERE
					// 				$where";
				// End
					$sqlDB3 = "SELECT
									DISTINCT (OPERATIONCODE) AS OPERATIONCODE,
									LISTAGG(DISTINCT(SELESAI),
									'; ') AS SELESAI,
									LISTAGG(DISTINCT(GEROBAK),
									'; ') AS GEROBAK,
									MAX(STEPNUMBER) AS STEPNUMBER
								FROM
									ITXVIEW_POSISI_KARTU_KERJA
								WHERE
									$where
								GROUP BY
									PRODUCTIONORDERCODE,
									OPERATIONCODE
								ORDER BY 
									STEPNUMBER ASC 
																	";
					
				$stmt9 = db2_exec($conn1, $sqlDB3);

				if ($stmt9) {
					while ($rowdb3 = db2_fetch_assoc($stmt9)) {
						// Format tanggal tanpa jam
						$date = date('Y-m-d', strtotime($rowdb3['SELESAI']));
						// Split and trim values
						$isigerobak = array_filter(array_map('trim', explode(',', $rowdb3['GEROBAK'])));
						// Fixed number of columns after the date
						$maxColumns = 16;
				?>
						<tr>
							<td width="10%" align="center">
								<?= $rowdb3['OPERATIONCODE']; ?>
							</td>
							<td align="center">
								<?php
								// Display date based on OPERATIONCODE
								if (in_array($rowdb3['OPERATIONCODE'], $operationCodes)) {
									if($date == '1970-01-01'){
										echo '';
									}else{
										echo $date;
									}
								}
								?>
							</td>
							<?php if (in_array($rowdb3['OPERATIONCODE'], $operationCodes)) { ?>
								<?php for ($i = 0; $i < $maxColumns; $i++) { ?>
									<td width="5%" align="center">
										<?php if (isset($isigerobak[$i]) && $isigerobak[$i] != 'Tidak Perlu Gerobak') {
											echo $isigerobak[$i];
										} ?>
									</td>
								<?php } ?>
							<?php } else { ?>
								<td width="5%" align="center"></td>
								<?php for ($i = 0; $i < $maxColumns - 1; $i++) { ?>
									<td></td>
								<?php } ?>
							<?php } ?>
						</tr>
				<?php
					}
				} else {
					echo "<tr><td colspan='13'>Error</td></tr>";
				}
				?>
			</tbody>
		</table>
</body>

</html>