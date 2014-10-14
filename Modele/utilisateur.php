<?php

class User{
	
	private $connectionQuery;
	private $connection;
	
	/*private $Modifcompte;	
		
		
	private $changermdp ;
	private $ajouterUtilisateur ;
	
	private $suppCompte;
	private $verif;
	private $pass;
	private $AdminSupreme ;
	private $AdminNormal ;*/
	
	public function __construct($connexion)
	{
		/*$this->Modifcompte = $connexion->prepare("update utilisateur set pwd=:pwd, niveau=:niveau, avatar=:avatar where id_user=:id_user");
		
		$this->AdminNormal = $connexion->prepare("SELECT * from utilisateur where niveau != 4 and niveau!=3;");
		$this->suppCompte = $connexion->prepare("Delete from utilisateur where LoginSite=:log ");
		$this->verif = $connexion->prepare("select * from utilisateur where LoginSite=:logiin  ; ");
		$this->pass = $connexion->prepare("select * from utilisateur where LoginSite=:logiin  ; ");
		$this->changermdp = $connexion->prepare("update utilisateur set passW= :Mdp where LoginSite= :logiin ;");*/
		$this->connectionQuery = $connexion->prepare("select * from utilisateur where login=:login and pwd=:pwd ; ");
		//$this->ajouterUtilisateur = $connexion->prepare("insert into  utilisateur(LoginSite,passW,Avatar) values (:log,:pass,:avatar); ");
		
	}
	
	public function connection($login, $pwd)
	{		
		$parametre = array(':login' => $login,':pwd' => $pwd);
		$this->connectionQuery->execute($parametre);
		$is_connected = $this->connectionQuery->rowCount();
		return $is_connected;
	}
	
	/*public function Modifcompte($pwd, $niveau, $avatar, $id_user)
	{
		$parametre= Array (":pwd" => $pwd, ":niveau" => $niveau, ":avatar" => $avatar, ":id_user" => $id_user);
		$this->Modifcompte->execute($parametre);
		return $this->Modifcompte->rowCount();
	}
	
	public function AdminNormal()
	{
		$this->AdminNormal->execute();
		return $this->AdminNormal->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function ajouterUtilisateur($a,$b,$c)
	{
	
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
	
	}*/
}

?>
