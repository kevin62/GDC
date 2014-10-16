<?php

	try
	{
		$connexion = new PDO('mysql:host=localhost;dbname=gestioncommandes','root','');
	}
	// host désigne la machine sur laquelle tourne mysql
	// root désigne le "user"
	// '' désigne le mot de passe

	catch(Exception $e)
	{
		echo $e->getMessage()."\n";
	}

?>