<?php

$id_commande = 0;
if(isset($_GET["id_commande"])) $id_commande = $_GET["id_commande"];

if(isset($_POST["envoie"]))
{
	$libelle = $_POST["libelle"];
	$dateDebut = $_POST["dateDebut"];
	$dateFin = $_POST["dateFin"];
	$id_statut = $_POST["id_statut"];
	$nomPersonne = $_SESSION["Loglogin"];
	
	if($id_commande != 0) //modification
	{	
		$command = new Command($connexion);
		$modifyCommand = $command->modifyCommand($id_commande, $libelle, $dateDebut, $dateFin, $id_statut, $nomPersonne);
		header("Location : index.php?vue=View_Command.php");
	}
	else //ajout
	{
		$command = new Command($connexion);
		$addCommand = $command->addCommand($libelle, $dateDebut, $dateFin, $id_statut, $nomPersonne);
		if ($addCommand == 1) location.replace("index.php?vue=View_Command.php");
	}
}
else
{
	$commandeEnCours;

	echo "<table border=2>
	<td><form action='index.php?vue=View_addOrModifyCommand.php";
	
	if($id_commande != 0)
	{
		echo "&id_commande=$id_commande";
		$commande = new Command($connexion);
		$commandeEnCours = $commande->commandById($id_commande);
	}
	
	echo "' enctype='multipart/form-data' method='POST' >";
	
	echo "<p>
			<label>Libellé de la commande :<br>
			<input type='text' size='20' name='libelle'";
			
	if($commandeEnCours != null) echo "value='" . $commandeEnCours[0]["libelle"] . "'";
			
	echo "></label>
		</p>
		<p>
			<label>Date de début (format attendu AAAAMMJJ) :<br>
			<input type='text' size='20' name='dateDebut'";
			
	if($commandeEnCours != null) echo "value='" . $commandeEnCours[0]["dateDebut"] . "'";
			
	echo "></label>
		</p>
		<p>
			<label>Date de fin (format attendu AAAAMMJJ) :<br>
			<input type='text' size='20' name='dateFin'";
			
	if($commandeEnCours != null) echo "value='" . $commandeEnCours[0]["dateFin"] . "'";
			
	echo "></label>
		</p>
		<p>
			<label>Statut :<br>
			<select name='id_statut'>";
			
	$statut = new Statut($connexion);
	$allStatuts = $statut->allStatuts();

	for($i = 0; $i < count($allStatuts); $i++)
	{ 		
		$id_statut = $allStatuts[$i]["id_statut"];
		$libelle = $allStatuts[$i]["libelle"];
		
		echo "<option value='" . $id_statut . "'";
		
		if($commandeEnCours != null) if($commandeEnCours[0]["id_statut"] == $id_statut) echo "selected='selected'";
		
		echo ">" . $libelle . "</option>";
	}

	echo "</select></label>
		</p>
	<input type='submit' name='envoie'/></td></table>


	</form>";
}

?>