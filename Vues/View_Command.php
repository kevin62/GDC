
<?php

$command = new Command($connexion);

$droit = (isset($_SESSION["Niveau"]) && $_SESSION["Niveau"]>2 );

  if(isset($_GET['Del']) and (!empty($_GET["Del"])) )
 { 	 
	//echo ;
	$deleteCommand = $command->deleteCommand($_GET['Del']);
	
	if($deleteCommand!=0)
			{
				echo '<meta http-equiv="refresh" content="0;URL=Index.php?vue=View_Command.php">'; 
			}
			else 
			{
				echo "<script> alert('il y a un souci dans la suppression' ) </script>";
				echo '<meta http-equiv="refresh" content="0;URL=Index.php?vue=View_Command.php">'; 
			}
	}

	$v_allCommands = $command->allCommands();
	$v_allCommandsCount = count($v_allCommands);
	
	echo "<html>

	<head>
		<link rel='stylesheet' href='tableCMD.css' type='text/css'/>	
	</head>

	<body>
	
		<div class='TABLE'>
			<table >
				<tr> 
					<td width=150px>
						ID
					</td>
					<td width=150px >
						LIBELLE
					</td>
					<td width=150px>
						DATE DE DEBUT
					</td>
					<td>
						DATE DE FIN
					</td>
					<td>
						STATUT
					</td>
					<td>
						UTILISATEUR
					</td>";
					
		if($droit)
				echo "<td>  </td><td> </td>";
			
				echo "</tr>";
	

	for ($i=0;$i<$v_allCommandsCount;$i++){
	foreach($v_allCommands[$i] as $champ => $ligne){
	
		if($champ=="id_commande")$tableCmd[0][$i] = $ligne;
		if($champ=="libelle")$tableCmd[1][$i] = $ligne;
		if($champ=="dateDebut")$tableCmd[2][$i] = $ligne;
		if($champ=="dateFin")$tableCmd[3][$i] = $ligne;
		if($champ=="id_statut")$tableCmd[4][$i] = $ligne;
		if($champ=="nomPersonne")$tableCmd[5][$i] = $ligne;
		}
	}
	
	for ($i=0;$i<$v_allCommandsCount;$i++)
	{
		echo"<tr><td >";
		echo $tableCmd[0][$i];
		echo"	</td><td>";
		echo $tableCmd[1][$i];
		echo"	</td><td>";
		echo $tableCmd[2][$i];
		echo"	</td><td>";
		echo $tableCmd[3][$i];
		echo"	</td><td>";
		
		$statut = new Statut($connexion);
		$statutDeLaCommandeEnCours = $statut->statutById($tableCmd[4][$i]);
		echo $statutDeLaCommandeEnCours[0]["libelle"] ;
		
		echo"	</td><td>"; 
		echo $tableCmd[5][$i];
		echo"</td>";
		
		if($droit)
		{
		
		   echo "<td> <a href='index.php?vue=View_addOrModifyCommand.php&id_commande=" . $tableCmd[0][$i] . "'> Modifier </a></td>";
		  echo "<td> <a href='index.php?vue=View_Command.php&Del=".$tableCmd[0][$i]."'> Delete </a></td>"; 
		}
		echo "</tr>";
	}
	
	
		echo"
			</table>
		</div>
		
		<a href='index.php?vue=View_addOrModifyCommand.php'> Ajouter une commande </a></br>
		
	</body>
	
</html>";

?>