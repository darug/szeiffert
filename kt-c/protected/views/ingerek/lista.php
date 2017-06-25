<?php
/* @var $this IngerekController */
/* @var $user Ingerek */
/* @var $list tabla adatok */
?>

<?php if(!count($list_tc)){ ?>
<div class="form">
<p aling=center>Listázási beállítások</p>	
<?php //echo Yii::app()->request->baseUrl; ?><br>
<form action="lista" method="post" id="ered">
	<input type="hidden" name="ered" id="ered" value="true" />
	<p><label for="csapat">Csapat név</label> 
	 <input type="text" name="csapat" id="csapat" ></p>
	<p><label for="inger_szelesseg">Karakter szám</label> 
	 <input type="number" name="inger_szelesseg" id="inger_szelesseg" maxlength="4" min="2" max="8" step="2" value="4"></p>
	 <p><label for="k_date">Kedő dátum</label>
	 	<input type="date" name="k_date", id="k_date"></p>
	 <p><label for="v_date">Befejező dátum</label>
	 	<input type="date" name="v_date", id="v_date"></p> 

	<p class="submit" ><input type="submit" value="Elküld" /></p>
</form>
</div><!-- form -->
<?php } else { ?>
	<br>
	<p><h2>Versenyzői eredmények összehasonlító táblázata</h2></p>
	<p><b>A listázás paraméterei:</b></p>
	<table width="100%" >
		<tr><th>Csapat név: <?php echo $req['csapat'];?></th>
			<th>Inger hossz: <?php echo $req['inger_szelesseg'];?></th>
			<th>Kezdő dátum: <?php echo $req['k_date'];?></th>
			<th>Vég dátum: <?php echo $req['v_date'];?></th>
		</tr>
	</table>
	<p></p>
	<table id="t01" width="100%" >
		<tr><th colspan="2">Név</th><th>Legjobb Tcorr (msec)</th><th>Jó inger hibaszám</th><th>Rossz inger hibaszám</th><th>Mérések száma</th></tr>
		<?php for($i=0;$i<count($list_tc);$i++){ ?>
		<tr>
			<td><?php echo $i+1; ?></td>
			<td><?php echo $list_tc[$i][1]; ?></td>
			<td><?php echo $list_tc[$i][0]; ?></td>
			<td><?php echo $list_tc[$i][2]; ?></td>
			<td><?php echo $list_tc[$i][3]; ?></td>
			<td><?php echo $list_tc[$i][4]; ?></td>
		</tr>
		<?php } ?>
		</table>
		<p><B>Listázás a mérésszám csökkenő sorrendjében</b><p>
		<table id="t01" width="100%" >
		<tr><th colspan="2">Név</th><th>Legjobb Tcorr (msec)</th><th>Jó inger hibaszám</th><th>Rossz inger hibaszám</th><th>Mérések száma</th></tr>	
		<?php for($i=0;$i<count($list_tc);$i++){ ?>
		<tr>
			<td><?php echo $i+1; ?></td>
			<td><?php echo $list_num[$i][1]; ?></td>
			<td><?php echo $list_num[$i][2]; ?></td>
			<td><?php echo $list_num[$i][3]; ?></td>
			<td><?php echo $list_num[$i][4]; ?></td>
			<td><?php echo $list_num[$i][0]; ?></td>
		</tr>
		<?php } ?>
	</table>
	<?php /* print_r( $list_tc);
	 echo "<br>";?>
	<?php print_r( $list_num);
	*/
	?>
	
<?php } ?>
