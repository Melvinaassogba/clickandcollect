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
	
    if (!empty($_GET['login']) && isset($_POST) ){
        $login = $_GET['login'];
        $insert = $bdd->prepare("UPDATE `utilisateur` SET nom = ?, prenom = ?, WHERE login = ?");
        $insert->execute(array($_POST['nom'],$_POST['prenom'], $login));
        echo "Good";
    }
    else {
        echo 'Bad';
    }

?>