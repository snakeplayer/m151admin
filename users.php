<?php
//Insersion des fichiers ".php"
require_once 'mysql.inc.php';
require_once 'Functions.php';

$tabUser = GetUsers();
$tableHTMLUsers = AssocToHtml($tabUser);
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
                <?php
                if (isset($_GET['id'])) {
                    $tableHTMLUser = TableUsersToHtmlUser($_GET['id'], $tabUser);
                    echo $tableHTMLUser;
                } else {
                    echo $tableHTMLUsers;
                }
                ?>
            </div>
        </div>
    </body>
</html>