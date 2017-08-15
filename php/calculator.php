<style type="text/css">
	.tr {
		text-align: left;
	}

	.header {
		background-color: lightblue;
	}
	
	.end1 {
		background-color: yellow;
	}
	
	.end2 {
		background-color: orange;
	}
	
	.end3 {
		background-color: green;
	}
	
	.totals {
		background-color: lightgreen;
	}
</style>

<?php
	header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
	header("Content-disposition: attachment; filename=DiaxorismosDEI.xls");
	
	if(isset($_GET['prevDate']) && !empty($_GET['prevDate'])) {
	    $prevDate = $_GET['prevDate'];
	}
	if(isset($_GET['newDate']) && !empty($_GET['newDate'])) {
	    $newDate = $_GET['newDate'];
	}
	if(isset($_GET['prevMainK']) && !empty($_GET['prevMainK'])) {
	    $prevMainK = $_GET['prevMainK'];
	}
	if(isset($_GET['newMainK']) && !empty($_GET['newMainK'])) {
	    $newMainK = $_GET['newMainK'];
	}
	if(isset($_GET['prevMainM']) && !empty($_GET['prevMainM'])) {
	    $prevMainM = $_GET['prevMainM'];
	}
	if(isset($_GET['newMainM']) && !empty($_GET['newMainM'])) {
	    $newMainM = $_GET['newMainM'];
	}
	if(isset($_GET['prevEnd1']) && !empty($_GET['prevEnd1'])) {
	    $prevEnd1 = $_GET['prevEnd1'];
	}
	if(isset($_GET['newEnd1']) && !empty($_GET['newEnd1'])) {
	    $newEnd1 = $_GET['newEnd1'];
	}
	if(isset($_GET['prevEnd2']) && !empty($_GET['prevEnd2'])) {
	    $prevEnd2 = $_GET['prevEnd2'];
	}
	if(isset($_GET['newEnd2']) && !empty($_GET['newEnd2'])) {
	    $newEnd2 = $_GET['newEnd2'];
	}
	if(isset($_GET['powerCost']) && !empty($_GET['powerCost'])) {
	    $powerCost = $_GET['powerCost'];
	}
	if(isset($_GET['taxCost']) && !empty($_GET['taxCost'])) {
	    $taxCost = $_GET['taxCost'];
	}
	
	$difMainK = $newMainK - $prevMainK;
	$difMainM = $newMainM - $prevMainM;
	$difMain = ($newMainK - $prevMainK) + ($newMainM - $prevMainM);
	
	$nameEnd1 = "ΔΗΜΗΤΡΗΣ";
	$nameEnd2 = "ΓΙΩΡΓΟΣ";
	$nameEnd3 = "ΜΠΑΜΠΗΣ";
	
	$difEnd1 = $newEnd1 - $prevEnd1;
	$difEnd2 = $newEnd2 - $prevEnd2;
	$difEnd3 = $difMain - ($difEnd1 + $difEnd2);
	
	$powerPercentEnd1 = $difEnd1 / $difMain;
	$powerPercentEnd2 = $difEnd2 / $difMain;
	$powerPercentEnd3 = $difEnd3 / $difMain;
	
	$totalSm = 326;
	$smEnd1 = 100;
	$smEnd2 = 100;
	$smEnd3 = 126;
	
	$taxPercentEnd1 = $smEnd1 / $totalSm;
	$taxPercentEnd2 = $smEnd2 / $totalSm;
	$taxPercentEnd3 = $smEnd3 / $totalSm;
	
	$powerCostEnd1 = $powerCost * $powerPercentEnd1;
	$powerCostEnd2 = $powerCost * $powerPercentEnd2;
	$powerCostEnd3 = $powerCost * $powerPercentEnd3;
	$powerCostTotal = $powerCostEnd1 + $powerCostEnd2 + $powerCostEnd3;
	
	$taxCostEnd1 = $taxCost * $taxPercentEnd1;
	$taxCostEnd2 = $taxCost * $taxPercentEnd2;
	$taxCostEnd3 = $taxCost * $taxPercentEnd3;
	$taxCostTotal = $taxCostEnd1 + $taxCostEnd2 + $taxCostEnd3;
	
	$totalCostEnd1 = $powerCostEnd1 + $taxCostEnd1;
	$totalCostEnd2 = $powerCostEnd2 + $taxCostEnd2;
	$totalCostEnd3 = $powerCostEnd3 + $taxCostEnd3;
	$totalCost = $totalCostEnd1 + $totalCostEnd2 + $totalCostEnd3;
