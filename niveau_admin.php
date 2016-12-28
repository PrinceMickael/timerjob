<?php 
session_start();

if (isset($_SESSION['id'])) { //Verifie qu'une session de variable existe
    include('Connexion_bdd.php'); //Connexion a la base de données
   
    $resultat = $bdd->query('SELECT count(*) as nb FROM liste_users WHERE Nv_droit = 3'); //Compte le nombre de ligne avec le Nv_droit : 3
    $result = $resultat->fetch();
    $nb = $result['nb'];
   
    
       if ($result['nb'] != 0) { //Si le resultat est différent de 0 alors ça affiche combien d'employer sont en attente de droit
    
?>  <hr>
    <h1>Vous avez <?php echo $nb;?> employées en attente de droit</h1>
    <hr>
<?php
       }
?>
   
   </br>
    </br>
<?php

   $aff = $bdd->query('SELECT liste_users.Email AS mail , 
                              liste_users.Nv_droit AS pass , 
                              users_coordonnees.Nom AS nom , 
                              users_coordonnees.Prenom AS prenom 
                              FROM liste_users , users_coordonnees 
                              WHERE liste_users.Nv_droit = 3 AND liste_users.ID = users_coordonnees.ID_users'); //Selectionne toutes les informations dont ont a besoin sur les utilisateurs dans la bdd et joint les deux tables
   
   while ($data = $aff->fetch()) { //Affiche le résultat tant qu'il y a des utilisateurs au niveau 3
?> 
        <strong><?php echo ' - ' . $data['mail'] . ' - ' . ' niveau de sécruité : ' . $data['pass'];  ?></strong>
        <a href="Nv_1.php?mail=<?php echo $data['mail']; ?>"><button type="submit" value="Niveau 1">Niveau 1</button></a> <!--Change au niveau accés 1 -->
        <a href="Nv_2.php?mail=<?php echo $data['mail']; ?>"><button type="submit" value='Niveau 2'>Niveau 2</button></a> <!-- Change au niveau accés 2 -->
        </br></br>        
<?php
}
?>

                
    <hr>
    <h1>Modifier les droits</h1>
    <hr>
<?php
    $all = $bdd->query('SELECT liste_users.ID as ID,
                               liste_users.Email AS mail,
                               liste_users.Nv_droit AS pass , 
                               users_coordonnees.Nom AS nom , 
                               users_coordonnees.Prenom AS prenom 
                               FROM liste_users , users_coordonnees 
                               WHERE liste_users.Nv_droit < 3 AND liste_users.ID = users_coordonnees.ID_users'); //Selectionne toutes les informations dont ont a besoin sur les utilisateurs dans la bdd et joint les deux tables avec un filtre différent pour ne pas affiché les utilisateurs qui sont en attente de droit
    
    while ($data = $all->fetch()) { //Affiche le résultat
?>   
        <strong><?php echo ' - ' . $data['mail'] . ' - ' . ' niveau de sécruité : ' . $data['pass'];  ?></strong>
        <a href="Nv_1.php?mail=<?php echo $data['mail']; ?>"><button type="submit" value="Niveau 1">Niveau 1</button></a> <!--Change au niveau accés 1 -->
        <a href="Nv_2.php?mail=<?php echo $data['mail']; ?>"><button type="submit" value='Niveau 2'>Niveau 2</button></a> <!-- Change au niveau accés 2 -->
        
        </br></br>
        
<?php
    
}
   
    
    
    
    
    
    
    
    
}
else {
    header('location: login.php'); //Si la variable de SESSION n'existe pas renvoi au login.php
}

?>