<?php
include_once ('form/form_helpers.php');
$textnum=1;
$selnum=1;
$mulnum=1;
$textnumend=0;
$selnumend=0;
$mulnumend=0;
$combonum=1;
$combonumend=0;
$radnum=1;
$radnumend=0;
$nemlist=array("nul"=>"","f"=>"férfi","n"=>"nő","S"=>"<b>Nem nyilatkozom!</b>");

$fontos=array("f1"=>"egyáltalán nem fontos","f2"=>"nem fontos","f3"=>"normál","f4"=>"fontos","f5"=>"igen fontos");

$fontrad=array("egyáltalán nem fontos","nem fontos","normál","fontos","igen fontos");

$naprad=array("hétfő","kedd","szerda","csütörtök","péntek","szombat","vasárnap","bármelyik","egyik sem");

$ertekel=array("e0"=>"&nbsp","e1"=>"1=nagyon rossz","e2"=>"2=rossz","e3"=>"3=közepes/semleges","e4"=>"4=jó","e5"=>"5=igen jó");

$gyakor=array("g0"=>"0=soha","g1"=>"1=hetente","g2"=>"2=havonta","g3"=>"3=negyedévente","g4"=>"4=félévente","g5"=>"5=évente");

$igennem=array('igen','nem');

$felfile=paciens.php;

$eltext[]=text("orvosnev", "*Az orvos vezeték és kereszt neve","u",100,"t","i","","")
;
$eltext[]=text("rend_irsz", "*A rendelő irányító száma:","u",5,"t","i","","")
;
$eltext[]=text("rend_var", "A helységneve (város, község):","",32,"t","i","","")
;
$eltext[]=text("rend_cim", "*A rendelő címe (utca, házszám):","",60,"t","i","","")
;
$elsel[]= array("name"=>"honlap","label"=>"*Mennyira tartja fontosnak, hogy orvosa honlappal rendelkezzen?","list"=>$fontos)
;
$elmul[]= array("name"=>"hon_tartalom","label"=>"*Kérem jelölje be azokat az elemeket, amelyeket az orvosi honlapnak tartalmazni kellene","list"=>array("rendido"=>"Rendelési információk","orvos"=>"Az orvos bemutatkozása","eler"=>"Elérhetőség","uzen"=>"Üzenet küldési lehetőség","foglal"=>"időpont foglalás","felvil"=>"Ügyeleti és egyéb felvilágosító információk","korzet"=>"Körzethatárok ismertetése","info"=>"Szabadság és egyéb aktuális információk"))
;
$eltext[]=text("megjegyn","Megjegyzés, egyéb javaslat","s",200,"t","n","","")
;
$eltext[]=text("eletkor","*Az Ön életkora:","a",4,n,i,18,110)
;
$elsel[]= array("name"=>"neme","label"=>"Az Ön neme:","list"=>$nemlist)
;
?>