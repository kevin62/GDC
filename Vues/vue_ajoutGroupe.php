<?php


	if(isset($_POST["nom"]))
		{
		$nom = $_POST["nom"];
		$noma= $_POST["noma"];
		$dat = $_POST["datee"];	

		$g = new Groupes($connexion);
		$res = $g->AjouterUnGroupe($nom);
	
			if ($res == 1)
				{ 
				$v_TousLesGroupess = $g->intermediaire($nom);
				print_r ($v_TousLesGroupess);
				$nuum =($v_TousLesGroupess["0"]["NumGrp"]) ;
				$gg = new Albums($connexion);
	
				$ress = $gg->ajouterUnAlbum($noma, $dat, $nuum);
	
				print_r($ress);
	
				if ($ress==1) 
					{
					echo "<script langage=javascript>
					window.location.replace('index.php?vue=Vue_Sommairegroupe.php&deb=0&fin=5');</script> ";	
					}
				}
		}
?>