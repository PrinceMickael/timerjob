<?php
session_start();//Démarre une séssion

include('Connexion_bdd.php');//Inclus la connexion a la bdd
    
    if (isset($_POST) and !empty($_POST)) { //Test les variable du formulaire
       if (strlen($_POST['mdp']) == 0){
           $msg = "ko";
       }
   else { 
       $sel = " SELECT * FROM liste_users WHERE Email = :email AND Password = :password;"; //Requete SQL pour récupérer les variables du formulaire
       $req = $bdd->prepare($sel);
       $req->execute(array(
        "password" => $_POST['mdp'],
        "email" => $_POST['login']
       ));
       
       if ($req->rowCount() == 1){ //Test les variables du formulaires avec les identifiants dans la base de données
           $msg = "ok";
       }else {
           $msg ="Non";
       }
   } 
   }
  if(isset($msg) && $msg == "Non"){ //Si aucune coocordance trouver alors renvoie le message 
?>
 <div class="alert alert-danger container">
     Recommence, essaye encore !
 </div>                  
 <?php
}
 
if(isset($msg) && $msg == "ok"){ 
    $id = $bdd->prepare('SELECT ID FROM liste_users WHERE Email = ?');//Récupére l'id grace au Login
    $id->execute(array(
    $_POST['login']
    ));
    
    $data = $id->fetch();
  $_SESSION['id'] = $data['ID'];//Crée une variable de session                    
  header('location: admin.php');//Redirige vers la page de connexion
 }
    

    $_SESSION['test'] = 1234567890;//Crée une variable de session en TEST

    setcookie("Connexion", "<a href='admin.php'>Admin</a>"); //Crée le cookie
?>
 <?php  if (isset($_SESSION['ID'])) { //Si la variable SESSION existe alors ça affiche la page , sinon rien 
 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Connectez vous</h2>
        <label for="inputEmail" class="sr-only">Adresse email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="login" required autofocus>
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="mdp" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Enregister
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
<?php   
    } 
?>
</html>