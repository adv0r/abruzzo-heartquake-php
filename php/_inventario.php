<?php
	require_once("mieFunzioni.php");
	$Id = $_SESSION['id'];
	if ($Id != ''){}
	else {header("location: ../index.php");}
	
	
	$daDove = $_GET['puntoRaccolta'];
	if($daDove == 1){ $luogo = "Scienze";}
	else if($daDove == 2){ $luogo = "Ingegneria";}
	else if($daDove == 3){ $luogo = "Lettere";}
	else if($daDove == 4){ $luogo = "Altro";}
	else{}
	
	if($_GET['nome'] == ""){
	$nome_donatore = "Anonimo";
	$cognome_donatore = "Anonimo";
	$mail_donatore = "";
	$indirizzo_donatore = "";
	$recapito_donatore = "";
	$numero_ricevuta = "";
	}
	else{
	$nome_donatore = $_GET['nome'];
	$cognome_donatore = $_GET['cognome'];
	$mail_donatore = $_GET['mail'];
	$indirizzo_donatore = $_GET['indirizzo'];
	$recapito_donatore = $_GET['recapito'];
	$numero_ricevuta = $_GET['ricevuta'];
	}
	
	
	if(isset($_POST['confermaFineBeni'])){
	
		if($_POST['donatore_nome'] != ""){$nome_donatore = $_POST['donatore_nome'];}
		if($_POST['donatore_cognome'] != ""){$cognome_donatore = $_POST['donatore_cognome'];}
		if($_POST['donatore_indirizzo'] != ""){$indirizzo_donatore = $_POST['donatore_indirizzo'];}
		if($_POST['donatore_recapito'] != ""){$recapito_donatore = $_POST['donatore_recapito'];}
		if($_POST['donatore_mail'] != ""){$mail_donatore = $_POST['donatore_mail'];}
		if($_POST['n_ricevuta'] != ""){$numero_ricevuta = $_POST['n_ricevuta'];}
		//echo $numero_ricevuta;
		
		
$descrizione = "";
		
		
			if(ritornaQualcosaDonatore( $nome_donatore, $cognome_donatore) == ""){
			
				aggiungiDonatore($nome_donatore, $cognome_donatore, $indirizzo_donatore, $recapito_donatore, $mail_donatore);
								
			}
		
		if($_POST['oggetto_note'] != ""){$descrizione = $_POST['oggetto_note'];}
		if($_POST['oggetto_nome'] != ""){
				$oggetto_nome = $_POST['oggetto_nome'];
				$quantita = $_POST['quantita'];
				$categoria = $_POST['categoria'];
				$ID_item = aggiungiOggetto2($descrizione, $oggetto_nome, $categoria, $quantita);
				$giorno = getdate();
				$giornoDonazione = "".$giorno['mday']."-".$giorno['mon']."-".$giorno['year']."";
				$ID_donatore = ritornaQualcosaDonatore($nome_donatore, $cognome_donatore);
				//echo $ID_donatore;
				$ora = (date("G:i"));
				//echo $ora;
				
				//echo "saddsa";
				compilaDonazione($ID_item, $ID_donatore, $giornoDonazione, $ora, $luogo, $numero_ricevuta, $quantita);
				
		}	
	$nome_donatore = "Anonimo";
	$cognome_donatore = "Anonimo";
	$mail_donatore = "";
	$indirizzo_donatore = "";
	$recapito_donatore = "";
	$numero_ricevuta = "";
		
	//	header("location: inventario.php?puntoRaccolta=".$daDove."");
		
	}
	
	
	
	
	
	
	
	
	
	if(isset($_POST['confermaAltroBeni'])){

		if($_POST['donatore_nome'] != ""){$nome_donatore = $_POST['donatore_nome'];}
		if($_POST['donatore_cognome'] != ""){$cognome_donatore = $_POST['donatore_cognome'];}
		if($_POST['donatore_indirizzo'] != ""){$indirizzo_donatore = $_POST['donatore_indirizzo'];}
		if($_POST['donatore_recapito'] != ""){$recapito_donatore = $_POST['donatore_recapito'];}
		if($_POST['donatore_mail'] != ""){$mail_donatore = $_POST['donatore_mail'];}
		if($_POST['n_ricevuta'] != ""){$numero_ricevuta = $_POST['n_ricevuta'];}
		//echo $numero_ricevuta;
		
		$descrizione = "";
		
		
			if(ritornaQualcosaDonatore( $nome_donatore, $cognome_donatore) == ""){
			
				aggiungiDonatore($nome_donatore, $cognome_donatore, $indirizzo_donatore, $recapito_donatore, $mail_donatore);
								
			}
		
		if($_POST['oggetto_note'] != ""){$descrizione = $_POST['oggetto_note'];}
		if($_POST['oggetto_nome'] != ""){
				$oggetto_nome = $_POST['oggetto_nome'];
				$quantita = $_POST['quantita'];
				$categoria = $_POST['categoria'];
				$ID_item = aggiungiOggetto2($descrizione, $oggetto_nome, $categoria, $quantita);
				$giorno = getdate();
				$giornoDonazione = "".$giorno['mday']."-".$giorno['mon']."-".$giorno['year']."";
				$ID_donatore = ritornaQualcosaDonatore($nome_donatore, $cognome_donatore);
				//echo $ID_donatore;
				$ora = (date("G:i"));
				//echo $ora;
				
				//echo "saddsa";
				compilaDonazione($ID_item, $ID_donatore, $giornoDonazione, $ora, $luogo, $numero_ricevuta, $quantita);
				
		}
			
		
			
			
				header("location: inventario.php?puntoRaccolta=".$daDove."&nome=".$nome_donatore."&cognome=".$cognome_donatore."&indirizzo=".$indirizzo_donatore."&recapito=".$recapito_donatore."&mail=".$mail_donatore."&ricevuta=".$numero_ricevuta."");
	} //conferma e continua BENI
	
	
	
	
	
	if(isset($_POST['confermaAltroSoldi'])){

		if($_POST['donatore_nome'] != ""){$nome_donatore = $_POST['donatore_nome'];}
		if($_POST['donatore_cognome'] != ""){$cognome_donatore = $_POST['donatore_cognome'];}
		if($_POST['donatore_indirizzo'] != ""){$indirizzo_donatore = $_POST['donatore_indirizzo'];}
		if($_POST['donatore_recapito'] != ""){$recapito_donatore = $_POST['donatore_recapito'];}
		if($_POST['donatore_mail'] != ""){$mail_donatore = $_POST['donatore_mail'];}
		if($_POST['n_ricevuta'] != ""){$numero_ricevuta = $_POST['n_ricevuta'];}
		//echo $numero_ricevuta;
		
		$note = "";
		
		
			if(ritornaQualcosaDonatore( $nome_donatore, $cognome_donatore) == ""){
			
				aggiungiDonatore($nome_donatore, $cognome_donatore, $indirizzo_donatore, $recapito_donatore, $mail_donatore);
								
			}
		
		if($_POST['note'] != ""){$note = $_POST['note'];}
		if($_POST['importo'] != ""){
				$importo = $_POST['importo'];
				//echo  $importo;
				$ID_item = aggiungiImporto($importo, $note);
				$giorno = getdate();
				$giornoDonazione = "".$giorno['mday']."-".$giorno['mon']."-".$giorno['year']."";
				$ID_donatore = ritornaQualcosaDonatore($nome_donatore, $cognome_donatore);
				//echo $ID_donatore;
				$ora = (date("G:i"));
				//echo $ora;
				compilaDonazione($ID_item, $ID_donatore, $giornoDonazione, $ora, $luogo, $numero_ricevuta);
				//echo "COMPILATO";
		}
			
		
			
			
				header("location: inventario.php?puntoRaccolta=".$daDove."&nome=".$nome_donatore."&cognome=".$cognome_donatore."&indirizzo=".$indirizzo_donatore."&recapito=".$recapito_donatore."&mail=".$mail_donatore."&ricevuta=".$numero_ricevuta."");
	} //conferma e continua
	
	if(isset($_POST['confermaFineSoldi'])){
	
		if($_POST['donatore_nome'] != ""){$nome_donatore = $_POST['donatore_nome'];}
		if($_POST['donatore_cognome'] != ""){$cognome_donatore = $_POST['donatore_cognome'];}
		if($_POST['donatore_indirizzo'] != ""){$indirizzo_donatore = $_POST['donatore_indirizzo'];}
		if($_POST['donatore_recapito'] != ""){$recapito_donatore = $_POST['donatore_recapito'];}
		if($_POST['donatore_mail'] != ""){$mail_donatore = $_POST['donatore_mail'];}
		if($_POST['n_ricevuta'] != ""){$numero_ricevuta = $_POST['n_ricevuta'];}
		//echo $numero_ricevuta;
		
		$note = "";
		
		
			if(ritornaQualcosaDonatore( $nome_donatore, $cognome_donatore) == ""){
			
				aggiungiDonatore($nome_donatore, $cognome_donatore, $indirizzo_donatore, $recapito_donatore, $mail_donatore);
								
			}
		
		if($_POST['note'] != ""){$note = $_POST['note'];}
		if($_POST['importo'] != ""){
				$importo = $_POST['importo'];
				//echo  $importo;
				$ID_item = aggiungiImporto($importo, $note);
				$giorno = getdate();
				$giornoDonazione = "".$giorno['mday']."-".$giorno['mon']."-".$giorno['year']."";
				//echo "1";
				$ID_donatore = ritornaQualcosaDonatore($nome_donatore, $cognome_donatore);
				//echo $ID_donatore;
				//echo "2";
				$ora = (date("G:i"));
				//echo $ora;
				compilaDonazione($ID_item, $ID_donatore, $giornoDonazione, $ora, $luogo, $numero_ricevuta);
	$nome_donatore = "Anonimo";
	$cognome_donatore = "Anonimo";
	$mail_donatore = "";
	$indirizzo_donatore = "";
	$recapito_donatore = "";
	$numero_ricevuta = "";
				
		}
		
	//	header("location: inventario.php?puntoRaccolta=".$daDove."");
		
	}

	$contanti = "none";
	$beni = "none";


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
      
      <script type="text/javascript" >
	<!-- 
	

	 

		function mostraDIV(ID,ID2){
		
			
			document.getElementById(ID).style.display = 'block' ;
			document.getElementById(ID2).style.display = 'none' ;
		}
		
		function nascondiSoldi(ID, ID2){
			document.getElementById(ID).style.display = 'none' ;
			document.getElementById(ID2).style.display = 'block' ;
			
		}
		function nascondiDIV(ID){
			

		
			//document.getElementById(ID).style.display = 'none';
			document.formetto.oggetto_nome.value="";
			document.formetto.oggetto_note.value="";
			document.formetto.quantita.value="";
			
		}
		

		
		
	//-->
