<?php

if ($_GET['bnt_dec']=='deconnexion')
    {
        session_start();
        session_destroy();
        header("location:login.php");
    }

?>