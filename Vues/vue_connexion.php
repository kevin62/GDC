
<?php

	if(isset($_SESSION["Loglogin"]))
	{
		echo "<p align=center> <a href='index.php'><font color=#ff0000> Retour a l'index  </font></a></p>" ;
	}
	else 
	{
		echo 	
		"<br><center> 
		<div id='login'><h1><a title='connexion'></h1>
			<table border=2><td>
			<table>
				<p>
					<br><font face='Helvetica' color='red'><b><center><label>Identifiant<br>
					<input type='text' tabindex='10' size='20'   id='user_login' name='log'></label>
				</p>
				<p>
					<label>Mot de passe<br>
					<input type='password' tabindex='20' size='20'  id='user_pass' name='pwd'></label>
				</p>
				<center><input type='submit' id='envoie'/></center><br>
			</table>
			</td></table>
		</div>
		
		
		<br>
		<div id='Oops'>
<<<<<<< HEAD
			<a href='index.php?vue=vue_inscript.php'> INSCRIPTION </font></a>
		</div>
		</center>" ;
	}
=======
		<font color=#ffffff> si tu n'es pas encore inscris ce n'est pas la que tu dois etre!! regarde ici =><a href='index.php?vue=vue_inscript.php'><font color=#ff0000>  INSCRIPTION </font></a>
		Oublie de mot de passe => <a href='index.php?vue=View_forgotPwd.php'><font color=#ff0000> Oublie</font></a></font>
		</div>
			
		</html> " ;
		}
>>>>>>> features/connexionetGDC
?>
