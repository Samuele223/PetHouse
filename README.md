Requisiti:

Requisiti per l’installazione su server locali:

    -Installare xampp (XAMPP Download) sulla macchina (compresi php, phpMyAdmin);
    -Installare composer(Composer Download) sulla macchina.

Guida all’installazione

    -Scaricare la cartella git;

    -Spostare la cartella git nella cartella htdocs/ in Xampp;

    -Aprire il terminal nella cartella dell’applicazione che di default è xampp/htdocs/PetHouse per Windows ed eseguire il comando composer install;

    -Cambiare i parametri in config/config.php in base alle impostazioni del proprio Xampp (e MySQL);

    -eseguire il file create_schema per creare il database il tutto gestito dall' ORM di doctrine.

    -Prima di procedere con il lancio dell'applicazione, assicurarsi di avere attiva la riscrittura delle URL nel server di Apache. Per controllare, aprire il file di configurazione httpd.conf di Apache e ricercare la seguente linea: "LoadModule rewrite_module modules/mod_rewrite.so" e assicurarsi non ci sia "#" a inizio riga. Inoltre, sempre nel file di configurazione, assicurarsi vi sia "AllowOverride All"

    -Aprire XAMPP: attivare Apache e MySQL.

    -Aprire il browser e digitare nella barra degli indirizzi localhost/PetHouse per utilizzare l’applicazione.

    -(Solo per gli utenti Linux) Per fare in modo che l’applicazione funzioni, è necessario abilitare i permessi di scrittura, lettura ed esecuzione su tutti i file presenti nell’app tramite il terminale. Per farlo si consiglia di usare il comando chmod -R a+rwe /percorso-alla-cartella-PetHouse. Controllare che tutti i file nelle cartelle abbiano i permessi abilitati. In caso contrario, è consigliabile utilizzare il comando prima indicato direttamente nelle cartelle interessate (prestare particolare attenzione ai file contenuti nella cartella smarty/libs/templates_c). Impostati tutti i permessi correttamente, l’applicazione dovrebbe funzionare a dovere.

Creata da:

    -@[Samuele233](https://github.com/Samuele233)
    -@[Frozzo](https://github.com/Frozzo)
    -@[rarats13](https://github.com/rarats13)