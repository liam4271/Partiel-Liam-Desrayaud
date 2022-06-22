<!DOCTYPE html>
<html lang="fr">
<head>
    <?php  include 'assets/templates/head.php'; ?>
</head>
<body>
<?php
require_once 'connection.php';

$Id = $_GET["Id"];

$sql = 'DELETE FROM produit where Id='.$Id;


if ($retval = mysqli_query( $conn, $sql )){

    printf('Deleted successfully');
}



?>


<br>
<br>
<br>

<a type="button" class="btn btn-primary" href="listing_produit.php">Vos Produit</a> 

</body>
</html>