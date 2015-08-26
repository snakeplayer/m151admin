<?php
//Fichier de fonctions

//Fonction de connexion à la base
function ConnectDB($host, $dbname, $user, $pwd) {
    try {
        $db = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pwd);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $db;
}
?>

