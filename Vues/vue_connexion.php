
<?php

	if(isset($_SESSION["Loglogin"]))
	{
		echo " <script>window.location.replace('index.php');</script>";
	}
	else 
	{
		echo 	
		"<br><center> 
		<div id='login'><h1><a title='connexion'></h1>
			<table border=2><td>
			<table>
				<p>
				<form action='index.php?vue=Vue_connexion.php' enctype='multipart/form-data' method='POST' >
					<font face='Helvetica' color='green'><b><center><label>Identifiant<br>
					<input type='text' tabindex='10' size='20'   id='user_login' name='log'></label>
				</p>
				<p>
					<label>Mot de passe<br>
					<input type='password' tabindex='20' size='20'  id='user_pass' name='pwd'></label>
				</p>
				<center><input type='submit' id='envoie'/></center><br>
				</b><a href='index.php?vue=View_forgotPwd.php'><font color=#ff0000 size='2'> Mot de passe oublie</font></a></font>
				</form>
			</table>
			</td></table>
		</div>
		
		
		<br>
		<div id='Oops'>
			<a href='index.php?vue=vue_inscript.php'> INSCRIPTION </font></a>
		</div>
		</center>" ;
	
	echo"
		
		</div>
			
		</html> " ;
		}

?>
