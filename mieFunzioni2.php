<?php
session_start();
$GLOBALS['connection'] = LinkToDB();

function OpenDBMSConnection() {
	$DBMSConn = mysql_connect("hostingmysql02.register.it", 'NP1117_abruzzo', 'abruzzo') or die(mysql_error());
	return $DBMSConn;
}

function LinkToDB(){
	$MainDBConn=OpenDBMSConnection();
	$db = mysql_select_db('lize_it_inventario', $MainDBConn) or die(mysql_error());
	return $MainDBConn;
}



function sommaQualcosa($categoria){

	$sql_ins4="select sum(Quantita) from item where Categoria = '".$categoria."';";
    $rs_ins4=mysql_query($sql_ins4);
	$row = mysql_fetch_row($rs_ins4);
	return $row[0];
	
}


function sommaSoldi($categoria){

	$sql_ins4="select sum(Importo) from item where Categoria = '".$categoria."';";
    $rs_ins4=mysql_query($sql_ins4);
	$row = mysql_fetch_row($rs_ins4);
	return $row[0];
	
}







/*	<?php
				echo "<b>Membri:</b> <br>";
				$sql="  select * from utenti inner join tab_creazione_gruppi 
						on tab_creazione_gruppi.ID_user = utenti.ID_utente
						where ID_gruppo ='".$gruppo."';";
				$rs=mysql_query($sql);
				if (mysql_num_rows($rs)>0) {
				while($row=mysql_fetch_assoc($rs)){
				if($row['capogruppo'] == 0){ ?> */






function ritornaUltimaDonazione($cosa){


	$sql_ins4="select ".$cosa." from donazione where Id_item = (select max(Id_item)  from donazione);";
    $rs_ins4=mysql_query($sql_ins4);
	$row = mysql_fetch_row($rs_ins4);
	return $row[0];
}


function aggiungiDonatore($nome, $cognome, $indirizzo, $recapito, $mail){


	$sql_ins="insert into donatore(Nome, Cognome, E_mail, Telefono, Indirizzo) values ('".$nome."', '".$cognome."', '".$mail."', '".$recapito."', '".$indirizzo."');";
	$rs_ins=mysql_query($sql_ins);
	
}

function aggiungiImporto($importo, $note){
	
	$sql_ins="insert into item(Categoria, Importo, Descrizione) values ('Soldi', '".$importo."', '".$note."');";
	$rs_ins=mysql_query($sql_ins);
	
	$sql_ins4="select max(Id_item) from item;";
    $rs_ins4=mysql_query($sql_ins4);
	$row = mysql_fetch_row($rs_ins4);
	return $row[0];
	
}

function ritornaQualcosaDonatore($nome, $cognome){

	$sql_ins4="select * from donatore where Nome = '".$nome."' && Cognome = '".$cognome."';";
    $rs_ins4=mysql_query($sql_ins4);
	$row = mysql_fetch_row($rs_ins4);
	return $row[0];
	
}

function compilaDonazione($ID_item, $ID_donatore, $giornoDonazione, $ora, $luogo, $numero_ricevuta){


	$sql_ins="insert into donazione(Id_donatore, Id_item, N_ricevuta, Data, Ora, Luogo) values ('".$ID_donatore."', '".$ID_item."', '".$numero_ricevuta."', '".$giornoDonazione."', '".$ora."', '".$luogo."');";
	$rs_ins=mysql_query($sql_ins);
}






function iscrizione($id){
	
	$sql_ins5= "UPDATE utenti SET iscritto = '1' where ID_utente ='".$id."';";
    $rs_ins5 = mysql_query($sql_ins5);

	
}

function ritornaIscrizione($id){
	
	$sql_ins5= "SELECT iscritto FROM utenti WHERE ID_utente = '".$id."';";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row[0];
	
}

function chiudiIscrizioni(){

	$sql_ins5= "UPDATE controlli SET iscrizione_chiusa = '1';";
    $rs_ins5 = mysql_query($sql_ins5);
	
}

