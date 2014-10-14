<?php

	echo "<div id=gauche>";

	$Ci = new Citation($connexion);
	$v_ToutesLesCitations = $Ci->ToutesLesCitations();
	$v_nbCitation = count($v_ToutesLesCitations);

	//print_r($v_ToutesLesCitations);

	$nbmax=$v_nbCitation ;
	$nombre = rand(1,$nbmax);

	echo "<p>  <font color=#cccccc >" ;
	echo $v_ToutesLesCitations[$nombre-1]["Cita"] ;
	echo  "</font></p></div>" ;

	?>