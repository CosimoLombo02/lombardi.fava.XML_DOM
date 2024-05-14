<?php
session_start();
if(!isset($_SESSION['username'])){
    require_once "logout.php";
    header("Location: reservedArea.php");}
     
?>

<?php


    require_once "connection.php";
    require_once "calcolaMediaeOggi.php";






               
?>



<?xml version="1.0" encoding="UTF-8"?>

<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Centro Caravan Europark</title>
    <link rel="stylesheet" href="foglioDiStile.css " type="text/css" /></head>
<body class="blackBody">
    
    
        <div class="center"><img class="logo" src="europark.PNG" alt="Europark logo" />
        <a href="logout.php" class="customLink"> <button class="simpleButton1" type="submit" name="lo">Logout</button></a></div>
            <div class="colonnaGrande">
                <h1><?php echo "Benvenuto ".$_SESSION['username'];?></h1>
                <p class="testoSemplice">Media Recensioni: <?php  echo  $media;?> STELLA/E</p>
                <p class="testoSemplice">Totale recensioni: <?php echo $elementi->length ?> </p>
                <p class="testoSemplice">Recensioni di oggi: <?php echo $today;?></p>
                <form name="scelta" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
                

                 <div class="buttonContainer">
                
                 <button class="simpleButton" name = "tutte">Tutte</button>
                 <button class="simpleButton" name = "negative">Negative</button>
                 <button class="simpleButton" name = "positive">Positive</button> 
                 <button class="simpleButton" name = "elimina">Elimina</button> <br />

                 <select name = "el">
                 <?php  
                    require_once "stampaEl.php"; //mi stampa tutte le recensioni, mi farà visualizzare solo id,username e data della recensione
                    ?></select>
                    
                
                 </div>

                 <!--<div class="center"><button class="simpleButton" name = "tutte">Tutte le recensioni</button></div>-->
                
                
                </form>
            </div>
            <div class="colonnaGrandeScroll">
            <?php if(isset($_POST['elimina']) && isset($_POST['el']) && !empty($_POST['el'])){
                $target = $_POST['el']; $target = explode(' ',$_POST['el']);
                require "xmlConn.php";
                $recensioni = $doc->getElementsByTagName('Recensione');
                foreach ($recensioni as $recensione) {


               $idCode = $recensione->lastChild;
               $id = $idCode->nodeValue;

               if($id == $target[0]) {
                $root->removeChild($recensione);
                break; //esco dal ciclo 
               
           }

      }//end for

           if($doc->schemaValidate("schema.xsd") && $doc->validate()) {
           $doc->save("recensioni.xml");
           
         header("Refresh:0");
       }  else{
       echo "Errore nell'eliminazione!";
      }  
              
                
             
        }//end elimina
        ?>
                <?php if(isset($_POST['tutte']) ){
                    require "stampaTutteAdmin.php";
                
                }else{if(isset($_POST['negative'])){
                    require "stampaNegative.php";
                    
                }else{
                    if(isset($_POST['positive'])){
                       require "stampaPositive.php";
                    }
                    else require "stampaTutteAdmin.php";

                }
            }?></div>
    <div class="footer">&copy; Centro Caravan Europark 2023</div>
</body>


</html>
