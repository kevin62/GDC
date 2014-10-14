
<?php

	if(isset($_SESSION["Loglogin"]))
		{
		echo "<script langage=javascript>	alert ('tu es déjà connecté') ; </script>" ; 
		echo "<p align=center> <a href='index.php'><font color=#ff0000> Retour a l'index  </font></a></p>" ;
		}
		else 
		{
		echo 	
		"<br><br><font color=#ffffff><center> Ici vous pouvez vous connecter !!! </center></font>
		<div id='login'><h1><a title='connexion'></h1>
		<table border=2><td>
		<table>
		<td>
		<img  class=image src='./Images/conn.jpg' width=200 height=200>
		</td><td valign=top ><form action='index.php' method='POST' >
			<p>
				<label><font color=#ffffff>Identifiant</font><br>
				<input type='text' tabindex='10' size='20'   id='user_login' name='log'></label>
			</p>
			<p>
				<label><font color=#ffffff>Mot de passe</font><br>
				<input type='password' tabindex='20' size='20'  id='user_pass' name='pwd'></label>
		<br><br><center><input type='submit' id='envoie'/></center></td></table></td></table>
		</form>
		</div>

		<div id='Oops'>
		<font color=#ffffff> si tu n'es pas encore inscris ce n'est pas la que tu dois etre!! regarde ici =><a href='index.php?vue=vue_inscript.php'><font color=#ff0000>  INSCRIPTION </font></a>
		sinon tu peux toujours retourner sur l'acceuil ici => <a href='index.php'><font color=#ff0000> ACCUEIL</font></a></font>
		</div>

		</html> " ;
		}
?>
