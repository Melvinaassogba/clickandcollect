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
	
	$rep = $bdd->query('SELECT * FROM utilisateur');

	while ($donnes = $rep->fetch())
	{
		if($_POST['login'] == $donnes['login'])
		{
			$unique = false;
		}
	}	

	if($unique)
	{
		
		$req = $bdd->prepare("INSERT INTO utilisateur ( nom, prenom,login,mdp,id_acces) VALUES(?, ?, ?,'adminsimple','2')");
		$req->execute( array ( $_POST['nom'], $_POST['prenom'], $_POST['login'], ) );
		

		//$mdpcry = crypt($mdpcry, "cle");
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['mdp']="adminsimple";

		header('Location: register.php?msg=<div class="alert alert-success" role="alert">Inscription Validée</div>');
	}
	else
	{
		$_SESSION['err_ins'] = 1;
		header('Location: register.php?msg=<div class="alert alert-danger" role="alert">Erreur !</div>');
	}

	
?>