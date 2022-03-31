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
		$req = $bdd->prepare("INSERT INTO utilisateur ( nom, prenom,login,mdp,id_acces) VALUES(?, ?, ?,'marchand','3')");
		$req->execute( array ( $_POST['nom'], $_POST['prenom'], $_POST['login'] ) );
		
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['mdp']="marchand";
		header('Location: index_as.php');
	}
	else
	{
		$_SESSION['err_ins'] = 1;
		header('Location: marchand.php');
	}

?>