<?php
			$dat = date ('D') ; // ici on recupere le jour (( semaine )) 
			$jour=date('d') ;	// ici on recupere le jour (( num )) 
			$mois=date('n')	; // ici on recupere le numero du mois ( compris entre 1 et 12 !!)
			$heur=date('H');
			$min=date('i');
			$sec=date('s');
			$ann =date('Y') ;  // ici on recupere l'année actuel

			$nom = $dat.$jour.$mois.$heur.$min.$sec.$ann ;
			
if (is_uploaded_file($_FILES["monFichier"]["tmp_name"])){

	if(move_uploaded_file($_FILES["monFichier"]["tmp_name"] , "./Images/$nom.jpg")) echo "le fichier a bel et bien etait envoyé <br>" ;
	else echo (" une erreur est survenue ! <br>") ;


$idgroup=$_POST["Grp"];
echo $idgroup;
	$cc = new Groupes($connexion);
	$res = $cc->Modifimage($nom,$idgroup);

if ($res == 1) {
	echo "<script>	
	window.location.replace('index.php?vue=Vue_groupe.php&Grp=$idgroup');
	</script>";
	}
}
?>