</script>

<head>

<title>Donazioni</title>
<link href="../var/login.css" rel="stylesheet" type="text/css" />
</head>

<body >
<div id="main">
	<div id="mainmenu" class="openingmenu" style="height:90px">
  </div>
  <div id="content" style="top:155px;" >
		<h1>Aggiungi Donazione </h1>
 			<div class="box">
 			<table>
<tr>
<td>
<strong>Dati Anagrafici del Donatore:</br>
</strong>
<hr>
<table>
 <form  action="" method="post" name="formetto">
	<tr>
	  <td width="35%">Nome:</td>
		<td width="65%">
 <p>
   <input type="text" name="donatore_nome" id="donatore_nome" value="<?= $nome_donatore; ?>"/>
 </p>		</td>
	</tr>
	<tr>
	  <td>Cognome:</td>
		<td><input type="text" name="donatore_cognome" id="donatore_cognome" value="<?= $cognome_donatore; ?>"/></td>
	</tr>
	<tr>
	  <td>E-mail: </td>
		<td><br>
 <p>
   <input type="text" name="donatore_mail" id="donatore_mail" value="<?= $mail_donatore; ?>"/>
 </p>		</td>
	</tr>
	<tr>
	  <td>Recapito telefonico: </td>
		<td><input type="text" name="donatore_recapito" id="donatore_recapito" value="<?= $recapito_donatore; ?>"/></td>
	</tr>

	<tr>
	  <td>Indirizzo: </td>
		<td><br>
 <p>
   <input type="text" name="donatore_indirizzo" style="width:440px;" id="donatore_indirizzo" value="<?= $indirizzo_donatore; ?>"/>
