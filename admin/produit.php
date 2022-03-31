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

    <title>Click And Collect - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de bord</span></a>
            </li>

            <div class="cache_admin">
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Administrateur
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="register.php">
                        <i class="fas fa-fw fa-user-plus"></i>
                        <span> Ajouter </span>
                    </a>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="list_admin.php">
                        <i class="fas fa-fw fas fa-ellipsis-v"></i>
                        <span> liste </span>
                    </a>
                </li>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Administration
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="marchand.php">Marchand</a>
                        <a class="collapse-item" href="commentaire.php">Commentaire</a>
                        <a class="collapse-item" href="categorie.php">Catégorie</a>
                        <a class="collapse-item" href="produit.php">Produit</a>
                    </div>
                </div>
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h4 mb-0 text-gray-800 mt-4">Produits</h1>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= $affiche['nom'].' '.$affiche['prenom']; ?>
                                <img class="img-profile rounded-circle" src="https://www.ideaelan.com/images/uploads/2016/11/super-admin-icon.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profil.php">
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

                    <!-- DataTales Example -->
                    <div class="row">
                        <div class="col-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Ajout d'un produit</h6>
                                </div>
                                <div class="card-body">
                                    <form action="traitement_produit.php" method="post">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-12 mb-2">
                                                    <div class="input-group mb-3">
                                                        <input class="form-control" type="text" name="nom" placeholder="Nom du produit">
                                                    </div>
                                                    <div class="input-group">
                                                        <select name="produit" id="produit" class="form-control">
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
                                                                while ($donnees = $reponse->fetch())
                                                                {?>
                                                                <option value="<?php echo $donnees['id']; ?>"><?php echo $donnees['nom']; ?></option>
                                                                <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-6 col-sm-12 text-right">
                                                    <button type="submit" class="btn btn-success">Sauvergarder</button>
                                                    <button type="submit" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Liste des catégories</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Noms</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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

                                        $reponse = $bdd->query('SELECT * FROM produit');
                                        
                                        ?>

                                        <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
                                        while($donnees = $reponse->fetch()){
                                        ?>
                                        <tr>
                                            <td><?php echo $donnees['nom'];?></td>
                                            <td class="text-center">
                                                            <button class="btn btn-link" data-toggle="modal" data-target="#inlineForm"><i class="fas fa-edit fa-sm fa-fw mr-2 fa-2x"></i></button>
                                                                <button class="btn btn-link" data-toggle="modal" data-toggle="modal" data-target="#warning"><a href="traitement_delete_prod.php?msg=<?php echo $donnees['id_produit']; ?>"><i class="fas fa-trash fa-sm fa-fw mr-2 fa-2x"></i></a></button>
                                                            </td>
                    
                                        </tr>
                                        <?php
                                            } //fin de la boucle, le tableau contient toute la BDD
                                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
                        <span>Copyright &copy; Your Website 2019</span>
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

    <!-- Modal -->
    

    <div class="form-group">
        <!-- Modal -->
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h4 class="modal-title text-white" id="myModalLabel140">Modification</h4>
                        <button type="submit" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#">
                        <div class="modal-body">
                            <label>Nom </label>
                            <div class="form-group">
                                <div class="value">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="nom">
                                    </div>
                                </div>
                            </div>
                            <label>Prénoms</label>
                            <div class="form-group">
                                <div class="value">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="prenoms">
                                    </div>
                                </div>
                            </div>

                            <label>Gmail</label>
                            <div class="form-group">
                                <div class="value">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="login">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-success">Sauvergarder</button>
                        </div>
                    </form>
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
<?php
    }
    else
    {
        header("location:login.php");
    }

?>