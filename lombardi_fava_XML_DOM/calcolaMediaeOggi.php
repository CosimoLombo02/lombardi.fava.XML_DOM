<?php 

/*Questo script calcola la media di tutte le recensioni e calcola anche le recensioni inserite nel giorno stesso in cui si collega l'admin */

        /*volendo si puo' utilizzare anche un for che parte da 0 e finisce a elementi->lenght - 1*/
            $acc = 0;
            $today= 0;
            
            require_once("xmlConn.php");

            $dim = $elementi->length;
            $recensioni = $doc->getElementsByTagName('Recensione');
            foreach ($recensioni as $recensione) {
            

            

            
            $val = $recensione->getElementsByTagName('Valutazione')->item(0)->nodeValue;
            $acc+=$val;
            $data = $recensione->getElementsByTagName('Data')->item(0)->nodeValue;

            if($data == date('y/m/d')){
                $today++;
            }
            
                    
                    }//end for
        if($dim!=0)
        $media = $acc/$dim;
else $media = 0.0;
        //echo $media;
                    
                    