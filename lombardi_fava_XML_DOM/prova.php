<?php
require "xmlConn.php";

require_once "xmlConn.php";
                         //prendo l'id dell'ultimo nodo
                           //la recensione inserita avrà id pari a idU+1
                         echo  $idU = $elementi->item($elementi->length-1)->lastChild->nodeValue;