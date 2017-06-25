<?php
/**
 * Ez a "rendelesiido" tábla view Rendelesiido része, amely a rendelési idő táblázatot és  egyéb információt írja ki.
 * 
 */
/* @var $this RendelesiidoController */

$this->breadcrumbs=array(
	'Rendelesiido'=>array('/rendelesiido'),
	'Rendelesiido',
);
?>
<h1>Rendelési idő</h1>
<pre>
	<?php 
/*	$nap1 = array('h','k','sze','cs','p','szo','v');
	$rendi = new Rendido();
		$rek=$rendi->findAll('id_orvos=:id_orvos',array(
			':id_orvos'=>Yii::app()->params['orvos'],
			));
		for ($i=0; $i < 14 ; $i+=2) { 
			$nap1[$i/2]=!($rek[$i]->oszlop_ki && $rek[$i+1]->oszlop_ki);
		}	
			echo var_dump($nap1); */ ?>
</pre>
<table align="center" border="2" cellpadding="2" cellspacing="2" style="height:100px; width:100%">
	<thead>
		<tr>
			<th scope="col">napszak/nap</th>
			<?php if($model->nap1[0]){ ?><th scope="col">hétfő</th><?php echo $model->h;} ?>
			<?php if($model->nap1[1]){ ?><th scope="col">kedd</th><?php } ?>
			<?php if($model->nap1[2]){ ?><th scope="col">szerda</th><?php } ?>
			<?php if($model->nap1[3]){ ?><th scope="col">csütörtök</th><?php } ?>
			<?php if($model->nap1[4]){ ?><th scope="col">péntek</th><?php } ?>
			<?php if($model->nap1[5]){ ?><th scope="col">szombat</th><?php } ?>
			<?php if($model->nap1[6]){ ?><th scope="col">vasárnap</th><?php } ?>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="text-align:center">délelőtt:</td>
			<?php if($model->nap1[0]){ ?><td style="text-align:center"><?php echo $model->hde; ?></td><?php } ?>
			<?php if($model->nap1[1]){ ?><td style="text-align:center"><?php echo $model->kde; ?></td><?php ;} ?>
			<?php if($model->nap1[2]){ ?><td style="text-align:center"><?php echo $model->szede; ?></td><?php ;} ?>
			<?php if($model->nap1[3]){ ?><td style="text-align:center"><?php echo $model->csde; ?></td><?php ;} ?>
			<?php if($model->nap1[4]){ ?><td style="text-align:center"><?php echo $model->pde; ?></td><?php ;} ?>
			<?php if($model->nap1[5]){ ?><td style="text-align:center"><?php echo $model->szode; ?></td><?php ;} ?>
			<?php if($model->nap1[6]){ ?><td style="text-align:center"><?php echo $model->vde; ?></td><?php ;} ?>
		</tr>
		<tr>
			<td style="text-align:center">délután:</td>
			<?php if($model->nap1[0]){ ?><td style="text-align:center"><?php echo $model->hdu; ?></td><?php ;} ?>
			<?php if($model->nap1[1]){ ?><td style="text-align:center"><?php echo $model->kdu; ?></td><?php ;} ?>
			<?php if($model->nap1[2]){ ?><td style="text-align:center"><?php echo $model->szedu; ?></td><?php ;} ?>
			<?php if($model->nap1[3]){ ?><td style="text-align:center"><?php echo $model->csdu; ?></td><?php ;} ?>
			<?php if($model->nap1[4]){ ?><td style="text-align:center"><?php echo $model->pdu; ?></td><?php ;} ?>
			<?php if($model->nap1[5]){ ?><td style="text-align:center"><?php echo $model->szodu; ?></td><?php ;} ?>
			<?php if($model->nap1[6]){ ?><td style="text-align:center"><?php echo $model->vdu; ?></td><?php ;} ?>
		</tr>
	</tbody>
</table>
<h2><?php echo $model->rendcim; ?></h2>
<p><?php echo $model->rendszov; ?></p>