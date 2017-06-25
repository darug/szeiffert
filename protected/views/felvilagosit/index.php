<?php
/**
 * Ez a "felvilagositcontent" tábla view: index része, amely a keresett tartalmat írja ki
 * 
 * /
/** @var $this FelvilagositController */
/** @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Felvilagositas',
);
$id_orvos=Yii::app()->params['orvos'];

?>
<script>
	$(document).ready(function(){
		$('.long_text').hide();
		$('a.more').click(function(e){
			$('.long_text').slideUp();
			var long = $(this).next('.long_text');
			if(!long.is(':animated')) long.slideDown();
			e.preventDefault();
		});
	});
</script>

<pre><?php //var_dump($_SESSION[ho][$id_orvos]['eudolg'],$id_orvos);  ?></pre>
<?php if($dname="hazi-orvosok.hu"){ ?>
<h1>Ügyeletek és egyéb hasznos információk</h1>
<?php } else { ?>
<h1>Hasznos információk</h1>
<?php } ?>	
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'htmlOptions'=> array('baseScriptUrl'=>'',	)
)); ?>