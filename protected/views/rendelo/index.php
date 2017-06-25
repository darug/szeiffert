<?php
/**
 * Ez a "rendelo" tábla view index része, amely a rendelői oldal tartalmat írja ki
 * 
 */
/* @var $this RendeloController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rendelő',
);


?>

<h1>Háziorvosi rendelő:  <?php  echo  $rendelo->rend_nev; ?></h1>

<?php   $content=Content::model()->find('title=:title',array(':title'=>$rendelo->rend_nev));
	echo $content->content; 
 ?>
<p></p>
<?php  
if($content->noindex!=1){ ?>
 <div>
 	<?php  $this->renderPartial("/rendelo/rendelo",array(
			'model'=>$model,
			'rendelo'=>$rendelo,
			'uzenet'=>$uzenet,
			'record'=>$record,
			'id_rendelo'=>$rendelo->id,
			'color' =>$color,
			'json'	=> $json
	)) ?>
 </div>
 <?php } ?>
