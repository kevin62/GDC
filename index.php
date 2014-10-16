<?php
	session_start();
	require_once "./Fonction/Liason.php"; 

	if(isset($_POST["log"])and isset($_POST["pwd"]))
	{
		$l=$_POST["log"];
		$m=$_POST["pwd"];

		Connexion($connexion,$l,encrypt_decrypt("encrypt",$m));
	}
	if (isset($_GET["vue"]))
	{
		$v_vue = $_GET["vue"]; 
		require_once "./Vues/$v_vue";
		echo ("<a href='index.php'>Accueil</a> " ) ;
	}	
	else
	{  
		echo " <center><br><br>";
		if(!isset($_SESSION["Loglogin"]))
		echo ("<a href='index.php?vue=vue_connexion.php'>Connexion  </a> " ) ;
		echo ("<a href='index.php?vue=View_Command.php'>commande </a> " ) ;
		if(isset($_SESSION["Niveau"]) && $_SESSION["Niveau"]>2)
		echo ("<a href='index.php?vue=vue_Membre.php'>administration</a> " ) ;
		echo "</center> ";
	}

	
	
	include "./utils/piedPage.php";
?>
