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

	//echo (" <img src='./Images/etoiledeB.jpg'height=40 width=40 > " ) ;
	echo ("<a href='index.php?vue=Vue_Sommairegroupe.php&deb=0&fin=5'><img src='./images/groupe.jpg'  height=50 width=100 </a> " ) ;

	if(isset($_SESSION["Loglogin"]))
	{
		echo (" <img src='./Images/etoiledeB.jpg'height=40 width=40 > " ) ;
		echo ("<a href='index.php?vue=vue_profil.php'><img src='./images/profil.jpg' height=50 width=100</a> " ) ;
	}
	else 
	{
		echo (" <img src='./Images/etoiledeB.jpg'height=40 width=40 > " ) ;
		echo ("<a href='index.php?vue=vue_connexion.php'><img src='./images/connexion.jpg'  height=50 width=100 </a> " ) ;
		echo (" <img src='./Images/etoiledeB.jpg'height=40 width=40 > " ) ;
		echo ("<a href='index.php?vue=vue_inscript.php'><img src='./images/inscription.jpg' height=50 width=100</a> " ) ;
	}
	
	echo (" <img src='./Images/etoiledeB.jpg'height=40 width=40 > " ) ;
	echo ("<a href='index.php?vue=vue_Aleatoire.php'><img src='./images/Aleatoire.jpg' height=50 width=100 </a> " ) ;
	echo (" <img src='./Images/etoiledeB.jpg'height=40 width=40 > " ) ;
	echo ("<a href='index.php?vue=vue_Galerie.php'><img src='./images/galerie.jpg'height=50 width=100 </a> " ) ;
	echo "</center> ";

				
	echo "  <table><td>
	<p><font color=#ffffff>
	Le <font color=#C60000> heavy metal</font> est un genre de rock apparu au Royaume-Uni et aux États-Unis à la fin des années 1960. Cependant, le terme de <font color=#C60000> « heavy metal »  </font>est sujet à confusion car il peut prendre plusieurs sens différents selon le contexte dans lequel il est employé :
	<br><br>
		* Dans un contexte original, il est utilisé comme un synonyme de <font color=#C60000>  hard rock</font>. <br>
		* Dans un second sens, le terme désigne le heavy metal traditionnel une tendance esthétique plus radicale qui, au cours des années 1970 et 1980, s’est démarquée du hard rock, en s’éloignant de ses racines blues.
	 <br>   * Dans un sens large et généralisé, le heavy metal ou metal (tout court) désigne toutes les musiques qui descendent du heavy metal traditionnel et du hard rock.
	<br><br>
		Le<font color=#C60000>  heavy metal </font> se caractérise par la dominance de la <font color=#C60000>  guitare</font> et de la <font color=#C60000>  batterie </font>, ainsi que par une<font color=#C60000>  rythmique puissante </font>. Il puise ses influences dans le <font color=#C60000>  rock </font>, la <font color=#C60000> musique classique </font> et dans le <font color=#C60000>  blues</font>. Toutefois, comme il englobe de nombreux sous-genres qui se sont démarqués les uns des autres de par leurs propres variations stylistiques, il existe désormais une très grande variété de sons et de styles au sein du genre dit « <font color=#C60000> heavy metal</font> ».
	<br><br>
	D'après le site Allmusic, « de la kyrielle de formes musicales engendrées par le <font color=#C60000> rock and roll </font>, le <font color=#C60000> heavy metal</font> constitue la plus extrême en termes de volume sonore, de machisme et de théâtralité »
	</font></p>	
		</td><td>
	<img src='./Images/SQM.jpg >
	";
}

include "./utils/piedPage.php";


?>


