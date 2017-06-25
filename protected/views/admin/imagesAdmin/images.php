<?php
/* @var $this SiteController */
$burl=Yii::app()->request->baseUrl;
$ido=Yii::app()->params['orvos']."/";
$this->pageTitle=Yii::app()->name . 'Kép könyvtár ellenőrzés';
$this->breadcrumbs=array(
	'images',
);
$sz='';
$kep = new Kepek();
$dataProvider=new CActiveDataProvider('Kepek');
$i = 1;
?>
		<?php echo $this->renderPartial('../_title'); ?>
		<?php /* $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view', 
)); */ ?>
	
<div class="container">
<div id="edit">

<p class="blue">Itt az /images/<?php echo Yii::app()->params['orvos']; ?> könyvtárban lévő képek láthatók, amelyek feltöltése a "Kép feltöltése" modulban történt.
	 A kép alatt a fájlnev, a megnevezés és a linkszám kerül kiírásra, amennyiben a képhez tartozik adat.</p>

<table width="100%" class="termek">
<tr>
<?php 
	$di=$_SERVER["DOCUMENT_ROOT"];
	//alkonyvtar hozzaadasa:
	//alkönyvtár címe:
	$di.=$burl."/images/".$ido;
	//alkönyvtár link címe:
	$dlink=$_SERVER["HTTP_HOST"].$burl."/images/".$ido;
	if(!$d=dir($di)) {echo "<span class=\"red\"> Nem találja a .$di könyvrárat!</span>" ;} else {
	
	while (false !== ($entry[] = $d->read())) {
   //echo $entry."<br>";
}
	
 foreach($entry as $key => $value){ 
		if(strlen($value)>2 && $value != "admin"){
	 ?>
 	
<td><a class="grouped_elements" rel="group1" href="<?php echo $burl."/images/".$ido.$value; ?>" 
		title="<?php if($data->rovid_leiras==''){echo $data->szoveg;} else {echo $data->rovid_leiras;} ?>" />
		<img alt=" <?php echo $value; ?>" src="<?php echo $burl."/images/".$ido.$value; ?>" alt="" width="290"/></a>
	<table><tr>
	<td width="30%"><?php echo $value;?></td> 
	<td width="50%"><?php if($kepek=$kep->find("kep=:kep", array(':kep' => $value))){
		echo "<span class=\"green\">  ".$kepek->szoveg."  linkszám: ".$kepek->meret."</span>";}
		else{ echo "<span class=\"red\">  nincs rá hivatkozás! ";} ?></span></td>
	<td width="20%"><form action="<?php echo $this->createAbsoluteUrl($this->uniqueid); ?>/delete/id/<?php echo $value?>" method="post">
					<button onclick="return confirm('A(z) <?php echo $value; ?> fájl véglegesen törlésre fog kerülni. Biztosan folytatja?')"type="submit">
						<img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/admin/icon_del.png" alt="Törlés" />
					</button>
		</form></td>
	</tr></table>
</td>
<?php 
if($i%3 == 0) { echo "</tr><tr>"; }
$i++;
		}//if
} // foreach
} // else 
?>
</tr>


</table>
</div>
</div>