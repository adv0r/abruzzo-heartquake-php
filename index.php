<?php
//AUTENTICAZIONE
require_once("php/mieFunzioni.php");
error_reporting(E_ALL);


if(isset($_POST['invia'])){ // se è stato premuto 'Accedi'



		if(isset($_POST['login'])){ // se è stato selezionato un radio
				$_SESSION['id']= $_POST['login']; // setto la variabile di sessione
			
				$var = $_SESSION['id'];
				
				
				if($var == "12fourier"){ header("location: php/inventario.php?puntoRaccolta=1"); }
				else if($var == "ohmumpalumpa"){ header("location: php/inventario.php?puntoRaccolta=2"); }	
				else if($var == "pirandellobello"){ header("location: php/inventario.php?puntoRaccolta=3"); }	
				else if($var == "kindermaxi"){ header("location: php/inventario.php?puntoRaccolta=4"); }	  
				else{}
						
		}else{}
}else{}
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>

<title>Donazioni - Login</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="var/login.css" rel="stylesheet" type="text/css" />


</head>

<body >
<div id="main">
	<div id="mainmenu" class="openingmenu" style="height:160px">  </div>

	<div id="content" style="top:224px" >

		<div class="box login">
		<div id="errore" align="center" style="color:#FF0000; font-weight:bold; "></div>
<form method="post" name="mainForm" action="">
		<div align="right">Codice: 
		  <input align="left" name="login"  type="text" value="" style="width:134px;"/><br />
		  </br><br />
          <input type="submit" name="invia" value="Accedi">
        </div>
		<hr align="right">
		<div align="right">Inserisci il codice fornito dall'Amministratore (<a href="mailto:leg@lize.it">leg@lize.it</a>) per accedere all'inventario.
          <br>

        </div>
</form>	

	  </div><br>
  </div>
  <div id="footer" style="top:370px">
<p>CSS by <a href="http://www.mifav.uniroma2.it/life2006/login.php" target="_blank">Life</a> &copy; (2009)  | Raccolta Fondi e Beni per i terremotati d'Abruzzo. Univerista' di Roma Tor Vergata  </p>
  </div>
</div>
</body>
</html>
