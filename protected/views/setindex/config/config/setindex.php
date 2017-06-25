<?php
$t="<?php\n"; 
$t.="session_name('rcsek');\n";
$t.="session_start();\n";
$t.="include ('config/database.php');\n";
$t.="include ('form/form_helpers.php');\n";
$t.="include ('form/validation.php');\n";
$t.="include ('mysql/mysql_connect.php');\n";
$t.="include ('mysql/mysql_lekerdez.php'); //l() függvény, gyakorlatilag a mysql_query() rövidítése\n";
$fw=fopen('index1.php','w');
if (!$fw) {
    echo 'Could not open file *.php';
}else {
print('fw ok: '.$fw.'<br>');
}
if(file_put_contents('index1.php', $t,FILE_APPEND)==false ){print('1.fajlba iras nem sikerult<br>');} else {print'1.sikeres fajlbairas<br>';}
$fr=fopen('config.txt','r');
if (!$fr) {
    echo 'Could not open file *.php<br>';
}else {
print('fr ok: '.$fr.'<br>');
}
$list[]=array('');
$leg[]=array('');
$textnum=1;
$selnum=1;
$textnumend=0;
$selnumend=0;
$st="If (!isset(\$_REQUEST['form'])){\r\n";
$st.= "?>\r\n";
$st.='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"'."\n";
$st.="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd".">\r\n"; 
$st.='<html xmlns="http://www.w3.org/1999/xhtml">'."\r\n"; 
$st.="<head>\r\n"; 
$st.='<meta http-equiv="content-type" content="text/html; charset=utf-8" />'."\n"; 
$st.="<title>RCSEK Kérdőív</title>\n"; 
$st.='<link href="default.css" rel="stylesheet" type="text/css" />'."\n"; 
$st.="</head>\n";
$st.="<body>\n";
$st.='<form action="index.php" method="post">'."\n";
$st.='<input type="hidden" name="form" id="form" value="true" />'."\n";
//if(file_put_contents('index1.php', $st,FILE_APPEND)==false ){print('1.fajlba iras nem sikerult<br>');} else {print'1.sikeres fajlbairas<br>';}

while (($buffer = fgets($fr)) !== false) {
        echo $i.': ' .$buffer.'<br>';
        $buf = explode(":", $buffer);
        $buf[1]=substr($buffer,strpos($buffer,":")+1,strlen($buffer)-1);
        print($buf[1]);
switch ($buf[0]) {
    case '//':break;   //megjegyzes, kihagyásra kerül
    case 'legstart':
        $st.="<fieldset>\n";
        $st.="<legend> &nbsp $buf[1] &nbsp </legend>";
        $list[]=$buf[0];
        $leg[]=$buf[1];
        break;
    case 'legend':
        $list[]=$buf[0];
        if($textnumend > 0){
        $st.='<?php'."\n";
        $st.="for (\$i=\$textnum; \$i<\$textnum+\$textnumend; \$i++){text1(\$eltext[\$i]['name'],\$eltext[\$i]['label'],\$eltext[\$i]['class'],\$eltext[\$i]['size']);}" ;
        $st.='?>'."\n<br>";
        $textnum+=$textnumend;
        $textnumend=0;
        }
        $st.="</fieldset>\n";
        break;
    case 'text':
        $textnumend++;
        $t="\$eltext[]=text$buf[1];\n";
        if(file_put_contents('index1.php', $t,FILE_APPEND)==false ){print('1.fajlba iras nem sikerult<br>');} else {print"$i. sor sikeres fajlbairas<br>";}
        break;
    case 'select':
         $selnumend++; 
         $t="\$elsel[]= array ".$buf[1].";\n";
         if(file_put_contents('index1.php', $t,FILE_APPEND)==false ){print('$i. sor fajlba iras nem sikerult<br>');} else {print"$i. sor sikeres fajlbairasa<br>";}    
         break;
    default:     
        
}
        $i++;
      //  if ($i>18){break;}
 }
print($st);
        if(file_put_contents('index1.php', $st,FILE_APPEND)==false ){print('1.fajlba iras nem sikerult<br>');} else {print"$i. sor sikeres fajlbairas<br>";}
?>