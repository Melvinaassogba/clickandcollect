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

    <title>Click And Collect - Tableau de bord</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-cart-arrow-down"></i>
                </div>
                <div class="sidebar-brand-text mt-3">Click And Collect </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Tableau de bord -->
            <li class="nav-item">
                <a class="nav-link" href="index_marchand.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de bord</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Établissement
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="ajout_marchand.php">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Ajouter</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="list_marchand.php">
                    <i class="fas fa-fw fa-ellipsis-v"></i>
                    <span>Liste</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="comment_marchand.php">
                    <i class="fas fa-fw far fa-comment-alt"></i>
                    <span>Commentaire</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h4 mb-0 text-gray-800 mt-4">Ajouter un établissement</h1>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $affiche['nom'].' '.$affiche['prenom']; ?></span>
                                <img class="img-profile rounded-circle" src="img/marchand.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profil_marchand.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Déconnexion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <!--  -->
                        <div class="col-12 text-center">
                        <?php
                            if (isset($_GET['msg'])){
                            echo $_GET['msg'];
                            }
                        ?>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-header mb-0 text-uppercase">
                                    <div class="bg-gradient-primary text-center col-12 p-1">
                                        <i class="feather icon-user mr-1 text-bold-600"></i>
                                        <span class="title text-white p-1" style="font-size: 17px;">Informations de l'établissement</span>
                                    </div>
                                </div>
                                <form action="traitement_insert_etab.php" method="POST">
                                    <div class="card-body mt-1">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="col-sm-12 col-md-12 col-xl-12 mb-1">
                                                    <label for="">Nom</label>
                                                    <input name="nom" type="text" class="form-control" id="validationTooltip01" required placeholder="C&A" value="" >
                                                </div>

                                                <div class="col-sm-12 col-md-12 col-xl-12 mb-1">
                                                    <label for="">Adresse</label>
                                                    <input name="adresse" type="text" class="form-control" id="validationTooltip01" required placeholder="4 Rue Yann Sohier" value="" >
                                                </div>

                                                <div class="col-sm-12 col-md-12 col-xl-12 mb-3">
                                                    <label for="">Contacts </label>
                                                    <input type="text" name="numero" class="form-control" id="validationTooltip01" required placeholder="0298787656" value="" >
                                                </div>

                                                <div class="col-sm-12 col-md-12 col-xl-12 mb-3">
                                                    <label for="">Email </label>
                                                    <input type="text" name="email" class="form-control" id="validationTooltip01" required placeholder="CA@gmail.com" value="" >
                                                </div>

                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-success">Sauvergarder</button>
                                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="col-sm-12 col-md-12 col-xl-12 mb-3">
                                                    <label for="">Catégorie </label>
                                                    <select name="id_cat" id="" class="form-control mb-2">
                                                
                                                <?php
                                        
                                        try
                                        {
                                            $bdd = new PDO('mysql:host=localhost;dbname=clickandcollect', 'root', '');
                                        }

                                        catch(Exception $e)
                                        {
                                            // En cas d'erreur, on affiche un message et on arrête tout
                                            die('Erreur : '.$e->getMessage());
                                        }
                                            
                                        $req = $bdd->query('SET NAMES "utf8"');

                                        $reponse = $bdd->query('SELECT * FROM categorie');
                                        
                                        ?>

                                        <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
                                        while($donnees = $reponse->fetch()){
                                        ?>
                                            <option value="<?php echo $donnees['id'];?>                                                                                                                                                                                                            t"><?php echo $donnees['nom'];?></option>
                                        <?php
                                            } //fin de la boucle, le tableau contient toute la BDD
                                        ?>
                                        </select>
                                                    <input type="text" class="form-control" id="validationTooltip01" placeholder="Autre">
                                                </div>

                                                <div class="col-sm-12 col-md-12 col-xl-12 mb-3">
                                                    <label for="">Image </label>
                                                    <input type="file" class="form-control pb-5 pt-3" id="validationTooltip01" value="" >
                                                </div>

                                                <div class="col-sm-12 col-md-12 col-xl-12 mb-3">
                                                    <label for="">Description </label>
                                                    <textarea type="text" name="description" class="form-control" id="validationTooltip01" required placeholder="Message..." value="" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Click And Collect</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal-warning mr-1 mb-1 d-inline-block">
        <!-- Modal -->
        <div class="modal fade text-left" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Prêt à partir ?</h5>
                        <button type="submit" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Sélectionnez "Déconnexion" ci-dessous si vous êtes prêt à mettre fin à votre session actuelle.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn text-white btn-success"><a href="<?='deconnexion.php?bnt_dec=deconnexion'?>" class="text-white">Déconnexion</a></button>
                        <button type="submit" class="btn text-white btn-danger" data-dismiss="modal"><a href="#" class="text-white">Annuler</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>


</html>
<?php
    }
    else
    {
        header("location:login.php");
    }

?>