function ritornaChiusura(){

	$sql_ins5= "SELECT iscrizione_chiusa FROM controlli;";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row[0];
}

function ritornaIscritti(){
		
	$sql_ins5= "select count(*) as iscritti from utenti where iscritto ='1';";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row[0];
}

function impostaGruppi($quanti){

	$sql_ins5= "UPDATE tab_gioco SET N_gruppi = '".$quanti."' where ID_giocata = (select max(ID_giocata) from tab_iscrizione);";
    $rs_ins5 = mysql_query($sql_ins5);
}

function ritornaNumeroGruppi(){

	$sql_ins4="select N_gruppi from tab_gioco where ID_giocata = (select max(ID_giocata)  as ID_giocata  from tab_gioco);";
    $rs_ins4=mysql_query($sql_ins4);
	$row = mysql_fetch_row($rs_ins4);
	return $row[0];

}

function ritornaNumeroPlace(){

	$sql_ins5= "select count(*) as numero_place from tab_place;";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row[0];

}



function ritornaQualcosaPlaceUtente($id, $cosa){

	$sql_ins5= "select ".$cosa." from tab_place_usati inner join tab_creazione_gruppi inner join tab_place
	on tab_place_usati.ID_gruppo= tab_creazione_gruppi.ID_gruppo and tab_place_usati.ID_place = tab_place.ID_place
	where ID_user = '".$id."';";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row['0'];

}


function ritornaNomePlace($idplace){

	$sql_ins5= "select nome from tab_place where ID_place='".$idplace."';";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row['0'];
 
}

function assegnaPlace($idplace, $idgruppo){

	$sql_ins1= "delete from tab_place_usati where ID_gruppo = '".$idgruppo."';";
    $rs_ins1 = mysql_query($sql_ins1);

	$sql_ins5= "insert into tab_place_usati (ID_giocata, ID_place, ID_gruppo) values ((select max(ID_giocata) from tab_iscrizione), '".$idplace."', '".$idgruppo."');";
    $rs_ins5 = mysql_query($sql_ins5);
}

function controllaPlaceDelGruppo($idgruppo){
	$sql_ins4="select nome from tab_place_usati, tab_place where ID_giocata = (select max(ID_giocata) from tab_gioco) and ID_gruppo = '".$idgruppo."' and  tab_place_usati.ID_place = tab_place.ID_place;";
    $rs_ins4=mysql_query($sql_ins4);
	$row = mysql_fetch_row($rs_ins4);
	return $row[0];
}

function cambiaPlace($idgruppo){

	$sql_ins5= "delete from tab_place_usati where ID_gruppo = '".$idgruppo."' and ID_giocata = (select max(ID_giocata) from tab_gioco);";
    $rs_ins5 = mysql_query($sql_ins5);
}

function avviaIscrizioniGruppi(){

	$sql_ins5= "UPDATE controlli SET avvio_iscrizioniG = '1';";
    $rs_ins5 = mysql_query($sql_ins5);
	
}

function ritornaIscrizioneGruppo(){

	$sql_ins5= "SELECT avvio_iscrizioniG FROM controlli;";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row[0];
}

function ritornaCompetenze($Id){
 
 	$sql_ins5= "select competenze from utenti where ID_utente = '".$Id."';";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row['0'];
	
 }
 
 
function ritornaFlagGruppi(){
 	
	$sql_ins5= "select flag_gruppi from controlli;";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row['0'];
	
 
}
 
function assegnaGruppo($user, $gruppo){
 
 	$sql_ins5= "insert into tab_creazione_gruppi (ID_user, ID_gruppo) values ('".$user."','".$gruppo."');";
    $rs_ins5 = mysql_query($sql_ins5);
 
}


function modificaFlagGruppi($flag){

	$flagQuesta = $flag;
	$sql_ins5= "UPDATE controlli SET flag_gruppi = '".$flagQuesta."';";
    $rs_ins5 = mysql_query($sql_ins5);

}

