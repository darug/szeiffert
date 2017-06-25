<?php
/**
 * Ez a "content" tábla view része, amely arendelési időt táblázatba írja ki
 * 
 * /

/* @var $this ContentController */

$this->breadcrumbs=array(
	'Rendelesiido'=>array('/rendelesiido'),
	'Rendelesiido',
);
?>
<h1>Rendelési idő</h1>

<table align="center" border="2" cellpadding="2" cellspacing="2" style="height:100px; width:100%">
	<thead>
		<tr>
			<th scope="col">napszak/nap</th>
			<th scope="col">hétfő</th>
			<th scope="col">kedd</th>
			<th scope="col">szerda</th>
			<th scope="col">csütörtök</th>
			<th scope="col">péntek</th>
			<th scope="col">szombat</th>
			<th scope="col">vasárnap</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="text-align:center">délelőtt:</td>
			<td style="text-align:center"><?php echo $model->hde; ?></td>
			<td style="text-align:center"><?php echo $model->kde; ?></td>
			<td style="text-align:center"><?php echo $model->szede; ?></td>
			<td style="text-align:center"><?php echo $model->csde; ?></td>
			<td style="text-align:center"><?php echo $model->pde; ?></td>
			<td style="text-align:center"><?php echo $model->szode; ?></td>
			<td style="text-align:center"><?php echo $model->vde; ?></td>
		</tr>
		<tr>
			<td style="text-align:center">délután:</td>
			<td style="text-align:center"><?php echo $model->hdu; ?></td>
			<td style="text-align:center"><?php echo $model->kdu; ?></td>
			<td style="text-align:center"><?php echo $model->szedu; ?></td>
			<td style="text-align:center"><?php echo $model->csdu; ?></td>
			<td style="text-align:center"><?php echo $model->pdu; ?></td>
			<td style="text-align:center"><?php echo $model->szodu; ?></td>
			<td style="text-align:center"><?php echo $model->vdu; ?></td>
		</tr>
	</tbody>
</table>