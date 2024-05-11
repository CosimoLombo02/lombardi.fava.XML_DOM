<?php
$xmlString = "";
foreach ( file("recensioni.xml") as $node ) {
    $xmlString .= trim($node);
} //end first foreach
$doc = new DOMDocument();
$doc->loadXML($xmlString);
$root = $doc->documentElement;
$elementi = $root->childNodes;