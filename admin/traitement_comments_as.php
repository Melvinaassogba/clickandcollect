<?php 
	session_start();
	
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
	$req = $bdd->prepare("INSERT INTO commentaire (id_eta,texte) VALUES(?,?)");
	$req->execute( array ($_POST['etat'],$_POST['nom'] ) );
	header('Location: index_as.php');
?>