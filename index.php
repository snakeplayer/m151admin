<?php
//Insersion des fichiers ".php"
require_once 'mysql.inc.php';
require_once 'Functions.php';
if (isset($_SESSION["idLogged"])) {
    echo $_SESSION["idLogged"];
}

$message = null;

$nom = "";
$prenom = "";
$dateNaissance = "";
$description = "";
$email = "";
$pseudo = "";
$flagModification = 0;

if (isset($_POST['valider'])) {
    if($_POST['flagModification'] == 0){
        if ($_POST['nom'] != null && $_POST['prenom'] != null && $_POST['dateNaissance'] != null && $_POST['description'] != null && $_POST['email'] != null && $_POST['pseudo'] != null && $_POST['pwd'] != null) {
            InsertUser($_POST['nom'], $_POST['prenom'], $_POST['dateNaissance'], $_POST['description'], $_POST['email'], $_POST['pseudo'], $_POST['pwd']);
            $message = "Formulaire envoyé !";
        } else {
            $message = 'Veuillez renseigner tous les champs !';
        }
    }
    else if($_POST['flagModification'] == 1){
        if ($_POST['nom'] != null && $_POST['prenom'] != null && $_POST['dateNaissance'] != null && $_POST['description'] != null && $_POST['email'] != null && $_POST['pseudo'] != null) {
            UpdateUser($_POST['nom'], $_POST['prenom'], $_POST['dateNaissance'], $_POST['description'], $_POST['email'], $_POST['pseudo'], $_POST['pwd'], $_GET['id']);
            $message = 'Informations mises à jour !';
        } else {
            $message = 'Veuillez renseigner tous les champs obligatoires !';
        }
    }
}

if (isset($_GET['id'])) {
    $valueModif = GetUsersById($_GET['id']);
    $nom = $valueModif[0]["nom"];
    $prenom = $valueModif[0]["prenom"];
    $dateNaissance = $valueModif[0]["dateNaissance"];
    $description = $valueModif[0]["description"];
    $email = $valueModif[0]["email"];
    $pseudo = $valueModif[0]["pseudo"];
    $flagModification = 1;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="corpsForm">
            <div id="insideCorpsForm">
                <form id="formFormualire" method="post" action="#">
                    <table id="tableFormulaire">
                        <th>
                            Formulaire d'inscription
                        </th>
                        <tr>
                            <td>_______________________</td>
                        </tr>
                        <tr>
                            <td>
                                <label for="nom">Nom :</label>
                            </td>
                            <td>
                                <input type="text" name="nom" id="nom" value="<?php echo $nom ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="prenom">Prénom : </label>
                            </td>
                            <td>
                                <input type="text" name="prenom" id="prenom" value="<?php echo $prenom ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="dateNaissance">Date de naissance : </label>
                            </td>
                            <td>
                                <input type="date" name="dateNaissance" id="dateNaissance" value="<?php echo $dateNaissance ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="description">Petite description : </label>
                            </td>
                            <td>
                                <textarea name="description" id="description"><?php echo $description ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email"> Email : </label>
                            </td>
                            <td>
                                <input type="email" name="email" id="email" value="<?php echo $email ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="pseudo">Pseudo :</label>
                            </td>
                            <td>
                                <input type="text" name="pseudo" id="pseudo" value="<?php echo $pseudo ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="pwd"> Mot de passe : </label>
                            </td>
                            <td>
                                <input type="password" name="pwd" id="pwd" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="flagModification" id="flagModification" value="<?php echo $flagModification ?>"/>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" name='valider' value='Valider' id="btnValider"/><input type="button" name='annuler' value='Annuler' id="btnAnnuler"/><a href="./users.php">Utilisateurs</a>
<?php echo $message ?>
                </form>
            </div>
        </div>
    </body>
</html>
