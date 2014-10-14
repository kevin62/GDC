
<?php
echo "<br><br><br><h1><font color=#ffffff ><center>Saisisez le nouveau nom du groupe </center></font></h1>";
echo "<br><br><br><br><center><img src='./Images/sablier.jpg'><center>"; 

	if(isset($_GET["Num"]))
		{
		$num = $_GET["Num"];

		echo  "<form method='POST' action='index.php?vue=Vue_modifiergroupe	.php'>
		<label><font color=#ffffff> nouveau nom </font><br>
		<input type='text' tabindex='10' size='20'    name='nom'></label><br>

		<input type='hidden'    value=$num name='num'></label>
		<br><input type='submit' id='envoie'> </form>" ;
		}

?>

