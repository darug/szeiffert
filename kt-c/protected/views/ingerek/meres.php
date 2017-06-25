<?php
/** @var $this IngerekController */
/** @var $ujing Ingerek 
 *  @var inger_hossz=>$user->inger_szelesseg,
 *	@var inger_szam =>$user->inger_szam,
 *	@var inger_start =>$inger_start,
 *	@var inger_lepes =>$inger_lepes,
 */

$this->breadcrumbs=array(
	'Ingereks'=>array('meres'),
//	$model->id,
); 


?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.7.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/meres.js"></script>
<script type="text/javascript">
	var meresAdatok = <?php echo $clientvariables; ?>; 
</script>
<h1><?php echo $user->veznev." ".$user->kernev.", karakter szám: ".$inger_hossz." inger szám: ".$inger_szam ; ?></h1>
<h3><?php echo $meres_typ." mérés, ez az Ön $meres_szam. mérése, az ingerek $kijel_ido millisekundumig lesznek láthatok!"?></h3>
<font color="black" size="4">
<fieldset>
	<center><legend><b> Mérési utasítás </b></legend></center>

	 A következökben a képernyö közepén egymás mellett nagyméretü betükböl (A,F,H,K,L,N,R,U) és számokból (2,3,4,5,6,7,8,9) álló 
     6 karakter hosszúságú kombináció jelenik meg. Önnek csak akkor kell ill. szabad megnyomni a bal egérgombot, ha a képernyön 
     <?php echo $inger_hossz/2;?> betü és <?php echo $inger_hossz/2;?> szám látható, függetlenül a megjelenési sorrendtől.<br>
     Javasoljuk, hogy a számokra figyeljen.<br>
     <font color="red"><b>Figyelem! A teljes mérés két részből áll: egy tanuló és egy valódi mérésből! Csak a valódi mérés eredménye számít és tárolódik el!</b></font>
     <br>Ha a fentieket elolvasta és értelmezte kérjük, hogy kattintson a "Start" gombra! 
     <br>
</fieldset>
</font>
<font color="black" size="20">
<?php /*foreach($ujing as $key=>$value){
	echo $value['inger']."<br>";
}*/ ?>
</font>

<table size=100%>
<tr><td><?php if($m_eng){ ?><button id="meres_start">Start</button> 
		<?php ;} else { echo $uzen;} ?>  
	</td>
	<td><?php if($mestyp==0){ ?><a id="ugras" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/ingerek/meres?mestyp=1">Ugrás a valódi mérésre</a><b> <br><font color=red>Figyelem! a gyakorló mérés kihagyása ronthat a mérési eredményen!</font></b><?php } ?></td>
	<td> <a href="meres4/<?php echo Yii::app()->user->getId(); ?>">Összes eredmény grafikus megjelenítése</a></td>
</tr>
</table>
<div id="meres_keret">
	<div id="meres_tartalom">
	</div>
</div>