function ritornaAppartenentiGruppo($a){
	
	$sql_ins5= "select count(*) as numero_iscritti from tab_creazione_gruppi where ID_gruppo ='".$a."';";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row[0];

}

function ritornaAppartenentiTotali(){

	$sql_ins5= "select count(*) as numero_iscritti from tab_creazione_gruppi;";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row[0];
}

function ritornaGruppo($id){

	
	$sql_ins5= "select ID_gruppo from tab_creazione_gruppi where ID_user ='".$id."';";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row[0];
	
}

function ritornaGruppiConfermati(){

	$sql_ins5= "select gruppi_confermati from controlli;";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row['0'];

}

function ritornaQualcosaUser($id, $cosa){

	$sql_ins5= "select ".$cosa." from utenti where ID_utente = '".$id."';";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row['0'];

}

function ritornaQualcosaGioco($cosa){

	$sql_ins5= "select ".$cosa." from tab_gioco where ID_giocata =(select max(ID_giocata) from tab_gioco)";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row['0'];
}



function nominaCapogruppo($numeroGruppi){

	for($a=1; $a < ($numeroGruppi + 1); $a++){
	
	
				$sql_ins= "select ID_user from tab_creazione_gruppi 
						where ID_gruppo ='".$a."'
						order by RAND()
						limit 1;";
			    $rs_ins5 = mysql_query($sql_ins);
				$row = mysql_fetch_row($rs_ins5);
				$Iddi = $row['0'];
				
			$sql_ins5= "UPDATE utenti SET capogruppo = '1' 
						where ID_utente = '".$Iddi."'";
			$rs_ins5 = mysql_query($sql_ins5);
			
			$sql_ins= "UPDATE controlli SET gruppi_confermati = '1';";
			$rs_ins = mysql_query($sql_ins);
			
			
	
	}

}

function spigaCapogruppo(){
	
	$sql_ins5= "select spiega_capogruppo from controlli;";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row['0'];
}

function ritornaObiettivi($data){

	$sql_ins5= "select descrizione_ob 
				from tab_step_scadenze inner join tab_obiettivi 
				on tab_step_scadenze.ID_step = tab_obiettivi.ID_step
				where scadenza >= '".$data."' 
				limit 1;";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row['0'];
	
}

function ritornaGiocata(){

	$sql_ins5= "select max(ID_giocata) as giocata from tab_iscrizione;";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row['0'];
}


function assegnaPunti($id, $punti){

			$sql_ins= "select punti from utenti where ID_utente ='".$id."';";
			    $rs_ins5 = mysql_query($sql_ins);
				$row = mysql_fetch_row($rs_ins5);
				$puntiTOT = ($punti + $row['0']);
			
			$sql_ins= "update utenti set punti='".$puntiTOT."' where ID_utente = '".$id."';";
			$rs_ins = mysql_query($sql_ins);


}

function ritornaNumeroCartePositive(){

	$sql_ins5= "select  N_carte_positive from tab_gioco where ID_giocata =(select max(ID_giocata) from tab_gioco);";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row['0'];
}


//-----------PETER
// FUNZIONI per CREARE PLACE -----------------------------------------------------------------------------------------------------------------------------
function nuovaPlaceTemp($nome, $desc, $url){
	$sql_ins4="insert into temp_place(nomeplace, descrizione, immagine) values ('".$nome."','".$desc."','".$url."');";
    $rs_ins4=mysql_query($sql_ins4);
}

function controllaTempPlace(){
	$sql_ins4="select nomeplace from temp_place where nomeplace != '';";
    $rs_ins4=mysql_query($sql_ins4);
	$row = mysql_fetch_row($rs_ins4);
	return $row[0];
}

function svuotaTemp(){
	$sql_ins5= "delete from temp_place;";
    $rs_ins5 = mysql_query($sql_ins5);
}

function stampaTempPlaceInfo($info){
	$sql_ins4="select * from temp_place;";
    $rs_ins4=mysql_query($sql_ins4);
	$row = mysql_fetch_row($rs_ins4);
	return $row[$info];
}

