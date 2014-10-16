<?php

if(isset($_SESSION["Niveau"]))
{

if($_SESSION["Niveau"]<3)
echo " <script>window.location.replace('Erreur.html');</script>";

if(isset($_GET["compte"]))
{
$nom =$_GET["compte"];
$a= new admin($connexion);
$res=$a->suppCompte($nom);

}




if($_SESSION["Niveau"]==4){
$a= new admin($connexion);
$_vadmin=$a->AdminSupreme();
$nb=count($_vadmin);
echo "<br><br><h1> Les Membres : </h1><br>";
for ($i=0;$i<$nb;$i++){
foreach($_vadmin[$i] as $champ => $ligne){
if ($champ=="login") $mec = $ligne ;
if ($champ=='niveau') {
$statut = "invité";
$lvl = $ligne ;
if ( $lvl == 2 ) $statut = "invité" ;
if ( $lvl == 3 ) $statut = "admin" ;
}
if ($champ=="avatar") 
{echo "<img src='./Images/$ligne.jpg' width=150 height=150 ><br>";
echo " <font color=#ff0000>$mec($statut)</font><br>";
echo "<a href='index.php?vue=vue_MMemb.php&compte=$mec'><font color=#000000>Modif</font></a> <a href='index.php?vue=vue_Membre.php&compte=$mec'/><font color=#000000>Supprimer</font></a><br>";
}
}}}
else if ($_SESSION["Niveau"]==3){
$mec='';
$a= new admin($connexion);
$_vadmin=$a->AdminNormal();
$nb=count($_vadmin);
echo "<br><br><font color=#ffffff><h1> Les Membres : </h1></font><br>";
for ($i=0;$i<$nb;$i++){
foreach($_vadmin[$i] as $champ => $ligne){

if ($champ=="LoginSite") $mec = $ligne ;
if ($champ=='niveau') {
$lvl = $ligne ;
if ( $lvl == 2 ) $statut = "invité" ;
if ( $lvl == 3 ) $statut = "admin" ;
if ( $lvl == 4 ) $statut = "super-admin" ;
}
if ($champ=="Avatar") 
{echo "<img src='./Images/$ligne.jpg' width=150 height=150 ><br>";
echo " <font color=#ff0000>$mec($statut)</font><br>";
//echo "<a href='index.php?vue=vue_MMemb.php&compte=$mec'><font color=#000000>Modif</font></a> <a href='index.php?vue=vue_Membre.php&compte=$mec'/><font color=#000000>Supprimer</font></a><br>";
}

}}
}
}
?>