<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="admin/img/clickLog.jpeg">

    <title>Click And Collect - Accueil</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/css/style.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

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
                            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index_as.php">
                                <div class="sidebar-brand-icon rotate-n-15">
                                    <i class="fas fa-2x mr-2 fa-cart-arrow-down"></i>
                                </div>
                                <div class="sidebar-brand-text h4 mt-2">Click And Collect </div>
                            </a>
                        </div>
                    </form>



                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">

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


                        $id = $_GET['id'];
                        $rep = $bdd->prepare('SELECT * FROM etablissement inner join categorie ON etablissement.id_cat=categorie.id WHERE etablissement.id_eta=?');
                        $rep->execute((array($id)));
                        $donnees = $rep->fetch();

                        echo '<div class="container-fluid mb-3">';
                        echo '<div class="row">';
                                echo '<div class="col-6" style="padding: 0 0; margin: 0 0;">';
                                    echo '<img src="'.$donnees['photo'].'" class="card-img rounded-0" alt="">';
                                echo '</div>';
                                echo ' <div class="col-6" style="padding: 0 0; margin: 0 0;">';
                                echo ' <div class="text-center h3 mb-5" style="background: #4e73df; color:white;">';
                                    echo strtoupper($donnees['nom']);
                                    echo '</div>';
                                    echo '<div class="card-body text-center my-auto py-auto">';
                                    echo '<i class="fas fa-map-marker-alt  fa-6x text-primary mt-3 mb-5"></i>';
                                    echo '<h2 class="text-black mt-5 mb-5">'.$donnees['nom_eta'].'</h2>';
                                    echo '<h3 class="">'.$donnees['adresse'].'</h3>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="row bg-white">';
                                    echo '<div class="col-12 pt-5 pb-5 text-center">';
                                    echo '<a href="'.$donnees['numero'].'" class="texte-white btn btn-primary rounded-0 mr-3"><i class="fas fa-phone-volume"></i> Appeler</a>';
                                    echo '<a href="'.$donnees['lien'].'" class="texte-white btn btn-primary rounded-0 mr-3"><i class="fas fa-map-marker-alt"></i> Itinéaire</a>';
                                    echo '<a href="mailto:'.$donnees['email'].'" class="texte-white btn btn-primary rounded-0 mr-3"><i class="far fa-envelope"></i> Email</a>';
                                    echo '</div>';
                                    echo '<div class="col-12">';
                                    echo '<div class="row mb-5 mt-5">';
                                    echo '<div class="col-3  text-center">';
                                    echo '<i class="far fas fa-bullhorn mb-2 text-primary fa-5x"></i><br>';
                                    echo '<h3 class="text-primary">Description</h3>';
                                            echo '</div>';
                                            echo '<div class="col-1"></div>';
                                            echo '<div class="col-7">';
                                            echo '<p>'.$donnees['description'].'</p>';
                                                echo '</div>';
                                                echo '</div>';

                    ?>
                                                <hr>
                                                <div class="row mb-5 mt-5">
                                                <div class="col-3  text-center">
                                                <i class="far fas far fa-clock mb-2 text-primary fa-5x"></i><br>
                                                <h3 class="text-primary">Horaires</h3>
                                                </div>
                                                <div class="col-1"></div>
                                        <div class="col-7">
                                            <table>
                                                <tr>
                                                    <td class="text-primary">Lundi</td>
                                                    <td class="pl-2">08H00 - 18H00</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-primary">Mardi</td>
                                                    <td class="pl-2">08H00 - 18H00</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-primary">Mercredi</td>
                                                    <td class="pl-2">08H00 - 18H00</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-primary">Jeudi</td>
                                                    <td class="pl-2">08H00 - 18H00</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-primary">Vendredi</td>
                                                    <td class="pl-2">08H00 - 18H00</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-primary">Samedi</td>
                                                    <td class="pl-2">09H30 - 17H00</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <h3 class="text-center pb-5">Merci d'être passer, n'hesitez pas à nous contacter.</h3>
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
            <footer class=" sticky-footer bg-white ">
                <div class="container my-auto ">
                    <div class="copyright text-center my-auto ">
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
    <a class="scroll-to-top rounded " href="#page-top ">
        <i class="fas fa-angle-up "></i>
    </a>

    <div class="form-group ">
        <!-- Modal -->
        <div class="modal fade text-left " id="connexion " tabindex="-1 " role="dialog " aria-labelledby="myModalLabel33 " aria-hidden="true ">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document ">
                <div class="modal-content ">
                    <div class="modal-header bg-primary white ">
                        <h4 class="modal-title text-white " id="myModalLabel140 ">Connexion</h4>
                        <button type="submit " class="close text-white " data-dismiss="modal " aria-label="Close ">
                            <span aria-hidden="true ">&times;</span>
                        </button>
                    </div>
                    <form action="# ">
                        <div class="modal-body ">
                            <label>Gmail</label>
                            <div class="form-group ">
                                <div class="value ">
                                    <div class="input-group ">
                                        <input class="form-control " type="text " name="nom ">
                                    </div>
                                </div>
                            </div>
                            <label>Mot de passe</label>
                            <div class="form-group ">
                                <div class="value ">
                                    <div class="input-group ">
                                        <input class="form-control " type="password " name="prenoms ">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center ">
                                <button class="small btn btn-link " data-toggle="modal " data-toggle="modal " data-target="#inscrire " role="button ">S'inscrire</button>
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <button type="reset " class="btn btn-danger " data-dismiss="modal ">Annuler</button>
                            <button type="submit " class="btn btn-success ">Sauvergarder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group ">
        <!-- Modal -->
        <div class="modal fade text-left " id="inscrire " tabindex="-1 " role="dialog " aria-labelledby="myModalLabel33 " aria-hidden="true ">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document ">
                <div class="modal-content ">
                    <div class="modal-header bg-primary white ">
                        <h4 class="modal-title text-white " id="myModalLabel140 ">Inscription</h4>
                        <button type="submit " class="close text-white " data-dismiss="modal " aria-label="Close ">
                            <span aria-hidden="true ">&times;</span>
                        </button>
                    </div>
                    <form action="# ">
                        <div class="modal-body ">
                            <label>Nom</label>
                            <div class="form-group ">
                                <div class="value ">
                                    <div class="input-group ">
                                        <input class="form-control " type="text " name="nom ">
                                    </div>
                                </div>
                            </div>
                            <label>Prénoms</label>
                            <div class="form-group ">
                                <div class="value ">
                                    <div class="input-group ">
                                        <input class="form-control " type="password " name="prenoms ">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center ">
                                <button class="small btn btn-link " data-toggle="modal " data-toggle="modal " data-target="#inscrire " role="button ">S'inscrire</button>
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <button type="reset " class="btn btn-danger " data-dismiss="modal ">Annuler</button>
                            <button type="submit " class="btn btn-success ">Sauvergarder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal-warning mr-1 mb-1 d-inline-block ">
        <!-- Modal -->
        <div class="modal fade text-left " id="logoutModal " tabindex="-1 " role="dialog " aria-labelledby="exampleModalLabel " aria-hidden="true ">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document ">
                <div class="modal-content ">
                    <div class="modal-header bg-primary white ">
                        <h5 class="modal-title text-white " id="exampleModalLabel ">Prêt à partir ?</h5>
                        <button type="submit " class="close text-white " data-dismiss="modal " aria-label="Close ">
                            <span aria-hidden="true ">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        Sélectionnez "Déconnexion " ci-dessous si vous êtes prêt à mettre fin à votre session actuelle.
                    </div>
                    <div class="modal-footer ">
                        <button type="button " class="btn text-white btn-success "><a href="# " class="text-white ">Déconnexion</a></button>
                        <button type="submit " class="btn text-white btn-danger " data-dismiss="modal "><a href="# " class="text-white ">Annuler</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js "></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js "></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js "></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js "></script>

    <!-- Page level plugins -->
    <script src="admin/vendor/chart.js/Chart.min.js "></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/chart-area-demo.js "></script>
    <script src="admin/js/demo/chart-pie-demo.js "></script>

</body>


</html>