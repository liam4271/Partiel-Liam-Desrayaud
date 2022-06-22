<!DOCTYPE html>
<html lang="fr">
<head>

    <?php  include 'assets/templates/head.php'; ?>
</head>
<body>
<?php
require_once 'connection.php';

$Id_utilisateur = $_GET["Id_utilisateur"];

$sql = 'DELETE FROM utilisateur where Id_utilisateur='.$Id_utilisateur;


if ($retval = mysqli_query( $conn, $sql )){

    printf('Deleted successfully');
}



?>

<br>
<br>
<br>
      <a type="button" class="btn btn-primary" href="listing_users.php">Vos utilisateur</a>
              
</body>
</html>
