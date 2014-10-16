<?php


if(isset($_POST["log"]) && isset($_POST["captcha"]))
{

if( $_SESSION["captcha"]["code"]!=$_POST["captcha"])
	formPwdForget(1);
else
{
	$ad = new admin($connexion);
	$_login=$_POST["log"] ;
	$connexionadmin = $ad->verif($_login);
	
	if($connexionadmin=="false") 
		formPwdForget(2);
	else 
	{
		$connexionadmin = $ad->pass($_login);
	echo" <script> 
		alert ('voila votre mot de passe. faites attention la prochaine fois : ".encrypt_decrypt("decrypt",$connexionadmin[0]["pwd"])."');
		window.location.replace('index.php');
		</script>";
	}
}
}
else
	formPwdForget(0);

 Function formPwdForget($err)
{

include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();


?>
    <form name="motdepasse" method="post" action="index.php?vue=View_forgotPwd.php">
<label> Saisir votre login <input type=text name="log" size="10" value="" />
<?php
if($err==2)
echo "<text color=#ff0000 > N'existe pas dans la base </text>";
?>
 <p>
    	<?php
    	echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';
    	
    	?>
    </p>
<label> Saisir le captcha <input type=text name="captcha" size="10" value="" />
<?php
if($err==1)
echo "<text color=#ff0000 > Le captcha n'est pas le bon </text>";
?>
<input type="submit" name="action onClick=(this.form)" value="OK">
</form>
<pre>
<?php
}
?>