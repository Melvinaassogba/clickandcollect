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
	$recup = $bdd-> prepare("SELECT * FROM utilisateur WHERE login=?");
    $recup->execute(array($_SESSION['use'])); 
    $affiche = $recup->fetch();
	$req = $bdd->query('SET NAMES "utf8"');
	$login = $_SESSION['use'];
	$req = $bdd->prepare("INSERT INTO `etablissement`(`nom`, `adresse`, `numero`, `email`, `description`, `id_cat`) VALUES (?,?,?,?,?,?,?)");
	//$req->execute(array($_POST['nom'],$_POST['adresse'],$_POST['numero'],$_POST['email'],$_POST['description'],$_POST['id_cat']));
	
	if($req) {
		header('Location: ajout_marchand.php?msg=<div class="alert alert-success" role="alert">Ajout effectué !</div>');
	}else {echo 'KO';}
	
	
?>