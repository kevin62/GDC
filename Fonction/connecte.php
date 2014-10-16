<?php



if(isset($_SESSION))
{						
	if(isset($_SESSION["photo"]))
	{
	echo "<div id=droit>";
	
	$photo=$_SESSION["photo"];
	$nom =$_SESSION["Loglogin"];
		
		$nomdelavue="";
				
				if(isset($_GET["vue"]))	$nomdelavue=$_GET["vue"];

						if ($nomdelavue!="vue_profil.php")
							{
						echo "<table><td><img src='./Images/$photo.jpg' width=100 height =75 />
						<td> <font color=#0000ff>$nom</font><br> <br>";

							if ($_SESSION["Niveau"]==3)
								{
								echo "<font color=#0000ff>vous etes un administrateur </font>";
								}
							else if ($_SESSION["Niveau"]==4)
								{
								echo "<font color=#0000ff> vous etes super admin</font> "; 
								}
							else 
								{
								echo "<font color=#0000ff>vous etes invité !</font> " ;
								}
						
							echo "<br><a href='index.php?vue=vue_deco.php' /><font color=#0000ff>deconnexion</font></a>";
							echo "</td></table>";
							}
				
			echo "</div>";
	}
}

?>