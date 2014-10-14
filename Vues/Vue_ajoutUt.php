<?php 
if(isset($_POST["log"]))
{

$log=$_POST["log"];
	$a	= new admin($connexion);
	
	$ress = $a->verif($log);

if ($ress==1) {
echo "ok" ;
$noma= $_POST["noma"];
$pwd = $_POST["pwd"];	


if (is_uploaded_file($_FILES["monFichier"]["tmp_name"])){

	if(move_uploaded_file($_FILES["monFichier"]["tmp_name"] , "./sound/$noma.mp3")) {
	echo "le fichier a bel et bien etait envoyé <br>" ;
	$image = "$noma" ;
}	}
	else $image= "avatar" ;

	$gg = new admin($connexion);
	
	$res = $gg->ajouterUnePiste($noma, $duree, $nuum, $presente );
	
	
	if ($res==1) header("Location: index.php?vue=vue_Sommairegroupe.php&deb=0&fin=4");
	}
	
}
else 
{
echo " <script>
alert ('ce pseudo est deja pris desolé');
</script>";
}
?>