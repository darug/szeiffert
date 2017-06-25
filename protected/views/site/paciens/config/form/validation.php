<?php
$form_valid=TRUE;

function text_validate($field){
global $form_valid;

//űrlap ellenőrzése text mezőknél
//ellenőrzi maximum értéket DeGe
//print($field['name'].' : '.$_REQUEST[$field['name']].'<br>');
	if($field['max']>0 && $_REQUEST[$field['name']]!=''){
	   if($_REQUEST[$field['name']]>$field['max']){
	      $_SESSION['hiba'][$field['name']]='<font color="RED">A szám túl magy!</font>';
//	      print('<font color="RED">A szám túl magy!</font><br>');
	   }
	}

	if(isset($field['regexp']) && $_REQUEST[$field['name']]!=''){
	//LEELLENőRZI A SZABÁLYOS KIFEJEZÉSEKET
		if(isset($_REQUEST[$field['name']])){
			if(!eregi($field['regexp'], $_REQUEST[$field['name']])){
				$_SESSION['hiba'][$field['name']]=$field['error_message'];
	//			print('regexp hiba <br>');
			}
		}
	}
//ellenőrzi minimum értéket DeGe
	if($field['min']>0 && $_REQUEST[$field['name']]!='' ){
	   if($_REQUEST[$field['name']]<$field['min']){
	      $_SESSION['hiba'][$field['name']]='<font color="RED">A szám túl kicsi!</font>';
	  //    print('<font color="RED">A szám túl kicsi!</font><br>');
	   }
	}
	
	
	if(isset($field['not_empty']) && $field['not_empty']==TRUE){
	//LEELLEN�RZI HOGY �RES-E
		if($_REQUEST[$field['name']]==""){
			$_SESSION['hiba'][$field['name']]=$field['empty_message'];
		//	print('üres hiba!<br>');
		}
	}
	if(!empty($_SESSION['hiba'])){
	$form_valid = FALSE;
	}

}

function textarea_validate($field){
global $form_valid;
//�rlap ellen�rz�s textarea mez�kn�l

	if(isset($field['regexp'])){
	//LEELLEN�RZI A SZAB�LYOS KIFEJEZ�SEKET
		if(isset($_REQUEST[$field['name']])){
			if(!eregi($field['regexp'], $_REQUEST[$field['name']])){
				$_SESSION['hiba'][$field['name']]=$field['error_message'];
			}
		}
	}


	if(isset($field['not_empty']) && $field['not_empty']==TRUE){
	//LEELLEN�RZI HOGY �RES-E
		if($_REQUEST[$field['name']]==""){
			$_SESSION['hiba'][$field['name']]=$field['empty_message'];
		}
	}
	if(!empty($_SESSION['hiba'])){
	$form_valid = FALSE;
	}

}

function password_validate($field){
global $form_valid;
		
	//LEELLEN�RZI A SZAB�LYOS KIFEJEZ�SEKET
	if(isset($field['regexp'])){

		if(isset($_REQUEST[$field['name']])){
			if(!eregi($field['regexp'], $_REQUEST[$field['name']])){
				$_SESSION['hiba'][$field['name']]=$field['error_message'];
			}
		}
	}

	
	//LEELLEN�RZI HOGY �RES-E
	if(isset($field['not_empty']) && $field['not_empty']==TRUE){
	
		if($_REQUEST[$field['name']]==""){
			$_SESSION['hiba'][$field['name']]=$field['empty_message'];
		}
	}
	
	
	//LEELLEN�RZI, HOGY MEGEGYEZNEK-E A MEGADOTT JELSZAVAK
	if(isset($field['name2'])){
	
		if(!$_REQUEST[$field['name']] == $_REQUEST[$field['name2']]){
		
			$_SESSION['hiba'][$field['name2']]=$field['not_equal_message'];
			
		}
	
	}
	
	
	if(!empty($_SESSION['hiba'])){
	$form_valid = FALSE;
	}
	
}

function select_validate($field){
	if(isset($field['not_empty']) && $field['not_empty'] == TRUE){
		
		if($_REQUEST[$field['name']]==""){
		
			$_SESSION['hiba'][$filed['name']]=$field['empty_message'];
		
		}
		
	}
	
	if(!empty($_SESSION['hiba'])){
	$form_valid = FALSE;
	}

}

function is_exist($data, $table, $field){
	$query="SELECT * FROM ".$table." WHERE ".$field."='".$_REQUEST[$data['name']]."' ";
	$result=l($query);
		if(mysql_fetch_row($result)>0){
		
			$_SESSION['hiba'][$data['name']]=$data['exist_message'];
			
		}

}

function not_exist($data, $table, $field){
	$query="SELECT * FROM ".$table." WHERE ".$field."='".$_REQUEST[$data['name']]."' ";
	$result=l($query);
		if(mysql_fetch_row($result)==0){
		
			$_SESSION['hiba'][$data['name']]=$data['exist_message'];
			
		}

}

function upload_validate($file){

	//f�jl m�ret ellen�rz�se
	if($_FILES[$file['name']]['size'] >= $file['max_size']){
		
		$_SESSION['hiba'][$file['name']]=$file['size_message'];
		
	}

	//f�jl t�pus ellen�rz�se
	if(!eregi($file['type'], $_FILES[$file['name']]['type'])){
		
		$_SESSION['hiba'][$file['name']]=$file['type_message'];
		
	}

	if(!empty($_SESSION['hiba'])){
	$form_valid = FALSE;
	}
}

function checkbox_validate($field){
	
	if(isset($_REQUEST[$field])){
	$bool=TRUE;
	}
	else{
	$bool=FALSE;
	}
	
	return $bool;

}


?>