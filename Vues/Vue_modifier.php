<?php
if(isset($_POST["nom"])&&isset($_POST["num"]))
{
	$nom = $_POST["nom"];
	$num= $_POST["num"];
	
	$cc = new Groupes($connexion);
	
	$res = $cc->ModifUnGroupe($nom, $num);
	
	}
	if ($res == 1) {
	echo "<script>	
	window.location.replace('index.php?vue=Vue_Sommairegroupe.php&deb=0&fin=6');
	</script>";
	}
?>