<?php
ini_set('display_errors','on');
    error_reporting(E_ALL);
    $bdd = new PDO("mysql:host=localhost;dbname=gestion_entreprise", "root","");
    session_start();
    if (isset($_POST) and !empty($_POST)) {
       if (strlen($_POST['mdp']) == 0){
           $msg = "ko";
       }
   else { $sel = " SELECT * FROM liste_users WHERE email = :email AND password = :password;"; 
       $req = $bdd->prepare($sel);
       $req->execute(array(
        "password" => $_POST['mdp'],
        "email" => $_POST['login']
       ));
       if ($req->rowCount() == 1){
           $msg = "ok";
       }else {
           $msg ="Non";
       }
   } 
   }
  if(isset($msg) && $msg == "Non"){ ?>
 <div class="alert alert-danger container">
     Recommence, essaye encore !
 </div>                  
 <?php  }
 if(isset($msg) && $msg == "ok"){ 
    $_SESSION['Prenom'] = $_POST['prenom'];
               
                           
  header('location: admin.php');
 }
    

    $_SESSION['test'] = 1234567890;

    setcookie("Connexion", "<a href='admin.php'>Admin</a>");
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
</html>