<?php
//Insersion des fichiers ".php"
require_once 'mysql.inc.php';
require_once 'Functions.php';

$error = null;

if (isset($_POST['valider'])) {
    if ($_POST['nom'] != null && $_POST['prenom'] != null && $_POST['dateNaissance'] != null && $_POST['description'] != null && $_POST['email'] != null && $_POST['pseudo'] != null && $_POST['pwd'] != null)
    {
        InsertUser($_POST['nom'], $_POST['prenom'], $_POST['dateNaissance'], $_POST['description'], $_POST['email'], $_POST['pseudo'], $_POST['pwd']);
    }
 else {
        $error = 'Veuillez renseigner tous les champs !';
    }
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
                            <input type="text" name="nom" id="nom" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="prenom">Prénom : </label>
                        </td>
                        <td>
                            <input type="text" name="prenom" id="prenom" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="dateNaissance">Date de naissance : </label>
                        </td>
                        <td>
                            <input type="date" name="dateNaissance" id="dateNaissance" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="description">Petite description : </label>
                        </td>
                        <td>
                            <textarea name="description" id="description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email"> Email : </label>
                        </td>
                        <td>
                            <input type="email" name="email" id="email" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pseudo">Pseudo :</label>
                        </td>
                        <td>
                            <input type="text" name="pseudo" id="pseudo" />
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
                </table>
                <input type="submit" name='valider' value='Valider' id="btnValider"/><input type="button" name='annuler' value='Annuler' id="btnAnnuler"/>
                <?php echo $error ?>
            </form>
        </div>
    </body>
</html>