</p>		</td>
	</tr>
 	<tr>
    	<tr>
	  <td colspan="2"><hr /></td>
	  
	  </tr>
	<tr style="background-color:#FFFFD7">
	  <td>*Numero ricevuta:</td>
	  <td><input type="text" name="n_ricevuta" id="n_ricevuta" value="<?= $numero_ricevuta ?>"/></td>
	  </tr>
          	<tr>
	  <td colspan="2"><hr /></td>
	  
	  </tr>
	<tr>
   
	<tr>
	  <td colspan="2"><br /><strong>Tipologia Donazione:</strong>
	    <hr /></td>
	</tr>
 		

	  <td>
	    <input name="tipologia"  type="radio" style="width:10px;" onclick="javascript:mostraDIV('contanti','beni')" value="1"  align="left" />
	    Contanti</br><br />
        <input name="tipologia"  type="radio" style="width:10px;" onclick="javascript:mostraDIV('beni','contanti')" value="2" align="left"/>
        Beni</br></td>
	  <td></td>
	  </tr>
	<tr>
	  <td colspan="2"><hr /></td>
	  </tr>
	<tr>
	  <td colspan="2">
      
      <div id="contanti" style=" display:<?= $contanti; ?>; ">
                    <div class="box login divPANverde">
                    <h2 style="display:inline; "> Contanti </h2><br> 
                    Compilazione campi:<hr /><br />
                    <table width="200" border="0">
  <tr>
    <td>*Importo:</td>
    <td><input type="text" name="importo" id="importo"/>
      &euro;</td>
  </tr>
  <tr>
    <td>Note:</td>
    <td><input type="text" name="note" id="note"/></td>
  </tr>
  <tr>
    <td colspan="2" align="left"><hr /></td>
  </tr>
  <tr>
    <td><input type="submit"  name="confermaAltroSoldi" value="Conferma e Aggiungi Altro" /></td>
    <td><input type="submit" name="confermaFineSoldi" value="Conferma e Chiudi" /></td>
  </tr>
  <tr>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
