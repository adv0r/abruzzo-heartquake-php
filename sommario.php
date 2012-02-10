<?php
	require_once("mieFunzioni2.php");

	?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    

<head>

<title>Sommario Inventario</title>
<link href="../var/login2.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" >
	<!-- 
	
		function apriPOP(alink)
		{
			var elink = alink;
			var stili = "width=745px,"   + 
						"height=565px," + 
						"scrollbar =no,"       + 
						"left=400px,"          + 
						"top=100px,"           +
						"tolbar=no";  
			finestra= window.open("","Grafico Analisi", stili);
			finestra.document.write('<BODY background="'+alink+'"></BODY>'); 
		}
 	 
	 
	 
		function nascondi(gnam)
		{
			
			dd.elements[gnam].hide();
		}
		function mostra(_id)
		{
			dd.elements[_id].show();
		}
		
		function mostraDIV(ID, ID2, ID3){
		
			document.getElementById(ID).style.display = 'block' ;
			document.getElementById(ID2).style.display = 'block' ;
			document.getElementById(ID3).style.display = 'block' ;
		}
		
		function nascondiDIV(ID,ID2, ID3){
		
			document.getElementById(ID).style.display = 'none' ;
			document.getElementById(ID2).style.display = 'none' ;
			document.getElementById(ID3).style.display = 'none' ;
		}
		
		
	//-->
</script>
</head>

<body >
<div id="main">
	<div id="mainmenu" class="openingmenu" style="height:90px">
  </div>
  <div id="content" style="top:155px;" >
		<h1>Sommario Inventario </h1>
 			<div class="box">
 			<table>