function creaCarta(){
	$sql_ins1="select * from temp_place;";
    $rs_ins1=mysql_query($sql_ins1);
	$row = mysql_fetch_row($rs_ins1);
	$nome = $row[0];
	$desc = $row[1];
	$url = $row[2];
	$sql_ins2="insert into tab_place(nome, descrizione, img) values ('".$nome."','".$desc."','".$url."');";
    $rs_ins2=mysql_query($sql_ins2);
	
	svuotaTemp();
}

function creaPlace($id, $nome, $foto, $desc){
	$sql_ins2="insert into tab_place(ID_place, nome, descrizione, img) values ('".$id."','".$nome."','".$desc."','".$foto['name']."');";
   if(!mysql_query($sql_ins2, $GLOBALS['connection']))
   {
			$pic="";
			if($foto['name']!="")	$pic="img = '".$foto['name']."'";
			$sql_ins5 = "UPDATE tab_place SET nome = '".$nome."', descrizione = '".$desc."', ".$pic." where ID_place = '".$id."';";
    	$rs = mysql_query($sql_ins5);
	 }
	 if($foto['error'] == UPLOAD_ERR_OK and is_uploaded_file($foto['tmp_name']))
	 {
  		move_uploaded_file($foto['tmp_name'], "../img/".$foto['name']);
   }
}


// FUNZIONI per STABILIRE SCADENZE -----------------------------------------------------------------------------------------------------------------------------
function contaStepDisponibili(){
	$sql = "SELECT max(ID_step) from tab_step";
    $rs = mysql_query($sql);
	$row = mysql_fetch_row($rs);
	return $row[0];
}

function controllaEsisteID($idstep){
	$sql = "SELECT nome from tab_step where ID_step = '".$idstep."'";
    $rs = mysql_query($sql);
	$row = mysql_fetch_row($rs);
	return $row[0];
}
 
function ritornaStep($idstep, $info){
	$sql_ins5= "select ".$info." from tab_step where ID_step='".$idstep."';";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row[0];
}

function assegnaStep($idstep){
	$sql_ins1= "select max(ID_giocata)  as ID_giocata  from tab_gioco;";
    $rs_ins1 = mysql_query($sql_ins1);
	$row = mysql_fetch_row($rs_ins1);
	$idgiocata = $row[0];
	
	$sql_ins2="insert into tab_step_scadenze (ID_giocata, ID_step) values ('".$idgiocata."','".$idstep."');";
    $rs_ins2=mysql_query($sql_ins2);
}

function levaStep($idstep){
	$sql_ins1= "select max(ID_giocata)  as ID_giocata  from tab_gioco;";
    $rs_ins1 = mysql_query($sql_ins1);
	$row = mysql_fetch_row($rs_ins1);
	$idgiocata = $row[0];
	
	$sql_ins2="delete from tab_step_scadenze where ID_step = '".$idstep."'";
    $rs_ins2=mysql_query($sql_ins2);
}

function impostaScadenza($idstep, $data){
	$sql = "UPDATE tab_step_scadenze SET scadenza = '".$data."' where ID_giocata = (select max(ID_giocata) from tab_iscrizione) and ID_step = '".$idstep."';";
    $rs = mysql_query($sql);
}
// FUNZIONI per EDITare STEP -----------------------------------------------------------------------------------------------------------------------------
function creaStep($nome, $desc){
	$sql="insert into tab_step (nome, descrizione) values ('".$nome."','".$desc."');";
    $rs=mysql_query($sql);
}

function eliminaStep($idstep){
	$sql="delete from tab_step where ID_step = '".$idstep."';";
    $rs=mysql_query($sql);
}

function modificaStep($idstep, $nome, $desc){
	$sql = "UPDATE tab_step SET nome = '".$nome."', descrizione = '".$desc."' where ID_step = '".$idstep."';";
    $rs = mysql_query($sql);
}

function contaObiettiviDisponibili(){
	$sql = "SELECT max(ID_obiettivo) from tab_obiettivi";
    $rs = mysql_query($sql);
	$row = mysql_fetch_row($rs);
	return $row[0];
}

