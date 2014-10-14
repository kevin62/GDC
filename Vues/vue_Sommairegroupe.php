
<?php


$deb =$_GET["deb"]; 
$fin=$_GET['fin'];
$b=$deb;

$Cp = new Groupes($connexion);
$v_TousLesGroupes = $Cp->TousLesGroupes();
$v_nbGroupes = count($v_TousLesGroupes);
//print_r($v_ToutesLesGroupes);





echo " <br /><br /><table align=center><td>
<img src='./Images/me.jpg'></td><td><ul> " ;

	if ( $v_nbGroupes<=$fin )
		{
		$boucle=$v_nbGroupes ;
		}
		else
		{
		$boucle=$fin ;
		}
		
		for ($b=$deb;$b<$boucle;$b++)
			foreach($v_TousLesGroupes[$b] as $champ => $valeur)
				{

				if($champ=="NomG") $tem=$valeur;
				if ($champ == "NumGrp")
					{
					$temp=$valeur;

				echo  " <table  cellpadding=10   width=250 height=20><td>" ;
				echo "<li><a href=index.php?vue=Vue_groupe.php&Grp=$valeur><font color=#ffffff >$tem</font></a>";

				
					if (isset($_SESSION["Niveau"]))
						{
							if ($_SESSION["Niveau"]>=3) 
								{
								echo "</td><td width=15><a href=index.php?vue=Vue_modifgroupe.php&Num=$temp><IMG SRC='./Images/modif.jpg' width=25></a>
								<a href=index.php?vue=Vue_supprimergroupe.php&NomG=$temp><img src=./Images/croix.jpg width=25></a>";
							}
						}
					echo " </td><tr></table> " ; 
					}
				}
			echo "</ul> </td><td><img src='./Images/met.jpg'></td></table> " ;

			$deb=$deb+5;
			$fin=$fin+5;
			$d=$deb-10;
			$f=$fin-10;

	if (isset($_SESSION["Niveau"]))
		{
			if ($_SESSION["Niveau"]>=3) 
				{
				echo " <font color=#ffffff> <center>En tant qu'administrateur vous etes autorisez a rajouter un groupe  </font> <div id='ajout' class='bouton'><font color=#ff0000>Ici</font></div></center>" ;
				echo "<div id='aaj' align=center> <form action='index.php?vue=vue_AjoutGroupe.php' method='POST' >
					<p>
						<label><font color=#ffffff>Nom du groupe </font><br>
						<input type='text' tabindex='10' size='20'   id='nom' name='nom'></label><br>
						<label><font color=#ffffff>Nom d'un album </font><br>
						<input type='text' tabindex='10' size='20'    name='noma'></label><br>
						<label><font color=#ffffff> date de sortie de l'album </font><br>
						<input type='text' tabindex='10' size='20'   id='alb' name='datee'></label>

					</p>
				<input type='submit' id='envoie'/>
				</form></div><br>";
				}
		}

	
		echo "<center> " ;
			if ( $b>6 )
				{
				echo " <a href=index.php?vue=Vue_Sommairegroupe.php&deb=$d&fin=$f><font color=#ffffff>Precedent</fond></a> " ;
				}
			if ($b != $v_nbGroupes )
				{
				echo " <a href=index.php?vue=Vue_Sommairegroupe.php&deb=$deb&fin=$fin><font color=#ffffff>Suivant</fond></a>" ;
				}
			echo "</div><br>";
			echo "<a href='index.php'><font color=#ffffff> retour l'index </font></a> ";
			
			
			
?>
<script type = 'text/javascript' src =  'jquery-1.4.4.js'></script>
<script>

function border()
	{
	$(this).css({'border' : '1px solid black' ,'backgroundColor' : 'red', 'color':'white'});
	}
	
function noBorder()
	{	
	$(this).css({'border' : '0px solid black' ,'backgroundColor' : 'black', 'color':'white'});
}
function ajouter()
	{	
	$("#aaj").show({'backgroundColor' : 'black', 'color':'white'});	
	}
$(function ini() 
	{	
		$("#aaj").hide() ;
	$('li').hover(border,noBorder) ;
	$("#ajout").click(ajouter);

	});

	
</script> 
