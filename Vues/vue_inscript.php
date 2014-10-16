
<?php
if ( isset($_POST["llog"]) ) {
						$ad = new admin($connexion);
						$_login=$_POST["llog"] ;
						$connexionadmin = $ad->verif($_login);
if ($connexionadmin=="true") 
{
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
}	}
	else $image= "avatar" ;
	$gg = new admin($connexion);
	$pwd = $_POST["ppwd"];	
	$res = $gg->ajouterUtilisateur($_login, md5($pwd), $image );
	
echo "
<script> 
alert ('Votre compte va etre enregistré');
window.location.replace('index.php?vue=vue_connexion.php');
</script>";


}
}


echo "<font color=#ffffff>vous voulez vous inscrire sur ce site ? rien de plus rapide, il vous suffit de remplir ce formulaire et le tour est joué </font>" ;

echo " 
<div id='login'>
<table border=2><td>
<table>
<td>
<img  class=image src='./Images/metal.jpg' width=250 height=250>
</td><td><form action='index.php?vue=Vue_inscript.php' enctype='multipart/form-data' method='POST' >
	<p>
		<label><font color=#ffffff>Identifiant</font><br>
		<input type='text' tabindex='10' size='20'   id='user_login' name='llog'></label>
	</p>
	<p>
		<label><font color=#ffffff>Mot de passe</font><br>
		<input type='password' tabindex='20' size='20'  id='user_pass' name='ppwd'></label><br>
		<font color=#ffffff> upload un avatar(moins de 2 Mo)  </font><br>
	<input type='file' name='monFichier'/></label>
<input type='submit' id='envoie'/></td></table></td></table>


</form>
</div>";
