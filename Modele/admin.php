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
		
		
		$this->Modifcompte= $connexion->prepare("update utilisateur set pwd=:passeword,niveau=:Level,Avatar=:Avatar where login=:log");
		$this->AdminNormal= $connexion->prepare("SELECT * from utilisateur  where niveau !=4 and niveau!=3;");
		$this->AdminSupreme= $connexion->prepare("SELECT * from utilisateur");
		$this->suppCompte = $connexion->prepare("Delete from utilisateur where login=:log ");
		$this->verif = $connexion->prepare("select * from utilisateur where login=:logiin  ; ");
		$this->pass = $connexion->prepare("select * from utilisateur where login=:logiin  ; ");
		$this->changermdp = $connexion->prepare("update utilisateur set pwd= :Mdp where login= :logiin ;");
		$this->connexionLog_req = $connexion->prepare("select * from utilisateur where login=:login and pwd=:mdp ; ");
		$this->connexionLg_req = $connexion->prepare("select * from utilisateur where login=:login and pwd=:mdp ; ");
		$this->ajouterUtilisateur = $connexion->prepare("insert into  utilisateur(login,pwd,Avatar) values (:log,:pass,:avatar); ");
		
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
