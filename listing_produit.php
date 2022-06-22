<?php
require_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
         <?php  include 'assets/templates/head.php'; ?>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
            <?php  include 'assets/templates/menu.php'; ?>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                  <?php  include 'assets/templates/nav.php'; ?>
                <!-- Page content-->
                <div class="container-fluid" style="margin-top:2%">

                    <a href="./formulaire-logement.php"><button type="button" class="btn btn-primary">Ajouter une nouvelle fiche produit</button> </a> 

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    <?php

                       $sql = "SELECT Id,Nom,produit.Description,Creation,Prix,Stock,Reference,Miseajour FROM  produit ";
                       $retval = mysqli_query( $conn, $sql );
                       if(! $retval ) {  ?>
                          <div class="alert alert-danger" role="alert">
                                  <a href="#" class="alert-link">L'affichage  a échoué</a>
                           </div>
                       <?php  }else{   ?>


                          <table class="table">
                              <thead class="thead-light">
                                               <tr>
                                                              <th scope="col">ID</th>
                                                              <th scope="col">NOM</th>
                                                              <th scope="col">DESCRIPTION</th>
                                                              <th scope="col">PRIX</th>
                                                              <th scope="col">STOCK</th>
                                                              <th scope="col">REFERENCE</th>
                                                              <th scope="col">DATE DE CREATION</th>
                                                              <th scope="col">DATE DE MISE A JOUR</th>
                                                              <th scope="col">ACTION</th>

                                                </tr>
                             </thead>
                             <tbody>
                                 
                                  <?php   while($row = mysqli_fetch_array($retval)) {  ?>

                                    <tr>
                                        <th scope="row"><?= $row["Id"]  ?> </th>
                                        <td><?= $row["Nom"]  ?></td>
                                        <td><?= $row["Description"]  ?></td>
                                        <td><?= $row["Prix"]  ?></td>
                                        <td><?= $row["Stock"]  ?></td>
                                        <td><?= $row["Reference"]  ?></td>
                                        <td><?= $row["Creation"]  ?></td>
                                        <td><?= $row["Miseajour"]  ?></td>
                                    
                                        <td><a href="./edit_produit.php?Id=<?= $row["Id"] ?>"><button type="button" class="btn btn-primary">Modifier la fiche d'un produit</button> </a> 

                                        <a href="./delete_produit.php?Id=<?= $row["Id"] ?>"><button type="button" class="btn btn-primary">Supprimer la fiche d'un produit</button> </a>   </td>
                                    </tr>
                   
                                   <?php   }   ?>                             
                           
                            
                             </tbody>

                            </table> 

                           <?php   }   ?>

                      
                          <?php mysqli_close($conn);    ?>                       
                     
                </div>
            </div>
        </div>
        <?php  include 'assets/templates/footer.php'; ?>
    </body>
</html>