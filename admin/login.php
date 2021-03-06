<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="admin/img/clickLog.jpeg">

    <title>Click And Collect - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        

        <!-- Outer Row -->
        <div class="row justify-content-center h-100">
            
            <div class="col-xl-10 col-lg-12 col-md-9 align-items-center h-100">
                <div style="margin-top:50vh; transform:translateY(-50%);" class="card o-hidden border-0 shadow-lg h-100 justify-content-center">
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
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Connectez-vous !</h1>
                                    </div>
                                    <form class="user" action="traitement_connexion.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="admin" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Identifiant ...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pwd" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mot de passe... ">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block ">Connexion</button>
                                    </form>
                                    <hr>
                                    <div class="text-center ">
                                        <a class="small " href="forgot-password.php">Mot de passe oubli?? ?</a>
                                    </div>
                                </div>
                            </div>
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