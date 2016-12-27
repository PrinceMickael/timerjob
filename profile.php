Seconde Step !
<?php 
session_start();

//Verifie que la variable de SESSION existe 
if (isset($_SESSION['email'])) {
    
?>

<!-- FORMULAIRE POUR REMPLIR LES COORDONNEES DES EMPLOYERS -->
<form method="post">

    <input type="text" name="Nom" placeholder="Votre Nom" value="<?php if (isset($_SESSION['nom'])) { echo $_SESSION['nom']; } ?>">
    <input type="text" name="Prenom" placeholder="Votre Prenom" value="<?php if (isset($_SESSION['prenom'])) { echo $_SESSION['prenom']; } ?>">
    <input type="text" name="Sexe" placeholder="Votre sexe">
    <input type="text" name="Adresse" placeholder="Votre adresse physique">
    <input type="text" name="Telephone" placeholder="Votre numero de téléphone">
    <button type="submit">Envoyer !</button>

</form>

<?php
}
//Verifie que le champ n'est pas vide
if (!empty($_POST['Nom']) AND !empty($_POST['Prenom']) AND !empty($_POST['Sexe']) AND !empty($_POST['Adresse']) AND !empty($_POST['Telephone'])) {
    
    include('Connexion_bdd.php');//Connexion a la base de données
    
    //Insert dans la table les éléments du formulaire
    $ins = $bdd->prepare('INSERT INTO users_coordonnees (Nom, Prenom, Sexe, Adresse, Telephone, ID_users) VALUES (?, ?, ?, ?, ?, ?)');
    $ins->execute(array(
      
      $_POST['Nom'],
      $_POST['Prenom'],
      $_POST['Sexe'],
      $_POST['Adresse'],
      $_POST['Telephone'],
      $_SESSION['ID']
    ));
header('Location: login.php'); //Redirige vers la page de Login
}

?>
