<?xml version="1.0" encoding="UTF-8"?>

<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Dicono su di noi</title>
    <link rel="stylesheet" href="foglioDiStile.css " type="text/css" /></head>

<body class="blackBody">
<?php 
session_start();

if(isset($_SESSION['username'])){
    

echo "<div class='center'><a href='homepage.php'><img class='logo' src='europark.PNG' alt='Europark logo' /></a><div class='center'><p='para'>Benvenuto ".$_SESSION['username']." "."</p></div><div class='buttonContainer'><div><img class='gif' src='camperWithAuto.gif' alt='nice gif' /></div><div class='center'><a href='info.php'><button class='simpleButton'>Informazioni</button></a><a href='leFigure.php'><button class='simpleButton'>Le figure di riferimento</button></a><a href='DiconoDiNoi.php'><button class='simpleButton'>Dicono di noi</button></a><a href='logout.php'> <button class='simpleButton' type='submit' name='lo'>Logout</button></a></div></div> </div>";

}else{

echo "<div class='center'><a href='homepage.php'><img class='logo' src='europark.PNG' alt='Europark logo' /></a><div class='buttonContainer'><div><img class='gif' src='camperWithAuto.gif' alt='nice gif' /></div><div class='center'><a href='reservedArea.php'><button class='simpleButton'>Login</button></a><a href='info.php'><button class='simpleButton'>Informazioni</button></a><a href='leFigure.php'><button class='simpleButton'>Le figure di riferimento</button></a><a href='DiconoDiNoi.php'><button class='simpleButton'>Dicono di noi</button></a></div></div> </div>";

} ?>


    <div class="colonnaGrande">
        <h1>Ringraziamenti</h1>
        <p class="testoSemplice">Alla vostra destra potete trovare alcune recensioni 
            lasciate da nostri clienti, tutto lo staff del <strong>Centro Caravan Europark</strong>
            vi ringrazia per le belle parole lasciate nei nostri confronti!
            <strong>Se anche tu vuoi lasciare una recensione clicca sul camper qui sotto</strong>
        </p>
        <div>
        <a href="recensioni.php"><img class="camper" src="camper.png" alt="camper felice" /></a></div>
        
    </div>
    <div class="colonnaGrandeScroll">
        <?php 

        /*volendo si puo' utilizzare anche un for che parte da 0 e finisce a elementi->lenght - 1*/

            require_once("xmlConn.php");
            $recensioni = $doc->getElementsByTagName('Recensione');
            foreach ($recensioni as $recensione) {
            

            //proviamo a prendere dati usando due modi diversi
            $username=$recensione->firstChild; 
            $user = $username->textContent;

            $val = $recensione->getElementsByTagName('Valutazione')->item(0)->nodeValue;
            $cont = $recensione->getElementsByTagName('Contenuto')->item(0)->nodeValue;
            $data = $recensione->getElementsByTagName('Data')->item(0)->nodeValue;

            //stampiamo solo le recensioni con valutazione >= 3
            if($val >= 3){
            
            
                            //id code qui non viene stampato, solo l'admin lo vede
                            echo "<p class='testoSemplice'><strong>Nome :</strong> ".$user."</p>";
                            echo "<p class='testoSemplice'><strong>Valutazione:</strong>";
                                for($i=0; $i<$val; $i++)
                                    echo "<span>&#9733;</span>";            //&#9733; è il codice per la stella piena
                                for($i=0; $i<(5-$val); $i++)
                                    echo "<span>&#9734;</span>";            //&#9734; è il codice per la stella vuota
                                "</p>";
                            echo "<p class='testoSemplice'><strong>Contenuto:</strong> ".$cont."</p>";
                            echo "<p class='testoSemplice'><strong>Data:</strong> ".$data."</p>";
                            echo "<hr />";

            } //end if  
                    
                    }//end for
                    
                    ?>
    </div>  
    
    <div class="footer">&copy; Centro Caravan Europark 2023</div>

</body>
</html>
