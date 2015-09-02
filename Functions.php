<?php

//Fichier de fonctions
//Fonction de connexion à la base
function GetConnection() {
    static $db = null;
    if ($db == null) {
        try {
            $db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PWD);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    return $db;
}
?>

