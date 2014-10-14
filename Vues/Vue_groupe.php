 <?php
 
if(($_SESSION["Niveau"]>=3)&&(isset($_GET["booleen"]))&&(isset($_GET["NumCom"]))){


$mof= new commentaire($connexion);
$Z=$_GET["NumCom"];
$resss=$mof->modifcomm($Z);
$idgroup=$_GET["Grp"];
if ($resss==1) 
{
echo "<script>	alert ('Commentaire modéré');
	window.location.replace('index.php?vue=Vue_groupe.php&Grp=$idgroup');
	</script>";
	}
	}

 
 
  $Album ="";
   $Titre ="";
$Cp = new Pistes($connexion);

$idgroup=$_GET["Grp"];
$v_ToutesLesPistes = $Cp->GroupeParPistes($idgroup);

// print_r ($v_ToutesLesPistes) ;
$nbPistes=count($v_ToutesLesPistes);
for ($i=0;$i<$nbPistes;$i++){
foreach($v_ToutesLesPistes[$i] as $champ => $ligne){

if ($champ == 'Titre') $Titre=$Titre.$ligne.'<br>' ; 
if ($champ == 'NomI')$Groupe=$ligne;
if ($champ == 'NomG')$Group=$ligne;
}
}
echo "<center><IMG src='./Images/$Groupe.jpg' width=375 height=150 /></center>" ;
if (isset($_SESSION["Niveau"]))
{
if ($_SESSION["Niveau"]>=3)
{
echo "<font color=#ffffff >vous avez la possibilité d'update une image pour le groupe ( ou de la modifier si celle ci existe deja ) </font>
<script langage=javascript>
var Grp = $idgroup ;
</script>";
?>
<script langage=javascript>
document.write("<form enctype='multipart/form-data' action='index.php?vue=Vue_changement.php' method='POST'>");
document.write("<input type='file' name='monFichier'/>");
document.write("<input type='hidden' value="+Grp+" name='Grp'/>");
document.write("<input type='submit' name='envoyer' />");
document.write("</form>");
</script>
<?php
		 }
}
echo "<br /><br /> ";
if (isset($_SESSION["Niveau"])){
if ($_SESSION["Niveau"]>=3) 
{
echo " <font color=#ffffff> En tant qu'administrateur vous etes aussi autorisez a rajouter un album  </font> <div id='ajout' class='bouton'><font color=#ff0000>Ici</font></div>" ;
echo "<div id='aaj'> <form action='index.php?vue=vue_AjoutAlb.php' method='POST' >
	<p>
		<label><font color=#ffffff>Nom d'un album </font><br>
		<input type='text' tabindex='10' size='20'    name='noma'></label><br>
		<label><font color=#ffffff> date de sortie de l'album </font><br>
		<input type='text' tabindex='10' size='20'   id='alb' name='datee'></label>
		<input type='Hidden' value=$idgroup name='NumGrp'>
	</p>
<input type='submit' id='envoie'/>";
}
}
echo "</form></div>";echo " <table><td>
<img src='./Images/cd.jpg'  width='90'>
</td><td>
<h1><font color=#ffffff>Voila les albums : </font></h1><font color=#ffffff>cliquer sur celui de votre choix pour voir apparaitre les pistes</font>
</td>
</table>" ;
echo "<ul> <font color='#ffffff'> ";

$Cppp = new Albums($connexion);

$tab=Array();
$v_NumAl = $Cppp->TousLesAlbums();

$nbAl=count($v_NumAl);
for ($i=0;$i<$nbAl;$i++){
foreach($v_NumAl[$i] as $champ => $ligne){
$tab[$i]=$ligne;
}
}
for ($i=0;$i<$nbPistes;$i++){
foreach($v_ToutesLesPistes[$i] as $champ => $ligne){
if ($champ == 'NumAlb')$id = $ligne ; 
if ($champ == 'NomAlb'){
 echo "<li><a href='index.php?vue=Vue_groupe.php&num=$id&Grp=$idgroup'><font color=#ff0000 >$ligne</font></a></li>";
if (isset($_SESSION["Niveau"])){
if ($_SESSION["Niveau"]>=3) 
{
 echo  "<a href='index.php?vue=Vue_ModifAlb.php&num=$id&grp=$idgroup'><font color=#ffffff >Modifier </font></a>";
 echo  "<a href='index.php?vue=Vue_SuppAlb.php&num=$id&grp=$idgroup'><font color=#ffffff >Supprimer</font></a>";
}}}
 
}
}
echo "</ul>";