function modificaObiettivo($id, $num, $desc){
	$sql = "UPDATE tab_obiettivi SET numero = '".$num."', descrizione_ob = '".$desc."' where ID_obiettivo = '".$id."';";
    $rs = mysql_query($sql);
}

function creaObiettivo($idstep, $num, $desc){
	$sql="insert into tab_obiettivi (ID_step, numero, descrizione_ob) values ('".$idstep."', '".$num."','".$desc."');";
    $rs=mysql_query($sql);
}

function eliminaObiettivo($id){
	$sql="delete from tab_obiettivi where ID_obiettivo = '".$id."';";
    $rs=mysql_query($sql);
}

//--------cimo--------------------------------------------------------------------------------------------------------------------------------------------

function organizza($numCarte, $width, $height, $bordo){
	$cosa="Persona";
	for($i=1; $i<=3; $i++)
	{
	if($bordo==1)		$q=($i-1)*$height*15/45+11;
	else		$q=($i-1)*$height*50/45+11;
	
	if($i==2) $cosa="Artefatti";
	if($i==3) $cosa="Servizi";
?>
	<div style="text-align:left; font-family: Verdana; font-size:13px; font-weight:bold; color:#66cc66; position:relative; left: 10px; top: <?= $q ?>px; width: <?= 2*$numCarte*41 ?>px; height: 80px;">
	 	Carte <?= $cosa ?>
	 	<?php disponiCarte($numCarte*2, $i-1, $width, $height, $bordo); ?>
	</div>
<?php
	}	
}

function disponiCarte($numCarte, $sEt, $width, $height, $bordo){
	if($bordo==1)		$border="border: 1px solid red;";
	else		$border="border:none;";
	for($i=1; $i<=$numCarte; $i++)
	{
		$q=($i-1)*$width*41/30+3;
		if($bordo==1)			$href="giocatore2.php?carta=".($i+$sEt*$numCarte)."&max=".$numCarte/2;
		else if($bordo==2)		$href="adminShow&Tell.php?utente=".$_POST['persone']."&carta=".($i+$sEt*$numCarte)."&max=".($numCarte/2);
		else	$href="giocatore2.php?carta=".($i+$sEt*$numCarte)."&max=".($numCarte/2)."&gruppo=show";
?>
	<a href="<?= $href; ?>">
		<img src="../../POL2/SinDesign/img/cartaRETRO.png" style="position:absolute; display:inline; width: <?= $width; ?>px; height: <?= $height; ?>px; left: <?= $q ?>px; top: 22px; <?= $border ?> -moz-border-radius: 8px;"></img>
	</a>
<?php
		if($bordo==1)
		{
			if($i==$numCarte/2)	$border="border: 1px solid black;";
		}
		else $border="border:none;";
	}
}

function memorizza_carta($ID_carta, $valore, $nome, $foto, $tag, $asse01, $asse02, $asse03, $descrizione, $sEt)
{
	if($asse01!="(NULL)") $asse01="'".$asse01."'";
	if($asse02!="(NULL)") $asse02="'".$asse02."'";
	if($asse03!="(NULL)") $asse03="'".$asse03."'";
	$sql_ins5 = "insert into carta_s_e_t values ('".($ID_carta+6*$sEt*($_SESSION['id']-1))."', '".$valore."', '".$nome."', '".$foto['name']."', '".$tag."', ".$asse01.", ".$asse02.", ".$asse03.", '".$descrizione."');";
  if(!mysql_query($sql_ins5, $GLOBALS['connection']))
  {
		//die(mysql_error());
		$pic="";
		if($foto['name']!="")	$pic="foto = '".$foto['name']."', ";
		$sql_ins5= "UPDATE carta_s_e_t SET nome = '".$nome."', ".$pic."tag = '".$tag."', asse01 = ".$asse01.", asse02 = ".$asse02.", asse03 = ".$asse03.", descrizione = '".$descrizione."'  where ID_carta = '".($ID_carta+6*$sEt*($_SESSION['id']-1))."';";
    $rs_ins5 = mysql_query($sql_ins5);
	}
		$sql_ins5 = "insert into carte_utente values ('".($ID_carta+6*$sEt*($_SESSION['id']-1))."', '".$_SESSION['id']."');";
  if(!mysql_query($sql_ins5, $GLOBALS['connection']))
  {
		//die(mysql_error());
	}
	if(!file_exists("../foto_s&t/")) mkdir("../foto_s&t/",0777);
	if(!file_exists("../foto_s&t/".$_SESSION['id']."/"))	mkdir("../foto_s&t/".$_SESSION['id']."/",0777);
	if($foto['error'] == UPLOAD_ERR_OK and is_uploaded_file($foto['tmp_name']))
  {
  	move_uploaded_file($foto['tmp_name'], "../foto_s&t/".$_SESSION['id']."/".$foto['name']);
  }
}

