<?php 
//Insersion des fichiers ".php"
require_once 'mysql.inc.php';
require_once 'Functions.php';

if (isset($_SESSION["idLogged"]) || $_SESSION["idLogged"] != null) {
    header('Location: index.php');
}
elseif (isset($_POST["submit"])) {
    $id = TestLogin($_POST["pseudo"], $_POST["password"]);
    if ($id != null) {
        $_SESSION["idLogged"] = $id;
    }
    else
    {
        echo $_SESSION["idLogged"];
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="corpsForm">
            <div id="insideCorpsForm">
                <form method="post" action="#">
                    <table id="tableFormulaire">
                        <th>
                            Login
                        </th>
                        <tr>
                            <td>_______________________</td>
                        </tr>
                        <tr>
                            <td>
                                <label for="pseudo">Pseudo :</label>
                            </td>
                            <td>
                                <input type="text" name="pseudo" id="pseudo"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="password">Mot de passe :</label>
                            </td>
                            <td>
                                <input type="password" name="password" id="password"/>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" value="Se connecter">
                </form> 
            </div>
        </div>
    </body>
</html>


