<?php
	session_start();
	require_once "./Fonction/Liason.php"; 

	if(isset($_POST["log"])and isset($_POST["pwd"]))
	{
		$l=$_POST["log"];
		$m=$_POST["pwd"];
		Connexion($connexion,$l,$m);
	}

	if (isset($_GET["vue"]))
	{
		$v_vue = $_GET["vue"]; 
		require_once "./Vues/$v_vue";
	}	

	else
	{  
		echo " <center><br><br>";
		echo ("<a href='index.php?vue=vue_connexion.php'><img src='./images/Connexion.png'  </a> " ) ;
		echo ("<a href='index.php?vue=vue_connexion.php'><img src='./images/Commandes.png'  </a> " ) ;
		echo ("<a href='index.php?vue=vue_inscript.php'><img src='./images/Administration.png' </a> " ) ;
		echo "</center> ";
	}

	include "./utils/piedPage.php";
?>
