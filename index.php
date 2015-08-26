<?php
//Insersion des fichiers ".php"
require_once 'mysql.inc.php';
require_once 'Functions.php';

//Appel de la fonction "ConnectDB" avec les constantes définies dans le fichier "mysql.inc.php"
ConnectDB($host, $dbname, $user, $pwd);

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
        <div id="corps">
            <form id="formFormualire" method="post" action="#">
                <table id="tableFormulaire">
                    <th>
                        Formulaire d'inscription
                    </th>
                    <tr>
                        <td>--------------------------------</td>
                    </tr>
                    <tr>
                        <td>
                            Nom : 
                        </td>
                        <td>
                            <input type="text" name="nom"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Prénom : 
                        </td>
                        <td>
                            <input type="text" name="prenom"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Date de naissance : 
                        </td>
                        <td>
                            <input type="date" name="dateNaissance"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Petite description : 
                        </td>
                        <td>
                            <textarea name="description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email : 
                        </td>
                        <td>
                            <input type="email" name="email"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Pseudo : 
                        </td>
                        <td>
                            <input type="text" name="pseudo"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mot de passe : 
                        </td>
                        <td>
                            <input type="password" name="pwd"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            
                        </td>
                        <td>
                            <input type="submit" name='valider' value='Valider'/><input type="button" name='annuler' value='Annuler'/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
