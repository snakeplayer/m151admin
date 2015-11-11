<?php

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

//Fonction retournant un formulaire HTML en fonction de l'id et d'une table
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

