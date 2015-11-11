<?php
//Fichier de fonctions relatives à la base de donnée
//TODO séparer fonctions d'affichage et fonctions bd dans deux fichiers distincts

session_start();
if (!isset($_SESSION["idLogged"])) {
    $_SESSION["idLogged"] = "";
}

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

//Fonction permettant de récuperer la liste des détails d'un utilisateur par rapport à son id
function GetUsersPseudoById($id)
{
    $db = GetConnection();
    $request = $db->prepare("SELECT pseudo FROM `users` WHERE `idUser` = ".$id);
    $request->execute();
    $pseudo = $request->fetchAll(PDO::FETCH_ASSOC);
    return $pseudo[0]['pseudo'];
}

//Fonction retournant l'id de l'utilisateur si les identifiants sont bons, ou false s'ils sont erronés
function TestLogin($pseudo, $password)
{
    $db = GetConnection();
    $request = $db->prepare('SELECT idUser, pseudo, pwd FROM `users` WHERE pseudo = "'.$pseudo.'" AND pwd = "'.$password.'"');
    $request->execute();
    $tabUser = $request->fetchAll(PDO::FETCH_ASSOC);
    if ($tabUser != null) {
        return $tabUser[0]["idUser"];
    }
    else {
        return false;
    }
}
?>

