<?php 

class Command {

	private $allCommandsQuery;
	private $allCommands;
	private $deleteCommand;
	
	/*Private $AjouterUnGroupe ;
	Private $SuppUnGroupe;
	Private $ModifUnGroupe;
	Private $Modifimage;*/
	
	
	public function __construct($connexion) 
	{	
		$this->allCommandsQuery=$connexion->prepare("SELECT * FROM commande ;");
		$this->deleteCommand = $connexion->prepare("Delete from commande where id_commande = :id ;");
		/*$this->intermediaire=$connexion->prepare("SELECT * FROM commande where NomG = :Nomg ;");
		$this->AjouterUnGroupe=$connexion->prepare("insert into Groupe(NomG) values(:NomG)");
		$this->SuppUnGroupe=$connexion->prepare("Delete from Groupe where NumGrp= :NomG ");
		$this->ModifUnGroupe=$connexion->prepare("update Groupe set NomG = :NomG where NumGrp = :NumGrp ");
		$this->Modifimage=$connexion->prepare("update Groupe set NomI = :NomI where NumGrp = :NumGrp ");*/
	}
	
	Public Function allCommands () 
	{
		$this->allCommands = $this->allCommandsQuery->execute();
		$this->allCommands = $this->allCommandsQuery->fetchAll(PDO::FETCH_ASSOC);
		return $this->allCommands;
	}
	
	public Function deleteCommand($id)
	{
		$this->deleteCommand->execute(Array(':id' => $id));
		return  $this->deleteCommand->rowCount();
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
	
	Public Function ModifUnGroupe($A,$B)
	{	
	$this->ModifUnGroupe->execute(array(':NomG' =>$A, ':NumGrp'=>$B));
	return $this->ModifUnGroupe->rowCount();

	}
	Public Function Modifimage($A,$B)
	{	
	$this->Modifimage->execute(array(':NomI' =>$A, ':NumGrp'=>$B));
	return $this->Modifimage->rowCount();

	}*/
}