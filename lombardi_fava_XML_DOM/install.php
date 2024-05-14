<?php


/*Prima di far partire questo script ricordarsi di cambiare username e password
nel file AccountSettings.php*/

require_once "AccountSettings.php"; 


$password = $pass;

$connessione = new mysqli($host,$username_1,$password);

if($connessione === false){
    die("Errore di connesione:".$connessione->connect_error);

}

/*Se già presente nel server il db rimessaggio viene eliminato e 
poi successivamente viene ricreato */

$sql = "drop database rimessaggio";
if($connessione->query($sql)===true){
  echo "Database preesistente eliminato!\n";
}


$sql = "create database rimessaggio";

if($connessione->query($sql)===true){
      echo "Creazione db avvenuta con successo!\n";
}else{
    echo "Errore nella creazione del db!\n";
}


$sql = "use rimessaggio";
if($connessione->query($sql)===true){
    echo "Database selezionato correttamente\n";
}else{
  echo "Errore nella selezione  del db!\n";
}

//creazione tabella utenti
$sql = "create table utenti( id int not null auto_increment, username varchar(100) not null unique,password varchar(100) not null,ruolo int not null, primary key(id))";
if($connessione->query($sql)===true){
    echo "Tabella utenti creata correttamente\n";
}else{
  echo "Errore nella creazione della tabella utenti!\n";
}

/*Ora creo ed inserisco l'utente admin
avra come password: admin e come username:admin, è l'unico di ruolo 1 che puo' accedere alla sezione privata Admin.php*/
$u = "admin" ;
$p = md5("admin"); 
$sql = "insert into utenti(username,password,ruolo) values('$u','$p',1)";
if($connessione->query($sql)===true){
    echo "Admin inserito correttamente!\n";
}else{
  echo "Errore nell'inserimento dell'admin!\n";
}

//utente recensore(ovviamente è possibile crearne altri registrandosi al sito)
$u = "username1" ;
$p = md5("Ciao123!"); 
$sql = "insert into utenti(username,password,ruolo) values('$u','$p',2)";
if($connessione->query($sql)===true){
    echo "Utente inserito correttamente!\n";
}else{
  echo "Errore nell'inserimento dell'utente!\n";
}

//al posto di creare la tabella recensioni, creo un file xml per le recensioni


$imp = new DOMImplementation;
$dtd = $imp->createDocumentType('Recensioni', '', 'reviewsDTD.dtd');
$doc = $imp->createDocument("", "", $dtd);
//$doc = new DOMDocument();
$doc->formatOutput = true;
$doc->encoding="UTF-8";


/*radice*/
$root = $doc->createElement('Recensioni'); 
$root = $doc->appendChild($root);

$recensione = $doc->createElement('Recensione');


//inserisco una recensione falsa
$ele1 = $doc->createElement('Utente');
$ele1->nodeValue='Usernamefalsa1';
$recensione->appendChild($ele1);

$ele2 = $doc->createElement('Valutazione');
$ele2->nodeValue=5;
$recensione->appendChild($ele2);

$ele3 = $doc->createElement('Contenuto');
$ele3->nodeValue='falsa1';
$recensione->appendChild($ele3);

$ele3 = $doc->createElement('Data');
$ele3->nodeValue=date('Y-m-d');
$recensione->appendChild($ele3);

$ele4 = $doc->createElement('Id');
$ele4->nodeValue=1; //questa sarà la recensione con id pari ad 1
$recensione->appendChild($ele4);

$root->appendChild($recensione);



$doc->save('recensioni.xml');
$doc->load('recensioni.xml');

//Se la validazione va a buon fine allora posso proseguire
if($doc->validate() && $doc->schemaValidate("schema.xsd")){
  echo "file creato e validato!";
}else{
  echo "Errore!";
  unlink("recensioni.xml"); //elimina il file creato in caso di errori
}







?>

<?xml version="1.0" encoding="UTF-8"?>

<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head><title>Installazione</title></head>
<a href="index.html">Clicca qui per far partire il sito</a>
   
    
</body></html>














