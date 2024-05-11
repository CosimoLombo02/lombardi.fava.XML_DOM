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


            
           
           echo "<option value=\"". $id." ".$user." ".$data."\">".$id." ".$user." ".$data."</option> \n";
         

                        
                    
                    }//end for