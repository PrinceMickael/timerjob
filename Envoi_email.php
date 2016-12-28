<?php
session_start();


if (!empty($_POST['email']) AND !empty($_POST['mdp'])) 
    {
      $_SESSION['email'] = $_POST['email']; //Défini une variable de séssion
      $_SESSION['prenom'] = $_POST['prenom'];
      $_SESSION['nom'] = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $nom = $_POST['nom'];
        //ENVOI DU MAIL
        
     // Plusieurs destinataires
     $to  = 'test.simplon.nice@gmail.com';

     // Sujet
     $subject = 'Demande autorisation de droit';

     // message
     $message = '
     <html>
      <head>
       <title>Demande autorisation de droit</title>
      </head>
      <body>
       <p>Votre employé ';
      $message .= $prenom;
      $message .= ' ';
      $message .= $nom;
      $message .= ' 
         Vous demande un droit daccés </p>
       <hr>
       <p><a href="http://127.0.0.1/Gestion_entreprise/login.php"> Répondre a la demande de droit daccés </a></p>
       </br>
       <p><a href="http://127.0.0.1/Gestion_entreprise/login.php"> Refuser la demande de droit daccés </a></p>
       
      </body>
     </html>
     ';

     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

     // En-têtes additionnels
     $headers .= 'To: Patron <test.simplon.nice@gmail.com>' . "\r\n";
     $headers .= 'From: Entreprise <Entreprise@nice@gmail.com>' . "\r\n";
     $headers .= 'Cc: Entreprise@example.com' . "\r\n";
     $headers .= 'Bcc: Entreprise@example.com' . "\r\n";

     // Envoi
     mail($to, $subject, $message, $headers);

        
//Appel a la base données
      include('Connexion_bdd.php');
    
      $securiter_base = 3;//défini un niveau de droit de base
        
        //Insert le mail et mot de passe dans la base de données
        $ins = $bdd->prepare('INSERT INTO liste_users(Email, Password, Nv_droit) VALUES(?, ?, ?)');
        $ins->execute(array(
        $_POST['email'],
        $_POST['mdp'],
        $securiter_base
            
        ));
        //Récupére L'id de l'utilisateur
        $sel = $bdd->prepare('SELECT ID FROM liste_users WHERE email = ?');
        $sel->execute(array(
        $_SESSION['email']
        ));
        $data = $sel->fetch();
        
      $_SESSION['ID'] = $data['ID'];//Défini une variable de session
        
    header('Location: profile.php'); //Redirige vers la page de profile
        
}
?>