?>

<table>
	<tr class="header">
		<th></th>
		<th>ΠΡΟΗΓΟΥΜΕΝΗ ΜΕΤΡΗΣΗ ΚΕΝΤΡΙΚΟΣ <br><?php echo $prevDate ?></th>
		<th>ΝΕΑ ΜΕΤΡΗΣΗ ΚΕΝΤΡΙΚΟΣ <br><?php echo $newDate ?></th>
		<th>ΔΙΑΦΟΡΑ ΚΑΤΑΝΑΛΩΣΗΣ</th>
	</tr>
	<tr class="tr">
		<td class="header"></td>
		<td><?php echo 'K '. $prevMainK ?>*</td>
		<td><?php echo 'K '. $newMainK ?>*</td>
		<td><?php echo $difMainK ?>*</td>
	</tr>
	<tr class="tr">
		<td class="header"></td>
		<td><?php echo 'M '. $prevMainM ?>*</td>
		<td><?php echo 'M '. $newMainM ?>*</td>
		<td><?php echo $difMainM ?>*</td>
	</tr>
	<tr class="tr">
		<td class="header">ΣΥΝΟΛΟ</td>
		<td></td>
		<td></td>
		<td  class="totals"><?php echo $difMain ?>*</td>
	</tr>
	<tr class="tr">
		<td class="header">*kwh</td>
	</tr>
</table>
<br>
<table>
	<tr class="header">
		<th></th>
		<th>ΗΜΕΡΟΜΗΝΙΑ</th>
		<th>ΕΝΔΙΑΜΕΣΟΣ 1</th>
		<th>ΕΝΔΙΑΜΕΣΟΣ 2</th>
		<th>ΔΙΑΦΟΡΑ 3</th>
		<th>ΣΥΝΟΛΟ</th>
	</tr>
	<tr class="tr">
		<td class="header">ΠΡΟΗΓΟΥΜΕΝΗ</td>
		<td><?php echo $prevDate ?></td>
		<td><?php echo $prevEnd1 ?>*</td>
		<td><?php echo $prevEnd2 ?>*</td>
	</tr>
	<tr class="tr">
		<td class="header">ΝΕΑ</td>
		<td><?php echo $newDate ?></td>
		<td><?php echo $newEnd1 ?>*</td>
		<td><?php echo $newEnd2 ?>*</td>
	</tr>
	<tr class="tr">
		<td class="header">ΔΙΑΦΟΡΑ ΚΑΤΑΝΑΛΩΣΗΣ</td>
		<td></td>
		<td class="end1"><?php echo $difEnd1 .'* '. $nameEnd1 ?></td>
		<td class="end2"><?php echo $difEnd2 .'* '. $nameEnd2 ?></td>
		<td class="end3"><?php echo $difEnd3 .'* '. $nameEnd3 ?></td>
		<td  class="totals"><?php echo $difMain ?> *</td>
	</tr>
	<tr class="tr">
		<td class="header">*kwh</td>
	</tr>
