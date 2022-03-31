<?php
    require 'connexion.php';
    session_start();
    $db = Database::connect();
    $recup = $db-> prepare("SELECT * FROM utilisateur WHERE login=?");
    $recup->execute(array($_SESSION['use'])); 
    $affiche = $recup->fetch();
    if (isset($_SESSION['CONNECT']) AND $_SESSION['CONNECT']=='OK'){
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="admin/img/clickLog.jpeg">

    <title>Click And Collect - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container h-100">

        <div style="margin-top:50vh; transform:translateY(-50%);" class="card o-hidden border-0 shadow-lg">
            <div class="card-body">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-12 text-center">
                        <?php
                            if (isset($_GET['msg'])){
                            echo $_GET['msg'];
                            }
                        ?>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Ajouter un administrateur !</h1>
                            </div>
                            <form class="user" action="traitement_inscription.php" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="nom" class="form-control form-control-user" id="exampleFirstName" required placeholder="Nom">
                                    </div>
                                    <div class=" col-sm-6 ">
                                        <input type="text " name="prenom" class="form-control form-control-user " id="exampleLastName " required placeholder="Prénoms">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <input type="email" name="login" class="form-control form-control-user " id="exampleInputEmail " required placeholder="Adresse mail ">
                                </div>
                                <button class="btn btn-primary btn-user btn-block ">Enregistrer</button>
                                <a href="index.php" class="btn btn-danger btn-user btn-block ">Retour</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js "></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js "></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js "></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js "></script>

</body>


</html>
<?php
    }
    else
    {
        header("location:login.php");
    }

?>