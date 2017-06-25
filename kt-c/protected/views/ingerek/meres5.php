<?php
/** @var $this IngerekController 
/* @var	$user csapathoz tartozó felhasználok rekordjai
/* @var $csapat csapat megnevezése	
 */

/*$this->breadcrumbs=array(
	'Ingerek'=>array('meres5'),
//	$model->id,
);*/ 


?>
<script src="http://localhost/dds-yii/js/jquery-1.7.min.js"></script>

<h1><?php echo $csapat." szakosztály  Kontrol-C mérés összegzett diagram kiválasztása " ; ?></h1>
<font color="black" size="4"> 
</font>
	<?php //echo $uscs; ?>
	<?php if(isset($uzen))echo "<p class=red>$uzen</p>"; 	?>
</br>
<table size=100%>
<tr>
<th> ID </th>
<th> Vezeték név</th>
<th> Kesresztnév</th>
<th> Karakter szám</th>
<th> Mérés szám</th>
<th> Utolsó mérés időpontja</th>
<th> Összegzett eredmény</th>	
</tr>	
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view5',
)); ?>
</table>