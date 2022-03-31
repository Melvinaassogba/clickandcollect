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

    if (!empty($_GET['msg'])){
        $login = $_GET['msg'];
        $rep = $bdd->prepare("DELETE FROM utilisateur WHERE login = ?");
        $rep->execute((array($login)));
        echo ' Suppression validée ! ';
        //header('Location:list_admin.php?msg=<div class="alert alert-success" role="alert"> Suppression validée!</div>');
        /*
        switch ($rep['id_acces']) {
            case 1:
                $_SESSION['acces'] = '1';
                header('Location: index.php');
                break;

            case 2:
                $_SESSION['acces'] = '2';
                header('Location: index_as.php');
                break;

            case 3:
                $_SESSION['acces'] ='3';
                header('Location: index_marchand.php');
                break;
            
            default:
                echo "Échec !";
                break;
        }*/
    }
    else {
        echo "echec";
    }

?>