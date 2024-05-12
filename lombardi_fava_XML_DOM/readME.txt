Il Gruppo � composto da: LOMBARDI COSIMO - FAVA DENIS
LINK GIT REPOSITORY: https://github.com/CosimoLombo02/lombardi.fava.XML_DOM
https://github.com/Denisfava02/cosimo.lombardi.fava.denis.XHTML_CSS //aggiungi il tuo link
Sulla base del secondo homework sono state traslate le funzionalita usando come base di dati un file xml chiamato
recensioni.xml, credenziali per l'accesso come admin: username:admin pass:admin, credenziali per l'accesso come utente semplice
(ovviamente è anche possibile creare un account nuovo) username: username1 pass: Ciao123!
In install.xml proviamo noi a generare dinamicamente un file xml con dtd associato utilizzando DOM, è stato fatto anche uno schema e dopo 
ogni manipolazione del file xml viene controllata la validita sia in riferimento allo schema che al dtd. Il dtd si chiama "reviewsDTD.dtd",
mentre lo schema si chiama "schema.xsd"
Nel file install.php viene ancora creato dinamicamente il db poichè viene usato per il login, se il db è gia presente lo script stamperà delle
scritte di errore, quindi se già si possiede il database rimessaggio si puo' benissimo procedere, l'importante è che venga creato e validato correttamente il file xml 
