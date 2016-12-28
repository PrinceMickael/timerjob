<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
   <title>Timer Job</title>
     <link rel="stylesheet" href="css/bootstrap.css">
     <link rel="stylesheet" href="styleindex.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

 </head>

 <body>

   <header>
     <div class="container-fluid">
       <h3>Timer Job</h3>

   </header>
<div class="button-modal">

  <button type="button" id="connexion" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" name="connexion">Se connecter</button>

  <button type="button" id="register" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModa2" name="register">S'inscrire</button>
</div>
</div>
<!-- Modal 1 -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
       <h2>Se connecter</h2>
     </div>
     <div class="modal-body">
       <?php include('Connexion.php'); ?>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-primary" value="submit">Se connecter</button>
     </div>
   </div>
 </div>
</div>

<!-- Modal 2  -->

<div class="modal fade" id="myModa2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
       <h2>Inscription</h2>
     </div>
     <div class="modal-body">
      <?php include('Inscription.php');?>
     </div>
     <div class="modal-footer">
       <button type="submit" class="btn btn-primary">Inscription</button>
     </div>
   </div>
 </div>
</div>

<script type="text/javascript" href="bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

<footer>

</footer>
 </body>
</html>