</table>
</div>
       </div>
       
       <div id="beni" style=" display:<?= $beni; ?>; ">
                    <div class="box login divPANverde">
                    <h2 style="display:inline; "> Beni </h2><br> 
                    Compilazione campi:<hr /><br />
                    <table width="200" border="0">
  <tr>
    <td>Categoria:</td>
    <td><select  id="categoria" name="categoria"/>
    	<option value="Vestiario">Vestiario</option>
        <option value="Viveri">Viveri</option>
        <option value="Medicinali">Medicinali</option>
        <option value="Altro">Altro</option>
        <option value="Svago">Svago</option>
        </select>    </td>
  </tr>
  <tr>
    <td>*Nome oggetto:</td>
    <td><input type="text" name="oggetto_nome" id="oggetto_nome"/></td>
  </tr>
  <tr>
    <td>Descrizione/Note</td>
    <td><input type="text" name="oggetto_note" id="oggetto_note"/></td>
  </tr>
  <tr>
    <td>Quantita':</td>
    <td><input type="text" name="quantita" id="quantita" value="1"/></td>
  </tr>
  <tr>
    <td colspan="2"><hr /></td>
  </tr>
  <tr>
    <td><input type="submit"  name="confermaAltroBeni" value="Conferma e Aggiungi Altro" /></td>
    <td><input type="submit" name="confermaFineBeni" value="Conferma e Chiudi" /></td>
  </tr>
</table>
                    </div>
       </div></td>
	</tr>
</form>
</table>
</p>
<p align="right"> 
</div></p></td>
</tr>
</table>
  </div>
<div id="footer" style="left:-20px ">
<p>&copy; (2009)  | Raccolta Fondi e Beni per i terremotati d'Abruzzo. Univerista' di Roma Tor Vergata.</p></div>
</div></br>

</div>  


<p>&nbsp;</p>
</body>
</html>