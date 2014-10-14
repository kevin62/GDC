<?php

	if(isset($_GET["NomG"]))
		{
		$nom = $_GET["NomG"];
		$g = new Groupes($connexion);
		$res = $g->SuppUnGroupe($nom);

		if ($res == 1) 
			{
			echo "<script>	
		window.location.replace('index.php?vue=vue_Sommairegroupe.php&deb=0&fin=6');
		</script>";
		
}}
	?>