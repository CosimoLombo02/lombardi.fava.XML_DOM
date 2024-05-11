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
           

           $idCode = $recensione->lastChild;
           $id = $idCode->nodeValue;


            
           
                        echo "<p class='testoSemplice'><strong>Id:</strong> ".$id."</p>";
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
                            

                        
                    
                    }//end for
                    