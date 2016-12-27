<?php 
session_start();//Démarre une session

?> <p>Vous n'avez pas encore accés, Merci de réessayer une fois que vous aurez accés.</p>
<?php 
session_destroy();//Détruit la séssions
header("refresh:5;url=login.php");//Redirige au bout de 5 secondes sur la page de Login

?>