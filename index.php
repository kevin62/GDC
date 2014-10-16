<?php

include "./utils/entete.html";

	session_start();
	require_once "./Fonction/Liason.php"; 

	if(isset($_POST["log"])and isset($_POST["pwd"]))
	{
		$l=$_POST["log"];
		$m=$_POST["pwd"];

		Connexion($connexion,$l,encrypt_decrypt("encrypt",$m));
	}
	if (isset($_GET["vue"]))
	{
	?>
	<div id="slider">
	
    <div id="templatemo_sidebar">
    	<div id="templatemo_header">
        	<a href="http://www.templatemo.com" target="_parent"></a>
        </div> <!-- end of header -->
        
          <ul class="navigation">
		
		<?php
		echo "<li><a href='index.php'>Home<span class='ui_icon home'></span></a></li>";
		if(!isset($_SESSION["Loglogin"]))
		echo  "<li><a href='index.php?vue=vue_connexion.php'>Connexion<span class='ui_icon aboutus'></span></a></li>";
		echo  "<li><a href='index.php?vue=View_Command.php'>Commande<span class='ui_icon gallery'></span></a></li>";
		if(isset($_SESSION["Niveau"]) && $_SESSION["Niveau"]>2)
		echo "<li><a href='index.php?vue=vue_Membre.php'>Administration<span class='ui_icon services'></span></a></li>";
		?>            
            <li><a href="#contactus">Contact Us<span class="ui_icon contactus"></span></a></li>
        </ul>
    </div> <!-- end of sidebar -->
    </div> <!-- end of sidebar -->
</div>
	<?php
	
		$v_vue = $_GET["vue"]; 
		require_once "./Vues/$v_vue";
		}	
	else
	{  
	?>
	
	
	
<div id="slider">
	
    <div id="templatemo_sidebar">
    	<div id="templatemo_header">
        	<a href="http://www.templatemo.com" target="_parent"></a>
        </div> <!-- end of header -->
        <ul class="navigation">
		
		<?php
		echo "<li><a href='index.php'>Home<span class='ui_icon home'></span></a></li>";
		if(!isset($_SESSION["Loglogin"]))
		echo  "<li><a href='index.php?vue=vue_connexion.php'>Connexion<span class='ui_icon aboutus'></span></a></li>";
		echo  "<li><a href='index.php?vue=View_Command.php'>Commande<span class='ui_icon gallery'></span></a></li>";
		if(isset($_SESSION["Niveau"]) && $_SESSION["Niveau"]>2)
		echo "<li><a href='index.php?vue=vue_Membre.php'>Administration<span class='ui_icon services'></span></a></li>";
		?>            
            <li><a href="#contactus">Contact Us<span class="ui_icon contactus"></span></a></li>
        </ul>
    </div> <!-- end of sidebar -->

	<div id="templatemo_main">
    	<ul id="social_box">
            <li><a href="http://www.facebook.com/templatemo"><img src="images/facebook.png" alt="facebook" /></a></li>
            <li><a href="http://www.facebook.com/templatemo"><img src="images/twitter.png" alt="twitter" /></a></li>
            <li><a href="http://www.facebook.com/templatemo"><img src="images/linkedin.png" alt="linkin" /></a></li>
            <li><a href="http://www.facebook.com/templatemo"><img src="images/technorati.png" alt="technorati" /></a></li>
            <li><a href="http://www.facebook.com/templatemo"><img src="images/myspace.png" alt="myspace" /></a></li>                
        </ul>
        
        <div id="content">
        
        <!-- scroll -->
        
        	
            <div class="scroll">
                <div class="scrollContainer">
                
                    <div class="panel" id="home">
                        <h1>Gestion de commande</h1>    
                        <div class="image_wrapper image_fl"><img src="images/gallery/image_01.jpg" alt="image" /></div>
                        <p><em>Une application au service des societés </a>.</em></p>
                        <p></p>
                      <div class="cleaner_h40"></div>
                        
                        <h2>Bla bla bla</h2> 
                        <p><em>Bla bla bla Bla bla bla Bla bla bla</em></p>
                        <p>Bla bla blaBla bla blaBla bla blaBla bla blaBla bla bla.</p>
                                         </div> <!-- end of home -->
      
       
                
                </div>
			</div>
            
        <!-- end of scroll -->
        
        </div> <!-- end of content -->
        
        <div id="templatemo_footer">

            Copyright © 2014 <a href="#">EPSI</a> | <a href="#" target="_parent"GDC</a> by <a href="#" target="_parent">EPSI STUDENTS</a>
        
        </div> <!-- end of templatemo_footer -->
    
    </div> <!-- end of main -->
</div>

	<?php
	
	/*
		echo " <center><br><br>";
		if(!isset($_SESSION["Loglogin"]))
		echo ("<a href='index.php?vue=vue_connexion.php'>Connexion  </a> " ) ;
		echo ("<a href='index.php?vue=View_Command.php'>commande </a> " ) ;
		if(isset($_SESSION["Niveau"]) && $_SESSION["Niveau"]>2)
		echo ("<a href='index.php?vue=vue_Membre.php'>administration</a> " ) ;
		echo "</center> ";*/
	}

	
	
	include "./utils/piedPage.php";
?>
