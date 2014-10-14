<?php

$id_commande = 0;
if(isset($_GET["id_commande"])) $id_commande = $_GET["id_commande"];

if(isset($_POST["envoie"]))
{

	$libelle = $_POST["libelle"];
	$dateDebut = $_POST["dateDebut"];
	$dateFin = $_POST["dateFin"];
	$id_statut = $_POST["id_statut"];
	$nomPersonne = $_POST["nomPersonne"];

	if($id_commande != 0) //modification
	{	
		$command = new Command($connexion);
		$modifyCommand = $command->modifyCommand($id_commande, $libelle, $dateDebut, $dateFin, $id_statut, $nomPersonne);
	}
	else //ajout
	{
		$command = new Command($connexion);
		$addCommand = $command->addCommand($libelle, $dateDebut, $dateFin, $id_statut, $nomPersonne);
	}
}
else
{
	echo "<table border=2>
	<td><form action='index.php?vue=view_addOrModifyCommand.php";
	
	if($id_commande != 0) echo $id_commande;
	
	echo "' enctype='multipart/form-data' method='POST' >";
	
	echo "<input type=hidden name=id_commande value=$id_commande/>";
	
	echo "<input type=hidden name=valide/>
		<p>
			<label>Libellé de la commande :<br>
			<input type='text' size='20' name='libelle'></label>
		</p>
		<p>
			<label>Date de début (format attendu AAAAMMJJ) :<br>
			<input type='text' size='20' name='dateDebut'></label>
		</p>
		<p>
			<label>Date de fin (format attendu AAAAMMJJ) :<br>
			<input type='text' size='20' name='dateFin'></label>
		</p>
		<p>
			<label>Statut :<br>
			<select name='id_statut'>";
			
	$statut = new Statut($connexion);
	$allStatuts = $statut->allStatuts();

	for($i = 0; $i < count($allStatuts); $i++)
	{ 
		$id_statut;
		$libelle;
		
		foreach($allStatuts[$i] as $key => $value)
		{
			if($key = "id_statut") $id_statut = $value;
			if($key = "libelle") $libelle = $value;
		}
		
		echo "<option value='" . $id_statut . "'>" . $libelle . "</option>";
	}

	echo "</select></label>
		</p>
	<input type='submit' id='envoie'/></td></table>


	</form>";
}

?>