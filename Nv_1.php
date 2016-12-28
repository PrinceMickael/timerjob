<?php 
include('Connexion_bdd.php'); //Connexion a la base de données
    if (isset($_GET['mail'])) { //Verifie que le get a bien transité 
        $modif = $bdd->prepare('UPDATE liste_users SET Nv_droit = 1 WHERE Email = ?'); //Modifie le Nv_droit 
        $modif->execute(array(
        $_GET['mail']
        ));
        header('Location: niveau_admin.php');
    }
?>