if (isset( $_GET["num"]))
{
$idAl = $_GET["num"];
echo "<h1><font color=#ffffff>Les pistes de l'album : </font></h1>";

if (isset($_SESSION["Niveau"])){
if ($_SESSION["Niveau"]>=3) 
{
echo " <font color=#ffffff> Et vous pouvez rajouter une piste  </font> <div id='ajou' class='bouton'><font color=#ff0000>Ici</font></div>" ;
echo "<div id='aa'> <form  enctype='multipart/form-data'  action='index.php?vue=Vue_AjoutPiste.php' method='POST' >
	<p>
		<label><font color=#ffffff>Nom de la piste </font><br>
		<input type='text' tabindex='10' size='20'    name='noma'></label><br>
		<label><font color=#ffffff> duree </font><br>
		<input type='text' tabindex='10' size='20'   id='alb' name='duree'></label><br>
		<input type='Hidden' value=$idAl name='Numalb'>
			<input type='Hidden' value=$idgroup name='Grp'>
		<label><font color=#ffffff> upload un extrait (moins de 2 Mo)  </font><br>
	<input type='file' name='monFichier'/></label>
	</p>
<input type='submit' id='envoie'/>";
echo "</form></div>";
}
}

$Cp = new Pistes($connexion);
$v_pisteparAlb= $Cp->PisteparAlb($idAl);
$nbPistes=count($v_pisteparAlb);
for ($i=0;$i<$nbPistes;$i++){
foreach($v_pisteparAlb[$i] as $champ => $ligne){
 if ($champ =="NumPiste" ){
 echo " <font color=#ff0000>le morceau n°$ligne est" ;
$music=$ligne ;
} 
 if($champ =="Titre" ){
  echo " $ligne </font>";
   $musique=$ligne ;
 } 
  if($champ =="Duree")
{ 
if ($ligne !="0") echo ", il dure $ligne <br>";
}
if ($champ=="Presente")
	{
	
	if ($ligne=="true" )
	{
	echo " <font color=#ffffff> une ecoute est disponible :</font> <object type='application/x-shockwave-flash' data='dewplayer-multi.swf?mp3=./sound/$musique.mp3&amp;bgcolor=000000' width='240' height='20'><param name='movie' value='dewplayer-multi.swf?mp3=./sound/$musique.mp3&amp;bgcolor=000000&amp;volume=100' /></object> <br>";
	}
	else 
	{
	echo " <font color=#ffffff>pas d'ecoute disponible..</font><br>" ;
	}
	}
	}
if (isset($_SESSION["Niveau"]))
{
if ($_SESSION["Niveau"]>=3)
{
 echo  "<a href='index.php?vue=Vue_ModifPiste.php&num=$music&grp=$idgroup'><font color=#ffffff >Modifier </font></a>";
 echo  "<a href='index.php?vue=Vue_SuppPiste.php&num=$music&grp=$idgroup'><font color=#ffffff >Supprimer</font></a><br>";
}}}}
if(isset($_SESSION["Niveau"])){
echo "<br><br><br><font color=#ffffff > En tant qu'inscrit vous avez le droit de poster un commentaire sur le groupe afin de partager votre opinion  </font>";
echo "<a href='index.php?vue=vue_groupe.php&Grp=$idgroup&NgrpCom=$idgroup'><font color=#ff0000>Ajouter ici</font></a> ";

if(isset($_GET["NgrpCom"])){
echo "<form method='POST' action='index.php?vue=vue_groupe.php&Grp=$idgroup'>
<TEXTAREA NAME='comment' ROWS='5' COLS='50'>
</TEXTAREA><input type=submit></form>";
}
if(isset($_POST["comment"])){
$commentair=$_POST["comment"];
$c=new commentaire($connexion);
$posteur=$_SESSION["Loglogin"];
$res = $c -> ajoutcomm ($commentair,$posteur,$idgroup) ;

if ($res==1)
{
echo "<script>	alert ('Commentaire ajouté');
	window.location.replace('index.php?vue=Vue_groupe.php&Grp=$idgroup');
	</script>";
}}
}
if (isset($_SESSION["Niveau"])){

echo "<br><h1><font color=#ffffff>Les commentaires des fans : </font></h1>";

$lec= new commentaire ($connexion);
$lescom=$lec->Lecture($idgroup);
$nbcom=count($lescom);

for ($i=0;$i<$nbcom;$i++){
foreach($lescom[$i] as $champ => $ligne){
if($champ=="NumCom")$NumComdelamortquitue=$ligne;
if($champ=="comm") $commentairedelamortquitue=$ligne."<hr />";
if($champ=="posteur") $posteurdelamortquitue= " <hr /> l'utilisateur ".$ligne ;
if($champ=="DateCom"){ 
$datedelamortquitue=" a posté un commentaire au :".$ligne;
if ($_SESSION["Niveau"]>=3) $datedelamortquitue=$datedelamortquitue."<a href='index.php?vue=Vue_groupe.php&Grp=$idgroup&NumCom=$NumComdelamortquitue&booleen=true'><font color=#ff0000> Moderer ce commentaire </font></a><hr /> ";
else $datedelamortquitue=$datedelamortquitue."<hr />";

}if($champ=="NumGrp") 
{
$text=$posteurdelamortquitue.$datedelamortquitue.$commentairedelamortquitue;
echo "$text";
}
}}

}


echo " <br><br><br><a href='index.php?vue=Vue_Sommairegroupe.php&deb=0&fin=6' /><font color=#ffffff>Retour au sommaire </font></a> "; 
echo "<br> <a href='index.php' /><font color=#ffffff>Retour a l'index </font></a> "; 
?>
<script type = 'text/javascript' src =  'jquery-1.4.4.js'></script>
<script>


function ajoute()
	{	

	$("#aa").show({'backgroundColor' : 'black', 'color':'white'});	
	}
function ajouter()
	{	
	$("#aaj").show({'backgroundColor' : 'black', 'color':'white'});	

	}
$(function ini() 
	{	
		$("#aa").hide() ;
		$("#aaj").hide() ;
	$("#ajout").click(ajouter);
	$("#ajou").click(ajoute);

	});

	
</script> 