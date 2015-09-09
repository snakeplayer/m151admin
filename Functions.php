<?php
//Fichier de fonctions

//Fonction de connexion à la base
function GetConnection() {
    static $db = null;
    if ($db == null) {
        try {
            $db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PWD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    return $db;
}

//Fonction d'insersion des utilisateurs
function InsertUser($nom, $prenom, $dateNaissance, $description, $email, $pseudo, $pwd)
{
    $db = GetConnection();
    $request = $db->prepare("INSERT INTO `m151admin`.`users` (`idUser`, `nom`, `prenom`, `dateNaissance`, `description`, `email`, `pseudo`, `pwd`) VALUES (NULL, :nom, :prenom, :dateNaissance, :description, :email, :pseudo, SHA1(:pwd));");
    
    $request->bindParam(':nom', $nom, PDO::PARAM_STR);
    $request->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $request->bindParam(':dateNaissance', $dateNaissance, PDO::PARAM_STR);
    $request->bindParam(':description', $description, PDO::PARAM_STR);
    $request->bindParam(':email', $email, PDO::PARAM_STR);
    $request->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $request->bindParam(':pwd', $pwd, PDO::PARAM_STR);
    
    $request->execute();
}

//Fonction permettant de récuperer la liste des utilisateurs
function GetUsers()
{
    $db = GetConnection();
    $request = $db->prepare("SELECT * FROM `users`");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function AssocToHtml($tabUser)
{
    $htmlUsers = '<table id="tableUsers">';
    foreach ($tabUser as $value)
    {
        $htmlUsers += "<tr>";
        $htmlUsers += "<td>";
        $htmlUsers += $value['nom'];
        $htmlUsers += "</td>";
        $htmlUsers += "</tr>";
    }
    $htmlUsers += "</table>";
    
    return $htmlUsers;
}

?>

