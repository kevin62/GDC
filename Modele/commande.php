<?php 

class Command {

	private $allCommandsQuery;
	private $allCommands;
	private $modifyCommand; 
	private $addCommand;
	
	
	public function __construct($connexion) 
	{	
		$this->allCommandsQuery=$connexion->prepare("SELECT * FROM commande ;");
		$this->modifyCommand=$connexion->prepare("update commande set libelle = :libelle, dateDebut =:dateDebut, dateFin = :dateFin, id_statut = :id_statut, nomPersonne = :nomPersonne where id_commande = :id_commande ");
		$this->addCommand=$connexion->prepare("insert into commande(libelle, dateDebut, dateFin, id_statut, nomPersonne) values(:libelle, :dateDebut, :dateFin, :id_statut, :nomPersonne)");
		/*$this->intermediaire=$connexion->prepare("SELECT * FROM commande where NomG = :Nomg ;");
		
		$this->SuppUnGroupe=$connexion->prepare("Delete from Groupe where NumGrp= :NomG ");
		$this->ModifUnGroupe=$connexion->prepare("update Groupe set NomG = :NomG where NumGrp = :NumGrp ");
		$this->Modifimage=$connexion->prepare("update Groupe set NomI = :NomI where NumGrp = :NumGrp ");*/
	}
	
	public function allCommands () 
	{
		$this->allCommands = $this->allCommandsQuery->execute();
		$this->allCommands = $this->allCommandsQuery->fetchAll(PDO::FETCH_ASSOC);
		return $this->allCommands;
	}
	
	public function modifyCommand($id_commande, $libelle, $dateDebut, $dateFin, $id_statut, $nomPersonne)
	{	
		$this->modifyCommand->execute(array(':id_commande' =>$id_commande, ':libelle'=>$libelle, ':dateDebut'=>$dateDebut, ':dateFin'=>$dateFin, ':id_statut'=>$id_statut , ':nomPersonne'=>$nomPersonne));
		return $this->modifyCommand->rowCount();
	}
	
	public function addCommand($libelle, $dateDebut, $dateFin, $id_statut, $nomPersonne)
	{
		$parametre = Array(':libelle' => $libelle, ':dateDebut' => $dateDebut, ':dateFin' => $dateFin, ':id_statut' => $id_statut, ':nomPersonne' => $nomPersonne);
		$this->addCommand->execute($parametre);
		return $this->addCommand->rowCount();
	}
	
/*
	Public Function CommandByUserLevel($level)
	{
		$parametre = Array (':level' => $level);
		$this->intermediaire->execute($parametre);
		return $this->intermediaire->fetchAll(PDO::FETCH_ASSOC);
	}
	
	Public Function AjouterUnGroupe($A_Groupe)
	{
		$parametre = Array(':NomG' => $A_Groupe);
		$this->AjouterUnGroupe->execute($parametre);
		return $this->AjouterUnGroupe->rowCount();
	}
	
	Public Function SuppUnGroupe ($S_Groupe)
	{
	    $this->SuppUnGroupe->execute(Array(':NomG'=>$S_Groupe));
		return $this->SuppUnGroupe->rowCount();
	}
	
	
	Public Function Modifimage($A,$B)
	{	
	$this->Modifimage->execute(array(':NomI' =>$A, ':NumGrp'=>$B));
	return $this->Modifimage->rowCount();

	}*/
}