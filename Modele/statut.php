<?php 

class Statut {

	private $allStatutsQuery ;
	private $allStatuts ;
	private $statutByIdQuery;
	private $statutById;
	/*Private $intermediaire ;
	Private $AjouterUnGroupe ;
	Private $SuppUnGroupe;
	Private $ModifUnGroupe;
	Private $Modifimage;*/
	
	
	public function __construct($connexion) 
	{	
		$this->allStatutsQuery=$connexion->prepare("SELECT * FROM statut ;");
		$this->statutByIdQuery=$connexion->prepare("SELECT * FROM statut where id_statut=:id_statut;");
		/*$this->intermediaire=$connexion->prepare("SELECT * FROM Groupe where NomG = :Nomg ;");
		$this->AjouterUnGroupe=$connexion->prepare("insert into Groupe(NomG) values(:NomG)");
		$this->SuppUnGroupe=$connexion->prepare("Delete from Groupe where NumGrp= :NomG ");
		$this->ModifUnGroupe=$connexion->prepare("update Groupe set NomG = :NomG where NumGrp = :NumGrp ");
		$this->Modifimage=$connexion->prepare("update Groupe set NomI = :NomI where NumGrp = :NumGrp ");*/
	}
	
	public function allStatuts() 
	{
		$this->allStatuts = $this->allStatutsQuery->execute();
		$this->allStatuts = $this->allStatutsQuery->fetchAll(PDO::FETCH_ASSOC);
		return $this->allStatuts;
	}
	
	public function statutById($id_statut) 
	{
		$this->statutById = $this->statutByIdQuery->execute(array(':id_statut' => $id_statut));
		$this->statutById = $this->statutByIdQuery->fetchAll(PDO::FETCH_ASSOC);
		return $this->statutById;
	}

		/*Public Function intermediaire($P)
	{
	echo "$P" ;
	$parametre = Array (':Nomg'=>$P);
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