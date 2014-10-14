<?php
if(isset($_SESSION)){

$droit=$_SESSION["Niveau"];
$photo=$_SESSION["photo"];
$nom =$_SESSION["Loglogin"];
$mdp =$_SESSION["Mauxdepasse"];
if(isset($_POST["mdp1"])&&isset($_POST["mdp2"]))
{
$m=($_POST["mdp1"]);
$M=($_POST["mdp2"]);

if ($m!=$M){
echo "<script> alert('erreur lors de la saisie');</script>";
}else
{
$a =new admin($connexion);
$res=$a->changermdp($nom,$m);

echo "$res";
if($res==1){
$_SESSION["Mauxdepasse"]=$m;
$mdp=$m ;
echo"<script> alert('mot de passe changé');

window.location.replace('index.php?vue=vue_profil.php');
</script>";
} 
}
}
if(isset($_POST["ok"])){
if (is_uploaded_file($_FILES["monFichier"]["tmp_name"])){

	if(move_uploaded_file($_FILES["monFichier"]["tmp_name"] , "./Images/$nom.jpg")) {
	}

	if($photo=="avatar") {
	$jensaisrien = new admin ($connexion);
	$res = $jensaisrien->Modifcompte($mdp,$droit,$photo,$nom);
	$_SESSION["photo"]=$nom ;
	}
	echo "<script> 
	window.location.replace('index.php?vue=vue_profil.php');
	alert('actualiser la page pour voir afficher le changement' );</script>" ;
	}}
echo "<img src='./Images/$photo.jpg' width=250 height=250 >";
 
echo "<form  enctype='multipart/form-data'  action='index.php?vue=vue_profil.php' method='POST' > 
<label><font color=#ffffff> changer d'avatar  </font><br>
	<input type='file' name='monFichier'/></label>
	<input type='hidden' value=1 name='ok'>
	<input type='submit'></form>";
echo "<br><h1><font color=#ffffff>Votre Profil : </font></h1>";
echo " <br><br><font color=#ffffff>Vous etes connecté en tant que <font color=#ff0000>$nom</font><font color=#ffffff>";
if($_SESSION["Niveau"]>=3){

echo "(vous pouvez administrer </font><a href='index.php?vue=vue_Membre.php'/><font color=#ff0000>les membres</font></a><font color=#ffffff>)</font> ";

}echo "<div id='toggle'> afficher/cacher le mot de passe</div>";
echo "<div id='texte' >voila votre mot de passe :<font color=#ff0000> $mdp</font></div>";
echo "<div id='ModMdp' ><font color=#ff0000>changer son mot de passe :</font></div>" ;
echo "<div id='mod'>
<form   action='index.php?vue=vue_profil.php' method='POST' >
		<label><font color=#ffffff>nouveau mot de passe </font><br>
		<input type='password' tabindex='10' size='20'    name='mdp1'></label><br>
				<label><font color=#ffffff>resaisir </font><br>
		<input type='password' tabindex='10' size='20'    name='mdp2'></label><br>
		<input type='submit'></form></div>";
echo " vous avez aussi la possibilité de supprimer votre compte : <a href='index.php?vue=vue_supC.php'/><font color=#ff0000>Supprimer </font></a>";

if($_SESSION["Niveau"]==4){
echo"Cependant il est deconseillé de supprimer ce compte car il est super-administrateur" ;
}

echo "<br>";
		echo "<a href='index.php'/><font color=#ffffff>Retour a l'index</font></a>";
}
?>
<script type = "text/javascript" src = " jquery-1.4.4.js"></script>

<script type="text/javascript">


function ajouter()
	{	
	$("#mod").show({'backgroundColor' : 'black', 'color':'white'});	
}

	function toggleContent()
	{	
		$("#texte").toggle() ;
}
$(function ini() 
	{
$("#texte").hide() ;
$("#toggle").click(toggleContent);
$("#ModMdp").click(ajouter);
$("#mod").hide();
	});
</script>