</table>
<br>
<table>
	<tr class="header">
		<th colspan="3">ΠΟΣΟΣΤΑ *ΡΕΥΜΑΤΟΣ %</th>
		<th colspan="3">ΠΟΣΟΣΤΑ **ΤΕΛΩΝ ΔΗΜΟΥ %</th>
	</tr>
	<tr class="tr">
		<td class="header">ΕΝΔΙΑΜΕΣΟΣ 1</td>
		<td><?php echo $difEnd1 .'/'. $difMain  ?></td>
		<td class="end1"><?php echo number_format($powerPercentEnd1*100, 2) .'%' ?>*</td>
		<td>2ος ΟΡ.</td>
		<td><?php echo $smEnd1 .'/'. $totalSm  ?></td>
		<td class="end1"><?php echo number_format($taxPercentEnd1*100, 2) .' '. $nameEnd1 ?></td>
	</tr>
	<tr class="tr">
		<td class="header">ΕΝΔΙΑΜΕΣΟΣ 2</td>
		<td><?php echo $difEnd2 .'/'. $difMain  ?></td>
		<td class="end2"><?php echo number_format($powerPercentEnd2*100, 2) .'%' ?>*</td>
		<td>1ος ΟΡ.</td>
		<td><?php echo $smEnd2 .'/'. $totalSm  ?></td>
		<td class="end2"><?php echo number_format($taxPercentEnd2*100, 2) .'% '. $nameEnd2 ?></td>
	</tr>
	<tr class="tr">
		<td class="header">ΕΝΔΙΑΜΕΣΟΣ 3</td>
		<td><?php echo $difEnd3 .'/'. $difMain  ?></td>
		<td class="end3"><?php echo number_format($powerPercentEnd3*100,2) .'%' ?>*</td>
		<td>ΙΣΟΓ.</td>
		<td><?php echo $smEnd3 .'/'. $totalSm  ?></td>
		<td class="end3"><?php echo number_format($taxPercentEnd3*100, 2) .'% '. $nameEnd3 ?></td>
	</tr>
	<tr class="tr">
		<td class="header">*kwh</td>
	</tr>
	<tr class="tr">
		<td class="header">**m^2</td>
	</tr>
</table>
<br>
<table>
	<tr class="header">
		<th colspan="4">ΔΙΑΧΩΡΙΣΜΟΣ ΔΕΗ ΛΗΞΗΣ <?php echo $newDate ?></th>
	</tr>
	<tr class="header">
		<th>ΟΝΟΜΑ</th>
		<th>ΑΞΙΑ ΡΕΥΜΑΤΟΣ</th>
		<th>ΑΞΙΑ ΔΗΜ. ΤΕΛΩΝ-ΕΡΤ</th>
		<th>ΣΥΝΟΛΟ</th>
	</tr>
	<tr class="tr">
		<td class="end1"><?php echo $nameEnd1  ?></td>
		<td><?php echo $powerCost .'€ x '. number_format($powerPercentEnd1*100, 2) .'% = '. number_format($powerCostEnd1, 2) .'€' ?></td>
		<td><?php echo $taxCost .'€ x '. number_format($taxPercentEnd1*100, 2) .'% = '. number_format($taxCostEnd1, 2) .'€' ?></td>
		<td class="end1"><?php echo number_format($totalCostEnd1, 2) .'€' ?></td>
	</tr>
	<tr class="tr">
		<td class="end2"><?php echo $nameEnd2  ?></td>
		<td><?php echo $powerCost .'€ x '. number_format($powerPercentEnd2*100, 2) .'% = '. number_format($powerCostEnd2, 2) .'€' ?></td>
		<td><?php echo $taxCost .'€ x '. number_format($taxPercentEnd2*100, 2) .'% = '. number_format($taxCostEnd2, 2) .'€' ?></td>
		<td class="end2"><?php echo number_format($totalCostEnd2, 2) .'€' ?></td>
	</tr>
	<tr class="tr">
		<td class="end3"><?php echo $nameEnd3  ?></td>
		<td><?php echo $powerCost .'€ x '. number_format($powerPercentEnd3*100, 2) .'% = '. number_format($powerCostEnd3, 2) .'€' ?></td>
		<td><?php echo $taxCost .'€ x '. number_format($taxPercentEnd3*100, 2) .'% = '. number_format($taxCostEnd3, 2) .'€' ?></td>
		<td class="end3"><?php echo number_format($totalCostEnd3, 2) .'€' ?></td>
	</tr>
	<tr>
		<td class="totals">ΣΥΝΟΛΑ</td>
		<td class="totals"><?php echo $powerCostTotal .'€' ?></td>
		<td class="totals"><?php echo $taxCostTotal .'€' ?></td>
		<td class="totals"><?php echo $totalCost .'€' ?></td>
	</tr>
</table>