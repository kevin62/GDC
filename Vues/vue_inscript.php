
<?php
if ( isset($_POST["llog"]) ) {
	$ad = new admin($connexion);
	$_login=$_POST["llog"] ;
	$connexionadmin = $ad->verif($_login);

	if ($connexionadmin=="true"){	
		$pwd = $_POST["ppwd"];	
		echo" <script> 
			alert ('Desolé il existe deja un utilisateur avec ce pseudo');
			window.location.replace('index.php?vue=vue_inscript.php');
			</script>";
	}
	else {	
		if (is_uploaded_file($_FILES["monFichier"]["tmp_name"])){
			if(move_uploaded_file($_FILES["monFichier"]["tmp_name"] , "./Images/$_login.jpg")) {
				echo "le fichier a bel et bien etait envoyé <br>" ;
				$image = "$_login" ;
			}			
		}
		else $image= "avatar" ;
	$gg = new admin($connexion);
	$pwd = $_POST["ppwd"];	
<<<<<<< HEAD
	$res = $gg->ajouterUtilisateur($_login, md5($pwd), $image );	
	echo "<script> 
		alert ('Votre compte va etre enregistré');
		window.location.replace('index.php?vue=vue_connexion.php');
		</script>";
	}
=======
	
		$t =encrypt_decrypt("encrypt","z");
		echo $t;
		echo "----".encrypt_decrypt("decrypt",$t);
		
	$res = $gg->ajouterUtilisateur($_login, encrypt_decrypt("encrypt",$pwd), $image );
	
echo "
<script> 
alert ('Votre compte va etre enregistré');
window.location.replace('index.php?vue=vue_connexion.php');
</script>";


}
>>>>>>> features/connexionetGDC
}
echo "<center>";

echo "<font face='Helvetica'><br>Vous souhaitez vous inscrire sur ce site ? Rien de plus rapide, il vous suffit de remplir ce formulaire" ;

echo "
	<div id='login'><br>
	<table border=2><td>
		<table>
			<td><center>
				<font face='Helvetica' color='red'><b><center><form action='index.php?vue=Vue_inscript.php' enctype='multipart/form-data' method='POST' >
				<p>
					<label>Identifiant<br>
					<input type='text' tabindex='10' size='20'   id='user_login' name='llog'></label>
				</p>
				<p>
					<label>Mot de passe<br>
					<input type='password' tabindex='20' size='20'  id='user_pass' name='ppwd'></label><br>
				</p>
				
				<br>Choix de l'avatar<br></font>
				<input type='file' name='monFichier'/>
				<br><br><center><input type='submit' id='envoie'/></center>
				
			</td>
		</table>
	</td></table>
<br>


</form>
</div>";
