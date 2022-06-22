<?php
require_once 'connection.php';

     if(isset($_POST) && !empty($_POST))
     {
         $control_form_err = false;
         $nom = addslashes ($_POST['nom']);
         $prenom = addslashes ($_POST['prenom']);
         $date_de_creation = addslashes ($_POST['date_de_creation']);
         $role = addslashes ($_POST['role']);
         $sql = "INSERT INTO utilisateur".
         "(Nom,Prenom,Rolee,Datee)"."VALUES". 
         "('$nom','$prenom','$role','$date_de_creation')";
         mysqli_select_db($conn, 'gestion_stock_medicaments');
         $retval = mysqli_query($conn, $sql );
     
         if(! $retval ) {
         die('could not enter data:' .mysqli_error($conn));
        
         }
         else {
         echo "Les données sont bien rentrées";
         mysqli_close($conn);
         }
         if(! $retval ) {
            $control_form_err = true;
        }
     }



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
                <div class="container-fluid">
                    <h2>Créer un nouveau profil utilisateur</h2>

                <form  action ="<?php $_PHP_SELF ?>" method= "POST">


                    <?php   if(isset($_POST)  && !empty($_POST)){  ?>

                      <?php   if(!$control_form_err){  ?>

                      <div class="alert alert-success" role="alert">
                          <a href="#" class="alert-link">L'enregistrement a été effectuer avec succès</a>
                      </div>

                      <?php   }  ?> 

                      <?php   if($control_form_err){  ?>

                      <div class="alert alert-danger" role="alert">
                          <a href="#" class="alert-link">L'enregistrement a échoué</a>
                      </div>

                      <?php   }  ?>  

                    <?php   }  ?>  
                      <div class="form-group">
                           <label for="labelNom">Nom</label>
                           <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter le nom" required>
                           <?php   if(isset($_POST['nom'])  && empty($_POST['nom'])){  ?>

                            <div class="alert alert-danger" role="alert">
                                     <a href="#" class="alert-link">Le nom ne doit pas etre vide</a>
                             </div>

                           <?php   }  ?> 
                       
                       </div>
                       <div class="form-group">
                           <label for="labelPrenom">Prenom</label>
                           <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter le prenom" required>
                       
                       </div>

                       <?php   if(isset($_POST['prenom'])  && empty($_POST['prenom'])){  ?>

                          <div class="alert alert-danger" role="alert">
                               <a href="#" class="alert-link">Le prenom ne doit pas etre vide</a>
                          </div>

                       <?php   }  ?> 

                        <div class="form-group">
                           <label for="labelrole">role</label>
                           <input type="tel" class="form-control" id="role" name="role" placeholder="Enter le role" required>
                       
                       </div>

                       <?php   if(isset($_POST['role'])  && empty($_POST['role'])){  ?>

                          <div class="alert alert-danger" role="alert">
                               <a href="#" class="alert-link">Le role ne doit pas etre vide</a>
                          </div>

                       <?php   }  ?> 

                       <div class="form-group"  style="margin-bottom:1%">
                           <label for="labeldate_de_creation">Date de création</label>                         
                           <div class="input-group">
                                 <input type="date" placeholder="Choisir une date de naissance" class="form-control" id="date_de_creation" name="date_de_creation" required>        
                            </div>  
                            
                            <?php   if(isset($_POST['date_de_creation'])  && empty($_POST['date_de_creation'])){  ?>

                               <div class="alert alert-danger" role="alert">
                                   <a href="#" class="alert-link">La date de création ne doit pas etre vide</a>
                               </div>

                            <?php   }  ?> 
                       
                       </div>

                       <button type="submit" class="btn btn-primary">Enregister</button>
                 </form>
                   
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <?php  include 'assets/templates/footer.php'; ?>
    </body>
</html>