<?php 
session_start();//Démarre une SESSION
include('Connexion_bdd.php');//Connexion a la base de données


$check = $bdd->prepare('SELECT Nv_droit FROM liste_users WHERE ID = ?');//Requete SQL pour récuper le nv de droit par l'id 
$check->execute(array(
$_SESSION['id']
));

$data = $check->fetch();

if (!isset($_SESSION['id']) OR $data['Nv_droit'] == 3) { //Test la Variable de SESSION et le niveau de droit
    header('Location: niveau3.php'); //Redirige vers la page de niveau 3
}
elseif (isset($_SESSION['id']) AND $data['Nv_droit'] == 1) { //Test la Variable de SESSION et le niveau de droit
   header('Location: niveau_admin.php');//Redirige vers la parti administrateur    
}
elseif (isset($_SESSION['id']) AND $data['Nv_droit'] == 2) {
    echo "Au travail bandes de petites fourmis !";//Affiche la parti employé
}
?>