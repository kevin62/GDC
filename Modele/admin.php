<?php

class admin{
	
	private $connexionLog;
	private $connexionLg_req;
	
	private $Modifcompte;	
		
		
	private $changermdp ;
	private $ajouterUtilisateur ;
	
	private $suppCompte;
	private $verif;
	private $pass;
	private $AdminSupreme ;
	private $AdminNormal ;
	
	public function __construct($connexion){
		
		
		$this->Modifcompte= $connexion->prepare("update Logiin set passW=:passeword,niveau=:Level,Avatar=:Avatar where LoginSite=:log");
		$this->AdminNormal= $connexion->prepare("SELECT * from Logiin  where niveau !=4 and niveau!=3;");
		$this->AdminSupreme= $connexion->prepare("SELECT * from Logiin  where niveau !=4");
		$this->suppCompte = $connexion->prepare("Delete from Logiin where LoginSite=:log ");
		$this->verif = $connexion->prepare("select * from Logiin where LoginSite=:logiin  ; ");
		$this->pass = $connexion->prepare("select * from Logiin where LoginSite=:logiin  ; ");
		$this->changermdp = $connexion->prepare("update Logiin set passW= :Mdp where LoginSite= :logiin ;");
		$this->connexionLog_req = $connexion->prepare("select * from Logiin where LoginSite=:login and passW=:mdp ; ");
		$this->connexionLg_req = $connexion->prepare("select * from Logiin where LoginSite=:login and passW=:mdp ; ");
		$this->ajouterUtilisateur = $connexion->prepare("insert into  LoGiin(LoginSite,passW,Avatar) values (:log,:pass,:avatar); ");
		
	}
	

	
	public function Modifcompte($a,$b,$c,$d){
	$parametre= Array (":passeword"=>$a,":Level"=>$b,":Avatar"=>$c,":log"=>$d);
	$this->Modifcompte->execute($parametre);
	return $this->Modifcompte->rowCount();
	}
	
				public function AdminNormal(){

$this->AdminNormal->execute();
return $this->AdminNormal->fetchAll(PDO::FETCH_ASSOC);
	
	}
	
				public function AdminSupreme(){
	
$this->AdminSupreme->execute();
return $this->AdminSupreme->fetchAll(PDO::FETCH_ASSOC);;
	
	}
	
			public function ajouterUtilisateur($a,$b,$c){
	
		$parametre = array(':log' =>$a,':pass' =>$b,':avatar' =>$c);
		$this->ajouterUtilisateur->execute($parametre);
$this->ajouterUtilisateur->rowCount();
	
	}
	
		
			public function suppCompte($A){
		$this->suppCompte->execute( array(':log' => $A));
	return $this->suppCompte->rowCount();
	
		}
	
			public function changermdp($A,$B){
		$this->changermdp->execute( array(':logiin' => $A,':Mdp'=>$B));
	return $this->changermdp->rowCount();
	
		}
	
	
		public function verif($_login){
		$parametre = array(':logiin' => $_login);
		$this->verif->execute($parametre);
	$nbr = $this->verif->rowCount();
		if ($nbr == 0){
			return "false";
		}else{
			return "true";
		}
	}
			public function pass($_login){
		$parametre = array(':logiin' => $_login);
		$this->pass->execute($parametre);
	return $this->pass->fetchAll(PDO::FETCH_ASSOC);
	
	}
	
	public function connexionLog($_login,$_mdp){
		
		$parametre = array(':login' => $_login,':mdp' => $_mdp);
		$this->connexionLog_req->execute($parametre);
	$this->connexionLog = $this->connexionLog_req->fetchAll(PDO::FETCH_ASSOC);
	return $this->connexionLog;
	}

		public function connexionLg($_login,$_mdp){
		
		$parametre = array(':login' => $_login,':mdp' => $_mdp);
		$this->connexionLg_req->execute($parametre);
	$nbr = $this->connexionLg_req->rowCount();
		
		if ($nbr == 0){
			return "false";
		}else{
			return "true";
		}
	
}
}

?>