<tr>
<td>
<strong>Fino ad ora e' stato raccolto:</br>
</strong>
<hr>
<table>
	<tr>
	  <td>Vestiario:</td>
	  <td><?php 
  $cheCategoria = "Vestiario";
  $quantiVestiti = sommaQualcosa($cheCategoria);
  ?>
	    <b>
	    <?php
  echo $quantiVestiti;
  ?>
	    </b> oggetti.</p></td>
	  </tr>
	<tr>
	  <td width="35%">&nbsp;</td>
		<td width="65%">
 <p><a href="javascript:mostraDIV('VestiarioDIV1','VestiarioDIV', 'VestiarioDIVCHIUDI')">(mostra)</a>
 <div id="VestiarioDIV1" style="display:none;"><b>Nome - [Descrizione] - (Quantita'):</b><hr></div>
<div id="VestiarioDIV" style=" display:none; overflow:auto; height:400px; ">
	<?php 
	
				$sql="  select * from item where Categoria = 'Vestiario';";
				$i=0;
				$rs=mysql_query($sql);
				if (mysql_num_rows($rs)>0) {
				while($row=mysql_fetch_assoc($rs)){
				 ?>    <?php  echo "<b>".$row['Nome'] ."</b>    [".$row['Descrizione']."] - (".$row['Quantita'].")<br>";} }?>
	</div>
		 <div id="VestiarioDIVCHIUDI" style="display:none;" align="right"><hr><a href="javascript:nascondiDIV('VestiarioDIV1','VestiarioDIV', 'VestiarioDIVCHIUDI' )">(Nascondi)</a></div>         </td>
	</tr>
	<tr>
	  <td>Medicinali:</td>
		<td> <p>
  <?php 
  $cheCategoria = "Medicinali";
  $quantiMedicinali = sommaQualcosa($cheCategoria);
  ?><b><?php
  echo $quantiMedicinali;
  ?></b> oggetti.
 </p></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>
      
 <p><a href="javascript:mostraDIV('MEdicinaliDIV1','MedicinaliDIV', 'MedicinaliDIVCHIUDI')">(mostra)</a>
 <div id="MEdicinaliDIV1" style="display:none;"><b>Nome - [Descrizione] - (Quantita'):</b><hr></div>
<div id="MedicinaliDIV" style=" display:none; overflow:auto; height:400px; ">
	<?php 
	
				$sql="  select * from item where Categoria = 'Medicinali';";
				$i=0;
				$rs=mysql_query($sql);
				if (mysql_num_rows($rs)>0) {
				while($row=mysql_fetch_assoc($rs)){
				 ?>    <?php  echo "<b>".$row['Nome'] ."</b>    [".$row['Descrizione']."] - (".$row['Quantita'].")<br>";} }?>
	</div>
		 <div id="MedicinaliDIVCHIUDI" style="display:none;" align="right"><hr><a href="javascript:nascondiDIV('MEdicinaliDIV1','MedicinaliDIV', 'MedicinaliDIVCHIUDI' )">(Nascondi)</a></div>      </td>
	  </tr>
	<tr>
	  <td>Viveri: </td>
		<td>
  <p>
  <?php 
  $cheCategoria = "Viveri";
  $quantiViveri = sommaQualcosa($cheCategoria);
  ?><b><?php
  echo $quantiViveri;
  ?></b> oggetti. </p>	</td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>
      
      
      
       <p><a href="javascript:mostraDIV('ViveriDIV1','ViveriDIV', 'ViveriDIVCHIUDI')">(mostra)</a>
 <div id="ViveriDIV1" style="display:none;"><b>Nome - [Descrizione] - (Quantita'):</b><hr></div>
<div id="ViveriDIV" style=" display:none; overflow:auto; height:400px; ">
	<?php 
	
				$sql="  select * from item where Categoria = 'Viveri';";
				$i=0;
				$rs=mysql_query($sql);
				if (mysql_num_rows($rs)>0) {
				while($row=mysql_fetch_assoc($rs)){
				 ?>    <?php  echo "<b>".$row['Nome'] ."</b>    [".$row['Descrizione']."] - (".$row['Quantita'].")<br>";} }?>
	</div>
		 <div id="ViveriDIVCHIUDI" style="display:none;" align="right"><hr><a href="javascript:nascondiDIV('ViveriDIV1','ViveriDIV', 'ViveriDIVCHIUDI' )">(Nascondi)</a></div>             </td>
	  </tr>
	<tr>
	  <td>Altro: </td>
		<td> <p>
  <?php 
  $cheCategoria = "Altro";
  $quantiAltro = sommaQualcosa($cheCategoria);
  ?><b><?php
  echo $quantiAltro;
  ?></b> oggetti.
 </p></td>
	</tr>

	<tr>
	  <td>&nbsp;</td>
	  <td>
      
      
      
            <p><a href="javascript:mostraDIV('AltroDIV1','AltroDIV', 'AltroDIVCHIUDI')">(mostra)</a>
 <div id="AltroDIV1" style="display:none;"><b>Nome - [Descrizione] - (Quantita'):</b><hr></div>
<div id="AltroDIV" style=" display:none; overflow:auto; height:400px; ">
	<?php 
	
				$sql="  select * from item where Categoria = 'Altro';";
				$i=0;
				$rs=mysql_query($sql);
				if (mysql_num_rows($rs)>0) {
				while($row=mysql_fetch_assoc($rs)){
				 ?>    <?php  echo "<b>".$row['Nome'] ."</b>    [".$row['Descrizione']."] - (".$row['Quantita'].")<br>";} }?>
	</div>
		 <div id="AltroDIVCHIUDI" style="display:none;" align="right"><hr><a href="javascript:nascondiDIV('AltroDIV1','AltroDIV', 'AltroDIVCHIUDI' )">(Nascondi)</a></div>      
         
         </td>
	  </tr>
	<tr>
	  <td>Svago: </td>
	  <td>
      
      
      
      <p>
  <?php 
  $cheCategoria = "Svago";
  $quantiAltro = sommaQualcosa($cheCategoria);
  ?><b><?php
  echo $quantiAltro;
  ?></b> oggetti.
 </p>
      
      
      
      
      </td>
	  </tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>
      
      
          <p><a href="javascript:mostraDIV('SvagoDIV1','SvagoDIV', 'SvagoDIVCHIUDI')">(mostra)</a>
 <div id="SvagoDIV1" style="display:none;"><b>Nome - [Descrizione] - (Quantita'):</b><hr></div>
<div id="SvagoDIV" style=" display:none; overflow:auto; height:400px; ">
	<?php 
	
				$sql="  select * from item where Categoria = 'Svago';";
				$i=0;
				$rs=mysql_query($sql);
				if (mysql_num_rows($rs)>0) {
				while($row=mysql_fetch_assoc($rs)){
				 ?>    <?php  echo "<b>".$row['Nome'] ."</b>    [".$row['Descrizione']."] - (".$row['Quantita'].")<br>";} }?>
	</div>
		 <div id="SvagoDIVCHIUDI" style="display:none;" align="right"><hr><a href="javascript:nascondiDIV('SvagoDIV1','SvagoDIV', 'SvagoDIVCHIUDI' )">(Nascondi)</a></div>
      
      
      
      
      
      
      </td>
	  </tr>
	<tr>
	  <td>Soldi: </td>
		<td>
 <p>
  <?php 
  $cheCategoria = "Soldi";
  $quantiSoldi = sommaSoldi($cheCategoria);
  if ($quantiSoldi == ""){$quantiSoldi = 0;}
  ?><b><?php
  echo $quantiSoldi;
  ?></b> €. </p>	</td>
	</tr><tr>
	  <td colspan="2"><hr /></td>
	  
	  </tr>
	<tr style="background-color:#FFFFD7">
	  <td>Ultimo oggetto inserito:</td>
	  <td>
     <?php 
  $cheCosa = "Data";
  $ritornatoQualcosa = ritornaUltimaDonazione($cheCosa);
  ?>il giorno <b><?php
  echo $ritornatoQualcosa;
  ?></b> alle ore <?php 
  $cheCosa = "Ora";
  $ritornatoQualcosa = ritornaUltimaDonazione($cheCosa);
  ?><b><?php
  echo $ritornatoQualcosa;
  ?></b>.</td>
	  </tr>
          	<tr>
	  <td colspan="2"><hr /></td>
	  </tr>
	<tr>
	  <td colspan="2"></td>
	  </tr>
</table>
</p>
<p align="right"> 
</p></td>
</tr>
</table>
  </div>
<div id="footer" style="left:-20px ">
<p>&copy; (2009)  | Raccolta Fondi e Beni per i terremotati d'Abruzzo. Univerista' di Roma Tor Vergata.</p></div>
</div></br>

</div>  


<p><br><br></p>
</body>
</html>