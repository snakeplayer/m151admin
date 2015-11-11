<?php
//Fichier de fonctions
//TODO séparer fonctions d'affichage et fonctions bd dans deux fichiers distincts
session_start();
$_SESSION["idLogged"];

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

//Fonction d'update des infos d'un utilisateur
function UpdateUser($nom, $prenom, $dateNaissance, $description, $email, $pseudo, $mdp, $idUser)
{
    $db = GetConnection();
    
    if ($mdp == '') 
    {
        $request = $db-> prepare('UPDATE users SET nom=:nom, prenom=:prenom, dateNaissance=:dateNaissance, description=:description, email=:email, pseudo=:pseudo WHERE idUser='.$idUser);
    }
    else
    {
        $mdp = sha1($mdp);
        $request = $db-> prepare('UPDATE users SET nom=:nom, prenom=:prenom, dateNaissance=:dateNaissance, description=:description, email=:email, pseudo=:pseudo, pwd=:mdp WHERE idUser='.$idUser);
        $request->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    }
    $request->bindParam(':nom', $nom, PDO::PARAM_STR);
    $request->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $request->bindParam(':dateNaissance', $dateNaissance, PDO::PARAM_STR);
    $request->bindParam(':description', $description, PDO::PARAM_STR);
    $request->bindParam(':email', $email, PDO::PARAM_STR);
    $request->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    
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
//Fonction permettant de récuperer la liste des détails d'un utilisateur par rapport à son id
function GetUsersById($id)
{
    $db = GetConnection();
    $request = $db->prepare("SELECT * FROM `users` WHERE `idUser` = ".$id);
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

//Fonction permettant de convertir un tableau contenant les utilisateurs en un tableau HTML
function AssocToHtml($tabUser)
{
    $htmlUsers = "<table id=\"tableUsers\"><tr><th>Nom</th><th>Prénom</th><th>Afficher</th><th>Modifier</th></tr>";
    for($i = 0; $i < count($tabUser); $i++)
    {
        $htmlUsers .= "<tr>";
        $htmlUsers .= "<td>";
        $htmlUsers .= $tabUser[$i]["nom"];
        $htmlUsers .= "</td>";
        $htmlUsers .= "<td>";
        $htmlUsers .= $tabUser[$i]["prenom"];
        $htmlUsers .= "</td>";
        $htmlUsers .= "<td>";
        $htmlUsers .= "<a href=\"users.php?id=".$tabUser[$i]['idUser']."\">Afficher</a>";
        $htmlUsers .= "</td>";
        $htmlUsers .= "<td>";
        $htmlUsers .= "<a href=\"index.php?id=".$tabUser[$i]['idUser']."\">Modifier</a>";
        $htmlUsers .= "</td>";
        $htmlUsers .= "</tr>";
    }
    $htmlUsers = $htmlUsers . "</table>";
    
    return $htmlUsers;
}

function TableUsersToHtmlUser($idUser, $tabUsers)
{
    $htmlUser = '<table id="tableUser">';
    
    //Affichage du nom
    $htmlUser .= "<tr>";
    $htmlUser .= "<td>";
    $htmlUser .= "Nom : ";
    $htmlUser .= "</td>";
    $htmlUser .= "<td>";
    for($i = 0; $i < count($tabUsers) ; $i++)
    {
        if($tabUsers[$i]['idUser'] == $idUser)
        {
            $htmlUser .= $tabUsers[$i]['nom'];
        }
    }
    $htmlUser .= "</td>";
    $htmlUser .= "</tr>";
    
    //Affichage du prénom
    $htmlUser .= "<tr>";
    $htmlUser .= "<td>";
    $htmlUser .= "Prénom : ";
    $htmlUser .= "</td>";
    $htmlUser .= "<td>";
    for($i = 0; $i < count($tabUsers) ; $i++)
    {
        if($tabUsers[$i]['idUser'] == $idUser)
        {
            $htmlUser .= $tabUsers[$i]['prenom'];
        }
    }
    $htmlUser .= "</td>";
    $htmlUser .= "</tr>";
    
    //Affichage de la date de naissance
    $htmlUser .= "<tr>";
    $htmlUser .= "<td>";
    $htmlUser .= "Date de naissance : ";
    $htmlUser .= "</td>";
    $htmlUser .= "<td>";
    for($i = 0; $i < count($tabUsers) ; $i++)
    {
        if($tabUsers[$i]['idUser'] == $idUser)
        {
            $htmlUser .= $tabUsers[$i]['dateNaissance'];
        }
    }
    $htmlUser .= "</td>";
    $htmlUser .= "</tr>";
    
    //Affichage de la description
    $htmlUser .= "<tr>";
    $htmlUser .= "<td>";
    $htmlUser .= "Description : ";
    $htmlUser .= "</td>";
    $htmlUser .= "<td>";
    for($i = 0; $i < count($tabUsers) ; $i++)
    {
        if($tabUsers[$i]['idUser'] == $idUser)
        {
            $htmlUser .= $tabUsers[$i]['description'];
        }
    }
    $htmlUser .= "</td>";
    $htmlUser .= "</tr>";
    
    //Affichage de l'email
    $htmlUser .= "<tr>";
    $htmlUser .= "<td>";
    $htmlUser .= "Email : ";
    $htmlUser .= "</td>";
    $htmlUser .= "<td>";
    for($i = 0; $i < count($tabUsers) ; $i++)
    {
        if($tabUsers[$i]['idUser'] == $idUser)
        {
            $htmlUser .= $tabUsers[$i]['email'];
        }
    }
    $htmlUser .= "</td>";
    $htmlUser .= "</tr>";
    
    //Affichage du pseudo
    $htmlUser .= "<tr>";
    $htmlUser .= "<td>";
    $htmlUser .= "Pseudo : ";
    $htmlUser .= "</td>";
    $htmlUser .= "<td>";
    for($i = 0; $i < count($tabUsers) ; $i++)
    {
        if($tabUsers[$i]['idUser'] == $idUser)
        {
            $htmlUser .= $tabUsers[$i]['pseudo'];
        }
    }
    $htmlUser .= "</td>";
    $htmlUser .= "</tr>";
    
    //Affichage du mot de passe (hashé théoriquement)
    $htmlUser .= "<tr>";
    $htmlUser .= "<td>";
    $htmlUser .= "Mot de passe (sha1) : ";
    $htmlUser .= "</td>";
    $htmlUser .= "<td>";
    for($i = 0; $i < count($tabUsers) ; $i++)
    {
        if($tabUsers[$i]['idUser'] == $idUser)
        {
            $htmlUser .= $tabUsers[$i]['pwd'];
        }
    }
    $htmlUser .= "</td>";
    $htmlUser .= "</tr>";
    
    $htmlUser .= '</table>';
    
    return $htmlUser;
    
}

function TestLogin($pseudo, $password)
{
    $db = GetConnection();
    $request = $db->prepare('SELECT idUser, pseudo, pwd FROM `users` WHERE pseudo = '.$pseudo.' AND pwd = '.$password.'');
    $request->execute();
    $tabUser = $request->fetchAll(PDO::FETCH_ASSOC);
    if ($tabUser != null) {
        return $tabUser["id"];
    }
    else {
        return false;
    }
}
?>

