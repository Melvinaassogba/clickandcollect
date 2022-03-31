<?php
	session_start();
	$_SESSION['login'];
	$_SESSION['mdp'];
	$_SESSION['err'] = 1;


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

	$unique = true;

	$rep = $bdd->query('SELECT * FROM produit');

    if (!empty($_GET['msg'])){
        $id_produit = $_GET['msg'];
        $rep = $bdd->prepare("DELETE FROM produit WHERE id_produit = ?");
        $rep->execute((array($id_produit)));
        echo ' Suppression validée ! ';
        
    }
    else {
        echo "echec";
    }

?>