<?php
//Insersion des fichiers ".php"
require_once 'mysql.inc.php';
require_once 'Functions.php';

//Appel de la fonction "GetConnection()" avec les constantes définies dans le fichier "mysql.inc.php"
$db = GetConnection();

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
                            <input type="text" name="nom" id="nom" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="prenom">Prénom : </label>
                        </td>
                        <td>
                            <input type="text" name="prenom" id="prenom" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="dateNaissance">Date de naissance : </label>
                        </td>
                        <td>
                            <input type="date" name="dateNaissance" id="dateNaissance" required/>
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
                            <input type="email" name="email" id="email" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pseudo">Pseudo :</label>
                        </td>
                        <td>
                            <input type="text" name="pseudo" id="pseudo" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pwd"> Mot de passe : </label>
                        </td>
                        <td>
                            <input type="password" name="pwd" id="pwd" required/>
                        </td>
                    </tr>
                </table>
                <input type="submit" name='valider' value='Valider' id="btnValider"/><input type="button" name='annuler' value='Annuler' id="btnAnnuler"/>
            </form>
        </div>
    </body>
</html>
