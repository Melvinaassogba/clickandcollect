<?php 
    try
    {	// On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=clickandcollect', 'root', '');
    }

    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
    $req = $bdd->query('SET NAMES "utf8"');
    
    $sql = $bd->prepare("SELSECT * FROM utilisateur WHERE login = ?");
    
    $exist = $sql->fetch();
?>