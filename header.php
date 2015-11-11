<?php
$texte = "<a href='login.php'>Login</a>";
    if ($_SESSION['idLogged'] != "") {
    $pseudo = GetUsersPseudoById($_SESSION['idLogged']);
    $texte = "Bonjour ". $pseudo;
    $pseudo = '';
}
?>
<header>
    <?php echo $texte;
    ?>
</header>