// ----- ANALISI

function caricaAnalisi($grafico, $mood, $gruppo, $assi, $testo){

	$giocata = ritornaGiocata();
	if(!file_exists("../Analisi/")) mkdir("../Analisi/",0777);
	if(!file_exists("../Analisi/".$gruppo."_".$giocata."/")) mkdir("../Analisi/".$gruppo."_".$giocata."/",0777);
	
	if($grafico['error'] == UPLOAD_ERR_OK and is_uploaded_file($grafico['tmp_name']))
  	{
  	move_uploaded_file($grafico['tmp_name'], "../Analisi/".$gruppo."_".$giocata."/".$grafico['name']);
  	}
	
	if($mood['error'] == UPLOAD_ERR_OK and is_uploaded_file($mood['tmp_name']))
  	{
  	move_uploaded_file($mood['tmp_name'], "../Analisi/".$gruppo."_".$giocata."/".$mood['name']);
  	}
	

	$sql= "insert into tab_analisi values ('".$gruppo."','".$grafico['name']."','".$mood['name']."','".$giocata."','".$testo."','".$assi."')";
    $rs=mysql_query($sql);
}


function ritornaQualcosaAnalisi($gruppo, $assi, $cosa){
	
	$sql_ins5= "select ".$cosa." from tab_analisi where ID_gruppo = '".$gruppo."' and assi = '".$assi."';";
    $rs_ins5 = mysql_query($sql_ins5);
	$row = mysql_fetch_row($rs_ins5);
	return $row['0'];
}




// ----------------------- STORYTELLING


function scrivifile($contenuto,$id, $data, $tab)
{
	
	$giocata = ritornaGiocata();
	$sql="insert into ".$tab." (ID_giocata, ID_user, commento, data) values ('".$giocata."','".$id."','".$contenuto."','".$data."');";
    $rs=mysql_query($sql);
	

}


function stampaCommenti($gruppo, $tab)
{
	$colore="#f1fbf0";

	$sql="select * from ".$tab." inner join tab_creazione_gruppi on ".$tab.".ID_user = tab_creazione_gruppi.ID_user where ID_gruppo = ".$gruppo." and ID_giocata = (select max(ID_giocata) from tab_iscrizione)";
	print("<br><div style='padding:3px; border:1px solid #ffffff;  width: 97%; background: #66cc66;'></div>");
	$rs=mysql_query($sql);
	if (mysql_num_rows($rs)>0) {
				while($row=mysql_fetch_assoc($rs))
				{				
		
		$nome = ritornaQualcosaUser($row['ID_user'] , "nome");
		$cognome = ritornaQualcosaUser ($row['ID_user'], "cognome");
		print("<div style='padding:3px; border:1px solid #ffffff;  width: 97%; background:".$colore.";'><b>".$nome."  ".$cognome."</b> scrive:</br>");
		print("<p style='color:#000000'>".$row['commento']."</p></br>");
		print($row['data']."</div>");
		
		if($colore=="#f1fbf0")
		$colore="#d9f3d6";
		else
		$colore="#f1fbf0";
	
	
				}
	}
}