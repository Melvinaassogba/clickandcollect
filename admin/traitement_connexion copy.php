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


	$mdp_hache = sha1($_POST['mdp']);

	$req = $bdd->prepare('SELECT login, mdp, id_acces FROM utilisateur WHERE login = ? AND mdp = ?');

	$req->execute(array(
		$_POST['admin'],
		$_POST['pwd']));

	$resultat = $req->fetch();

	$_SESSION['acces'] = $resultat['id_acces'];

	switch ($resultat['id_acces']) {
		case 1:
			$_SESSION['acces'] = '1';
			header('Location: index.php');
			session_start();
			$_SESSION['CONNECT'] = "OK";
			$_SESSION['login']=$_POST['admin'];
			break;

		case 2:
			$_SESSION['acces'] = '2';
			header('Location: index_as.php');
			session_start();
			$_SESSION['CONNECT'] = "OK";
			$_SESSION['login']=$_POST['admin'];
			break;

		case 3:
			$_SESSION['acces'] ='3';
			header('Location: index_marchand.php');
			session_start();
			$_SESSION['CONNECT'] = "OK";
			$_SESSION['login']=$_POST['admin'];
			break;
		
		default:
			header('Location:login.php?msg=<div class="alert alert-danger" role="alert">Erreur de connexion!</div>');
			session_start();
			break;
	}

	if ($_GET['bnt_dec']=='deconnexion')
    {
        session_start();
        session_destroy();
        header("location:login.php");
    }

	if ($_GET['supp']=='supression'){
		$id = 'hel';
	}



?>