
<?php
if(isset($_SESSION["Niveau"])){
if ($_SESSION["Niveau"]>=3){

if(isset($_POST["fonction"])&&isset($_POST["choix"])){
$log = $_POST["compte"];
if(isset($_POST["change"])&&isset($_POST["pass"])&&$_POST["pass"]!=""){
$pass = $_POST["pass"];

}
else {
						$app = new admin($connexion);
						$connexionad = $app->pass($log);
						$pass = $connexionad[0]["passW"];
					
						}


$droit = $_POST["fonction"];
$avatar = $_POST["choix"];


if ( $avatar =="oui") $avatar = "Avatar";
else $avatar = $log ;

$jensaisrien = new admin ($connexion);
$res = $jensaisrien->Modifcompte($pass,$droit,$avatar,$log);

if ( $res==1)
{
echo "<script> alert ('Les modifs ont bien été prises en compte');
window.location.replace('index.php?vue=Vue_Membre.php');
</script>";
}
}


if(isset($_POST["compte"])){
$compte= $_POST["compte"];
}else $compte= $_GET["compte"];


echo "<h1><font color=#ffffff ><center>Modification d'un l'utilisateur $compte  </center></font></h1>";
echo "<br><br><center><img src='./Images/sablier.jpg'><center>"; 
if(isset($_GET["compte"]))
{

echo "<form method='POST' enctype='multipart/form-data' action='index.php?vue=vue_MMemb.php'>
<label><font color=#ffffff> changer mdp :</font> 
<input type='password' tabindex='10' size='20'    name='pass'></label><INPUT type=checkbox name='change' value='1'><br>
<font color=#ffffff>Quel droit accorder ? </font><SELECT name='fonction'>
		<OPTION VALUE='2'>Sans droit</OPTION>
		<OPTION VALUE='3'>Admin</OPTION>
		<OPTION VALUE='4'>Super Admin</OPTION>
	</SELECT><br>
<font color=#ffffff>restaurer l'avatar par defaut ? oui <INPUT type=radio name='choix' value='oui'>non </font><INPUT type=radio name='choix' value='non'>

		<input type='hidden' value=$compte name='compte'><br>
		<input type='submit' id='envoie'> </form>" ;
	
echo "<a href='index.php?vue=vue_Membre.php'/> <font color=#ffffff>retour aux membres </font></a><br>";
echo "<a href='index.php?'/><font color=#ffffff> retour a l'index</font> </a>";
	}
}}	


?>
