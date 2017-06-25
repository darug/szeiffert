<?php
/**
 * Ez a "rendelo" tábla view orvosok része, amely ?????
 * 
 */
/* @var $this RendeloController */
/* @var $rendelo id-hez tartozó rekord */
/* @var $rendelo id-hez tartozó rekord */

$this->breadcrumbs=array(
	'Orvosok',
);
$bUrl = Yii::app()->request->baseUrl;
?>

<?php //echo $this->renderPartial('../_title'); ?>
<h1><?php  echo $rendelo->rend_nev; ?> rendelőhöz tartozó orvosok</h1>
<div>
		<table  >
		<tr>
						<th>Orvos neve</th>
						<th>Szak megnevezése</th>
					
						<th>Honlapja</th>
		</tr>
</div>
<?php // print_r($records);

for($i=0; $i<count($id);$i++){
	echo "<tr><td>".$nev[$i]."</td><td align=center>".$szak_megnevezes[$i]."</td><td align=right><a href=\"".$bUrl."/".$id[$i]."/home\" target=\"_blank\">Honlapra ugrás</a></td></tr>";
} ?>
</table>