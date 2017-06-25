<?php

//űrlap elemek generálása

//text
//$fajta=t,n,e azaz text,number,email
//$kotelezo barmi, ha a mezo kitoltése kötelező, különben: '' !
// min, max, csak szám alsó és felső határértékellenőrzésnél kell megadni!

function text($name, $label, $class, $size, $fajta, $kotelezo, $min, $max ){
 //          print("text function<br>");
 //          print($name.$label.$size.$fajta.$max.'<br>');
		   if($fajta=='n'){      
		       $m=1;
		       if($size>7){$m=7;}
		   }else{$m=2;}
           $temp  = array(
           'name' => $name,
		   'label'=> $label,
		   'class'=> $class,
		   'size' => $size,
		   'fajta'=> $fajta,
           'regexp' => '^[^<>#@{};]{'.$m.','.$size.'}$',
           'not_empty' => TRUE,
           'empty_message' => 'Kérem töltse ki ezt a mezőt!',
		   'error_message' => 'A mező tartalma hibás!',
           'min' => $min,
		   'max' => $max,
		   );
		if($kotelezo==''){$temp['not_empty']=FALSE;}
		if($fajta=='n'){$temp['regexp']='^[0-9/ +-]{'.$m.','.$size.'}$';}
		if($fajta=='e'){
		     $temp['regexp']='^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$';
		     $temp['error_message']='Nem valós email címet adott meg!';
		}
//		print_r($temp);
		 return $temp;    
		}
function text1($name, $label, $class, $size)	
//tényleges kiíratás		
		{
        ?>
		<label for="<?php echo $name; ?>"><?php echo $label; ?></label>
		<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" size="<?php echo $size ?>" 
		<?php if(isset($_SESSION['hiba'][$name])){ ?> class="text_error"<?php }?>
		<?php if(isset($_SESSION['tarolo'][$name])){?>value="<?php echo $_SESSION['tarolo'][$name]; ?>" </input> 
		<?php } ?></> 
		<?php if(isset($_SESSION['hiba'][$name])){echo '<span class="text_error">'.$_SESSION['hiba'][$name]."</span>"; } ?><br />
		<?php
		
		
		}



function hidden($name, $value){
		?>
		<input type="hidden" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo $value; ?>" />
		<?php
}

function textarea($name, $label, $class, $cols, $rows){
//cols, rows kitöltése egyelőre kötelező, később vizsgálni kéne a létezést!
	?>
	<label for="<?php echo $name; ?>"><?php echo $label; ?></label><br />
	<textarea cols="<?php echo $cols; ?>" rows="
	<?php echo $rows; ?>" name="<?php echo $name; ?>" id="<?php echo $name; ?>"
	<?php if(isset($_SESSION['hiba'][$name])){ ?> class="text_error"<?php }?> >
	<?php if(isset($_SESSION['tarolo'][$name])){ echo $_SESSION['tarolo'][$name]; } ?></textarea>
	<?php if(isset($_SESSION['hiba'][$name])){echo "<span class='error'>".$_SESSION['hiba'][$name].
	"</span>"; } ?><br />
	<?php
}
function select($name, $label, $option){
	?>
	<label for="<?php echo $name; ?>"><?php echo $label; ?></label>
	<select name="<?php echo $name; ?>" id="<?php echo $name; ?>" >
		<?php foreach($option as $key => $value){ ?>	
		
		<option value="<?php echo $key; ?>" <?php if(isset($_SESSION['tarolo'][$name]) && $_SESSION['tarolo'][$name] == $key){ ?> selected="yes" <?php } ?>><?php echo $value; ?></option>
		
		<?php } ?>	
	
	</select><br />
	<?php
}
function select0($name, $label, $option) //soremeles nelkuli
{
	?>
	<label for="<?php echo $name; ?>"><?php echo $label; ?></label>
	<select name="<?php echo $name; ?>" id="<?php echo $name; ?>" >
		<?php foreach($option as $key => $value){ ?>	
		
		<option value="<?php echo $key; ?>" <?php if(isset($_SESSION['tarolo'][$name]) && $_SESSION['tarolo'][$name] == $key){ ?> selected="yes" <?php } ?>><?php echo $value; ?></option>
		
		<?php } ?>	
	
	</select>
	<?php
}

function password($name, $label, $class, $size){
		?>
		<label for="<?php echo $name; ?>"><?php echo $label; ?></label><br />
		<input type="password" name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="<?php echo $class; ?>" size="<?php echo $size; ?>" <?php if(isset($_SESSION['hiba'][$name])){ ?> class="text_error"<?php }?> /> <?php if(isset($_SESSION['hiba'][$name])){echo $_SESSION['hiba'][$name]; } ?><br />
		<?php

}

function upload($name, $label, $max_file_size, $param){
	?>
	<label for="<?php echo $name; ?>"><?php echo $label; ?></label><br />
	<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
	<input type="file" name="<?php echo $name; ?>" id="<?php echo $name; ?>" <?php if(isset($_SESSION['hiba'][$name])){ ?> class="text_error"<?php } if(isset($_SESSION['tarolo'][$name])){ ?> value="<?php echo $_SESSION['tarolo'][$name]; ?>" <?php } ?> <?php echo $param; ?>/> <?php if(isset($_SESSION['hiba'][$name])){echo $_SESSION['hiba'][$name]; } ?><br />
	
	<?php
}


function checkbox($name, $label){  //id="<?php echo $name; \?\>" kivéve
?>
	<input type="checkbox" name="<?php echo $name; ?>"  <?php 
	if(isset($_SESSION['tarolo'][$name])){ ?>checked="checked"<?php } ?> ><?php echo " $label ";?><br>
<?php //	<label for="<?php echo $name; ?\>"><?php echo $label; ?\></label><br /> 
?>
	<?php
}
/**
 * Több checkbox egy sorba rendezve, bekeretezve
 */
function multicheckbox($name, $label,$list ){
?>
    <fieldset>
    <legend align="left"><?php  echo $label; ?></legend>
<?php 

foreach($list as $kulcs=>$key){ 
$chname="$name.$kulcs";
Checkbox($chname,$list[$kulcs]);}
?>    
    </fieldset>
    <?php
}
// Egy sor két szélén egy - egy selectet, kozépen egy kérdét ír ki
function combo($name,$label1,$option1,$kerdes,$label2,$option2){

 $name1=$name."1";
 $name2=$name."2";
 select0($name1,$label1,$option1);
 echo"<font color=\"blue\" size=5><b>&nbsp&nbsp&nbsp$kerdes&nbsp&nbsp&nbsp</b></font>";
 select0($name2,$label2,$option2);
 echo"<br>";
}
?>